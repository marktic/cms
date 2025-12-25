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

    saveOrder() {
        var order = this.sortable.toArray();
        console.log(order);
        $.ajax({
            url: this.storeOrderUrl,
            type: 'post',
            data: {
                'order': order
            },
            success: function (data) {
                if (typeof jQuery.jGrowl === 'function') {
                    jQuery.jGrowl(data.message, {life: 10000, theme: data.type});
                }
            }
        });
    }
}