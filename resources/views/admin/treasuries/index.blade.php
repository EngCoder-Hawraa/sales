@extends('layouts.admin')

@section('title')
الضبط العام
@endsection

@section('contentheader')
الخزن
@endsection

@section('contentheaderlink')
<a href="{{ route('admin.treasuries.index') }}"> الخزن</a>
@endsection

@section('contentheaderactive')
عرض
@endsection


@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title card_title_center">بيانات الخزن</h3>
          <a class="btn btn-sm btn-success" href="{{ route('admin.treasuries.create') }}">اضافة جديد</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data))
            @php
                $i=1
            @endphp
              <table id="example2" class="table table-bordered table-hover">
                <thead class="custom_thead">
                    <th>تسلسل</th>
                    <th>اسم الخزنة</th>
                    <th>هل رئيسية</th>
                    <th>آخر ايصال صرف</th>
                    <th>آخر ايصال تحصيل</th>
                    <th>حالة التفعيل</th>
                    <th></th>
                    {{-- <th>تاريخ الاضافة</th>
                    <th>تاريخ التحديث</th> --}}
                </thead>
                <tbody>
                    @foreach ($data as $info)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $info->name }}</td>
                        <td>@if($info->is_master==1) رئيسية @else فرعية @endif</td>
                        <td>{{ $info->last_isal_exchange  }}</td>
                        <td>{{ $info->last_isal_collect }}</td>
                        <td>@if($info->active==1) مفعل @else معطل @endif</td>
                        <td>
                            <button class="btn btn-sm btn-primary">تعديل</button>
                            <button data-id="{{ $info->id }}" class="btn btn-sm btn-info">المزيد</button>
                        </td>
                        {{-- <td> @php
                            $dt= new DateTime($info['created_at']);
                            $date=$dt->format('Y-m-d');
                            $time=$dt->format("h:i ");
                            $newDateTime=date("A",strtotime($time));
                            $newDateTimeType=(($newDateTime=='AM')? 'صباحاً': 'مساءاً');
                            @endphp
                              {{ $date }} <br>
                              {{ $time }}
                              {{ $newDateTimeType }} <br>
                              بواسطة
                              {{ $info->added_by_name }}
                        </td>
                        <td>
                            @if($info->updated_by >0 and ($info->updated_by!=null))
                                @php
                                    $dt= new DateTime($info->updated_at);
                                    $date=$dt->format('Y-m-d');
                                    $time=$dt->format("h:i ");
                                    $newDateTime=date("A",strtotime($time));
                                    $newDateTimeType=(($newDateTime=='AM')? 'صباحاً': 'مساءاً');
                                @endphp
                                {{ $date }}<br>
                                {{ $time }}
                                {{ $newDateTimeType }} <br>
                                بواسطة
                                {{ $info->updated_by_admin }}
                            @else
                                لا يوجد تحديث
                            @endif
                        </td> --}}
                    </tr>

                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                </tbody>
              </table>
              <br>
              {{ $data->links() }}
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
