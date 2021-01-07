$(document).ready(function () {
    $("#check_ajax").click(function () {
        //Lấy dư liệu từ form
        var data_id  = $(this).attr('data-id');
        var data = {id:data_id};
        console.log(data);


        $.ajax({
            url: '?mod=order&action=update', //Trang xử lý
            method: "POST", //page hay get, mac dinh la get
            data: data, //du liêu gửi lên server
            dataType: "text",
            success: function (data) {
                // alert(data);
                // console.log(data);
                // alert(data.total);
                alert(data);
            },

            error:function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
        return false;
    })

});