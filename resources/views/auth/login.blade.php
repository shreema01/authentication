<!-- Old Code -->

<!-- <form method="POST" action="{{ route('teacher.login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form> -->

<!-- New Code -->
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Login</title>
</head>
<body>
    <h2>Teacher Login</h2>
    <form method="POST" action="{{ route('teacher.login.submit') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>
    @if($errors->any())
        <p style="color:red;">{{ $errors->first() }}</p>
    @endif
</body>
</html>

