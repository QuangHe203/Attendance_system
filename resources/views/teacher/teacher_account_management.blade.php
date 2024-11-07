<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/teacher/teacher_account_management.css')}}">
    <script src="{{ asset('js/teacher/teacher_account_management.js')}}"></script>
    <title>Tài khoản</title>
</head>
<body>
    <main>
        <div class="sidebar">
            <img src="{{asset('images/logo-sidebar.png')}}" alt="Logo" class="logo">
            <h3>Hệ thống quản lý</h3>
            <hr style="margin: 25px 0px; border: 1px solid black;">
            <ul>
                <li style="background-color: #58a6b2;">
                    <a href="{{route('teacher.account_management')}}">
                        <img src="{{asset('images/account-management.png')}}" alt="Tài khoản">
                        <p>Tài khoản</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('teacher.schedule_management')}}">
                        <img src="{{asset('images/school-schedule.png')}}" alt="Lịch học">
                        <p>Lịch giảng dạy</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('teacher.attendance_results')}}">
                        <img src="{{asset('images/result.png')}}" alt="Điểm danh">
                        <p>Điểm danh</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('teacher.mailbox_management')}}">
                        <img src="{{asset('images/mailbox.png')}}" alt="Hòm thư">
                        <p>Hòm thư</p>
                    </a>
                </li>
            </ul>
        </div>

        <div class="content">
            {{-- Hiển thị dữ liệu giả --}}
            <div class="info-container">
                <h2>Thông Tin Tài Khoản</h2>
                <div class="info-image">
                    <img src="https://lh4.googleusercontent.com/proxy/QEaRteD63NfUL5Wxb1p7e1ANAZFcUCktVv6rG4uErupF7jb3UFsSX1JgFKvLJuQQJixASNXMAzdHP8hSiNA90cv49M227_vuLLrEG_pgrkWbzDDPAM_0BfQR51j_mV2iaR53iOf6W5Y48E7O43NwlH7HffoK" class="image-user" id="profileImage">
                    <span id="uploadSpan" style="cursor: pointer;">
                        <img src="{{asset('images/pencil.png')}}">
                    </span>
                    <input type="file" id="fileInput" style="display: none;" accept="image/*">
                </div>
                
                
                <div class="info-user">
                    <label for="id-user">ID Giảng viên: </label>
                    <span>SV123</span>
                </div>
                <div class="info-user">
                    <label for="name">Họ và Tên: </label>
                    <span>Nguyễn Quang Hệ</span>
                </div>
                <div class="info-user">
                    <label for="khoa">Khoa: </label>
                    <span>Công nghệ thông tin</span>
                </div>
                <div class="info-user">
                    <label for="phone">Số điện thoại: </label>
                    <span>0123456789</span>
                </div>
                <div class="info-user">
                    <label for="email">Email: </label>
                    <span>Hesi@gmail.com</span>
                </div>
                <div class="info-user">
                    <label for="username">Tên đăng nhập: </label>
                    <span>Hesii</span>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">Đăng xuất</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>