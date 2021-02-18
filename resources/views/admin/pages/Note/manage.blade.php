@extends('admin.master')
@section('header_title', 'مدیریت جزوات')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item active">مدیریت جزوات</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 pb-2">
                <a href="{{ route('notes.create') }}" class="btn btn-block btn-outline-success">ایجاد</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">جزوات</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr>
                                <th>شماره</th>
                                <th>عنوان</th>
                                <th>تاریخ ایجاد</th>
                                <th>وضعیت</th>
                                <th>نام کاربر ارسال کننده</th>
                                <th>نام کاربر تایید کننده</th>
                                <th>عملیات</th>
                            </tr>

                            @foreach($notes as $key => $item)
                                <tr id="row-{{ $item->id }}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>{{ $item->resource->jalali_created_at }}</td>
                                    <td>
                                        @switch( $item->resource->status )
                                            @case('approve')
                                                <span class="badge badge-success">تایید شده</span>
                                                @break
                                            @case('reject')
                                                <span class="badge badge-danger">رد شده</span>
                                                @break
                                            @case('pending')
                                                <span class="badge badge-warning">در انتظار تایید</span>
                                                @break
                                            @case('deleted')
                                                <span class="badge badge-primary">حذف شده</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{ $item->resource->user->full_name }}</td>
                                    <td>{{ $item->resource->approveBy->full_name ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('notes.edit', $item->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('notes.destroy', $item->id) }}" class="btn btn-default delete" data-id="{{ $item->id }}"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
