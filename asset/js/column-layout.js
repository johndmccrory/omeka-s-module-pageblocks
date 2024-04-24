$(document).ready(function () {
    initBlockSidebar("column", {
        type: (attachment, elem) => {
            const type = elem.val();
            const label = type == "html" ? "HTML content" :
                type == "asset" ? "Image asset" :
                type == "item" ? "Item media" : "";
            attachment.find(".asset-title").text(
                Omeka.jsTranslate(label)
            );
        }
    });
});