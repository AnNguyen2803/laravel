$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    var idString = id.toString();
    if(confirm("Xóa mà không thể khôi phục. Bạn có chắc muốn xóa ?")) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id: idString},
            url: url,
            success: function(result){
                if(result.error ===false){
                    alert(result.message);
                    location.reload();
                } else{
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}
//Up load file

$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function(results) {
            if(results.error === false){
                $('#image_show').html('<a href = ""><img src = "'+ results.url +'" target = "_blank" width = "100px"></a>');
                $('#thumb').val(results.url);
            } else {
                alert('Upload File lỗi');
            }
        }
    });
})