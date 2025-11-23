<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>

        /* html, body {
    height: 100%;
    margin: 0;
    padding: 0;
} */

body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #89f7fe, #66a6ff);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    /* overflow-y: hidden;
     overflow-x: hidden;  👈 নতুন লাইন */
}


.table-container {
    overflow: hidden; /* To hide both horizontal and vertical scroll */
}

.table {
    overflow-x: hidden; /* To hide horizontal scroll for the table */
}
        /* body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #89f7fe, #66a6ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        } */

        .welcome-container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 60px 50px;
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
            max-width: 480px;
            animation: fadeIn 1.2s ease-in-out;
        }

        .welcome-container h1 {
            font-size: 38px;
            margin-bottom: 15px;
            color: #1b4965;
        }

        .welcome-container p {
            font-size: 18px;
            color: #444;
            margin-bottom: 30px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-login {
            background: linear-gradient(135deg, #f77f00, #d62828);
            color: #fff;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #d62828, #f77f00);
            transform: scale(1.05);
        }

        .btn-register {
            background: linear-gradient(135deg, #38b000, #007f5f);
            color: #fff;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #007f5f, #38b000);
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to My App</h1>
        <p>Experience a modern, simple and secure way to connect.<br> Please login or register to continue.</p>

        <div class="btn-container">
            <a href="{{ route('login') }}">
                <button class="btn btn-login">Login</button>
            </a>
            <a href="{{ route('register') }}">
                <button class="btn btn-register">Register</button>
            </a>
        </div>
    </div>
</body>
</html>
