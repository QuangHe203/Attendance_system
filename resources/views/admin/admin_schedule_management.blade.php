<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/admin_schedule_management.css') }}">
    <script src="{{ asset('js/admin/admin_schedule_management.js')}}"></script>
    <title>Quản lí lịch học</title>
</head>

<body>
    <main>

        <div class="sidebar">
            <img src="{{asset('images/logo-sidebar.png')}}">
            <h3>Hệ thống quản lý</h3>
            <hr style="margin: 25px 0px;border:1px solid black">
            <ul>
                <li>
                    <a href="{{route('admin.account_management')}}">
                        <img src="{{asset('images/account-management.png')}}">
                        <p>Quản lí tài khoản</p>
                    </a>
                </li>
                <li style="background-color:#58a6b2;">
                    <a href="{{route('admin.schedule_management')}}">
                        <img src="{{asset('images/school-schedule.png')}}">
                        <p>Quản lí lịch học</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.attendance_results')}}">
                        <img src="{{asset('images/result.png')}}">
                        <p>Kết quả điểm danh</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.mailbox_management')}}">
                        <img src="{{asset('images/mailbox.png')}}">
                        <p>Hòm thư</p>
                    </a>
                </li>
            </ul>
            <form action="" method="POST">
                @csrf
                <button type="submit">Đăng xuất</button>
            </form>
        </div>

        <div class="content">
            <div class="tabs">
                <button class="tablinks" onclick="openTab(event, 'TabClasses')">Lớp học</button>
                <button class="tablinks" onclick="openTab(event, 'TabSchedule')">Giờ học</button>
                <button class="tablinks" onclick="openTab(event, 'TabClassesStudent')">Lớp học - Sinh viên</button>
            </div>

            <div id="TabClasses" class="tabcontent" style="display: none">
                <form action="" method="GET">
                    @csrf
                    <input type="text" name="find" placeholder="  Tìm kiếm...">
                </form>

                {{-- Hiển thị dữ liệu giả --}}
                <table>
                    <thead>
                        <tr>
                            <td style="width: 120px">ID Lớp học</td>
                            <td>Tên lớp học</td>
                            <td style="width: 120px">ID Giáo viên</td>
                            <td>Tên môn học</td>
                            <td>Khoa</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Hệ nhúng (N06)</td>
                            <td>GV123</td>
                            <td>Lập trình nhúng</td>
                            <td>Công nghệ thông tin</td>
                        </tr>
                    </tbody>
                </table>

                <div class="next-previous-page">
                    <a href=""><img src="{{asset('images/arrow-left.png')}}" width="15px" height="auto"></a>
                    <span style="font-weight: bold;margin:0px 15px;font-size:18px">1</span>
                    <a href=""><img src="{{asset('images/right-arrow.png')}}" width="15px" height="auto"></a>
                </div>

            </div>

            <div id="TabSchedule" class="tabcontent" style="display: none">
                <form action="" method="GET">
                    @csrf
                    <input type="text" name="find" placeholder="  Tìm kiếm...">
                </form>

                {{-- Hiển thị dữ liệu giả --}}
                <table>
                    <thead>
                        <tr>
                            <td style="width: 120px">ID Giờ học</td>
                            <td>ID Lớp học</td>
                            <td style="width: 120px">Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Ngày học</td>
                            <td>Ngày kết thúc</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>6h45 AM</td>
                            <td>6h45 PM</td>
                            <td>20/10/2024</td>
                            <td>20/12/2024</td>
                        </tr>
                    </tbody>
                </table>

                <div class="next-previous-page">
                    <a href=""><img src="{{asset('images/arrow-left.png')}}" width="15px" height="auto"></a>
                    <span style="font-weight: bold;margin:0px 15px;font-size:18px">1</span>
                    <a href=""><img src="{{asset('images/right-arrow.png')}}" width="15px" height="auto"></a>
                </div>
            </div>

            <div id="TabClassesStudent" class="tabcontent" style="display: none">
                <form action="" method="GET">
                    @csrf
                    <input type="text" name="find" placeholder="  Tìm kiếm...">
                </form>

                {{-- Hiển thị dữ liệu giả --}}
                <table>
                    <thead>
                        <tr>
                            <td>Id Lớp học</td>
                            <td>Id Sinh viên</td>
                            <td>Tên Sinh viên</td>
                            <td>Tên lớp học</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>SV123</td>
                            <td>Hệ si yêu Hiếu si</td>
                            <td>Lớp học tình yêu</td>
                        </tr>
                    </tbody>
                </table>

                <div class="next-previous-page">
                    <a href=""><img src="{{asset('images/arrow-left.png')}}" width="15px" height="auto"></a>
                    <span style="font-weight: bold;margin:0px 15px;font-size:18px">1</span>
                    <a href=""><img src="{{asset('images/right-arrow.png')}}" width="15px" height="auto"></a>
                </div>
            </div>

        </div>

    </main>
</body>

</html>