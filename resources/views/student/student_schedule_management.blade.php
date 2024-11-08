<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/student/student_schedule_management.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/student/student_schedule_management.js')}}"></script>
    <title>Lịch học</title>
</head>

<body>
    <main>
        <div id="week-schedule-list"></div>
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
                <li style="background-color: #58a6b2;">
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

            <div id="week-display">
                <h3 style="display:none">Tuần chứa ngày: <span id="selected-day"></span></h3>

                {{-- Dùng để hiển thị thứ trong tuần khi clink vào lịch --}}
                <ul id="week-list"></ul>

                {{-- Dùng để hiển thị thời gian các tiết của thứ --}}
                <ul id="day-list">
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Thur</li>
                    <li>Wed</li>
                    <li>Fri</li>
                    <li>Sat</li>
                    <li>Sun</li>
                </ul>
                <hr style="margin: 0px 10px">

                <div class="display-schedule">
                    <div class="time-schedule">
                        <p style="margin-top: 20px">06h:00</p>
                        <p>07h:00</p>
                        <p>08h:00</p>
                        <p>09h:00</p>
                        <p>10h:00</p>
                        <p>11h:00</p>
                        <p>12h:00</p>
                        <p>13h:00</p>
                        <p>14h:00</p>
                        <p>15h:00</p>
                        <p>16h:00</p>
                        <p>17h:00</p>
                        <p>18h:00</p>
                        <p>19h:00</p>
                    </div>
                    <div class="day-schedule monday">
                        @for ($i=0;$i<27;$i++)
                            <hr>
                            @endfor
                            {{-- Hiển thị lịch học cho thứ 2 --}}
                            <span></span>
                    </div>
                    <div class="day-schedule tuesday">
                        @for ($i=0;$i<27;$i++)
                            <hr>
                            @endfor
                            {{-- Hiển thị lịch học cho thứ 3 --}}
                            <span></span>
                    </div>
                    <div class="day-schedule wednesday">
                        @for ($i=0;$i<27;$i++)
                            <hr>
                            @endfor
                            {{-- Hiển thị lịch học cho thứ 4 --}}
                            <span></span>
                    </div>
                    <div class="day-schedule thursday">
                        @for ($i=0;$i<27;$i++)
                            <hr>
                            @endfor
                            {{-- Hiển thị lịch học cho thứ 5 --}}
                            <span></span>
                    </div>
                    <div class="day-schedule friday">
                        @for ($i=0;$i<27;$i++)
                            <hr>
                            @endfor
                            {{-- Hiển thị lịch học cho thứ 6 --}}
                            <span></span>
                    </div>
                    <div class="day-schedule saturday">
                        @for ($i=0;$i<27;$i++)
                            <hr>
                            @endfor
                            {{-- Hiển thị lịch học cho thứ 7 --}}
                            <span></span>
                    </div>
                    <div class="day-schedule sunday" style="border-right:1px solid rgb(192, 192, 192)">
                        @for ($i=0;$i<27;$i++)
                            <hr>
                            @endfor
                    </div>
                </div>

            </div>

            <div class="calendar-container">
                <div class="display-month-year">
                    <img id="prev" src="{{asset('images/arrow-left.png')}}">
                    <span id="month-year"></span>
                    <img id="next" src="{{asset('images/right-arrow.png')}}">
                </div>
                <table id="calendar-table">
                    <thead>
                        <tr style="font-weight: 600">
                            <td>T2</td>
                            <td>T3</td>
                            <td>T4</td>
                            <td>T5</td>
                            <td>T6</td>
                            <td>T7</td>
                            <td>CN</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu sẽ được thêm vào đây bằng JavaScript -->
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</body>

</html>