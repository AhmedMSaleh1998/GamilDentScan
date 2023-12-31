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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
                    <input type="hidden" name="status" value="2">
                    <tr>
                        <td>اسم المنظمة</td>
                        <td>
                            <select name="organization_id" id="organization" class="select2 select2-multiple select2-hidden-accessible">
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
                        <td>الفحوصات</td>
                        <td>
                            <select name="scan_type_id" id="scanType" class="select2 select2-multiple select2-hidden-accessible">
                                <option value="">اختر المنظمة حتي تظهر لك الفحوصات الخاصة بها</option>
                                @if(isset($scanTypes))
                                @foreach ($scanTypes as $scanType )
                                <option value={{$scanType->id}}>{{$scanType->name}}</option>
                                @endforeach
                                @endif
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
                            <select name="type" id="type" required class="select2 select2-multiple select2-hidden-accessible">
                                <option value="">اختر المطلوب </option>
                                <option value="1">whatsapp</option>
                                <option value="2">dvd</option>
                                <option value="3">report</option>
                            </select>
                        </td>
                        @if ($errors->has('type'))
                        <span class="alert alert-danger">
                            <strong>{{ $errors->first('type') }}</strong>
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
<script>

    $(document).ready(function() {
        $('#organization').on('change', function() {
            var organization = this.value;
            $("#scanType").html('');
            $.ajax({
                url: "{{url('admin/fetch-scanTypes')}}",
                type: "POST",
                data: {
                    organization_id: organization,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#scanType').html('<option value="">اختر الفحص المراد</option>');
                    $.each(res.scanTypes, function(key, value) {
                        $("#scanType").append('<option value="' + value
                            .id + '">' + value.name + '--تقرير--'+value.report_price + '--واتساب--' + value.whatsapp_price + '--اسطوانه--' + value.dvd_price +'</option>');
                    });
                }
            });
        });
    });
</script>
<script src="{{ mix('js/app.js') }}"></script>
@endsection

