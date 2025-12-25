import CmsBlocksAddModal from "./blocks-add-modal";
import CmsBlocksSortable from "./blocks-sortable";
import CmsSectionsSortable from "./sections-sortable";

export default class PageEditorManager {
    constructor(containerId = 'page-builder') {
        this.container = document.getElementById(containerId);
        if (!this.container) {
            return;
        }
        this.init();
    }

    init() {
        this.sectionListContainer = this.container.querySelector('.page-sections-list');
        if (!this.sectionListContainer) {
            return;
        }

        this.storeOrderUrl = this.sectionListContainer.getAttribute('data-order-url');
        this.storeBlockUrl = this.sectionListContainer.getAttribute('data-blocks-url');

        this.initComponents();
    }

    initComponents() {
        this.blocksAddModal = new CmsBlocksAddModal(this);
        this.blocksSortable = new CmsBlocksSortable(this);
        this.sectionsSortable = new CmsSectionsSortable(this);
    }

    async notify(data) {
        if (typeof jQuery?.jGrowl === 'function') {
            jQuery.jGrowl(data.message, {life: 10000, theme: data.type});
        }
    }

    async post(url, body) {
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams(body)
            });
            const data = await response.json();
            this.notify(data);
            return data;
        } catch (error) {
            console.error('Error in request:', error);
            throw error;
        }
    }
}
