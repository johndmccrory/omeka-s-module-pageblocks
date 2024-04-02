const initBlockSidebar = (id, updaters) => {
    const sidebar = $(`#${id}-sidebar`);
    var selectingElement;
    
    const openSidebar = function () {
        selectingElement = $(this);
        
        if (!selectingElement.hasClass(`${id}-form-add`)) {
            sidebar.find("input, textarea").each(function (index, elem) {
                elem = $(elem);
                
                const attachment = selectingElement.parents(".attachment");
                elem.val(
                    attachment.find("input[data-sidebar-id=\"" + elem.attr("data-sidebar-id") + "\"]").val());
            });
        } else {
            sidebar.find("input, textarea").val("");
        }

        sidebar.find('.query-form-advanced-edit-apply')?.click();
        
        Omeka.openSidebar(sidebar);
    };

    const closeSidebar = function () {
        Omeka.closeSidebar(sidebar);

        if (selectingElement.hasClass(`${id}-form-add`)) {
            // Create a new orderable list item on save
            const attachments = selectingElement.parents(".attachments");
            const newAttachment = $(attachments.data("template"));
            attachments.append(newAttachment);
            selectingElement = newAttachment.find(`.${id}-form-edit`);
        }
        
        $(this).parents(".sidebar").find("input, textarea").each(function (index, elem) {
            elem = $(elem);
            
            // Sync the form values with the hidden inputs
            const attachment = selectingElement.parents(".attachment");
            attachment.find("input[data-sidebar-id=\"" + elem.attr("data-sidebar-id") + "\"]")
                .val(elem.val());
            
            // Update the attachment previews based on block type
            const componentId = elem.attr("data-sidebar-id").replace(`${id}-data-`, "");
            updaters[componentId]?.(attachment, elem, index);
        });

        sidebar.find('.query-form-advanced-edit-apply')?.click();
    };

    $("#content").on("click", `.${id}-form-add, .${id}-form-edit`, openSidebar);
    $("#content").on("click", `#${id}-sidebar .confirm-panel > button`, closeSidebar);
};