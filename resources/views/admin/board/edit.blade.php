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
            <a style="color: #fff;" href="{{ route('admin.projects.index') }}">/ المنتجات / </a>
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
                <h4 class="header-title m-t-0 m-b-20">تعديل عضو</h4>
                {{ Form::model($board, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\Admin\BoardController@update', $board->id], 'files' => true]) }}
                @csrf
                @method('PUT')
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>الصورة</td>
                            <td>
                                <input type="file" class="filestyle" data-placeholder="No file"
                                    data-iconname="fa fa-cloud-upload" name="image"
                                    value="{{ old('image') ? old('image') : $board->images }}">
                                <img src="{{ asset('admin_assets/images/boards/' . $board->image) }}"
                                    class="img-responsive" width="100px" height="100px">
                                @if ($errors->has('image'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <td>الاسم انجليزى</td>
                            <td><input type="text" class="form-control" name="name_en" required
                                    value="{{ old('name_en') ? old('name_en') : $board->name_en }}"></td>
                            @if ($errors->has('name_en'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('name_en') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الاسم عربي</td>
                            <td><input type="text" class="form-control" name="name_ar" required
                                    value="{{ old('name_ar') ? old('name_ar') : $board->name_ar }}"></td>
                            @if ($errors->has('name_ar'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('name_ar') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الوصف انجليزى</td>
                            <td>
                                <textarea id="textarea" maxlength="100" class="form-control" name="description_en">{{ old('description_en') ? old('description_en') : $board->description_en }}</textarea>
                            </td>
                            @if ($errors->has('description_en'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('description_en') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الوصف عربي</td>
                            <td>
                                <textarea id="textarea" maxlength="100" class="form-control" name="description_ar">{{ old('description_ar') ? old('description_ar') : $board->description_ar }}</textarea>
                            </td>
                            @if ($errors->has('description_ar'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('description_ar') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الوظيفة انجليزى</td>
                            <td>
                                <textarea class="form-control" name="position_en">{{ old('position_en') ? old('position_en') : $board->position_en }}</textarea>
                            </td>
                            @if ($errors->has('position_en'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('content_en') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td>الوظيفة عربي</td>
                            <td>
                                <textarea class="form-control" name="position_ar">{{ old('position_ar') ? old('position_ar') : $board->position_ar }}</textarea>
                            </td>
                            @if ($errors->has('position_ar'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('position_ar') }}</strong>
                                </span>
                            @endif
                        </tr>
                        <tr>
                            <td style="width:25%"></td>
                            <td><button type="submit"
                                    class="btn btn-default waves-effect waves-light form-control">تعديل</button></td>
                        </tr>
                    </tbody>
                </table>
                {!! Form::close() !!}

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
