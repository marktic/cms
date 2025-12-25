import Sortable from 'sortablejs';

export default class CmsBlocksSortable {
    constructor(container) {
        this.container = container;
        this.init();
    }

    init() {
        var sectionListContainer = this.container.querySelector('.page-sections-list');
        if (!sectionListContainer) {
            return;
        }
        this.storeBlockUrl = sectionListContainer.getAttribute('data-blocks-url');

        this.container.querySelectorAll('.page-blocks-list').forEach((listContainer) => {
            Sortable.create(listContainer, {
                group: 'cms-blocks-editor',
                animation: 150,
                onEnd: (evt) => {
                    this.saveOrder(evt);
                }
            });
        });
    }

    async saveOrder(evt) {
        const toList = evt.to;
        const order = Sortable.get(toList).toArray();

        const sectionId = toList.getAttribute('data-section-id');
        const colId = toList.getAttribute('data-col-id');

        try {
            const response = await fetch(this.storeBlockUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({
                    'order': order,
                    'section_id': sectionId,
                    'col_id': colId
                })
            });
            const data = await response.json();
            if (typeof jQuery?.jGrowl === 'function') {
                jQuery.jGrowl(data.message, {life: 10000, theme: data.type});
            }
        } catch (error) {
            console.error('Error saving block order:', error);
        }
    }


}