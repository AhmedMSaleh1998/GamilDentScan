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
            <a style="color: #fff;" href="{{ route('admin.patient.index') }}">/ المرضي / </a>
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
                <form method="post" action="{{route('admin.patient.update',$patient->id)}}">
                @csrf
                @method('PUT')
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>الاسم</td>
                            <td><input type="text" class="form-control" name="name" required
                                    value="{{ old('name') ? old('name') : $patient->name }}"></td>
                            @if ($errors->has('name'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الاسم</td>
                            <td><input type="date" class="form-control" name="birth_date"
                                    value="{{ old('birth_date') ? old('birth_date') : $patient->birth_date }}"></td>
                            @if ($errors->has('birth_date'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الايميل</td>
                            <td><input type="text" class="form-control" name="email"
                                    value="{{ old('email') ? old('email') : $patient->email }}"></td>
                            @if ($errors->has('email'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>رقم الهاتف 1</td>
                            <td><input type="text" class="form-control" name="phone_one"
                                    value="{{ old('phone_one') ? old('phone_one') : $patient->phone_one }}"></td>
                            @if ($errors->has('phone_one'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('phone_one') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>رقم الهاتف 2</td>
                            <td><input type="text" class="form-control" name="phone_two"
                                    value="{{ old('phone_two') ? old('phone_two') : $patient->phone_two }}"></td>
                            @if ($errors->has('phone_two'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('phone_two') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>العنوان</td>
                            <td><input type="text" class="form-control" name="address"
                                    value="{{ old('address') ? old('address') : $patient->address }}"></td>
                            @if ($errors->has('address'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </tr>
                       {{--  <tr>
                            <td>الحالة</td>
                            <td>
                                <select id="status" name="status" class="form-control">{{ old('status') ? old('status') : $patient->status }}>
                                <option value="0">تم الحجز</option>
                                <option value="1">تم تأكيد الحجز</option>
                                <option value="2">تم الفحص</option>
                                <option value="3">تم الاستلام</option>
                                </select>
                            </td>
                            @if ($errors->has('status'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </tr> --}}
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
