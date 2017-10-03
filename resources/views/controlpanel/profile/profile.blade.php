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
$brandname = DB::table('brand_list')->where('id', '=', $profileInfo[0]->brand_name)->first();
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
                        <a style="text-align: right" class="btn btn-primary btn-xs" href="{{URL::to('/')}}/brand-profile-edit/{{$profileInfo[0]->id}}">Edit</a>
                    </div>
                    <div style="margin-top:2%;" class="col-lg-12">
                        <div class="panel panel-info">                                            
                            <div class="panel-body">
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Brand Name:</div>
                                <?php
                                $brandname = DB::table('brand_list')->where('id', '=', $profileInfo[0]->brand_name)->first();
                                ?>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{ $brandname->brand_title }}</div>

                                <div style="padding:1%;" class="col-md-6">Logo:</div>
                                <div style="padding:1%;" class="col-md-6"><img src="{{URL::to('/')}}/images/productimages/{{ $profileInfo[0]->brand_logo }}" width="30%" height="15%"></div>

                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Company Mobile:</div>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6"><?php echo '+88' . $profileInfo[0]->mobile ?></div>

                                <div style="padding:1%;" class="col-md-6">Email:</div>
                                <div style="padding:1%;" class="col-md-6">{{ $profileInfo[0]->email}}</div>

                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Web site:</div>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{$profileInfo[0]->website}}</div>

                                <div style="padding:1%;" class="col-md-6">Address:</div>
                                <div style="padding:1%;" class="col-md-6">{{ $profileInfo[0]->address}}</div>
                            </div> 
                        </div>
                    </div>
                    <div style="margin-top:2%;" class="col-lg-6">
                        <div class="panel panel-info">                                            
                            <div class="panel-body">

                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Contact Person (one):</div>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{$profileInfo[0]->contact_person_1}}</div>

                                <div style="padding:1%;" class="col-md-6">Email:</div>                                
                                <div style="padding:1%;" class="col-md-6">{{$profileInfo[0]->email_1}}</div>

                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Mobile:</div>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6"><?php echo '+88' . $profileInfo[0]->mobile_1 ?></div>

                            </div> 
                        </div>
                    </div>
                    <div style="margin-top:2%;" class="col-lg-6">
                        <div class="panel panel-info">                                            
                            <div class="panel-body">

                                <div style="padding:1%;" class="col-md-6">Contact Person (two):</div>
                                <div style="padding:1%;" class="col-md-6">{{$profileInfo[0]->contact_person_2}}</div>

                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">Email:</div>
                                <div style="background-color: #f2f2f2; padding:1%;" class="col-md-6">{{$profileInfo[0]->email_2}}</div>

                                <div style="padding:1%;" class="col-md-6">Mobile:</div>
                                <div style="padding:1%;" class="col-md-6"><?php echo '+88' . $profileInfo[0]->mobile_2 ?></div>

                            </div> 
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
@stop
