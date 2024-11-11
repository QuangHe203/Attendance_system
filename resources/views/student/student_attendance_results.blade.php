<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/student/student_attendance_results.css')}}">
    <script src="{{asset('js/student/student_attendance_results.js')}}"></script>
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
                {{-- Hiển thị dữ liệu động về học kỳ --}}
                <form action="">
                    @csrf
                    <label for="semester">Học kỳ: </label>
                    <select id="semester" name="semester">
                        @foreach($semesters as $key => $semester)
                        <option value="{{ $semester->semester_name }}" {{ $key == 0 ? 'selected' : '' }}>
                            {{ $semester->semester_name }}
                        </option>
                        @endforeach
                    </select>

                </form>

                {{-- Hiển thị dữ liệu động về môn học --}}
                @foreach($semesters as $semester)
                <div id="{{ $semester->semester_name }}" class="semester-content" style="display: none;">
                    <p>Danh sách lớp học:</p>
                    @php $index = 0; @endphp 
                    @foreach($courses as $course)
                    @if($course->semester_name == $semester->semester_name)
                    <div class="subject {{ $index == 0 ? 'active' : '' }}" data-index="{{ $index }}">
                        <p>{{ $course->course_name }}</p>
                    </div>
                    @php $index++; @endphp <!-- Tăng biến đếm sau mỗi phần tử -->
                    @endif
                    @endforeach
                </div>
                @endforeach

            </div>

            {{-- Hiển thị kết quả điểm danh --}}
            <div id="attendance-results">
                @foreach($courses as $course)
                <div class="display-attendance" id="attendance-{{ $course->course_name }}" style="display: none;">
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
                            @php $count = 1; @endphp
                            @foreach($student_attendance_results as $result)
                            @if($result->course_name == $course->course_name)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $result->day }}</td>
                                <td>{{ $result->time_start }}</td>
                                <td>{{ $result->time_end }}</td>
                                <td>{{ $result->status == 1 ? 'Có mặt' : 'Vắng' }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>

    </main>
</body>

</html>