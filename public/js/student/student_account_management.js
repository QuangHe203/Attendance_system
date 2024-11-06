document.addEventListener('DOMContentLoaded', function() {
    // Lắng nghe sự kiện click trên span
    document.getElementById('uploadSpan').addEventListener('click', function() {
        document.getElementById('fileInput').click(); // Kích hoạt click vào input file
    });

    // Lắng nghe sự kiện onchange cho input file
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0]; 
        const reader = new FileReader();

        reader.onload = function(e) {
            const image = document.getElementById('profileImage');
            image.src = e.target.result; // Cập nhật ảnh người dùng
        };

        if (file) {
            reader.readAsDataURL(file); // Đọc file dưới dạng Data URL
            // Gửi form khi có file
            document.getElementById('imageUploadForm').submit(); // Gửi form
        }
    });
});
