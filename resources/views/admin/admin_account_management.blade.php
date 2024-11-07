<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/admin_account_management.css') }}">
    <script src="{{ asset('js/admin/admin_account_management.js')}}"></script>
    <title>Quản lí tài khoản</title>
</head>

<body>

    <main>
        <div class="sidebar">
            <img src="{{ asset('images/logo-sidebar.png') }}">
            <h3>Hệ thống quản lý</h3>
            <hr style="margin: 25px 0px;border:1px solid black">
            <ul>
                <li style="background-color:#58a6b2;">
                    <a href="{{ route('admin.account_management') }}">
                        <img src="{{ asset('images/account-management.png') }}">
                        <p>Quản lí tài khoản</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.schedule_management') }}">
                        <img src="{{ asset('images/school-schedule.png') }}">
                        <p>Quản lí lịch học</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.attendance_results') }}">
                        <img src="{{ asset('images/result.png') }}">
                        <p>Kết quả điểm danh</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.mailbox_management') }}">
                        <img src="{{ asset('images/mailbox.png') }}">
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
            <div class="function-content">
                <form id="search-form" method="GET">
                    @csrf
                    <select name="role" id="options">
                        <option value="option1">Tất cả vai trò</option>
                        <option value="option2">Giảng viên</option>
                        <option value="option3">Sinh viên</option>
                    </select>
                    <input type="text" name="find" placeholder="Tìm kiếm..." id="search-input" onkeyup="showUser(this.value)">
                </form>
            </div>  
            <div class="display-content">
                @if($accounts->isEmpty())
                    <p>Không có tài khoản nào.</p>
                @else
                    <table style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <td></td>
                                <td style="padding-bottom: 10px;font-weight:bold;text-align: start">Tên</td>
                                <td style="padding-bottom: 10px;font-weight:bold;text-align: start">Mã định danh</td>
                                <td style="padding-bottom: 10px;font-weight:bold;text-align: start">Số điện thoại</td>
                                <td style="padding-bottom: 10px;font-weight:bold;text-align: start">Vai trò</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="account-list">
                            @foreach($accounts as $account)
                                <tr>
                                    <td style="text-align: start"><img src="{{ $account['image'] }}" width="65" height="auto"></td>
                                    <td style="text-align: start">{{ $account['fullname'] }}</td>
                                    <td style="text-align: start">{{ $account['reference_id'] }}</td>
                                    <td style="text-align: start">{{ $account['phonenumber'] }}</td>
                                    <td style="text-align: start">{{ $account['role'] === 'teacher' ? 'Giáo viên' : 'Sinh viên' }}</td>
                                    <td><a href="{{ route('user.edit', $account['id']) }}"><img src="{{ asset('images/editing.png') }}" width="20px" height="auto"></a></td>
                                    <td><a href="{{ route('user.delete', $account['id']) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');"><img src="{{ asset('images/delete.png') }}" width="20px" height="auto"></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="next-previous-page pagination-buttons">
                    @if ($accounts->onFirstPage())
                    <img src="{{ asset('images/arrow-left.png') }}" width="15px" height="auto" style="opacity: 0.5;" disabled>
                    @else
                    <a href="{{ $accounts->previousPageUrl() }}">
                        <img src="{{ asset('images/arrow-left.png') }}" width="15px" height="auto">
                    </a>
                    @endif

                    <span style="font-weight: bold; margin: 0px 15px; font-size: 18px">
                        {{ $accounts->currentPage() }} / {{ $accounts->lastPage() }}
                    </span>

                    @if ($accounts->hasMorePages())
                    <a href="{{ $student_attendance_results->nextPageUrl() }}">
                        <img src="{{ asset('images/right-arrow.png') }}" width="15px" height="auto">
                    </a>
                    @else
                    <img src="{{ asset('images/right-arrow.png') }}" width="15px" height="auto" style="opacity: 0.5;" disabled>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>
