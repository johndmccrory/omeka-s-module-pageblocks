(function ($) {
    $(document).ready(function () {
        const sidebar = $('#select-resource');
        let selectingForm, selectingResource = null;

        const isItemFormActive = () => {
            return $('.selecting-attachment').parent().hasClass('item-form-element');
        };

        $('#content').on('click', '.item-form-select', function () {
            Omeka.openSidebar(sidebar);
            Omeka.populateSidebarContent(sidebar, $(this).data('sidebar-content-url'));
            selectingForm = $(this).closest('.item-form-element');

            $('.selecting-attachment').removeClass('selecting-attachment');
            selectingForm.find(".attachments-form").addClass('selecting-attachment');
        });

        sidebar.on('o:sidebar-content-loaded', function () {
            if (!isItemFormActive()) { return; }
            $(this).find(".quick-select-toggle, .select-all").remove();
        });

        $('#select-resource').on('o:resource-selected', '.select-resource', function () {
            if (!isItemFormActive()) { return; }
            
            selectingResource = $(this).closest('.resource').data('resource-values');
            Omeka.closeSidebar($('#resource-details'));
        });
        
        $('#select-item a').on('o:resource-selected', function () {
            if (!isItemFormActive()) { return; }

            selectingForm.removeClass('empty');
            selectingForm.find('.selected-item-image')
                .attr('src', selectingResource.thumbnail_url);
            selectingForm.find('.selected-item-name')
                .text(selectingResource.display_title);
            selectingForm.find('input[type=hidden]')
                .val(selectingResource.value_resource_id);

            console.log(selectingResource);
        });

        $('#content').on('click', '.item-form-clear', function () {
            $(this).parents('.item-form-element')
                .addClass('empty')
                .find('input[type=hidden]').val('').end();
        });
    });
})(jQuery);