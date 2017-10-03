@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Follow List
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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Follow List</h3>
                </div> 
                <span class="tools pull-right" style="padding:0px 10px 5px 0px">
                    <a class="btn btn-success" href="{{URL::to('signup-brand')}}">Sign Up New <i class="fa fa-plus"></i></a>
                </span>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Brand Title</th>
                                <th>Details</th>                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sl_no = 1;
                            if (count($brandList) > 0):
                                foreach ($brandList as $brand):
                                    ?>
                                    <tr>
                                        <td>{{ $sl_no++ }}</td>
                                        <td>{{ $brand->brand_title}}</td>
                                        <td>{{ $brand->brand_details}}</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{URL::to('/')}}/branduser-profile-details/{{$brand->id}}">Details</a>
                                            <a class="btn btn-primary btn-xs" href="{{URL::to('/')}}/branduser-profile-edit/{{$brand->id}}">Edit</a>
                                            <!--                                            <a class="btn btn-danger btn-xs" onclick="return confirm('Are you suer want to delete');" href="{{URL::to('/')}}/delete-favorite/{{$brand->id}}">Delete</a>-->
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
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            "lengthMenu": [[50, 10, 25, -1], [50, 10, 25, "All"]],
            columnDefs: [
                {orderable: false, targets: [-1, -2, -3]}
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
