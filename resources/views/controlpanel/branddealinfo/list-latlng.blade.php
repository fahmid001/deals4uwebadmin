@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Address
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Address</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Address</th>
                                <th>lat</th> 
                                <th>lng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl_no = 1;
                            if (count($branddealList) > 0):
                                foreach ($branddealList as $product):
                                    ?>
                                    <tr>
                                        <td>{{ $sl_no++ }}</td>
                                        <td>{{ $product->address}}</td>
                                        <td>{{ $product->lat}}</td>
                                        <td>{{ $product->lng}}</td>
                                        <td>
                                            <a href="#editModal-<?php echo $product->id; ?>"data-toggle="modal" ><button class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add</button></a></td>
                                    </tr>  
                                <div class="modal fade" id="editModal-<?php echo $product->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form class="cmxform form-horizontal tasi-form" id="signupForm2" method="post" action="{{URL::to('store-latlng')}}" >
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">                            
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4>Add Lat Lng</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="panel-body">
                                                        <div class="form-group ">
                                                            <label for="name" class="control-label col-lg-3">Lat</label>
                                                            <div class="col-lg-7">
                                                                <input class=" form-control" type="hidden" id="id" name="id" value="<?php echo $product->id; ?>" />
                                                                <input class=" form-control" type="hidden" id="dealsid" name="dealsid" value="<?php echo $product->ref_dealinfo_id; ?>" />
                                                                <input class=" form-control" type="text" id="lat" name="lat" required/>
                                                            </div>
                                                        </div>                                                            
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group ">
                                                            <label for="address" class="control-label col-lg-3">Lng</label>
                                                            <div class="col-lg-7">
                                                                <input class="form-control" type="text" id="lng" name="lng" required=""/>
                                                            </div>
                                                        </div>                                                            
                                                    </div>

                                                </div>
                                                <div class="modal-footer" >
                                                    <button class="btn btn-success" type="submit">Save</button>
                                                    <button style="margin-right: 35%" data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
                                                </div>  
                                            </div>
                                        </form> 
                                    </div>                                        
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
@stop
