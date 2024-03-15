$(document).ready(function () {
    const sidebar = $('#card-sidebar');
    var selectingElement;
    
    $('#content').on('click', '.card-form-add, .card-form-edit', function () {
        selectingElement = $(this);
        
        if (!selectingElement.hasClass('card-form-add')) {
            sidebar.find('input').each(function (index, elem) {
                elem = $(elem);
                
                const attachment = selectingElement.parents('.attachment');
                elem.val(
                    attachment.find('input[data-sidebar-id="' + elem.attr('data-sidebar-id') + '"]').val());
            });
        } else {
            sidebar.find('input').val('');
        }
        
        Omeka.openSidebar(sidebar);
    });
    
    $('#content').on('click', '#card-sidebar .confirm-panel > button', function () {
        Omeka.closeSidebar(sidebar);
        if (selectingElement.hasClass('card-form-add')) {
            const attachments = selectingElement.parents('.attachments');
            const newAttachment = $(attachments.data('template'));
            attachments.append(newAttachment);
            selectingElement = newAttachment.find('.card-form-edit');
        }
        
        $(this).parents('.sidebar').find('input').each(function (index, elem) {
            elem = $(elem);
            
            const attachment = selectingElement.parents('.attachment');
            attachment.find('input[data-sidebar-id="' + elem.attr('data-sidebar-id') + '"]')
                .val(elem.val());
                
            if (elem.attr("data-sidebar-id") == "card-data-header") {
                attachment.find('.asset-title').text(elem.val());
            }
        });
    });
});