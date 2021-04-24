@extends('layouts.admin.template')

@section('content')

    <style>
        .m-portlet.m-portlet--creative .m-portlet__head {
            height: 0.01rem;
        }

    </style>
    <!--begin::Portlet-->

    <div class="m-portlet m-portlet--tabs">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="flaticon-line-graph m--font-danger"></i>
                </span>

                    <h3 class="m-portlet__head-text m--font-danger">
                        {{$visit->outlet->name}} | <?php echo reverse_format($visit->date); ?>
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand  m-tabs-line--right m-tabs-line-danger"
                    role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_portlet_tab_2_1" role="tab">
                            <i class="flaticon-list-2"></i>
                            Model Data
                        </a>
                    </li>
                    <li class="nav-item dropdown m-tabs__item">
                        <a class="nav-link m-tabs__link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false"><i class="flaticon-photo-camera"></i> Pictures</a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                            <a class="dropdown-item" data-toggle="tab" href="#m_portlet_tab_2_2">Branding</a>
                            <a class="dropdown-item" data-toggle="tab" href="#m_portlet_tab_2_3">Album</a>
                            <a class="dropdown-item" data-toggle="tab" href="#m_portlet_tab_2_4">Pointing</a>
                            <a class="dropdown-item" data-toggle="tab" href="#m_portlet_tab_2_5">order_picture</a>


                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="m_portlet_tab_2_1">


                    <table class="table table-striped- table-bordered table-hover table-checkable" id="model_tab">
                        <thead>
                        <tr>

                            <th>@lang('project.BRAND')</th>
                            <th>@lang('project.PRODUCT')</th>
                            @if ($visit->monthly_visit == 0)
                                <th>@lang('project.AVAILIBILTY') </th>
                            @elseif ($visit->monthly_visit != 0)
                                <th>@lang('project.SHELF_SHARE')</th>
                                <th> @lang('project.PRIX') </th>
                                <th> @lang('project.PROMOTION') </th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($models as $model)
                            <tr>

                                <td>{{ $model->brand_name}}</td>
                                <td>{{ $model->product_name}}</td>
                                @if ($visit->monthly_visit == 0)

                                    <td id="<?php echo '1' . $model->id; ?>">
                                        @if ($model->av == 1)  <?php echo '-' ?>

                                        @elseif ($model->av == 0) <?php echo 'OOS' ?>

                                        @elseif ($model->av == 2) <?php echo 'HA' ?>
                                        @endif
                                    </td>

                                @elseif ($visit->monthly_visit != 0)
                                    <td>{{ $model->shelf}}</td>
                                    <td>{{ $model->price}}</td>
                                    <td>{{ $model->promo_price}}</td>
                                @endif


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="tab-pane " id="m_portlet_tab_2_2">
                    <?php
                    if (($visit->visit_pictures_branding_pictures != '') && ($visit->visit_pictures_branding_pictures != '[]')) {

                    $visit_pictures_branding_pictures = json_decode($visit->visit_pictures_branding_pictures, TRUE);
                    $brandings = $visit->visit_pictures_branding_pictures;
                    $brandings = json_decode($brandings);
                    for ($i = 0; $i < sizeof($brandings); $i++) {
                    ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <!--begin::Portlet-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h2 class="m-portlet__head-label m-portlet__head-label--danger">
                                                <span>@lang('project.BEFORE')</span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    img {
                                        display: block;
                                        margin-left: auto;
                                        margin-right: auto;
                                    }

                                    .m-portlet.m-portlet--creative .m-portlet__head .m-portlet__head-caption .m-portlet__head-label {
                                        padding: 0 1.70rem;
                                        height: 2.5rem;
                                    }

                                    .m-portlet.m-portlet--creative .m-portlet__head .m-portlet__head-caption .m-portlet__head-label.m-portlet__head-label--danger {
                                        background: #fff;
                                        color: #7b7e8a;
                                    }
                                </style>
                                <div class="m-portlet__body">

                                    <img src="{{ asset('uploads/branding/'. $brandings[$i][0]) }}" alt="admin-pic"
                                         download width="450px" height="400px">


                                </div>
                            </div>
                            <!--end                    ::Portlet-->
                        </div>
                        <div class="col-lg-6">
                            <!--begin::Portlet-->
                            <div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h2 class="m-portlet__head-label m-portlet__head-label--danger">
                                                <span>   @lang('project.AFTER')  </span>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <center>
                                        <img src="{{ asset('uploads/branding/'. $brandings[$i][1]) }}" alt="admin-pic"
                                             download width="450px" height="400px">
                                    </center>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div>
                    <?php
                    }
                    } else {
                    ?>
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+images" alt="" id="def5"
                         width="100%" style="height:350px" ;>

                    <?php } ?>
                </div>

                <div class="tab-pane " id="m_portlet_tab_2_3">

                    <?php
                    if (($visit->visit_pictures_one_pictures != '') && ($visit->visit_pictures_one_pictures != '[]')) {
                    $visit_pictures_one_pictures = json_decode($visit->visit_pictures_one_pictures, TRUE);
                    ?>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <?php
                            for ($i = 1; $i < sizeof($visit_pictures_one_pictures); $i++) {
                            ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <?php } ?>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <center>

                                    <img src="{{ asset('uploads/branding/'. $visit_pictures_one_pictures[0]) }}"
                                         alt="admin-pic"
                                         download style="width:50%; height:380px;">

                                </center>
                            </div>


                            <?php
                            for ($i = 1; $i < sizeof($visit_pictures_one_pictures); $i++) {
                            ?>
                            <div class="carousel-item">
                                <center>
                                    <img src="{{ asset('uploads/branding/'. $visit_pictures_one_pictures[$i]) }}"
                                         alt="admin-pic" download style="width:50%; height:380px;">
                                </center>
                            </div>
                            <?php } ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <!--<span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
                            <span class="fa fa-angle-left" style="color:red; font-size:2rem;"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <!--<span class="carousel-control-next-icon" aria-hidden="true"></span>-->
                            <span class="fa fa-angle-right" style="color:red; font-size:2rem;"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                    <?php } else { ?>
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+images" alt="" id="def5"
                         width="100%" style="height:350px" ;>

                    <?php } ?>

                </div>

                <div class="tab-pane " id="m_portlet_tab_2_4">

                    <?php
                    if (($visit->photos != '') && ($visit->photos != '[]')) {
                    //                    $pointing = json_decode($visit->visit_pictures_one_pictures, TRUE);
                    $pointing = $visit->photos;
                    ?>
                    <center><img src="{{ asset('uploads/pointing/'. $pointing) }}" alt="" id=""
                                 style="width:50%; height:380px;"></center>


                    <?php } else { ?>
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+images" alt="" id="def5"
                         width="100%" style="height:350px" ;>

                    <?php } ?>

                </div>


                <div class="tab-pane " id="m_portlet_tab_2_5">

                    <div class="row">
                        <!--<div class="col-lg-1"></div>-->
                        <div class="col-md-3">

                            <div class="m-portlet m-portlet--danger m-portlet--head-solid-bg m-portlet--rounded">

                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-list-3"></i>
                        </span>
                                            <h3 class="m-portlet__head-text">
                                                @lang('project.DETAIL')s
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <!--begin::Section-->
                                    <div class="m-section m-section--last">
                                        <div class="m-section__content">
                                            <!--begin::Preview-->
                                            <div class="row">
                                                <div class="m-demo" data-code-preview="true" data-code-html="true"
                                                     data-code-js="false">
                                                    <div class="m-demo__preview">
                                                        <ul class="m-nav">
                                                            <li class="m-nav__item">
                                                                <h6>
                                                                    <i class="fas fa-chevron-right m--font-danger"></i>
                                                                    <span class="m-nav__link-text">
                                                            <b>Order Num :</b> <?php echo $visit->order_num ?>
                                                        </span>
                                                                </h6>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <h6>
                                                                    <i class="fas fa-chevron-right m--font-danger"></i>
                                                                    <span class="m-nav__link-text">
                                                              <b>Order Amount :</b> <?php echo $visit->order_amt ?>
                                                        </span>
                                                                </h6>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Preview-->
                                        </div>
                                    </div>
                                    <!--end::Section-->
                                </div>

                            </div>
                        </div>


                        <div class="col-md-9">
                            <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                                <div class="tab-content">

                                    <?php
                                    if (($visit->order_picture != '') && ($visit->order_picture != '[]')) {
                                    $orders = $visit->order_picture;
                                    $orders = json_decode($orders);
                                    ?>
                                    <?php for ($i = 0; $i < sizeof($orders); $i++) { ?>

                                    <img class="zoom" src="{{asset('uploads/order/' . $orders[$i])}}"
                                         id='pic<?php echo $orders[$i]; ?>' alt="admin-pic" download width="400px"
                                         height="400px">

                                    <?php } ?>
                                    <?php } else { ?>
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+images" alt=""
                                         id="def5" width="100%" style="height:350px" ;>

                                    <?php } ?>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--end::Portlet-->
@endsection