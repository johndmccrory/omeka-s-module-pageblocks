$(document).ready(function () {
    initBlockSidebar("column-html", {
        html: attachment => {
            attachment.find(".asset-title").text("HTML column");
        }
    });
});