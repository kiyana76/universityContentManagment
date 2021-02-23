@extends('admin.master')
@section('header_title', 'مدیریت گروه های آموزشی')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item active">مدیریت گروه های آموزشی</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 pb-2">
                <a href="{{ route('groups.create') }}" class="btn btn-block btn-outline-success">ایجاد</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">گروه های آموزشی</h3>
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
                                    <th>عملیات</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($groups as $key => $item)
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
                                            <a href="{{ route('groups.edit', $item->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('groups.destroy', $item->id) }}" class="btn btn-default delete" data-id="{{ $item->id }}"><i class="fa fa-remove"></i></a>
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
