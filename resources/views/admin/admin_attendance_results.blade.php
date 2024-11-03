<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/admin_attendance_results.css') }}">
    <script src="{{ asset('js/admin/admin_attendance_results.js')}}"></script>
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
                    <form action="">
                        @csrf
                        <input type="text" placeholder="Tìm kiếm theo ID..." id="search-teacherId" onkeyup="showTeacherAttendanceResults()">
                    </form>
                    <label for="select-department" style="font-weight: 100">Khoa: </label>
                    <select id="select-department" onchange="showTeacherAttendanceResults()">
                        <option value="">Tất cả</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                            @endforeach
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
                    <tbody id="teacher_attendance_list">
                    @foreach($teacher_attendance_results as $teacher_attendance_result)
                        <tr>
                            <td>{{$teacher_attendance_result->period_id}}</td>
                            <td>{{$teacher_attendance_result->teacher_id}}</td>
                            <td style="text-align: start; padding-left: 5px;">{{$teacher_attendance_result->teacher_name}}</td>
                            <td>{{$teacher_attendance_result->email}}</td>
                            <td>{{$teacher_attendance_result->department}}</td>
                            <td>{{$teacher_attendance_result->date_attendance}}</td>
                            <td>{{$teacher_attendance_result->time_attendance}}</td>
                        </tr>
                        @endforeach
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
                            <input type="text" placeholder="Tìm kiếm theo ID sinh viên..." id="search-studentId" onkeyup="showStudentAttendanceResults()">
                        </form>
                        <label for="select-subject" style="font-weight: 100">Chọn môn học: </label>
                        <select id="select-subject" onchange="showStudentAttendanceResults()">
                            <option value="">Tất cả</option>
                            @foreach ($subjects as $subject)
                            <option value="{{ $subject }}">{{ $subject }}</option>
                            @endforeach
                        </select>
                    </div>
                <table>
                    <thead>
                        <tr>
                            <td>Tên Lớp học</td>
                            <td>Tên môn học</td>
                            <td>ID Sinh viên</td>
                            <td>Tên sinh viên</td>
                            <td>Giờ điểm danh</td>
                            <td>Ngày điểm danh</td>
                            <td>Tình trạng</td>
                        </tr>
                    </thead>
                    <tbody id="student_attendance_list">
                        @foreach($student_attendance_results as $student_attendance_result)
                        <tr>
                            <td>{{$student_attendance_result->course_name}}</td>
                            <td>{{$student_attendance_result->subject_name}}</td>
                            <td>{{$student_attendance_result->student_id}}</td>
                            <td style="text-align: start; padding-left: 5px;">{{$student_attendance_result->student_name}}</td>
                            <td>{{$student_attendance_result->time_attendance}}</td>
                            <td>{{$student_attendance_result->date_attendance}}</td>
                            <td>{{$student_attendance_result->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="next-previous-page pagination-buttons">
                    @if ($student_attendance_results->onFirstPage())
                    <img src="{{ asset('images/arrow-left.png') }}" width="15px" height="auto" style="opacity: 0.5;" disabled>
                    @else
                    <a href="{{ $student_attendance_results->previousPageUrl() }}">
                        <img src="{{ asset('images/arrow-left.png') }}" width="15px" height="auto">
                    </a>
                    @endif

                    <span style="font-weight: bold; margin: 0px 15px; font-size: 18px">
                        {{ $student_attendance_results->currentPage() }} / {{ $student_attendance_results->lastPage() }}
                    </span>

                    @if ($student_attendance_results->hasMorePages())
                    <a href="{{ $student_attendance_results->nextPageUrl() }}">
                        <img src="{{ asset('images/right-arrow.png') }}" width="15px" height="auto">
                    </a>
                    @else
                    <img src="{{ asset('images/right-arrow.png') }}" width="15px" height="auto" style="opacity: 0.5;" disabled>
                    @endif
                </div>


            </div>

        </div>

    </main>
</body>

</html>