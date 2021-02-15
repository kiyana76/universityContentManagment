// Delete record
$("body").on('click', 'a.delete', function () {
    if(!confirm('آیا از حذف این رکورد اطمینان دارید؟'))
        return false;
    var row = "#row-" + this.dataset.id;
    $.ajax({
        url: $(this).attr('href'),
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        success: function (result) {
            if(result.ok){
                $(row).fadeOut(500);
                Materialize.toast('رکورد مورد نظر با موفقیت حذف شد.', 4000);
            }
        }
    });
    return false;
});


$("body").on('click','a.restore',function () {
    if (!confirm("آیا از بازیابی این رکورد اطمینان دارید؟")) return false;
    var row = "#row-" + this.dataset.id;
    $.ajax({
        url: $(this).attr("href"),
        type: "GET",
        success: function(result) {
            if (result.ok) {
                $(row).fadeOut(500);
                setTimeout(function() {
                    Materialize.toast('رکورد مورد نظر با موفقیت بازیابی شد.', 3000)
                }, 1000);
            }
        }
    });
    return false;
})

function buildSlugFromName(name, slug)
{
    slug = slug || '#slug';
    $(name).on('focusout', function () {
        var newVal = $(this).val().trim().replace(/\u{2005}|\!|\s|\*|\+|\(|\)|_/g, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
        $(slug).val(newVal);
    });
}