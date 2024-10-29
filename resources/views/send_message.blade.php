<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi Tin Nhắn</title>
</head>
<body>
    <h1>Gửi Tin Nhắn</h1>

    <form action="{{ route('send.message') }}" method="POST">
        @csrf
        <input type="hidden" name="id_sender" value="{{ $loggedInUser->user_id }}">

        <div>
            <label for="id_receiver">Người Nhận:</label>
            <select id="id_receiver" name="id_receiver" required>
                <option value="">Chọn người nhận</option>
                @foreach($users as $user)
                    <option value="{{ $user->user_id }}">{{ $user->fullname }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="title">Tiêu Đề:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Nội Dung:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Gửi Tin Nhắn</button>
    </form>
</body>
</html>
