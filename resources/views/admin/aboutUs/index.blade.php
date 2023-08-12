@extends('layouts.admin')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">من نحن</h4>

                <table class="table table-bordered table-striped">
                    @if (isset($aboutus->id))
                        {{ Form::model($aboutus, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\Admin\AboutUsController@update', $aboutus->id], 'files' => true]) }}
                        <tbody>

                            <tr>
                                <td>صوره من نحن</td>
                                <td>
                                    <input type="file" class="filestyle" data-placeholder="No file"
                                        data-iconname="fa fa-cloud-upload" name="image">
                                    <img src="{{ asset('admin_assets/images/aboutUs/' . $aboutus->image) }}"
                                        class="img-responsive" width="150px" height="150px">
                                </td>
                                @if ($errors->has('image'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف من نحن انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="description_en">{{ $aboutus->description_en }}</textarea>
                                </td>
                                @if ($errors->has('description_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('description_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف من نحن عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="description_ar">{{ $aboutus->description_ar }}</textarea>
                                </td>
                                @if ($errors->has('description_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('description_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>محتوى من نحن انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="content_en">{{ $aboutus->content_en }}</textarea>
                                </td>
                                @if ($errors->has('content_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('content_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>محتوى من نحن عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="content_ar">{{ $aboutus->content_ar }}</textarea>
                                </td>
                                @if ($errors->has('content_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('content_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>

                            <tr>
                                <td>وصف الرؤيه انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="vision_en">{{ $aboutus->vision_en }}</textarea>
                                </td>
                                @if ($errors->has('vision_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('vision_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الرؤيه عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="vision_ar">{{ $aboutus->vision_ar }}</textarea>
                                </td>
                                @if ($errors->has('vision_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('vision_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>

                            <tr>
                                <td>وصف الهدف انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="mission_en">{{ $aboutus->mission_en }}</textarea>
                                </td>
                                @if ($errors->has('mission_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('mission_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الهدف عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="mission_ar">{{ $aboutus->mission_ar }}</textarea>
                                </td>
                                @if ($errors->has('mission_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('mission_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>

                            <tr>
                                <td>وصف الرسالة انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="message_en">{{ $aboutus->message_en }}</textarea>
                                </td>
                                @if ($errors->has('message_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('message_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الرسالة عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="message_ar">{{ $aboutus->message_ar }}</textarea>
                                </td>
                                @if ($errors->has('message_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('message_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>

                            <tr>
                                <td style="width:25%"></td>
                                <td><button type="submit"
                                        class="btn btn-default waves-effect waves-light form-control">تعديل</button></td>
                            </tr>
                        </tbody>
                        {!! Form::close() !!}
                    @else
                        {{ Form::open(['method' => 'POST', 'action' => ['App\Http\Controllers\Admin\AboutUsController@store'], 'files' => true]) }}
                        <tbody>

                            <tr>
                                <td>صوره من نحن</td>
                                <td>
                                    <input type="file" class="filestyle" data-placeholder="No file"
                                        data-iconname="fa fa-cloud-upload" name="image">
                                </td>
                                @if ($errors->has('image'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف من نحن انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="description_en">{{ old('description_en') }}</textarea>
                                </td>
                                @if ($errors->has('description_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('description_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف من نحن عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="description_ar">{{ old('description_ar') }}</textarea>
                                </td>
                                @if ($errors->has('description_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('description_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>محتوى من نحن انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="content_en">{{ old('content_en') }}</textarea>
                                </td>
                                @if ($errors->has('content_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('content_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>محتوى من نحن عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="content_ar">{{ old('content_ar') }}</textarea>
                                </td>
                                @if ($errors->has('content_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('content_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الرؤيه انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="vission_en">{{ old('vision_en') }}</textarea>
                                </td>
                                @if ($errors->has('vission_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('vission_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الرؤيه عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="vission_ar">{{ old('vision_ar') }}</textarea>
                                </td>
                                @if ($errors->has('vission_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('vission_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الهدف انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="mission_en">{{ old('mission_en') }}</textarea>
                                </td>
                                @if ($errors->has('mission_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('mission_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الهدف عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="mission_ar">{{ old('mission_ar') }}</textarea>
                                </td>
                                @if ($errors->has('mission_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('mission_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الرسالة انجليزى</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="value_en">{{ old('message_en') }}</textarea>
                                </td>
                                @if ($errors->has('value_en'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('value_en') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td>وصف الرسالة عربي</td>
                                <td>
                                    <textarea class="form-control" rows="3" name="value_ar">{{ old('message_ar') }}</textarea>
                                </td>
                                @if ($errors->has('value_ar'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('value_ar') }}</strong>
                                    </div>
                                @endif
                            </tr>
                            <tr>
                                <td style="width:25%"></td>
                                <td><button type="submit"
                                        class="btn btn-default waves-effect waves-light form-control">حفظ</button></td>
                            </tr>
                        </tbody>
                        {!! Form::close() !!}
                    @endif
                </table>
            </div>
        </div><!-- end col -->
    </div>

@endsection
