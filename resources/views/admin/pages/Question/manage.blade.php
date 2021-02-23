@extends('admin.master')
@section('header_title', 'مدیریت نمونه سوالات')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item active">مدیریت نمونه سوالات</li>
@endsection

@push('styles')
    <style>
        .modal {
            text-align: center;
            padding: 0!important;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px; /* Adjusts for spacing */
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 pb-2">
                <a href="{{ route('questions.create') }}" class="btn btn-block btn-outline-success">ایجاد</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">نمونه سوالات</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive content">
                        <table class="mdl-data-table dataTable display compact table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>عنوان</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>وضعیت</th>
                                    <th>نام کاربر ارسال کننده</th>
                                    <th>نام کاربر تایید کننده</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($questions as $key => $item)
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
                                            <a href="{{ route('questions.edit', $item->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('questions.destroy', $item->id) }}" class="btn btn-default delete" data-id="{{ $item->id }}"><i class="fa fa-remove"></i></a>
                                            <button class="btn btn-default" data-target = "#fileListModal{{ $item->resource->id }}" data-toggle="modal"><i class="fa fa-file"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    @foreach($questions as $item)
        @include('admin.includes.file-list-modal', ['subject' => $item])
    @endforeach
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                "iDisplayLength": 10,
                "bLengthChange": true,
                "filter": true,
                "dom": 'Tlfrtip',
                "language": {
                    "paginate": {
                        "first": "برگه‌ی نخست",
                        "last": "برگه‌ی آخر",
                        "next": "بعدی",
                        "previous": "قبلی"
                    },
                    "processing": "در حال پردازش...",
                    "search": "جستجو:",
                    "zeroRecords": "رکوردی با این مشخصات پیدا نشد",
                    "info": "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
                    "lengthMenu": "نمایش _MENU_ ردیف",
                }
            });
        } );
    </script>
@endpush
