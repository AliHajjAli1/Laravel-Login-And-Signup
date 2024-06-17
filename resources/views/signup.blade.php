<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: white;
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
        .signupinput {
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
        .signupbutton {
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
        .alreadyhave {
            color: rgb(220, 38, 38);
            margin-top: 1rem;
        }
        .gotologin {
            color: rgb(252, 165, 165);
            text-decoration: none;
            margin-left: 0.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="logindiv">
        <label class="loginlabel">Sign Up</label>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('signup') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" class="signupinput" value="{{ old('email') }}" required/>
            <input type="password" name="password" placeholder="Password" class="passwordinput" required/>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="passwordinput" required/>
            <button type="submit" class="signupbutton">Sign Up</button>
        </form>
        <label class="alreadyhave">Already have an account? <a class="gotologin" href="{{ route('login.form') }}">Login</a></label>
    </div>
    </div>
</body>
</html>
