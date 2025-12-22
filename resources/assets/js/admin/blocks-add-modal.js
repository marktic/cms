
class BlocksAddModal {
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
    }

    initAddButtons() {
        this.addRowButton = this.container.querySelector('.add-block-btn');
        this.addRowButton.addEventListener('show.bs.modal', (event) => this.showModal(event));
    }

    showModal(event) {
        // Button that triggered the modal
        var link = event.relatedTarget

        var col = link.closest('.section-col').getAttribute('data-col');
        var sectionId = link.closest('.page_section').getAttribute('data-section-id');

        var blockAddUrl = this.addUrlBase + '&col=' + col + '&section_id=' + sectionId;
        this.modal.querySelector('.modal-body a.block-add')
            .addEventListener('click', (event) => this.onBlockAddClick(event , blockAddUrl));
    }

    onBlockAddClick(event, blockAddUrl) {
        event.preventDefault();
        var blockAddLink = event.currentTarget;
        var BlockType = blockAddLink.getAttribute('data-block-type');

        blockAddUrl = blockAddUrl + '&block_type=' + BlockType;

        // You can perform an AJAX request to add the block here
        // For demonstration, we'll just log the URL
        console.log('Adding block of type:', BlockType, 'using URL:', blockAddUrl);
    }
}
