import CmsBlocksAddModal from "./admin/blocks-add-modal";
import CmsBlocksSortable from "./admin/blocks-sortable";
import CmsSectionsSortable from "./admin/sections-sortable";

document.addEventListener("DOMContentLoaded", function () {
    var pageBuilder = document.getElementById('page-builder')
    if (pageBuilder) {
        var blocksAddModal = new CmsBlocksAddModal(pageBuilder);
        var blocksSortable = new CmsBlocksSortable(pageBuilder);
        var sectionsSortable = new CmsSectionsSortable(pageBuilder);
    }
});