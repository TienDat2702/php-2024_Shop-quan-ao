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
                url: 'ajax/dashboard/changeStatus',
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
                    if (_this.prop('checked')) {
                        _this.closest('tr').addClass('active-bg'); // .closest('tr') sẽ trả về phần tử <tr> gần nhất bao quanh checkbox với lớp checkBoxItem.
                    } else {
                        _this.closest('tr').removeClass('active-bg');
                    }
                })
            })
        }
    }

    HT.checkBoxItem = () => {
        if ($('.checkBoxItem').length) {
            $(document).on('click', '.checkBoxItem', function(){
                let _this = $(this);
                let isChecked = _this.prop('checked');
                
                if (isChecked) {
                    _this.closest('tr').addClass('active-bg');
                } else {
                    _this.closest('tr').removeClass('active-bg');                
                }
            })
        }
    }

    $(document).ready(function () {
        HT.select2();
        HT.changeStatus();
        HT.checkAll();
        HT.checkBoxItem();
    })
})(jQuery);
