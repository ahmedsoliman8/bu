@extends('admin.layouts.layout')

@section('title')
تعديل العقار
{{$bu->bu_name}}
@endsection

@section('header')
{{Html::style('cus/css/select2.css')}}
@endsection
@section('content')
<section class="content-header">
       <h1>
         تعديل العقار
         {{$bu->bu_name}}
       </h1>
       <ol class="breadcrumb">
         <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i>الرئيسية</a></li>
         <li><a href="{{url('/adminpanel/bu')}}">التحكم فى العقارات</a></li>
         <li class="active"><a href="{{url('/adminpanel/bu/'.$bu->id.'edit')}}">تعديل العقار
         {{$bu->bu_name}}</a></li>

       </ol>
</section>

     <!-- Main content -->
     <section class="content">
       <div class="row">
         <div class="col-xs-12">
           <div class="box">
             <div class="box-header">
               <h3 class="box-title">تعديل العضو {{$bu->bu_name}}</h3>
             </div><!-- /.box-header -->
             <div class="box-body">
                 <div class="text2">
                     <div class="col-md-11">
                       @if($user=='')
                          <p>
                              تمت اضافة العقار بواسطة زائر
                          </p>
                           @else
                             <p>اسم المستخدم:
                                 {{$user->name}}
                             </p>
                             <p>الايميل:
                                 {{$user->email}}
                             </p>
                             <p>صلاحيات العضو:
                                 @if($user->admin==1)
                                     مدير
                                     @else
                                     عضو
                                 @endif
                             </p>
                             <p>للمزيد:
                                 <a href="{{url('/adminpanel/users/'.$user->id.'/edit')}}">اضفط هنا</a>
                             </p>

                         @endif
                     </div>
                     <div class="col-md-1"> <label>معلومات عن صاحب العقار</label></div>

                 </div>
                 <div class="clearfix"></div>
                 <br>
          {!! Form::model($bu, ['url' => ['adminpanel/bu', $bu->id],'method'=>'PATCH','files' => true])!!}
             @include('admin.bu.form')
          {!! Form::close() !!}



            </div>
         </div>
       </div>
    </div>

</section>


@endsection


@section('footer')
    {{Html::script('cus/js/select2.js')}}
    <script type="text/javascript">
        $(".select2").select2({
            dir: "rtl"
        });
    </script>
@endsection
