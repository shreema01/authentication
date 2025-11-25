<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ffecd2, #fcb69f); /* Soft sunrise gradient */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 45px 35px;
            width: 360px;
            text-align: center;
            color: #333;
            animation: fadeIn 1s ease-in-out;
        }

        .register-container h2 {
            margin-bottom: 20px;
            font-size: 28px;
            letter-spacing: 1px;
            color: #222;
        }

        .register-container input {
            width: 100%;
            padding: 12px 14px;
            margin: 10px 0;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
            background: #fff;
            color: #333;
            font-size: 15px;
            transition: border 0.3s;
        }

        .register-container input:focus {
            border: 1px solid #f77f00;
            box-shadow: 0 0 6px rgba(247, 127, 0, 0.4);
        }

        .register-container input::placeholder {
            color: #777;
        }

        .register-container button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #f77f00, #d62828);
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .register-container button:hover {
            background: linear-gradient(135deg, #d62828, #f77f00);
            transform: scale(1.05);
        }

        .register-container a {
            display: block;
            margin-top: 20px;
            color: #005f73;
            font-size: 14px;
            text-decoration: none;
            transition: 0.3s;
        }

        .register-container a:hover {
            color: #0a9396;
            text-decoration: underline;
        }

        .success-msg {
            color: #2a9d8f;
            font-size: 14px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Create Account</h2>

        @if(session('success'))
            <p class="success-msg">{{ session('success') }}</p>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>

        <a href="{{ route('login') }}">Already have an account? Login</a>
    </div>
</body>
</html>
