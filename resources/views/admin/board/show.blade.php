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
            <a style="color: #fff;" href="{{ route('admin.home') }}">الرئيسية</a>
            <a style="color: #fff;" href="{{ route('admin.projects.index') }}">/ المشاريع / </a>
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
                <h4 class="header-title m-t-0 m-b-20">{{ $board->name_ar }}</h4>

                <table class="table table-bordered table-striped">
                    <tbody>

                        <tr>
                            <td>الصورة</td>
                            <td><img src="{{ asset('admin_assets/images/boards/' . $board->image) }}" class="img-responsive"
                                    width="100px" height="100px"></td>
                        </tr>
                        <tr>
                            <td>الاسم انجليزى</td>
                            <td>{{ $board->name_en }}</td>
                        </tr>
                        <tr>
                            <td>الاسم عربي</td>
                            <td>{{ $board->name_ar }}</td>
                        </tr>
                        <tr>
                            <td>الوصف انجليزى</td>
                            <td>{{ $board->description_en }}</td>
                        </tr>
                        <tr>
                            <td>الوصف عربي</td>
                            <td>{{ $board->description_ar }}</td>
                        </tr>
                        <tr>
                            <td>المحتوى انجليزى</td>
                            <td>{{ $board->position_en }}</td>
                        </tr>
                        <tr>
                            <td>المحتوى عربي</td>
                            <td>{{ $board->position_ar }}</td>
                        </tr>
                        <tr>
                            <td>الحالة</td>
                            <td>{{ $board->status == 1 ? 'مفعل' : 'لم يفعل' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
@endsection
