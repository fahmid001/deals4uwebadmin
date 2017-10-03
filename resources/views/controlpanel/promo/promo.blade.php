@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Promo List
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Promo List</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl. </th>
                                <th>Mobile</th>
                                <th>Start Date</th>
                                <th>End Date</th> 
                                <th>Status</th>
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
                                        <td>{{ $product->mobile}}</td>
                                        <td>
                                            <?php
                                            if ($product->input_date_status == 1):
                                                if ($product->start_date != '') {
                                                    $a = explode('-', $product->start_date);
                                                    echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                                } else {
                                                    echo '';
                                                }
                                            endif;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $a = explode('-', $product->end_date);
                                            echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $flag = $product->flag;
                                            if ($flag == 0):
                                                echo 'Pending';
                                            elseif ($flag == 1):
                                                echo 'Approved';
                                            elseif ($flag == 2):
                                                echo 'Reject';
                                            else:
                                                echo 'Withhold';
                                            endif;
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{URL::to('/')}}/promo-details/{{$product->id}}/pomolist">Details</a>
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
                {orderable: false, targets: [-1]}
            ]
        });
    });
</script>
@stop
