const initBlockSidebar = (id, updaters) => {
    const sidebar = $(`#${id}-sidebar`);
    var selectingElement;

    const addAttachment = function () {
        // Clear all form inputs when adding a new item
        selectingElement = $(this);
        sidebar.find("input, textarea").val("");
        sidebar.find("select").each(function () {
            const defaultVal = $(this).find("option").first().val();
            $(this).val(defaultVal);
        });
        sidebar.find(".asset-form-clear, .item-form-clear").click();
        openSidebar();
    };

    const editAttachment = function () {
        // Load saved values into the form inputs
        selectingElement = $(this);
        populateSidebarFields();
        openSidebar();
    };
    
    const openSidebar = function () {
        sidebar.find('.query-form-advanced-edit-apply')?.click();
        Omeka.openSidebar(sidebar);
    };

    const populateSidebarFields = function () {
        sidebar.find("input, textarea, select").each(function (index, elem) {
            elem = $(elem);
            
            const attachment = selectingElement.parents(".attachment");
            const input = attachment.find("input[data-sidebar-id=\"" + elem.attr("data-sidebar-id") + "\"]")
            elem.val(input.val());
            
            // Additional handling for saved assets and items
            if (input.is("[data-resource-type]")) {
                const type = input.data("resource-type");
                const form = elem.parents(`.${type}-form-element`);

                const url = input.data('resource-url');
                const filename = input.data('resource-filename');

                if (url && filename) {
                    form.find(`.selected-${type}-image`).attr("src", url);
                    form.find(`.selected-${type}-name`).text(filename);
                    form.find(`.selected-${type}`).removeAttr("style");
                    form.removeClass("empty");
                } else {
                    form.find(`.${type}-form-clear`).click();
                }
            }
        });
    }

    const saveAttachment = function () {
        Omeka.closeSidebar(sidebar);

        if (selectingElement.hasClass(`${id}-form-add`)) {
            // Create a new orderable list item on save
            insertAttachmentTemplate();
        }
        
        sidebar.find("input, textarea, select").each(function (index, elem) {
            elem = $(elem);
            
            // Sync the form values with the hidden inputs
            const attachment = selectingElement.parents(".attachment");
            const input = attachment.find("input[data-sidebar-id=\"" + elem.attr("data-sidebar-id") + "\"]");
            input.val(elem.val());

            // Additional handling for syncing assets
            if (input.is("[data-resource-type]")) {
                const type = input.data("resource-type");
                const form = elem.parents(`.${type}-form-element`);
                const hasValue = Boolean(input.val());

                const url = hasValue ? form.find(`.selected-${type}-image`).attr("src") : "";
                const filename = hasValue ? form.find(`.selected-${type}-name`).text() : "";

                input.data('resource-url', url);
                input.data('resource-filename', filename);
            }
            
            // Update the attachment previews based on block type
            const componentId = elem.attr("data-sidebar-id").replace(`${id}-data-`, "");
            updaters[componentId]?.(attachment, elem, index);
        });

        sidebar.find('.query-form-advanced-edit-apply')?.click();
    };

    const insertAttachmentTemplate = function () {
        const attachments = selectingElement.parents(".attachments");
        const newAttachment = $(attachments.data("template"));
        attachments.append(newAttachment);
        selectingElement = newAttachment.find(`.${id}-form-edit`);
    }

    $("#content").on("click", `.${id}-form-add`, addAttachment);
    $("#content").on("click", `.${id}-form-edit`, editAttachment);
    $("#content").on("click", `#${id}-sidebar .confirm-panel > button`, saveAttachment);
};