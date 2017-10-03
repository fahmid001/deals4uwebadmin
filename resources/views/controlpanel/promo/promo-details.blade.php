@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Details
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body"> 
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                    </div>
                    <div style="margin-top:2%;" class="col-lg-12">
                        <div class="panel panel-info">                                            
                            <div class="panel-body">
<!--                                <div style="padding:1%;" class="col-md-2">Banner:</div>-->
                                <div style="padding:1%;" class="col-md-12"><img src="{{URL::to('/')}}/images/productimages/{{ $promoDetails->banner_image }}" width="100%" height="300"></div>

                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Title:</div>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{ $promoDetails->title }}</div>

                                <div style="padding:1%;" class="col-md-6">Keyword:</div>
                                <div style="padding:1%;" class="col-md-6">{{$promoDetails->keyword}}</div>

                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">Mobile:</div>                                
                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">
                                    <?php
                                    if ($promoDetails->mobile != '') {
                                        echo $promoDetails->mobile;
                                    } else {
                                        echo 'N/A';
                                    }
                                    ?>
                                </div>

                                <div style="padding:1%;" class="col-md-6">Start Date:</div>
                                <div style="padding:1%;" class="col-md-6">
                                    <?php
                                    if ($promoDetails->input_date_status == 1):
                                        if ($promoDetails->start_date != '') {
                                            $a = explode('-', $promoDetails->start_date);
                                            echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                        } else {
                                            echo 'N/A';
                                        }
                                    else:
                                        echo 'N/A';
                                    endif;
                                    ?>
                                </div>

                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">End Date:</div>
                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">
                                    <?php
                                    $a = explode('-', $promoDetails->end_date);
                                    echo $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0];
                                    ?>  
                                </div>

                                <div style="padding:1%;" class="col-md-6">Category:</div>
                                <div style="padding:1%;" class="col-md-6">
                                    <?php
                                    $category = DB::table('category')
                                            ->select(
                                                    'category.category_title'
                                            )
                                            ->join('address_details', 'category.id', '=', 'address_details.category_id')
                                            ->where('address_details.ref_deals_id', '=', $promoDetails->id)
                                            ->get();
                                    $my_category = '';
                                    if (count($category) > 0):
                                        foreach ($category as $cat):
                                            echo $my_category = $cat->category_title . ',';
                                        endforeach;
                                    endif;
                                    ?>
                                </div>

                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">Brand:</div>
                                <?php
                                $bId = $promoDetails->ref_brand_id;
                                if (count($bId) > 0):
                                    $bName = DB::table('brand_list')->where('id', '=', $bId)->first();
                                    if (count($bName) > 0):
                                        $brand = $bName->brand_title;
                                    else:
                                        $brand = 'N/A';
                                    endif;
                                else:
                                    $brand = 'N/A';
                                endif;
                                ?>
                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">{{$brand}}</div>

                                <div style="padding:1%;" class="col-md-6">Details:</div>
                                <div style="padding:1%;" class="col-md-6"><?php echo $promoDetails->details ?></div>

                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">Web sites:</div>
                                <div style="background-color: #f2f2f2;  padding:1%;" class="col-md-6">{{ $promoDetails->url}}</div>

                                <div style="padding:1%;" class="col-md-6">Status:</div>
                                <div style="padding:1%;" class="col-md-6">
                                    <?php
                                    $flag = $promoDetails->flag;
                                    if ($flag == 0):
                                        echo 'Pending';
                                    elseif ($flag == 1):
                                        echo 'Approved';
                                    else:
                                        if ($flag == 2):
                                            $rejectId = $promoDetails->ref_reject_msg_id;
                                            $rejectReason = DB::table('reject_message_tbl')->where('id', '=', $rejectId)->first();
                                        endif;
                                        if ($rejectReason):
                                            echo 'Reject';
                                            echo '<br>';
                                            echo 'Title : ' . $rejectReason->title;
                                            echo '<br>';
                                            echo 'Details : ' . $rejectReason->details;
                                        endif;
                                    endif;
                                    ?>
                                </div>

                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Count:</div>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">
                                    <?php
                                    if ($promoDetails->hitcount == ''):
                                        echo '0';
                                    else:
                                        echo $promoDetails->hitcount;
                                    endif;
                                    ?>
                                </div>

                            </div> 
                        </div>
                        <div style="text-align:center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $dealsId = $promoDetails->id;
        $dealsAddr = DB::table('brand_address_tbl')->where('ref_dealinfo_id', '=', $dealsId)->get();
        foreach ($dealsAddr as $value):
            ?>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body"> 
                        <div class="box-header with-border">
                            <h3 class="box-title">Address</h3>
                        </div>
                        <div style="margin-top:2%;" class="col-lg-12">
                            <div class="panel panel-info">                                            
                                <div class="panel-body">
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Address:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{ $value->address }}</div>

                                    <div style="padding:1%;" class="col-md-6">Lat:</div>
                                    <div style="padding:1%;" class="col-md-6">
                                        <?php
                                        if ($value->lat != '') {
                                            echo $value->lat;
                                        } else {
                                            echo 'N/A';
                                        }
                                        ?>                                    
                                    </div>

                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Lng:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6"><?php
                                        if ($value->lng != '') {
                                            echo $value->lng;
                                        } else {
                                            echo 'N/A';
                                        }
                                        ?></div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</section>  
@stop
