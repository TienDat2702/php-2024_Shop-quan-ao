
    // $(document).ready(function() {
    //     $('#confirmDeleteButton').click(function() {
    //         var productId = {!! json_encode($product->id) !!};
    //         window.location.href = "{{ route('delete_product', ['id' => $product->id]) }}";
    //     });
    // });
    // function confirmDelete() {
    //     return confirm('Bạn có chắc muốn xóa?');
    // }

    function confirmDelete(event, url) {
        event.preventDefault();
        
        Swal.fire({ //hàm từ thư viện hiển thị hộp thoại
            title: 'Bạn có chắc muốn xóa?',
            text: "Bạn sẽ không thể hoàn tác thao tác này!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có!'
        }).then((result) => {
            if (result.isConfirmed) { // nếu ng dùng chọn có
                // tạo form ẩn
                var form = document.createElement('form');
                form.setAttribute('action', url);
                form.setAttribute('method', 'POST');
                
                // Thêm Token CSRF
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var csrfInput = document.createElement('input');
                csrfInput.setAttribute('type', 'hidden');
                csrfInput.setAttribute('name', '_token');
                csrfInput.setAttribute('value', csrfToken);
                
                // Thêm Input Giả mặc dù method là POST chuyển hành động qua DELETE
                var methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'DELETE');
                
                //thêm input vào form và gửi
                form.appendChild(csrfInput);
                form.appendChild(methodInput);
                
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // document.getElementById("submitForm").addEventListener("click", function(event){
    //     event.preventDefault();
        
    //     // Sử dụng AJAX để gửi biểu mẫu và nhận phản hồi từ server
    //     var form = document.getElementById("adminForm");
    //     var formData = new FormData(form);
        
    //     fetch(form.action, {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.success) {
    //             // Hiển thị hộp thoại thông báo thành công
    //             Swal.fire({
    //                 title: 'Thành công!',
    //                 // text: 'Sản phẩm đã được thêm thành công.',
    //                 icon: 'success',
    //                 timer: 1000, // Tự động ẩn sau 1 giây
    //                 showConfirmButton: false
    //             }).then(() => {
    //                 // Chuyển hướng đến trang productlist
    //                 window.location.href = data.redirect;
    //             });
    //         } else {
    //             // Xử lý trường hợp không thành công nếu cần
    //             console.error('Có lỗi xảy ra khi thêm sản phẩm.');
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Lỗi:', error);
    //     });
    // });
