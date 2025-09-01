{{-- <form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>

@if($errors->any())
    <p>{{ $errors->first() }}</p>
@endif --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | E-Learning SMKN 2 Padang</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles (Optional) -->
    <style>
        body {
            background-color: #f7f9fc;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: white;
            color: black;
            font-size: 1.25rem;
            text-align: center;
            border-bottom: none;
        }
        .btn-login {
            background-color: #007bff;
            color: white;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <img src="{{ asset('images/logo-smkn2.png') }}" alt="Logo SMKN 2 Padang" style="height: 100px; margin-right: 10px;">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>

                    <!-- Login Button -->
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-login btn-block">Login</button>
                    </div>
                </form>

                <!-- Error Message -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
