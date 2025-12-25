// Default SortableJS
import Sortable from 'sortablejs';


export default class CmsSectionsSortable {
    constructor(container) {
        this.container = container;
        this.init();
    }

    init() {
        var sectionListContainer = this.container.querySelector('.page-sections-list');
        if (!sectionListContainer) {
            return;
        }
        this.storeOrderUrl = sectionListContainer.getAttribute('data-order-url');
        this.sortable = Sortable.create(sectionListContainer, {
            animation: 150,
            onEnd: () => {
                this.saveOrder();
            }
        });
    }

    async saveOrder() {
        const order = this.sortable.toArray();
        try {
            const response = await fetch(this.storeOrderUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new URLSearchParams({order})
            });
            const data = await response.json();
            if (typeof jQuery?.jGrowl === 'function') {
                jQuery.jGrowl(data.message, {life: 10000, theme: data.type});
            }
        } catch (error) {
            console.error('Error saving order:', error);
        }
    }
}