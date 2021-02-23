<div class="modal fade" id="fileListModal{{ $subject->resource->id }}"  tabindex="-1" role="dialog" aria-labelledby="fileListModal{{ $subject->resource->id }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="fileListModal{{ $subject->resource->id }}">لیست فایل‌ها {{ $subject->full_name }}</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    {{--Upload File--}}
                    <div class="col-sm-6 mb-3">
                        <form method="POST" action="{{ route('admin.resource.upload', $subject->resource->id) }}" enctype="multipart/form-data" role="form">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file">
                                        <label class="custom-file-label float-right" for="file">انتخاب فایل</label>
                                    </div>
                                    @switch($subject->resource->type)
                                        @case('Book')
                                            <span class="col-sm-12 hint-message">*تنها مجاز به بارگذاری PDF,ZIP,RAR با حداکثر حجم 30M می‌باشید.</span>
                                            @break
                                        @default
                                            <span class="col-sm-12 hint-message">*تنها مجاز به بارگذاری PDF,ZIP,RAR با حداکثر حجم 5M می‌باشید.</span>
                                            @break
                                    @endswitch
                                </div>
                            </div>
                            <div class="form-group captcha" style="float: right">
                                {{--<img src="{{ captcha_src('math') }}" style="display: block;margin: 0 auto;float: right">--}}
                                <span>{!! captcha_img('math') !!}</span>
                                <button type="button" class="btn btn-danger reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                            <div class="form-group input-group mb-3">
                                <input type="text" id="captcha-input" name="captcha" class="form-control" placeholder="کپچا" required>
                                <div class="input-group-append">
                                    <span class="fa fa-lock input-group-text"></span>
                                </div>
                            </div>

                            <button class="btn btn-primary float-right" type="submit">ارسال</button>
                        </form>
                    </div>
                    {{--End Upload File--}}

                    <div class="col-sm-12">
                        <table class="table table-hover">
                            <tr>
                                <th>شماره</th>
                                <th>عنوان</th>
                                <th>تاریخ ایجاد</th>
                                <th>عملیات</th>
                            </tr>
                            @foreach($subject->resource->files as $key => $item)
                                <tr id="row-{{ $item->id }}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $item->file_name }}</td>
                                    <td>{{ $item->jalali_created_at }}</td>
                                    <td>
                                        <a href="{{ $item->link_address }}" target="_blank" class="btn btn-default"><i class="fa fa-download"></i></a>
                                        <a href="{{ route('admin.resource.delete', $item->id) }}" class="btn btn-default delete" data-id="{{ $item->id }}"><i class="fa fa-remove"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $('.reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });

    </script>
@endpush
