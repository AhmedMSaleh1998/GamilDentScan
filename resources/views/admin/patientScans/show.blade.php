@extends('layouts.admin')

@section('content')

    <style>
    @media print{
        #GFG{
            size: 2inches 1inches;
            margin: 0;
        }
        #button{
            visable:none;
        }
    }
    </style>
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
                            <td>المطلوب </td>
                            <td>
                                @switch ($scan->type)
                                @case(1)

                                    whatsapp
                                    @break;

                                @case(2)

                                    dvd
                                    @break;

                                @case(3)

                                    report
                                @endswitch
                            </td>
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
                        <tr>
                            <td>الجهة </td>
                            <td>{{ $scan->organization->name }}</td>
                        </tr>
                        <tr>
                            <td>وقت الحجز </td>
                            <td>{{ $scan->created_at}}</td>
                        </tr>
                        <tr>
                            <td>وقت التأكيد </td>
                            <td>{{ $scan->delivery_time}}</td>
                        </tr>
                        <tr>
                            <td>وقت دخول غرفة الأشعة</td>
                            <td>{{ $scan->working_on_time}}</td>
                        </tr>
                        <tr>
                            <td>وقت الاستلام </td>
                            <td>{{ $scan->reciving_time}}</td>
                        </tr>
                        <tr>
                            <td>اسم المستلم </td>
                            <td>{{ $scan->reciever_name}}</td>
                        </tr>
                        <tr>
                            <td>لينك ديكوم فايل </td>
                            <td><a href="{{ $scan->dicom_file_link}}">{{ $scan->dicom_file_link}}</a></td>
                        </tr>

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

            <div  style="text-direction:rtl" id="GFG">

                <table border="2px" width="455 px" height="148 px" class="text-dark" >
                    <tr>
                        <td>{{$scan->patient->name}}</td>
                        <td>الأسم</td>
                    </tr>
                    <tr>
                        <td>{{$scan->patient->age()}}</td>
                        <td>السن</td>
                    </tr>
                    <tr>
                        <td>{{$scan->scanType->name}}</td>
                        <td>الفحص</td>
                    </tr>
                    <tr>
                        <td>{{$scan->created_at->toDateString()}}</td>
                        <td>تاريخ الفحص</td>
                    </tr>
                </table>

            </div>
            <input class="btn btn-dark" onclick=printDiv() value="طباعة" id="button">

    </div>
    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=800, width=800');
            a.document.write('<html>');
            a.document.write('<body> <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
            a.close();
            self.close();
        }
    </script>

@endsection
