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
            <a style="color: #fff;" href="{{ route('admin.technician.index') }}">/  فنيي الأشعة / </a>
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
                <h4 class="header-title m-t-0 m-b-20">تعديل بيانات فني الأشعة</h4>
                <form method="post" action="{{route('admin.technician.update',$technician->id)}}">
                @csrf
                @method('PUT')
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>اسم الفني</td>
                            <td><input type="text" class="form-control" name="name" required
                                    value="{{ old('name') ? old('name') : $technician->name }}"></td>
                            @if ($errors->has('name'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>العنوان </td>
                            <td><input type="text" class="form-control" name="address"
                                    value="{{ old('address') ? old('address') : $technician->address }}"></td>
                            @if ($errors->has('address'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الإيميل </td>
                            <td><input type="email" class="form-control" name="email"
                                    value="{{ old('email') ? old('email') : $technician->email }}"></td>
                            @if ($errors->has('email'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>رقم الهاتف </td>
                            <td><input type="phone" class="form-control" name="phone"
                                    value="{{ old('phone') ? old('phone') : $technician->phone }}"></td>
                            @if ($errors->has('phone'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>ثابت الراتب </td>
                            <td><input type="number" class="form-control" name="fixed_salary"
                                    value="{{ old('fixed_salary') ? old('fixed_salary') : $technician->fixed_salary }}"></td>
                            @if ($errors->has('fixed_salary'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('fixed_salary') }}</strong>
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
