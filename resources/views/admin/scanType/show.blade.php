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
            <a style="color: #fff;" href="{{route('admin.scanType.index')}}">/ انواع الأشعة / </a>
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
                <h4 class="header-title m-t-0 m-b-20">{{$scanType->name}}</h4>

                <table class="table table-bordered table-striped">
                    <tbody>

                        <tr>
                            <td>الاسم </td>
                            <td>{{ $scanType->name }}</td>
                        </tr>
                        <tr>
                            <td>سعر التقرير </td>
                            <td>{{ $scanType->report_price }}</td>
                        </tr>
                        <tr>
                            <td>سعر الواتساب </td>
                            <td>{{ $scanType->whatsapp_price }}</td>
                        </tr>
                        <tr>
                            <td>سعر dvd </td>
                            <td>{{ $scanType->dvd_price }}</td>
                        </tr>
                        <tr>
                            <td>نسبة الريسبشن </td>
                            <td>{{ $scanType->receptionist_commision }}</td>
                        </tr>
                        <tr>
                            <td>نسبة فني الأشعة </td>
                            <td>{{ $scanType->technicain_commision }}</td>
                        </tr>
                        <tr>
                            <td> الوقت المتوقع للأستلام</td>
                            <td>{{ $scanType->base_recieving_time }}</td>
                        </tr>
                        <tr>
                            <td> اسم المنظمة</td>
                            <td>{{ $scanType->organization->name }}</td>
                        </tr>
                        {{-- <tr>
                            <td>صور المشروع</td>
                            @foreach ($scanType->projectImages as $image)
                            <td><img src="{{ asset('admin_assets/images/projects/'.$image->image) }}" class="img-responsive" width="100px" height="100px"></td>
                            @endforeach
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>

@endsection
