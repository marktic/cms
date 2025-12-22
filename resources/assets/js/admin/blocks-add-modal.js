
export default class BlocksAddModal {
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
        var link = event.relatedTarget

        var colDiv = link.closest('.section-col');
        var col = colDiv.getAttribute('data-col');

        var sectionDiv = colDiv.closest('.page_section');
        var sectionId = sectionDiv.getAttribute('data-section_id');

        var blockAddUrl = this.addUrlBase + '?col=' + col + '&section_id=' + sectionId;
        this.modal.querySelector('.modal-body a.block-add')
            .addEventListener('click', (event) => this.onBlockAddClick(event , blockAddUrl));
    }

    onBlockAddClick(event, blockAddUrl) {
        event.preventDefault();
        var blockAddLink = event.currentTarget;
        var BlockType = blockAddLink.getAttribute('data-block-type');

        blockAddUrl = blockAddUrl + '&block_type=' + BlockType;

        // redirect to the block add URL
        window.location.href = blockAddUrl;
        console.log('block click:' + blockAddUrl);
    }
}
