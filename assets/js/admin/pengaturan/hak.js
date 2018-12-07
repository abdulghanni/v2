$(document).ready(function () {
    $(".select2").select2();
});
$("#user_id").change(function () {
    var id = $(this).val();
    $.ajax({
        url: base_url + "admin/pengaturan/hak/show_permission/" + id,
        beforeSend: function () {
            $("#content").html('<center>No Result</center>');
            $("#content").html('<center><img src="' + base_url + 'assets/img/loading-elips.gif" /></center>');
        },
        success: function (data) {
            $("#content").html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('error while loading data, please reload this page..!');
            // $('#btnSave').text('save'); //change button text
            // $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
});

function updatePermission(menu_id, user_id) {
    $.ajax({
        url: base_url + "admin/pengaturan/hak/update_permission/" + menu_id + '/' + user_id,
        success: function (data) {
            alert(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Terjadi Kesalahan, Silakan Refresh Halaman Ini');
            // $('#btnSave').text('save'); //change button text
            // $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}