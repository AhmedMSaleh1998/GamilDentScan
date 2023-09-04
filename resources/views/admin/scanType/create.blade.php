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
        <a style="color: #fff;" href="{{ route('admin.scanType.index') }}">/ انواع الفحوصات / </a>
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
            <h4 class="header-title m-t-0 m-b-20">اضافه نوع فحص جديد</h4>
        <form action="{{route('admin.scanType.store')}}" method="post">
            @csrf
            <table class="table table-bordered table-striped">
                <tbody>

                    <tr>
                        <td>نوع الفحص</td>
                        <td><input type="text" class="form-control" name="name" required value="{{ old('name') }}"></td>
                        @if ($errors->has('name'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>سعر الواتساب</td>
                        <td><input type="number" class="form-control" name="whatsapp_price"  value="{{ old('whatsapp_price') }}"></td>
                        @if ($errors->has('whatsapp_price'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('whatsapp_price') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>سعر dvd</td>
                        <td><input type="number" class="form-control" name="dvd_price"  value="{{ old('dvd_price') }}"></td>
                        @if ($errors->has('dvd_price'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('dvd_price') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>سعر التقرير</td>
                        <td><input type="number" class="form-control" name="report_price"  value="{{ old('report_price') }}"></td>
                        @if ($errors->has('report_price'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('report_price') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>نسبة الريسبشن</td>
                        <td><input type="number" class="form-control" name="receptionist_commision"  value="{{ old('receptionist_commision') }}"></td>
                        @if ($errors->has('receptionist_commision'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('receptionist_commision') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>نسبة فني الأشعة</td>
                        <td><input type="number" class="form-control" name="technicain_commision"  value="{{ old('technicain_commision') }}"></td>
                        @if ($errors->has('technicain_commision'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('technicain_commision') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>الوقت المتوقع للأستلام</td>
                        <td><input type="text" class="form-control" name="base_recieving_time"  value="{{ old('base_recieving_time') }}"></td>
                        @if ($errors->has('base_recieving_time'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('base_recieving_time') }}</strong>
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
