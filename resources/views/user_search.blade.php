<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Information</title>
    <script src="{{ asset('js/user_search.js')}}"></script>
</head>
<body>

<form>
    <input type="text" name="users" id="" onkeyup="showUser(this.value)">
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>
