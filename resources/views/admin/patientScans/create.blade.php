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
        <a style="color: #fff;" href="{{ route('admin.patient.index') }}">المريض</a>
        <a style="color: #fff;" href="#">/ الفحوصات / </a>
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
            <h4 class="header-title m-t-0 m-b-20">اضافه فحص جديد</h4>
        <form action="{{route('admin.patient.scans.store' , $id)}}" method="post">
            @csrf
            <table class="table table-bordered table-striped">
                <tbody>
                    <input type="hidden" name="patient_id" value="{{ $id }}">
                    <tr>
                        <td>نوع الفحص</td>
                        <td>
                            <select name="scan_type_id" id="scan_type_id" required class="select2 select2-multiple select2-hidden-accessible">
                                <option value="">اختر نوع الأشعة</option>
                                @foreach ($scanTypes as $scanType )
                                <option value={{$scanType->id}}>{{$scanType->name}}-------report--{{$scanType->report_price}}||whatsapp--{{$scanType->whatsapp_price}}||dvd--{{$scanType->dvd_price}}</option>
                                @endforeach
                            </select>
                        </td>
                        @if ($errors->has('scan_type_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('scan_type_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>اختر المطلوب</td>
                        <td>
                            <select name="status" id="status" required class="select2 select2-multiple select2-hidden-accessible">
                                <option value="">اختر المطلوب </option>
                                <option value="1">whatsapp</option>
                                <option value="2">dvd</option>
                                <option value="3">report</option>
                            </select>
                        </td>
                        @if ($errors->has('status'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>اسم المنظمة</td>
                        <td>
                            <select name="organization_id" id="organization_id" class="select2 select2-multiple select2-hidden-accessible">
                                <option value="">اختر المنظمة</option>
                                @foreach ($organizations as $organization )
                                <option value={{$organization->id}}>{{$organization->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        @if ($errors->has('organization_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('organization_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>الطبيب المعالج</td>
                        <td>
                            <select name="dentist_id" id="dentist_id" class="select2 select2-multiple select2-hidden-accessible">
                                <option value="">اختر الطبيب المعالج</option>
                                @foreach ($dentists as $dentist )
                                <option value={{$dentist->id}}>{{$dentist->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        @if ($errors->has('dentist_id'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('dentist_id') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>فني الأشعة</td>
                        <td>
                            <select name="technician_id" id="technician_id" required class="select2 select2-multiple select2-hidden-accessible">
                                <option value="">اختر فني الأشعة</option>
                                @foreach ($technicians as $technician )
                                <option value={{$technician->id}}>{{$technician->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        @if ($errors->has('technician_id '))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('technician_id ') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>السعر بعد الخصم</td>
                        <td>
                            <input type="number" name="total_price_after_discount" id="total_price_after_discount" class="form-control">
                        </td>
                        @if ($errors->has('total_price_after_discount '))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('total_price_after_discount ') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>المبلغ المدفوع</td>
                        <td>
                            <input type="number" name="paid_by_patient" id="paid_by_patient" class="form-control">
                        </td>
                        @if ($errors->has('paid_by_patient'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('paid_by_patient') }}</strong>
                        </span>
                        @endif
                    </tr>
                    <tr>
                        <td>سبب الخصم إن وجد</td>
                        <td>
                            <input type="text" name="discount_reason" id="discount_reason" class="form-control">
                        </td>
                        @if ($errors->has('discount_reason'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('discount_reason') }}</strong>
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
