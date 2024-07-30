(function ($) {
    "use strict";
    var HT = {};
    var document = $(document);

    HT.inputImange = () => {
        $(document).on('click', '.input-image', () => {
            let _this = $(this);
            let fileUpLoad = _this.attr('data-upload');
            HT.BrowseServerInput($(this), fileUpLoad);
        })
    }

    HT.BrowseServerInput = (object, type) => {
        if (typeof (type) == 'undefined') {
            type = 'Images';
        }
        var finder = new CKFinder();
        finder.resourceType = type;

        finder.selectActionFunction = function (fileUrl, data) {
            console.log(fileUrl);
            fileUrl = fileUrl.replace(BASE_URL, "/");

            object.val(fileUrl);
        }
        finder.popup();

    }

    document.ready(function () {
        HT.inputImange();
    })
})(jQuery);
