@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Profile
        </h1>
    </section>
</div>
<?php
if ($profileInfo != ''):
    $brandname = DB::table('brand_list')->where('id', '=', $profileInfo->brand_name)->first();
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('success_message') }}</div>
                @elseif (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>{{ Session::get('error_message') }}</div>
                @endif
                <div class="box">
                    <div class="box-body"> 
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand Name - {{ $brandname->brand_title }}</h3>
                            <!--                        <a style="text-align: right" class="btn btn-primary btn-xs" href="{{URL::to('/')}}/branduser-profile-edit/{{$profileInfo->id}}">Edit</a>-->
                        </div>
                        <div style="margin-top:2%;" class="col-lg-12">
                            <div class="panel panel-info">                                            
                                <div class="panel-body">
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Brand Name:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{ $brandname->brand_title }}</div>

                                    <div style="padding:1%;" class="col-md-6">Logo:</div>
                                    <?php
                                    if ($profileInfo->brand_logo != ''):
                                        ?>
                                        <div style="padding:1%;" class="col-md-6"><img src="{{URL::to('/')}}/images/productimages/{{ $profileInfo->brand_logo }}" width="30%" height="15%"></div>
                                    <?php else: ?>
                                        <div style="padding:1%;" class="col-md-6">No image</div>
                                    <?php endif; ?>


                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Company Mobile:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->mobile != ''):
                                            echo '+88' . $profileInfo->mobile;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>

                                    <div style="padding:1%;" class="col-md-6">Email:</div>
                                    <div style="padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->email != ''):
                                            echo $profileInfo->email;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>

                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Web site:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->website != ''):
                                            echo $profileInfo->website;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>

                                    <div style="padding:1%;" class="col-md-6">Address:</div>
                                    <div style="padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->address != ''):
                                            echo $profileInfo->address;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div style="margin-top:2%;" class="col-lg-6">
                            <div class="panel panel-info">                                            
                                <div class="panel-body">

                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Contact Person (one):</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->contact_person_1 != ''):
                                            echo $profileInfo->contact_person_1;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>

                                    <div style="padding:1%;" class="col-md-6">Email:</div>                                
                                    <div style="padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->email_1 != ''):
                                            echo $profileInfo->email_1;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>

                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Mobile:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->mobile_1):
                                            echo '+88' . $profileInfo->mobile_1;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>

                                </div> 
                            </div>
                        </div>
                        <div style="margin-top:2%;" class="col-lg-6">
                            <div class="panel panel-info">                                            
                                <div class="panel-body">

                                    <div style="padding:1%;" class="col-md-6">Contact Person (two):</div>
                                    <div style="padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->contact_person_2 != ''):
                                            echo $profileInfo->contact_person_2;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>

                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Email:</div>
                                    <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->email_2 != ''):
                                            echo $profileInfo->email_2;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>

                                    <div style="padding:1%;" class="col-md-6">Mobile:</div>
                                    <div style="padding:1%;" class="col-md-6">
                                        <?php
                                        if ($profileInfo->mobile_2):
                                            echo '+88' . $profileInfo->mobile_2;
                                        else:
                                            echo 'N/A';
                                        endif;
                                        ?>
                                    </div>
                                </div> 
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
    <?php
else:
    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3>Not Registered</h3>
            </div>
        </div>
    </section>
<?php
endif;
?>
@stop
