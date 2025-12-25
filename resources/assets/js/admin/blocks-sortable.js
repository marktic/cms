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

    saveOrder(evt) {
        var itemEl = evt.item;
        var toList = evt.to;
        var order = Sortable.get(toList).toArray();

        var sectionId = toList.getAttribute('data-section-id');
        var colId = toList.getAttribute('data-col-id');

        $.ajax({
            url: this.storeBlockUrl,
            type: 'post',
            data: {
                'order': order,
                'section_id': sectionId,
                'col_id': colId
            },
            success: function (data) {
                if (typeof jQuery.jGrowl === 'function') {
                    jQuery.jGrowl(data.message, {life: 10000, theme: data.type});
                }
            }
        });
    }


}