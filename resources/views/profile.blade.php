<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
        .loginbutton {
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
    </style>
</head>
<body>
    <div class="container">
        <div class="logindiv">
            <label class="loginlabel">My Profile</label>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('profile') }}">
                @csrf
                <input type="text" name="name" placeholder="Name" class="logininput"/>
                <input type="text" name="phone" placeholder="Phone" class="logininput"/>
                <input type="text" name="address" placeholder="Address" class="logininput"/>
                <button type="submit" class="loginbutton">Done</button>
            </form>
        </div>
    </div>
</body>
</html>
