@extends('layouts.admin')

@section('content')
    <!-- Page-Title -->
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
                        <h4 class="header-title m-t-0 m-b-20 text-center">بيانات المريض {{$patient->name}}</h4>
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
                            <td>{{ $patient->phone_one }}<a target="_blank" href="https://wa.me/+2{{$patient->phone_one}}"><button style="font-size:12px;color:green;margin-right:15px;"><i class="fa fa-whatsapp"></i></button></a></td>
                        </tr>
                        <tr>
                            <td> الهاتف رقم 2</td>
                            <td>{{ $patient->phone_two }}<a target="_blank" href="https://wa.me/+2{{$patient->phone_two}}"><button style="font-size:12px;color:green;margin-right:15px;"><i class="fa fa-whatsapp"></i></button></a></td>
                        </tr>
                        <tr>
                            <td> العنوان بالتفصيل</td>
                            <td>{{$patient->address}}</td>
                        </tr>
                        {{-- <tr>
                            <td>صور المشروع</td>
                            @foreach ($patient->projectImages as $image)
                            <td><img src="{{ asset('admin_assets/images/projects/'.$image->image) }}" class="img-responsive" width="100px" height="100px"></td>
                            @endforeach
                        </tr> --}}
                        <table class="table table-bordered table-striped text-center">
                            <br>
                            <h4 class="header-title m-t-0 m-b-20 text-center">فحوصات المريض</h4>
                            <a href="{{ route('admin.patient.scans.create' , $patient->id) }}" class="btn btn-default">إضافة فحص</a>
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        اسم الفحص
                                    </th>
                                    <th class="text-center">
                                        اسم الطبيب
                                    </th>
                                    <th class="text-center">
                                        السعر
                                    </th>
                                    <th class="text-center">
                                        بعد الخصم
                                    </th>
                                    <th class="text-center">
                                        المدفوع
                                    </th>
                                    <th class="text-center">
                                        الباقي
                                    </th>
                                    <th class="text-center">
                                        الحالة
                                    </th>
                                    <th class="text-center">
                                        التحكم
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($scans as $scan)
                                <tr>
                                    <td>
                                        {{$scan->scanType->name}}
                                    </td>
                                    <td>
                                        {{$scan->dentist->name}}
                                    </td>
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
                                       {{--  {{$scan->scanType->price}} --}}
                                    </td>
                                    <td>
                                        {{$scan->total_price_after_discount}}
                                    </td>
                                    <td>
                                        {{$scan->paid_by_patient}}
                                    </td>
                                    <td>
                                        {{$scan->total_price_after_discount - $scan->paid_by_patient}}
                                    </td>
                                    <td>
                                        التحكم
                                    </td>
                                        <td class="actions">
                                            <a href="{{ route('admin.patient.scans.show', $scan->id) }}"
                                                class="btn btn-info waves-effect" title="تفاصيل الفحص">تفاصيل الفحص</a>
                                            <a href="{{ route('admin.patient.scans.edit', $scan->id) }}" target="_blank"
                                                class="btn btn-success waves-effect" title="تعديل">تعديل</a>
                                                <a href="{{ route('admin.patient.scans.files.index', $scan->id) }}" target="_blank"
                                                    class="btn btn-dark waves-effect" title="ملفات">ملفات</a>
                                            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal"
                                                data-target="#{{ $scan->id }}delete" title="حذف">حذف </button>
                                        </td>
                                        <div id="{{ $scan->id }}delete" class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="icon error animateErrorIcon" style="display: block;"><span
                                                                class="x-mark animateXMark"><span class="line left"></span><span
                                                                    class="line right"></span></span></div>
                                                        <h4 style="text-align:center;">تأكيد الحذف</h4>
                                                    </div>
                                                    <div class="modal-footer" style="text-align:center">
                                                        <form action="{{ route('admin.patient.scans.delete', $scan->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button class="btn btn-danger" type="submit"
                                                                dir="ltr">حذف</button>
                                                        </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </tbody>
                </table>
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
        @foreach($scans as $scan)
       {{--  <div id="myfrm" class="text-white">
            <fieldset >
                <table>
                <tr>
                    <td>{{$patient->name}}:</td>
                    <th class="text-right">الأسم</th>
                </tr>
                <tr>
                    <td>{{$scan->scanType->name}}:</td>
                    <th class="text-right">الفحص</th>
                </tr>
                <tr>
                    <td>{{$patient->age()}}:</td>
                    <th class="text-right">السن</th>
                </tr>
                </table>
            </fieldset></div> --}}
            {{-- <center>
                <div id="GFG" style="text-direction:rtl">

                    <table border="1px" width="455 px" height="150 px" class="text-dark">
                        <tr>
                            <td>{{$patient->name}}</td>
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
                </div>
            </center> --}}
        @endforeach
    </div>
    <script>
        /* function printZpl(zpl) {
        var printWindow = window.open();
        printWindow.document.open('text/plain')
        printWindow.document.write(zpl);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        } */
        /*  function myPrint(myfrm) {
            var printdata = document.getElementById(myfrm);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        } */
       /*  function myPrint(){
            newin = window.open();
            newin = window.print();
            newin.close();
        } */
        /* var prtContent = document.getElementById("myfrm");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close(); */
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
