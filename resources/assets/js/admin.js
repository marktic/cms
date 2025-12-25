import CmsBlocksAddModal from "./admin/blocks-add-modal";
import CmsBlocksSortable from "./admin/blocks-sortable";
import CmsSectionsSortable from "./admin/sections-sortable";

document.addEventListener("DOMContentLoaded", () => {
    const pageBuilder = document.getElementById('page-builder');
    if (pageBuilder) {
        new CmsBlocksAddModal(pageBuilder);
        new CmsBlocksSortable(pageBuilder);
        new CmsSectionsSortable(pageBuilder);
    }
});