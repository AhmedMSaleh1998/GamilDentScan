@extends('layouts.admin')

@section('styles')
    <link href="{{ asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin_assets/plugins/custombox/css/custombox.css') }}" rel="stylesheet">
@stop

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="main-title-00">
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif(Session::has('danger'))
                    <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                @endif
                <h4 class="page-title">المرضي</h4>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class=" main-btn-00">
                            <!-- Responsive modal -->
                            <a href="{{ route('admin.patient.create') }}" class="btn btn-default waves-effect"> اضافه مريض</a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table data-toggle="table" data-search="true" data-show-columns="true" data-sort-name="id"
                        data-page-list="[8, 16, 32]" data-page-size="8" data-pagination="true"
                        data-show-pagination-switch="true" class="table-bordered ">

                        <thead>
                            <tr>
                                <th data-field="الصورة الرئيسية" data-align="center">اسم المريض</th>
                                <th data-field="الهاتف" data-align="center">الهاتف</th>
                                <th data-field="الحالة" data-align="center">الحالة</th>
                                <th data-field="التحكم" data-align="center">التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if (isset($patients)) --}}
                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->phone_one }}</td>
                                    <td>{{ $patient->status === 1 ? 'تم تأكيد الحجز' : 'غير مؤكد' }}</td>

                                    <td class="actions">
                                        <a href="#"
                                            class="btn btn-{{ $patient->status == 1 ? 'danger' : 'success' }} waves-effect"
                                            title="الحالة"> {{ $patient->status == 1 ? 'الغاء الحجز' : 'تأكيد الحجز' }}</a>
                                        <a href="{{ route('admin.patient.show', $patient->id) }}"
                                            class="btn btn-inverse waves-effect" title="مشاهدة">مشاهدة</a>
                                        <a href="{{ route('admin.patient.edit', $patient->id) }}"
                                            class="btn btn-success waves-effect" title="تعديل">تعديل</a>
                                        <button type="button" class="btn btn-danger waves-effect" data-toggle="modal"
                                            data-target="#{{ $patient->id }}delete" title="حذف">حذف </button>
                                        <a href="#"
                                            class="btn btn-inverse waves-effect" title="ملفات المريض">ملفات المريض</a>
                                    </td>
                                </tr>

                                <div id="{{ $patient->id }}delete" class="modal fade" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('admin.patient.destroy', $patient->id) }}"
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
                            @endforeach
                            {{-- @endif --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- end col -->

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('admin_assets/plugins/bootstrap-table/js/bootstrap-table.js') }}"></script>
    <script src="{{ asset('admin_assets/pages/jquery.bs-table.js') }}"></script>
    <!-- Modal-Effect -->
    <script src="{{ asset('admin_assets/plugins/custombox/js/custombox.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/custombox/js/legacy.min.js') }}"></script>
@stop
