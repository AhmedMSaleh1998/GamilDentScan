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
            <a style="color: #fff;" href="{{route('admin.dentist.index')}}">/ اطباء الاسنان / </a>
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
                <h4 class="header-title m-t-0 m-b-20">{{$dentist->name}}</h4>

                <table class="table table-bordered table-striped">
                    <tbody>

                        <tr>
                            <td>الاسم </td>
                            <td>{{ $dentist->name }}</td>
                        </tr>
                        <tr>
                            <td>الايميل 1 </td>
                            <td>{{ $dentist->email_one }}</td>
                        </tr>
                        <tr>
                            <td>الايميل 2 </td>
                            <td>{{ $dentist->email_two }}</td>
                        </tr>
                        <tr>
                            <td> الهاتف الشخصي</td>
                            <td>{{ $dentist->phone_one }}<a target="_blank" href="https://wa.me/+2{{$dentist->phone_one}}"><button style="font-size:12px;color:green;margin-right:15px;"><i class="fa fa-whatsapp"></i></button></a></td>
                        </tr>
                        <tr>
                            <td> هاتف العيادة</td>
                            <td>{{ $dentist->phone_two }}<a target="_blank" href="https://wa.me/+2{{$dentist->phone_two}}"><button style="font-size:12px;color:green;margin-right:15px;"><i class="fa fa-whatsapp"></i></button></a></td>
                        </tr>
                        <tr>
                            <td>المنطقة</td>
                            <td>{{$dentist->district->name}}</td>
                        </tr>
                        <tr>
                            <td> العنوان 1 بالتفصيل</td>
                            <td>{{$dentist->address_one}}</td>
                        </tr>
                        <tr>
                            <td> العنوان 2 بالتفصيل</td>
                            <td>{{$dentist->address_two}}</td>
                        </tr>
                        {{-- <tr>
                            <td>صور المشروع</td>
                            @foreach ($dentist->projectImages as $image)
                            <td><img src="{{ asset('admin_assets/images/projects/'.$image->image) }}" class="img-responsive" width="100px" height="100px"></td>
                            @endforeach
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>

@endsection
