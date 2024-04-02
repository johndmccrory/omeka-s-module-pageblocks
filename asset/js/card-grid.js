$(document).ready(function () {
    initBlockSidebar("card", {
        header: (attachment, elem) => {
            attachment.find(".asset-title").text(elem.val());
        }
    });
});