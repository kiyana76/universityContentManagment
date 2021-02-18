@extends('admin.master')
@section('header_title', 'مدیریت رشته های تحصیلی')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item active">مدیریت رشته های تحصیلی</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 pb-2">
                <a href="{{ route('fields.create') }}" class="btn btn-block btn-outline-success">ایجاد</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">رشته های تحصیلی</h3>

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
                                <th>عملیات</th>
                            </tr>

                            @foreach($fields as $key => $item)
                                <tr id="row-{{ $item->id }}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>{{ $item->jalali_created_at }}</td>
                                    <td>
                                        @switch( $item->status )
                                            @case('enable')
                                                <span class="badge badge-success">فعال</span>
                                                @break
                                            @case('disable')
                                            <span class="badge badge-danger">غیر فعال</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <a href="{{ route('fields.edit', $item->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('fields.destroy', $item->id) }}" class="btn btn-default delete" data-id="{{ $item->id }}"><i class="fa fa-remove"></i></a>
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