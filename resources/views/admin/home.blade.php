 @extends('layouts.admin')

 @section('content')
     <!-- ============================================================== -->
     <!-- Start right Content here -->
     <!-- ============================================================== -->

     <!-- Page-Title -->
     <div class="row">
         <div class="col-sm-12">
             <div class="main-title-00">
                 <h4 class="page-title">الرئيسيه</h4>
                 <p class="text-muted page-title-alt">مرحباً بك في لوحة تحكم مركز Gamil Dent Scan</p>
             </div>
             @if (Session::has('success'))
                 <div class="alert alert-success">{{ Session::get('success') }}</div>
             @elseif(Session::has('danger'))
                 <div class="alert alert-danger">{{ Session::get('danger') }}</div>
             @endif
         </div>
     </div>

     <!-- ============================================================== -->
     <!-- End Right content here -->
     <!-- ============================================================== -->

     <div class="row">
         <div class="col-md-6 col-lg-6 col-xl-3">
             <div class="widget-bg-color-icon card-box fadeInDown animated">
                 <div class="bg-icon bg-icon-info pull-left">
                     <i class="md md-person text-info"></i>
                 </div>
                 <div class="text-right">
                     <h3 class="text-dark"><b class="counter"></b></h3>
                     <p class="text-muted mb-0">المرضي</p>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>

         <div class="col-md-6 col-lg-6 col-xl-3">
             <div class="widget-bg-color-icon card-box">
                 <div class="bg-icon bg-icon-pink pull-left">
                     <i class="md md-person text-pink"></i>
                 </div>
                 <div class="text-right">
                     <h3 class="text-dark"><b class="counter"></b></h3>
                     <p class="text-muted mb-0">أطباء الأسنان</p>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>

         <div class="col-md-6 col-lg-6 col-xl-3">
             <div class="widget-bg-color-icon card-box">
                 <div class="bg-icon bg-icon-warning pull-left">
                     <i class="md md-person text-warning"></i>
                 </div>
                 <div class="text-right">
                     <h3 class="text-dark"><b class="counter"></b></h3>
                     <p class="text-muted mb-0">فنيين الأشعة</p>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>

         <div class="col-md-6 col-lg-6 col-xl-3">
             <div class="widget-bg-color-icon card-box">
                 <div class="bg-icon bg-icon-primary pull-left">
                     <i class="md md-person text-primary"></i>
                 </div>
                 <div class="text-right">
                     <h3 class="text-dark"><b class="counter"></b></h3>
                     <p class="text-muted mb-0">موظفوا الاستقبال</p>
                 </div>
                 <div class="clearfix"></div>
             </div>
         </div>
     </div>

     {{-- <div class="row">
    <div class="col-12">

        <div class="portlet"><!-- /primary heading -->
            <div class="portlet-heading">
                <h3 class="portlet-title text-dark text-uppercase">
                    طلبات تواصل لم يتم مشاهدتها
                </h3>
                <div class="portlet-widgets">
                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                    <span class="divider"></span>
                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="portlet2" class="panel-collapse collapse show">
                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>رقم الجوال</th>
                                    <th>تاريخ الطلب</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($contacts) && !empty($contacts))
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->phone}}</td>
                                            <td>{{$contact->created_at}}</td>
                                            <td class="actions">
                                                <a href="{{ route('admin.contact.show',$contact->id) }}" class="btn btn-primary waves-effect" title="مشاهدة">مشاهدة</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

</div> --}}
 @endsection
