
export default class CmsBlocksAddModal {
    constructor(container) {
        this.container = container;
        this.init();
    }

    init() {
        this.initModal();
        this.initAddButtons();
    }

    initModal() {
        this.modal = this.container.querySelector('#cms-blocks-add-modal');
        this.addUrlBase = this.modal.querySelector('.modal-body').getAttribute('data-block-add-url');
        this.modal.addEventListener('show.bs.modal', (event) => this.showModal(event));
    }

    initAddButtons() {
    }

    showModal(event) {
        // Button that triggered the modal
        const link = event.relatedTarget

        const colDiv = link.closest('.section-col');
        const col = colDiv?.getAttribute('data-col');

        const sectionDiv = colDiv?.closest('.page_section');
        const sectionId = sectionDiv?.getAttribute('data-id');

        const blockAddUrl = `${this.addUrlBase}?col=${col}&section_id=${sectionId}`;
        this.modal.querySelector('.modal-body a.block-add')
            ?.addEventListener('click', (event) => this.onBlockAddClick(event, blockAddUrl), {once: true});
    }

    onBlockAddClick(event, blockAddUrl) {
        event.preventDefault();
        const blockAddLink = event.currentTarget;
        const blockType = blockAddLink.getAttribute('data-block-type');

        const finalUrl = `${blockAddUrl}&block_type=${blockType}`;

        // redirect to the block add URL
        window.location.href = finalUrl;
    }
}
