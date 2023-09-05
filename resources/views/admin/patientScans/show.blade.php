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
                <h4 class="header-title m-t-0 m-b-20"></h4>

                <table class="table table-bordered table-striped">
                    <tbody>

                        <tr>
                            <td>الاسم </td>
                            <td>{{ $scan->scanType->name }}</td>
                        </tr>
                        <tr>
                            <td>الطبيب المعالج </td>
                            <td>{{ $scan->dentist->name }}</td>
                        </tr>
                        <tr>
                            <td>السعر قبل الخصم </td>
                            <td>
                                @switch ($scan->status)
                                @case(1)

                                    {{$scan->scanType->whatsapp_price}}
                                    @break;

                                @case(2)

                                    {{$scan->scanType->dvd_price}}
                                    @break;

                                @case(3)

                                    {{$scan->scanType->report_price}}
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>السعر بعد الخصم </td>
                            <td>{{ $scan->total_price_after_discount }}</td>
                        </tr>
                        <tr>
                            <td>المدفوع </td>
                            <td>{{ $scan->paid_by_patient }}</td>
                        </tr>
                        <tr>
                            <td>الباقي </td>
                            <td>{{ $scan->total_price_after_discount-$scan->paid_by_patient }}</td>
                        </tr>
                        <div id="GFG">

                            <table border="1px" width="455 px" height="150 px" class="text-dark">
                                <tr>
                                    <td>{{$scan->patient->name}}</td>
                                    <td>الأسم</td>
                                </tr>
                                <tr>
                                    <td>{{$scan->scanType->name}}</td>
                                    <td>الفحص</td>
                                </tr>
                                <tr>
                                    <td>{{$scan->created_at}}</td>
                                    <td>التاريخ</td>
                                </tr>
                            </table>
                            <input class="btn btn-dark" onclick=printDiv() value="print">
                        </div>
                        {{-- <tr>
                            <td>صور المشروع</td>
                            @foreach ($district->projectImages as $image)
                            <td><img src="{{ asset('admin_assets/images/projects/'.$image->image) }}" class="img-responsive" width="100px" height="100px"></td>
                            @endforeach
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
    <script>
        function printDiv(GFG) {
            var printdata = document.getElementById(GFG);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close()
        }
    </script>

@endsection
