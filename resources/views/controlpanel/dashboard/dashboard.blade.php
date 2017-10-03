@extends('controlpanel/mainlayout')

@section('content')
<div class="directions">
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <?php
                                $date = date('Y-m-d');
                                $pending = DB::table('brand_dealinfo_tbl')
                                        ->where('flag', '=', 0)
                                        ->count();
                                ?>
                                <h3>{{$pending}}</h3>
                                <p>Pending</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{URL::to('pending-list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <?php
                                $date = date('Y-m-d');
                                $approve = DB::table('brand_dealinfo_tbl')
                                        ->where('flag', '=', 1)
                                        ->count();
                                ?>
                                <h3>{{$approve}}</h3>
                                <p>Approved</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{URL::to('approve-list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <?php
                                $date = date('Y-m-d');
                                $reject = DB::table('brand_dealinfo_tbl')
                                        ->where('flag', '=', 2)
                                        ->count();
                                ?>
                                <h3>{{$reject}}</h3>
                                <p>Rejected</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{URL::to('reject-list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <?php
                                $date = date('Y-m-d');
                                $brand = DB::table('brand_list')
                                        ->count();
                                ?>
                                <h3>{{$brand}}</h3>
                                <p>Follows</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::to('favorite')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>             
            </section>
        </div>
    </div>
</section>
@stop
