$(document).ready(function () {
    initBlockSidebar("accordion", {
        title: (attachment, elem) => {
            attachment.find(".asset-title").text(elem.val());
        }
    });
});