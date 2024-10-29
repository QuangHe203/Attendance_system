<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<?php $loggedInUseruser = session('user') ?>
<pre>{{ print_r($loggedInUseruser) }}</pre>
    <a href="{{ route('send.message.form') }}">Gửi tin nhắn</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
</body>
</html>
