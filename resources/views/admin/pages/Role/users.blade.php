@extends('admin.master')
@section('header_title', 'مدیریت نقش‌ کاربران')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item active">مدیریت نقش‌ کاربران</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">کاربران</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive content">
                        <table class="mdl-data-table dataTable display compact table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>شماره</th>
                                <th>نام و نام حانوادگی</th>
                                <th>ایمیل</th>
                                <th>وضعیت</th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $key => $item)
                                <tr id="row-{{ $item->id }}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->full_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->email_verified_at ? 'فعال' : 'غیرفعال' }}</td>
                                    <td>{{ jdate($item->created_at)->format('Y/m/d H:i:s') ?? 'نامشخص' }}</td>
                                    <td>
                                        <a href="{{ route('editUserRole', $item->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.dataTable').dataTable({
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
