@extends('layouts.admin')

@section('styles')
<!-- Plugins css-->
<link href="{{ asset('admin_assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin_assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
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
        <a style="color: #fff;" href="{{ route('admin.patient.index') }}">/ المرضي / </a>
        <a style="color: #36404a;"> إضافة </a>

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
            <h4 class="header-title m-t-0 m-b-20">اضافه مريض</h4>
        <form action="{{route('admin.patient.store')}}" method="post">
            @csrf
            <table class="table table-bordered table-striped">
                <tbody>

                    <tr>
                        <td>اسم المريض</td>
                        <td><input type="text" class="form-control" name="name" required value="{{ old('name') }}"></td>
                        @if ($errors->has('name'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>تاريخ الميلاد</td>
                        <td><input type="date" class="form-control" name="birth_date" required value="{{ old('birth_date') }}"></td>
                        @if ($errors->has('birth_date'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('birth_date') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>العنوان</td>
                        <td><input type="text" class="form-control" name="address" required value="{{ old('address') }}"></td>
                        @if ($errors->has('address'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>الهاتف رقم 1</td>
                        <td><input type="text" class="form-control" name="phone_one" required value="{{ old('phone_one') }}"></td>
                        @if ($errors->has('phone_one'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('phone_one') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>الهاتف رقم 2</td>
                        <td><input type="text" class="form-control" name="phone_two" required value="{{ old('phone_two') }}"></td>
                        @if ($errors->has('phone_two'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('phone_two') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>البريد الإلكتروني</td>
                        <td><input type="text" class="form-control" name="email" required value="{{ old('email') }}"></td>
                        @if ($errors->has('email'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td style="width:25%"></td>
                        <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button></td>
                    </tr>
                </tbody>
            </table>
        </form>

        </div>
    </div><!-- end col -->
</div>
@endsection
@section('scripts')
<script>
    $('document').ready(function() {
        $('.discount').css('display', 'none');
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