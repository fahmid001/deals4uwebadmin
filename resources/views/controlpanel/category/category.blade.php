@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Category
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('success_message') }}</div>
            @elseif (Session::has('error_message'))
            <div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('error_message') }}</div>
            @endif
        </div>  
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Category List</h3>
                </div>                
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Category Title</th>
                                <th>Details</th>                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl_no = 1;
                            if (count($categoryList) > 0):
                                foreach ($categoryList as $category):
                                    ?>
                                    <tr>
                                        <td>{{ $sl_no++ }}</td>
                                        <td>{{ $category->category_title}}</td>
                                        <td>{{ $category->category_details}}</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{URL::to('/')}}/edit-category/{{$category->id}}">Edit</a>
                                            <a class="btn btn-danger btn-xs" onclick="return confirm('Are you suer want to delete');" href="{{URL::to('/')}}/delete-category/{{$category->id}}">Delete</a>
                                        </td>
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
        <?php
        if (!isset($editCategory)):
            ?>
            <div class="col-md-6">            
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" action="{{URL::to('store-category')}}" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="box-body">                        
                            <div class="form-group">
                                <label for="cat_name" class="col-sm-3 control-label">Category Title:<span style="color:red">&nbsp;*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="cat_name" name="cat_name" autocomplete="off" required="required">
                                </div>
                            </div>  

                            <div class="form-group">
                                <label for="cat_details" class="col-sm-3 control-label">Details :</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="cat_details" name="cat_details" autocomplete="off">
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">Save&nbsp;</button> 
                                    <a href="{{URL::to('category')}}"><button class="btn btn-danger" type="button">Cancel &nbsp;</button></a>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        endif;
        if (isset($editCategory)):
            ?>
            <div class="col-md-6">            
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" action="{{URL::to('update-category')}}" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="catid" value="<?php echo $categoryInfo[0]->id; ?>">
                        <div class="box-body">                        
                            <div class="form-group">
                                <label for="meta_title" class="col-sm-3 control-label">Category :<span style="color:red">&nbsp;*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="cat_name" name="cat_name" autocomplete="off" required="required" value="{{$categoryInfo[0]->category_title}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="meta_title" class="col-sm-3 control-label">Details :</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="cat_details" name="cat_details" autocomplete="off" value="{{$categoryInfo[0]->category_details}}">
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">Update&nbsp;</button>
                                    <a href="{{URL::to('category')}}"><button class="btn btn-danger" type="button">Cancel &nbsp;</button></a>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "lengthMenu": [[50, 10, 25, -1], [50, 10, 25, "All"]],
            columnDefs: [
                {orderable: false, targets: [-1,-2,-3]}
            ]
        });
    });
</script>
<script>
    var Script = function () {
        $().ready(function () {
            $("#signupForm").validate({
                ignore: [],
                rules: {
                    cat_name: "required",
                },
                messages: {
                    cat_name: "Category name required"
                }
            });
        });
    }();
</script>
@stop
