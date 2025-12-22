@extends('client.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Camping | My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .main {
            min-height: 100vh;
            box-sizing: border-box;
            background: linear-gradient(135deg, #145229, #145229);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .profile-box {
            width: 600px;
            padding: 40px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #145229;
            border: none;
        }
        .btn-primary:hover {
            background-color: #145229;
        }
        .text-center a {
            color: #fff;
            text-decoration: none;
        }
        .text-center a:hover {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="profile-box">
            <h2 class="text-center mb-4;" style="font-weight: bold; ">My Profile</h2><br>
            <table class="table table-bordered">
                <tr>
                    <th>Username</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>*********</td>
                </tr>
                <tr>
                    <th>Alamat User</th>
                    <td>{{ $user->alamat_user }}</td>
                </tr>
                <tr>
                    <th>Nomor Telefon User</th>
                    <td>{{ $user->nomor_telepon_user }}</td>
                </tr>
            </table><br>
            <div class="text-center mt-3">
                <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

@endsection
