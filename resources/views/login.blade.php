<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Camping | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .main {
            height: 100vh;
            box-sizing: border-box;
            background: linear-gradient(135deg, #145229, #145229);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .login-box {
            width: 400px;
            padding: 40px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .login-box form div {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #145229;
            border: none;
        }
        .btn-primary:hover {
            background-color: #218838;
        }
        .text-center img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .text-center a {
            color: #145229;
            text-decoration: none;
        }
        .text-center a:hover {
            color: #218838;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="main">
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
        <div class="text-center">
            <img src="{{ secure_asset('landingpage/images/logo.png') }}" alt="Logo">
        </div>
        <div class="login-box">
            <h2 class="text-center mb-4">Login</h2>
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="text-center mt-3">
                    Belum punya akun? Klik <a href="register">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
