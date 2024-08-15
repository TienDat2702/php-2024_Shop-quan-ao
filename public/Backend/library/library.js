(function ($) {
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"]').attr('content');

    HT.select2 = () => {
        if ($('.setupSelect2').length) {
            $('.setupSelect2').select2();
        }
    }

    HT.changeStatus = () => {
        $('.status').on('switchChange.bootstrapSwitch', function (event, state) {
            let _this = $(this)
            let option = {
                'value': _this.val(),
                'modelId': _this.attr('data-modelId'),
                'model': _this.attr('data-model'),
                'field': _this.attr('data-field'),
                '_token': _token
            }

            $.ajax({
                url: '/ajax/dashboard/changeStatus',
                type: 'POST',
                data: option,
                dataType: 'json',
                success: function (res) {

                    console.log(res);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Lỗi: ' + textStatus + '' + errorThrown);
                }
            });
        });
    }

    HT.checkAll = () => {
        if ($('#checkAll').length) { // Kiểm tra id checkAll có tồn tại hay không
            $(document).on('click', '#checkAll', function () { //lắng nghe sự kiện click trên phần tử có id checkAll
                let isChecked = $(this).prop('checked'); // .prop() được sử dụng để lấy hoặc đặt thuộc tính ở đây là thuộc tính checked
                $('.checkBoxItem').prop('checked', isChecked);

                $('.checkBoxItem').each(function () {
                    let _this = $(this);
                    HT.changeBackground(_this);
                })
                HT.toggleIboxTools();
            })
        }
    }

    HT.checkBoxItem = () => {
        if ($('.checkBoxItem').length) {
            $(document).on('click', '.checkBoxItem', function () {
                let _this = $(this);
                HT.changeBackground(_this);
                HT.allChecked();
                HT.toggleIboxTools();
            })
        }
    }

    HT.toggleIboxTools = () => {
        if ($('.checkBoxItem:checked').length > 0) {
            $('.ibox-tools').css('display', 'block');
        } else {
            $('.ibox-tools').css('display', 'none');
        }
    }

    HT.changeBackground = (object) => {
        let isChecked = object.prop('checked')
        if (isChecked) {
            object.closest('tr').addClass('active-bg')
        } else {
            object.closest('tr').removeClass('active-bg')
        }
    }

    HT.allChecked = () => {
        let allChecked = $('.checkBoxItem:checked').length === $('.checkBoxItem').length
        $('#checkAll').prop('checked', allChecked)
    }

    HT.changeStatusAll = () => {
        if ($('.changeStatusAll').length) {
            $(document).on('click', '.changeStatusAll', function () {
                let _this = $(this)
                let id = []
                $('.checkBoxItem').each(function () {
                    let checkBox = $(this)
                    if (checkBox.prop('checked')) {
                        id.push(checkBox.val())
                    }
                })
                let option = {
                    'value': _this.attr('data-value'),
                    'id': id,
                    'model': _this.attr('data-model'),
                    'field': _this.attr('data-field'),
                    '_token': _token
                }

                $.ajax({
                    url: '/ajax/dashboard/changeStatusAll',
                    type: 'POST',
                    data: option,
                    dataType: 'json',
                    success: function (res) {
    
                        console.log(res);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('Lỗi: ' + textStatus + '' + errorThrown);
                    }
                });
            })
        }
    }

    $(document).ready(function () {
        HT.select2();
        HT.changeStatus();
        HT.checkAll();
        HT.checkBoxItem();
        HT.changeStatusAll();
    })
})(jQuery);
