<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('{{ asset('images/whiteandredbg.png') }}') no-repeat center center;
            background-size: cover;
        }
        .container {
            text-align: center;
        }
        .loginlabel {
            font-weight: 700;
            color: rgb(220, 38, 38);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .logininput {
            border-width: 1px;
            --tw-border-opacity: 1;
            border-color: rgb(252 165 165 / var(--tw-border-opacity));
            border-radius: 1rem/* 16px */;
            margin-top: 0.5rem/* 8px */;
            margin-bottom: 0.5rem/* 8px */;
            width: 100%;
            height: 2rem/* 16px */;
        }
        .passwordinput {
            border-width: 1px;
            --tw-border-opacity: 1;
            border-color: rgb(252 165 165 / var(--tw-border-opacity));
            border-radius: 1rem/* 16px */;
            margin-top: 0.5rem/* 8px */;
            margin-bottom: 0.5rem/* 8px */;
            width: 100%;
            height: 2rem/* 16px */;
        }
        .loginform button {
            border-radius: 1rem;
            background-color: rgb(220, 38, 38);
            color: white;
            border: none;
            margin-top: 0.5rem;
            width: 100%;
            height: 2rem;
            display: block;
            cursor: pointer;
        }
        .loginform button:hover{
            background-color: rgb(180, 30, 30);
        }
        .donthave {
            color: rgb(220, 38, 38);
            margin-top: 1rem;
        }
        .gotosignup {
            color: rgb(252, 165, 165);
            text-decoration: none;
            margin-left: 0.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logindiv">
            <label class="loginlabel">Login</label>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" class="loginform" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" class="logininput" required/>
                <input type="password" name="password" placeholder="Password" class="passwordinput" required/>
                <button type="submit">Login</button>
            </form>
            <label class="donthave">Don't have an account? <a class="gotosignup" href="{{ route('signup.form') }}">Sign Up</a></label>
        </div>
    </div>
</body>
</html>
