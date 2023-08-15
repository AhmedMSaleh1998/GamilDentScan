@extends('layouts.admin')

@section('styles')
    <!-- Plugins css-->
    <link href="{{ asset('admin_assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/plugins/custombox/css/custombox.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="main-title-00">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
            <a style="color: #fff;" href="{{ route('admin.home') }}">الرئيسية</a>
            <a style="color: #fff;" href="{{ route('admin.dentist.index') }}">/ اطباء الاسنان / </a>
            <a style="color: #36404a;"> تعديل </a>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">تعديل بيانات مريض</h4>
                <form method="post" action="{{route('admin.dentist.update',$dentist->id)}}">
                @csrf
                @method('PUT')
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>اسم الطبيب</td>
                            <td><input type="text" class="form-control" name="name" required
                                    value="{{ old('name') ? old('name') : $dentist->name }}"></td>
                            @if ($errors->has('name'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>العنوان 1</td>
                            <td><input type="text" class="form-control" name="address_one"
                                    value="{{ old('address_one') ? old('address_one') : $dentist->address_one }}"></td>
                            @if ($errors->has('address_one'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('address_one') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>العنوان 2</td>
                            <td><input type="text" class="form-control" name="address_two"
                                    value="{{ old('address_two') ? old('address_two') : $dentist->address_two }}"></td>
                            @if ($errors->has('address_two'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('address_two') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الإيميل 1</td>
                            <td><input type="email" class="form-control" name="email_one"
                                    value="{{ old('email_one') ? old('email_one') : $dentist->email_one }}"></td>
                            @if ($errors->has('email_one'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('email_one') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الإيميل 2</td>
                            <td><input type="email" class="form-control" name="email_two"
                                    value="{{ old('email_two') ? old('email_two') : $dentist->email_two }}"></td>
                            @if ($errors->has('email_two'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('email_two') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>رقم الهاتف 1</td>
                            <td><input type="phone" class="form-control" name="phone_one"
                                    value="{{ old('phone_one') ? old('phone_one') : $dentist->phone_one }}"></td>
                            @if ($errors->has('phone_one'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('phone_one') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>رقم الهاتف 2</td>
                            <td><input type="phone" class="form-control" name="phone_two"
                                    value="{{ old('phone_two') ? old('phone_two') : $dentist->phone_two }}"></td>
                            @if ($errors->has('phone_two'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('phone_two') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td style="width:25%"></td>
                            <td><button type="submit"
                                    class="btn btn-default waves-effect waves-light form-control">تعديل</button></td>
                        </tr>
                    </tbody>
                </table>
                <form>

            </div>
        </div><!-- end col -->
    </div>
@endsection

@section('scripts')
    <script>
        $('document').ready(function() {
            $(".isDiscount").change(function() {
                if (this.checked) {
                    $('.discount').css('display', 'table-row');
                } else {
                    $('.discount').css('display', 'none');
                }
            });
        });
    </script>
@endsection
