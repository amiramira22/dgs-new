
@extends('layouts.admin.template')
@section('content')
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
    </div>
    <div class="m-portlet__body">

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
                                    <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
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

                        <img  class="zoom" src="{{asset('uploads/order/' . $orders[$i])}}" id='pic<?php echo $orders[$i]; ?>' alt="admin-pic" download width="400px" height="400px" >

                            <?php } ?>
                        <?php } else { ?>
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+images" alt="" id="def5" width="100%" style="height:350px";>

                        <?php } ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


