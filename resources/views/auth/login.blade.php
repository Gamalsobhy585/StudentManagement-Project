<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-nPr3/vP+S1FqLTsoM4w/NmFJh/Hew+tb6+0f92wS6b4eFf6Y38ZwzNQQTA+ilFM4L1k7bOIXM+0U5xYAC4ozmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" type="image/png" href="/images/favicon.png">
</head>
<body>
    <div class="header" id="header">
        <div class="container">
            <a href="" target="_blank" class="logo">ByteTech Academystak</a>
            <a class="register-lnk" target="_blank" href="{{ url('/register') }}">Sign Up</a>
        </div>    
    </div>

    <div class="wrapper">
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <h2>Login To ByteTech Academystak</h2>
            <div class="input-box">
                <input type="email" name="email" placeholder="example@abc.com" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fa-solid fa-lock"></i>  
            </div>   
            <button class="signin-btn btn" type="submit">Login</button>
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
