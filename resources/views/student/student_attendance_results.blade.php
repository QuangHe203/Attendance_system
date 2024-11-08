<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/student/student_attendance_results.css')}}">
    <script src="{{ asset('js/student/student_attendance_results.js')}}"></script>
    <title>Điểm danh</title>
</head>

<body>
    <main>
        <div class="sidebar">
            <img src="{{asset('images/logo-sidebar.png')}}" alt="Logo" class="logo">
            <h3>Hệ thống quản lý</h3>
            <hr style="margin: 25px 0px; border: 1px solid black;">
            <ul>
                <li>
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
                <li style="background-color: #58a6b2;">
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
            <div class="function-attendance">
                {{-- Hiển thị dữ liệu giả --}}
                <form action="">
                    @csrf
                    <label for="semester">Học kỳ: </label>
                    {{-- Dữu liệu giả về học kỳ--}}
                    <select id="semester">
                        <option value="hk1_2024">Học kỳ I 2024-2025</option>
                        <option value="hk2_2024">Học kỳ II 2024-2025</option>
                        <option value="hk1_2023">Học kỳ I 2023-2024</option>
                        <option value="hk2_2023">Học kỳ II 2023-2024</option>
                        <option value="hk1_2022">Học kỳ I 2022-2023</option>
                        <option value="hk2_2022">Học kỳ II 2022-2023</option>
                    </select>
                </form>
                {{-- Dữ liệu giả về môn học có trong học kỳ --}}
                <div id="hk1_2024" class="semester-content" style="display: block;">
                    <p>Danh sách lớp học:</p>
                    <div class="subject active" data-index="0"><p>Hệ nhúng N08</p></div>
                    <div class="subject" data-index="1"><p>Phân tích và thiết kế phần mềm</p></div>
                    <div class="subject" data-index="2"><p>Trực quan hóa dữ liệu</p></div>
                    <div class="subject" data-index="3"><p>Quản trị dự án CNTT</p></div>
                    <div class="subject" data-index="4"><p>Thiết kế web nâng cao</p></div>
                </div>
                <div id="hk2_2024" class="semester-content" style="display: none;">
                    <p>Danh sách lớp học:</p>
                    <div class="subject" data-index="0"><p>Lập trình C nâng cao</p></div>
                    <div class="subject" data-index="1"><p>Giải tích</p></div>
                    <div class="subject" data-index="2"><p>Toán rời rạc</p></div>
                    <div class="subject" data-index="3"><p>Xác suất thống kê</p></div>
                    <div class="subject" data-index="4"><p>Vật lý cho CNTT</p></div>
                </div>                
                <div id="hk1_2023" class="semester-content" style="display: none;" >
                    <p>Danh sách lớp học:</p>
                    <div class="subject" data-index="0"><p>Điện toán đám mây</p></div>
                    <div class="subject" data-index="1"><p>Tiếng Anh</p></div>
                    <div class="subject" data-index="2"><p>Tiếng Hàn</p></div>
                    <div class="subject" data-index="3"><p>Thị giác máy tính</p></div>
                    <div class="subject" data-index="4"><p>Toán rời rạc</p></div>
                </div>
                <div id="hk2_2023" class="semester-content" style="display: none;" >
                    <p>Danh sách lớp học:</p>
                    <div class="subject" data-index="0"><p>Hệ nhúng N08</p></div>
                    <div class="subject" data-index="1"><p>Phân tích và thiết kế phần mềm</p></div>
                    <div class="subject" data-index="2"><p>Trực quan hóa dữ liệu</p></div>
                    <div class="subject" data-index="3"><p>Quản trị dự án CNTT</p></div>
                    <div class="subject" data-index="4"><p>Thiết kế web nâng cao</p></div>
                </div>
                <div id="hk1_2022" class="semester-content" style="display: none;" >
                    <p>Danh sách lớp học:</p>
                    <div class="subject" data-index="0"><p>Ứng dụng phân tán</p></div>
                    <div class="subject" data-index="1"><p>Phân tích và thiết kế phần mềm</p></div>
                    <div class="subject" data-index="2"><p>Lập trinh song song</p></div>
                    <div class="subject" data-index="3"><p>Thuật toán ứng dụn</p></div>
                    <div class="subject" data-index="4"><p>Tiếng Anh 2</p></div>
                </div>
                <div id="hk2_2022" class="semester-content" style="display: none;" >
                    <p>Danh sách lớp học:</p>
                    <div class="subject" data-index="0"><p>Lập trình C nâng cao</p></div>
                    <div class="subject" data-index="1"><p>Giải tích</p></div>
                    <div class="subject" data-index="2"><p>Toán rời rạc</p></div>
                    <div class="subject" data-index="3"><p>Xác suất thống kê</p></div>
                    <div class="subject" data-index="4"><p>Vật lý cho CNTT</p></div>
                </div>
            </div>
            {{-- Dữ liệu giả về tiết học khi chọn 1 môn học --}}
            {{-- Dữ liệu giả về tiết học của Học kỳ I 2024-2025 --}}
            <div class="display-attendance" style="display:block">
                <table>
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Ngày học</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Tình trạng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0;$i<20;$i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>20/10/2024</td>
                                <td>06h45</td>
                                <td>09h25</td>
                                <td>Vắng</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="display-attendance" style="display:none">
                <table>
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Ngày học</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Tình trạng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0;$i<20;$i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>22/10/2024</td>
                                <td>06h45</td>
                                <td>09h25</td>
                                <td>Đủ</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="display-attendance" style="display:none">
                <table>
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Ngày học</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Tình trạng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0;$i<20;$i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>25/10/2024</td>
                                <td>09h25</td>
                                <td>12h10</td>
                                <td>Muộn</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="display-attendance" style="display:none">
                <table>
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Ngày học</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Tình trạng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0;$i<20;$i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>28/10/2024</td>
                                <td>06h45</td>
                                <td>09h25</td>
                                <td>Vắng</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="display-attendance" style="display:none">
                <table>
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Ngày học</td>
                            <td>Giờ bắt đầu</td>
                            <td>Giờ kết thúc</td>
                            <td>Tình trạng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0;$i<20;$i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>20/10/2024</td>
                                <td>13h00</td>
                                <td>15h45</td>
                                <td>Vắng</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
</main>
</body>

</html>