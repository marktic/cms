
export default class CmsBlocksAddModal {
    constructor(manager) {
        this.manager = manager;
        this.container = manager.container;
        this.initModal();
    }

    initModal() {
        this.modal = this.container.querySelector('#cms-blocks-add-modal');
        if (!this.modal) {
            return;
        }
        this.addUrlBase = this.modal.querySelector('.modal-body').getAttribute('data-block-add-url');
        this.modal.addEventListener('show.bs.modal', (event) => this.showModal(event));
    }

    showModal(event) {
        const triggerButton = event.relatedTarget;
        const context = this.getModalContext(triggerButton);
        const blockAddUrl = `${this.addUrlBase}?col=${context.col}&section_id=${context.sectionId}`;

        this.updateBlockLinks(blockAddUrl);
    }

    getModalContext(triggerButton) {
        const colDiv = triggerButton.closest('.section-col');
        const sectionDiv = colDiv?.closest('.page_section');

        return {
            col: colDiv?.getAttribute('data-col'),
            sectionId: sectionDiv?.getAttribute('data-id')
        };
    }

    updateBlockLinks(blockAddUrl) {
        this.modal.querySelectorAll('.modal-body a.block-add')
            .forEach(link => {
                link.onclick = (event) => this.onBlockAddClick(event, blockAddUrl);
            });
    }

    onBlockAddClick(event, blockAddUrl) {
        event.preventDefault();
        const blockType = event.currentTarget.getAttribute('data-block-type');
        window.location.href = `${blockAddUrl}&block_type=${blockType}`;
    }
}
