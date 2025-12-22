<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Camping | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .main {
            height: 100vh;
            background: linear-gradient(135deg, #145229, #145229);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-box {
            width: 400px;
            padding: 40px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .register-box form div {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #145229;
            border: none;
        }
        .btn-primary:hover {
            background-color: #218838;
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
        <div class="register-box">
            <h2 class="text-center mb-4">Register</h2>
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
                    <label for="nomor_telepon_user" class="form-label">Nomor HP</label>
                    <input type="text" name="nomor_telepon_user" id="nomor_telepon_user" maxlength="13" class="form-control">
                </div>
                <div>
                    <label for="alamat_user" class="form-label">Alamat</label>
                    <input type="text" name="alamat_user" id="alamat_user" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="text-center mt-3">
                    Sudah punya akun? Klik <a href="login">Login</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
</body>
</html>
