<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin_attendance_results.css') }}">
    <script src="{{ asset('js/admin_attendance_results.js')}}"></script>
    <title>Kết quả điểm danh</title>
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
                <li>
                    <a href="{{route('admin.schedule_management')}}">
                        <img src="{{asset('images/school-schedule.png')}}">
                        <p>Quản lí lịch học</p>
                    </a>
                </li>
                <li style="background-color:#58a6b2;">
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
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Đăng xuất</button>
            </form>
        </div>

        <div class="content">
            <h2>Kết quả điểm danh</h2>

            <label for="tab-select">Chọn đối tượng:</label>
            <select id="tab-select">
                <option value="teacher">Giảng viên</option>
                <option value="student">Sinh viên</option>
            </select>

            <div id="teacher" class="tab-content">
                <div class="function-content">
                    <form action="" >
                        @csrf
                        <input type="text" placeholder="Tìm kiếm...">
                    </form>
                    <label for="select-subject" style="font-weight: 100">Khoa: </label>
                    <select id="select-subject">
                        <option value="subject1">Công nghệ thông tin 1</option>
                        <option value="subject1">Công nghệ thông tin 2</option>
                        <option value="subject1">Công nghệ thông tin 3</option>
                        <option value="subject1">Công nghệ thông tin 4</option>
                        <option value="subject1">Công nghệ thông tin 5</option>
                        <option value="subject1">Công nghệ thông tin 6</option>
                    </select>
                </div>

                <table>
                    <thead>
                        <tr>
                            <td style="width: 120px">ID Lớp học</td>
                            <td style="width: 120px">Mã định danh</td>
                            <td>Tên </td>
                            <td>Email</td>
                            <td>Khoa</td>
                            <td style="width: 140px">Ngày điểm danh</td>
                            <td style="width: 140px">Giờ điểm danh</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>GV123</td>
                            <td>Nguyễn Quang Hệ</td>
                            <td>He@gmail.com</td>
                            <td>Công nghệ thông tin</td>
                            <td>20/10/2024</td>
                            <td>09h30</td>
                        </tr>
                    </tbody>
                </table>
                <div class="next-previous-page">
                    <a href=""><img src="{{asset('images/arrow-left.png')}}" width="15px" height="auto"></a>
                    <span style="font-weight: bold;margin:0px 15px;font-size:18px">1</span>
                    <a href=""><img src="{{asset('images/right-arrow.png')}}" width="15px" height="auto"></a>
                </div>
            </div>

            <div id="student" class="tab-content">
                <div class="function-content">
                    <form action="">
                        @csrf
                        <input type="text" placeholder="Tìm kiếm...">
                    </form>
                    <label for="select-subject" style="font-weight: 100">Chọn môn học: </label>
                    <select id="select-subject">
                        <option value="subject1">Hệ nhúng 1</option>
                        <option value="subject2">Hệ nhúng 2</option>
                        <option value="subject3">Hệ nhúng 3</option>
                        <option value="subject4">Hệ nhúng 4</option>
                        <option value="subject5">Hệ nhúng 5</option>
                        <option value="subject6">Hệ nhúng 6</option>
                    </select>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>ID Lớp học</td>
                            <td>Tên môn học</td>
                            <td>ID Sinh viên</td>
                            <td>Tên sinh viên</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Ngày điểm danh</td>
                            <td>Tình trạng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Phân tích thiết kế phần mềm</td>
                            <td>SV123</td>
                            <td>Hệ si si si</td>
                            <td>06h45</td>
                            <td>09h25</td>
                            <td>20/10/2024</td>
                            <td>Vắng</td>
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