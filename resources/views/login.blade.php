<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 40px 35px;
            width: 340px;
            text-align: center;
            color: #fff;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 28px;
            letter-spacing: 1px;
        }

        .login-container input {
            width: 100%;
            padding: 12px 14px;
            margin: 10px 0;
            border-radius: 10px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 15px;
        }

        .login-container input::placeholder {
            color: #e0e0e0;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #ff512f, #dd2476);
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-container button:hover {
            background: linear-gradient(135deg, #dd2476, #ff512f);
            transform: scale(1.05);
        }

        .login-container a {
            display: block;
            margin-top: 20px;
            color: #ffeaa7;
            font-size: 14px;
            text-decoration: none;
            transition: 0.3s;
        }

        .login-container a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .error-msg {
            color: #ff6b6b;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Welcome Back</h2>

        @if($errors->any())
            <p class="error-msg">{{ $errors->first() }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>

        <a href="{{ route('register') }}">Don’t have an account? Register</a>
    </div>
</body>
</html>

