@extends('layouts.admin.template')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">

                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-edit-1 m--font-danger"></i>
                        </span>
                        <h3 class="m-portlet__head-text m--font-danger uppercase">
                            @if(isset($subTitle)) {{ $subTitle }}  @endif
                        </h3>
                    </div>			
                </div>


            </div>
            <!--begin::Form-->
            {!! Form::open(['url' => 'admin/zone/postZone', 'method' => 'post', 'class' => 'm-form m-form--label-align-righ']) !!}	

            <div class="m-portlet__body">
                <div class="col-xl-8 offset-xl-2">

                    <div class="m-form__section m-form__section--first">		
                        {!! Form::hidden('id', $zone->id) !!}

                        <div class="form-group m-form__group row">
                            <label class="col-xl-2 col-lg-2 col-form-label">Code</label>
                            <div class="col-xl-9 col-lg-9">
                                {!! Form::text('code',  $zone->code, ['class' => 'form-control m-input', 'placeholder' => 'Code']) !!}
                                {!! $errors->first('code', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-xl-2 col-lg-2 col-form-label">Name</label>
                            <div class="col-xl-9 col-lg-9">
                                {!! Form::text('name', $zone->name, ['class' => 'form-control m-input', 'placeholder' => 'Name']) !!}
                                {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-xl-2 col-lg-2 col-form-label">Color</label>
                            <div class="col-xl-9 col-lg-9">
                                {!! Form::color('color', $zone->color, ['class' => 'form-control m-input', 'placeholder' => 'Color']) !!}
                                {!! $errors->first('color', '<small class="m--font-danger">:message</small>') !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
  <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <div class="row">
                            <div class="col-lg-8"></div>
                            <div class="col-lg-4">
                                <input class="btn m-btn--pill m-btn--air btn-outline-danger" type="submit" value="Submit">
                                <button type="reset" class="btn m-btn--pill m-btn--air btn-outline-primary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
            <!--end::Form-->
        </div>
        <!--end::Portlet-->

    </div>
</div>
@endsection