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
            <a style="color: #fff;" href="{{route('admin.technician.index')}}">/ فنيي الاشعة / </a>
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
                <h4 class="header-title m-t-0 m-b-20">{{$technician->name}}</h4>

                <table class="table table-bordered table-striped">
                    <tbody>

                        <tr>
                            <td>الاسم </td>
                            <td>{{ $technician->name }}</td>
                        </tr>
                        <tr>
                            <td>الايميل </td>
                            <td>{{ $technician->email }}</td>
                        </tr>
                        <tr>
                            <td>الهاتف</td>
                            <td>{{ $technician->phone }}<a target="_blank" href="https://wa.me/{{$technician->phone}}"><button style="font-size:24px;color:green;margin-right:15px;"><i class="fa fa-whatsapp"></i></button></a></td>
                        </tr>
                        <tr>
                            <td>العنوان</td>
                            <td>{{ $technician->address }}</td>
                        </tr>
                        <tr>
                            <td>ثابت الراتب</td>
                            <td>{{ $technician->fixed_salary }}</td>
                        </tr>
                        {{-- <tr>
                            <td>صور المشروع</td>
                            @foreach ($technician->projectImages as $image)
                            <td><img src="{{ asset('admin_assets/images/projects/'.$image->image) }}" class="img-responsive" width="100px" height="100px"></td>
                            @endforeach
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>

@endsection
