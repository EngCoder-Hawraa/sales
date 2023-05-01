@extends('layouts.admin')

@section('title')
تعديل الضبط العام
@endsection

@section('contentheader')
الضبط
@endsection

@section('contentheaderlink')
<a href="{{ route('admin.adminPanelSetting.index') }}"> الضبط</a>
@endsection

@section('contentheaderactive')
تعديل
@endsection


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title card_title_center">تعديل بيانات الضبط العام </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data))
                <form action="{{ route('admin.adminPanelSetting.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">جامعة الكفبل</label>
                        <input type="text" name="system_name" id="system_name" class="form-control" value="{{ $data['system_name'] }}" placeholder="أدخل أسم الجامعة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try{setCustomValidity('')}catch(e){}" required>
                        @error('system_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">عنوان الجامعة</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $data['address'] }}" placeholder="أدخل عنوان الجامعة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try{setCustomValidity('')}catch(e){}" required>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">هاتف الجامعة</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $data['phone'] }}" placeholder="أدخل هاتف الجامعة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror()
                    </div>
                    <div class="form-group">
                        <label for="">رسالة التنبيه اعلى الشاشة</label>
                        <input type="text" name="general_alert" id="general_alert" class="form-control" value="{{ $data['general_alert'] }}" placeholder="أدخل أسم الجامعة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div class="form-group">
                        <label for="">شعار الجامعة</label>
                        <div class="image">
                            <img class="custom_img" src="{{ asset('assets/admin/uploads') . '/' .$data['photo']}}" alt="logo">
                            <button type="button" class="btn btn-sm btn-danger" id="update_image">تغيير الصورة</button>
                            <button type="button" class="btn btn-sm btn-danger" style="display: none" id="cancel_update_image">إلغاء</button>
                        </div>
                    <div id="oldimage"></div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
                    </div>
                </form>
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
