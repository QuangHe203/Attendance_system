<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/student/student_account_management.css')}}">
    <script src="{{ asset('js/student/student_account_management.js')}}"></script>
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
                    <a href="{{route('student.account_management')}}">
                        <img src="{{asset('images/account-management.png')}}" alt="Tài khoản">
                        <p>Tài khoản</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.schedule_management')}}">
                        <img src="{{asset('images/school-schedule.png')}}" alt="Lịch học">
                        <p>Lịch học</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.attendance_results')}}">
                        <img src="{{asset('images/result.png')}}" alt="Điểm danh">
                        <p>Điểm danh</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('student.mailbox_management')}}">
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
                    @if ($user->image)
                    <img src="{{ asset($user->image) }}" class="image-user" id="profileImage">
                    @else
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png" class="image-user" id="profileImage">
                    <h6 style="color: red;">*Vui lòng cập nhật ảnh</h6>
                    @endif

                    <form id="imageUploadForm" method="POST" action="{{ route('user.uploadImage', $user->reference_id) }}" enctype="multipart/form-data">
                        @csrf
                        <span id="uploadSpan" style="cursor: pointer;"><img src="{{asset('images/pencil.png')}}"></span>
                        <input type="file" id="fileInput" name="image" style="display: none;" accept="image/*">
                    </form>
                </div>


                <div class="info-user">
                    <label for="id-user">ID Sinh viên: </label>
                    <span>{{ $user->reference_id}}</span>
                </div>
                <div class="info-user">
                    <label for="name">Họ và Tên: </label>
                    <span>{{ $user->fullname}}</span>
                </div>
                <div class="info-user">
                    <label for="phone">Số điện thoại: </label>
                    <span>{{ $user->phonenumber}}</span>
                </div>
                <div class="info-user">
                    <label for="email">Email: </label>
                    <span>{{ $user->email}}</span>
                </div>
                <div class="info-user">
                    <label for="username">Tên đăng nhập: </label>
                    <span>{{ $user->usename}}</span>
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