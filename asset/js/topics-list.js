$(document).ready(function () {
    initBlockSidebar("topic", {
        label: (attachment, elem) => {
            attachment.find(".asset-title").text(elem.val());
        },
        icon: (attachment, elem) => {
            const className = elem.val() ?
                "thumbnail fa fa-" + elem.val() :
                "thumbnail fa fa-question unspecified";
            attachment.find('.thumbnail').attr("class", className);
        }
    });
});