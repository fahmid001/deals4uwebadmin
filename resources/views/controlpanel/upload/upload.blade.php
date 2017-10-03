@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Product List
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Product List</h3>
                </div>  
                <span class="tools pull-right" style="padding:0px 10px 5px 0px">
                    <a class="btn btn-success" href="{{URL::to('upload-brand')}}">Add Product<i class="fa fa-plus"></i></a>
                </span>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Title </th>
                                <th>Images</th>
                                <th>Keyword</th> 
                                <th>Mobile</th>
                                <th>Category</th>
                                <th>Start Date</th>
                                <th>End Date</th> 
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
                                        <td><img src="{{URL::to('/')}}/images/productimages/{{$product->banner_image}}" width="50" height="50" style="border-radius: 50%"></td>
                                        <td>{{ $product->title}}</td>
                                        <td>{{ $product->keyword}}</td>
                                        <td>{{ $product->mobile}}</td>
                                        <td>
                                            <?php
                                            $catId = $product->category;
                                            if (count($catId) >0):
                                                $catName = DB::table('category')->where('id', '=', $catId)->first();
                                                if (count($catName) >0):
                                                    echo $catName->category_title;
                                                endif;
                                            endif;
                                            ?>
                                        </td>
                                        <td>{{ $product->start_date}}</td>
                                        <td>{{ $product->end_date}}</td>
                                    </tr>                                
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
