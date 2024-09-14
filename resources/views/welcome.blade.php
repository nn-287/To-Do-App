<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <livewire:styles />
    <livewire:scripts />
    <style>
        body {
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            text-align: center;
            transform: translateY(-50px);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .main-container:hover {
            transform: translateY(0);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .welcome-heading {
            color: #1d4ed8;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            transition: color 0.3s ease-in-out;
        }

        .welcome-heading:hover {
            color: #2563eb;
        }

        .welcome-text {
            color: #4b5563;
            font-size: 1.125rem;
            margin-bottom: 2rem;
        }

        .login-button {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
            border: none;
            color: #ffffff;
            font-size: 1.125rem;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .login-button:hover {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            transform: scale(1.05);
        }

        .login-button:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(100, 116, 139, 0.5);
        }
    </style>
</head>

<body>
    <div class="main-container">
        <h1 class="welcome-heading">Welcome!</h1>
        <h3 class="welcome-text">Hello, future achiever! 🚀🎯 Your journey toward success starts now. 🌟🌟</h3>
        <button onclick="window.location.href='{{ url('/login') }}';" class="login-button">
            Login
        </button>
    </div>
</body>
</html>