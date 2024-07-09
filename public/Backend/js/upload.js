    $(document).ready(function() {
        $('#upload').change(function(event) { //được kích hoạt khi giá trị của phần tử input thay đổi khi chọn một tập tin từ máy tính
            var input = event.target; //lấy ra phần tử mà gây ra sự kiện là thẻ input file
            if (input.files && input.files[0]) { // Nếu có ít nhất một tập tin được chọn
                var reader = new FileReader(); //FileReader là một đối tượng JavaScript cho phép đọc nội dung của các tập tin
                reader.onload = function(e) {
                    $('#imagePreview')
                        .attr('src', e.target.result)
                        .css('display', 'block');
                    $('#image_old').css('display', 'none');
                };
                reader.readAsDataURL(input.files[0]);
                //Phương thức readAsDataURL() được gọi trên đối tượng FileReader nhằm mục đích đọc nội dung của tập tin được chọn 
                //và biến đổi nó thành một URL dữ liệu (data URL).
            }
        });
    });

    // ảnh chi tiết JQuery
    $(document).ready(function() {
        var selectedFiles = [];
        var imageUrls = [];
    
        $('#upload-thumpnails').change(function(event) {
            var input = event.target;
            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var file = input.files[i];
                    selectedFiles.push(file);
    
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imageUrl = e.target.result;
                        imageUrls.push(imageUrl);
    
                        var imageDiv = $('<div>').addClass('selected-image col-lg-2 col-sm-4');
                        var imageElement = $('<img>').attr('src', imageUrl).width(200);
    
                        imageElement.click(function() {
                            var index = imageUrls.indexOf(imageUrl);
                            if (index !== -1) {
                                imageUrls.splice(index, 1);
                                selectedFiles.splice(index, 1);
                                $(this).parent().remove();
                            }
                        });
    
                        imageDiv.append(imageElement);
                        $('#selected-images').append(imageDiv);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    
        $('#ProductForm').submit(function(event) {
            var dataTransfer = new DataTransfer();
            selectedFiles.forEach(function(file) {
                dataTransfer.items.add(file);
            });
            document.querySelector('#upload-thumpnails').files = dataTransfer.files;
        });
    });
    
    
    
    

    // //kiểm tra số lượng ảnh
    // document.getElementById('upload-thumpnails').addEventListener('change', function(event) {
    //     // Lấy danh sách các tệp đã chọn
    //     var files = event.target.files;

    //     // Kiểm tra số lượng tệp đã chọn
    //     if (files.length > 6) {
    //         // Nếu số lượng tệp vượt quá 6, hiển thị modal
    //         $('#fileLimitModal').modal('show');
    //         // Xoá các tệp vượt quá
    //         event.target.value = '';
    //     }
    // });

    // Thông báo trc khi xóa ảnh
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.thumbnail_old');
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                if(confirm('Bạn có chắc muốn xóa ảnh này?')) {
                    this.remove();
                }
            });
        });
    });

    // xóa ảnh
    $(document).ready(function() {
        $('.thumbnail_old').click(function() {
            var thumbnailId = $(this).data('id');
            $.ajax({
                url: '/delete-old-image/' + thumbnailId,
                type: 'GET',
                success: function(response) {
                        $(this).remove();
                },
            });
        });
    });


