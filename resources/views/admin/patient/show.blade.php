@extends('layouts.admin')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="main-title-00">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
            <a style="color: #fff;" href="{{route('admin.home')}}">الرئيسية</a>
            <a style="color: #fff;" href="{{route('admin.patient.index')}}">/ المرضي / </a>
            <a style="color: #36404a;"> مشاهدة </a>

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
                <h4 class="header-title m-t-0 m-b-20">{{$patient->name_ar}}</h4>

                <table class="table table-bordered table-striped">
                    <tbody>

                        <tr>
                            <td>الاسم </td>
                            <td>{{ $patient->name }}</td>
                        </tr>
                        <tr>
                            <td>الايميل </td>
                            <td>{{ $patient->email }}</td>
                        </tr>
                        <tr>
                            <td> الهاتف رقم 1</td>
                            <td>{{ $patient->phone_one }}</td>
                        </tr>
                        <tr>
                            <td> الهاتف رقم 2</td>
                            <td>{{ $patient->phone_two }}</td>
                        </tr>
                        <tr>
                            <td> العنوان بالتفصيل</td>
                            <td>{{ $patient->address }}</td>
                        </tr>
                        <tr>
                            <td>الحالة</td>
                            <td>{{$patient->status == 1 ? 'مفعل' : 'لم يفعل'}}</td>
                        </tr>
                        {{-- <tr>
                            <td>صور المشروع</td>
                            @foreach ($patient->projectImages as $image)
                            <td><img src="{{ asset('admin_assets/images/projects/'.$image->image) }}" class="img-responsive" width="100px" height="100px"></td>
                            @endforeach
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>

@endsection
