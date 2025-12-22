
import BlocksAddModal from "./admin/blocks-add-modal";

document.addEventListener("DOMContentLoaded", function () {

    var pageBuilder = document.getElementById('page-builder')

    if (pageBuilder) {
        var blocksAddModal = new BlocksAddModal(pageBuilder);
    }


    // $("#form-fields-container .sortable").sortable({
    //     update: function (event, ui) {
    //         var order = $(this).sortable('serialize');
    //
    //         $.ajax({
    //             url: $(this).data('url'),
    //             type: 'post',
    //             data: {
    //                 'order': order
    //             },
    //             success: function (data) {
    //                 jQuery.jGrowl(data.message, {life: 10000, theme: data.type});
    //             }
    //         });
    //     }
    // });
});