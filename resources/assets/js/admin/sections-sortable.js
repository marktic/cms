// Default SortableJS
import Sortable from 'sortablejs';


export default class CmsSectionsSortable {
    constructor(manager) {
        this.manager = manager;
        this.container = manager.container;
        this.init();
    }

    init() {
        const sectionListContainer = this.manager.sectionListContainer;
        if (!sectionListContainer) {
            return;
        }
        this.sortable = Sortable.create(sectionListContainer, {
            animation: 150,
            onEnd: () => {
                this.saveOrder();
            }
        });
    }

    async saveOrder() {
        const order = this.sortable.toArray();
        await this.manager.post(this.manager.storeOrderUrl, {order});
    }
}