@extends('layouts.admin')

@section('title')
الضبط العام
@endsection

@section('contentheader')
الضبط
@endsection

@section('contentheaderlink')
<a href="{{ route('admin.dashboard') }}"> الضبط</a>
@endsection

@section('contentheaderactive')
عرض
@endsection


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data))
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <td class="width30">جامعة الكفيل</td>
                  <td>{{ $data['system_name'] }}</td>
                </tr>
                <tr>
                    <td class="width30">كود الجامعة</td>
                    <td>{{ $data['com_code'] }}</td>
                </tr>
                <tr>
                    <td class="Width30">حالة الجامعة</td>
                    <td>@if ($data['active']==1) مفعل @else معطل @endif</td>
                </tr>
                <tr>
                    <td class="width30">عنوان الجامعة</td>
                    <td>{{ $data['address'] }}</td>
                </tr>
                <tr>
                    <td class="width30">هاتف الجامعة</td>
                    <td>{{ $data['phone'] }}</td>
                </tr>
                <tr>
                    <td class="width30">رسالة التنبيه اعلى الشاشة للجامعة</td>
                    <td>{{ $data['general_alert'] }}</td>
                </tr>
                <tr>
                    <td class="width30">شعار الجامعة</td>
                    <td>
                        <div class="image">
                            <img src="{{ asset('assets/admin/uploads') . '/' .$data['photo']}}" alt="logo" class="custom_img">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="width30">تاريخ اخر تحديث</td>
                    <td>
                        @if($data['updated_by']>0 and ($data['updated_by']!=null))
                        @php
                            $dt= new DateTime($data['updated_at']);
                            $date=$dt->format('Y-m-d');
                            $time=$dt->format("h:i ");
                            $newDateTime=date("A",strtotime($time));
                            $newDateTimeType=(($newDateTime=='AM')? 'صباحاً': 'مساءاً');
                        @endphp
                        {{ $date }}
                        {{ $time }}
                        {{ $newDateTimeType }}
                        بواسطة
                        {{ $data['updated_by_admin'] }}
                        @else
                        لا يوجد تحديث
                        @endif
                        <a href="{{ route('admin.adminPanelSetting.edit') }}" class="btn btn-sm btn-success">تعديل</a>
                    </td>
                </tr>
              </table>
            @else
            <div class="alert alert-danger">
                عفواً لا توجد بيانات لعرضها !!
            </div>
            @endif
        </div>
      </div>
    </div>
</div>



@endsection
