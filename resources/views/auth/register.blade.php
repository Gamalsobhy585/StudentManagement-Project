<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-nPr3/vP+S1FqLTsoM4w/NmFJh/Hew+tb6+0f92wS6b4eFf6Y38ZwzNQQTA+ilFM4L1k7bOIXM+0U5xYAC4ozmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Start Header -->
    <div class="header" id="header">
        <div class="container">
            <a href="" target="_blank" class="logo">
                ByteTech Academystak
            </a>       
            <a class="text-decoration-none text-black login-lnk" target="_blank" href="{{ url('/login') }}">Login</a>
        </div>    
    </div>
    <div class="wrapper">
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <h2>Signup To ByteTech Academystak</h2>
            <div class="input-box">
                <i class="fa-solid fa-address-card"></i>
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <div class="input-box">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="example@abc.com" required>
            </div>
            <div class="input-box">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-box">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn signup-btn">Register</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</body>
</html>
