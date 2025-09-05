<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login Admin')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Fonts Poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f9f4;
            /* hijau muda background */
        }

        .login-card {
            max-width: 420px;
            margin: 80px auto;
            border-radius: 20px;
            border: none;
            background: #fff;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            padding: 25px;
        }

        .login-header img {
            display: block;
            margin: 0 auto;
        }

        .login-header h4 {
            font-weight: 600;
            color: #2d6a4f;
        }

        .btn-login {
            background-color: #2d6a4f;
            border: none;
            font-weight: 600;
            padding: 10px;
            border-radius: 10px;
            transition: all 0.2s ease-in-out;
            color: #fff;
            /* <-- teks tombol jadi putih */
        }

        .btn-login:hover {
            background-color: #1b4332;
            color: #fff;
            /* pastikan tetap putih saat hover */
        }
    </style>
</head>

<body>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>
