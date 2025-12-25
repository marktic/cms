import Sortable from 'sortablejs';

export default class CmsBlocksSortable {
    constructor(manager) {
        this.manager = manager;
        this.container = manager.container;
        this.init();
    }

    init() {
        if (!this.manager.sectionListContainer) {
            return;
        }

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

        await this.manager.post(this.manager.storeBlockUrl, {
            'order': order,
            'section_id': sectionId,
            'col_id': colId
        });
    }
}