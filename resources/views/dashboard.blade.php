<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-size: cover;
        }
        .container {
            text-align: center;
        }
        .buybutton {
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
        .buybutton:hover {
            background-color: rgb(180, 30, 30);
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            background-color: white;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .promo {
            border-width: 1px;
            --tw-border-opacity: 1;
            border-color: rgb(252 165 165 / var(--tw-border-opacity));
            border-radius: 1rem; /* 16px */
        }
        .done {
            border-radius: 1rem;
            background-color: rgb(220, 38, 38);
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="images/twitter_tick.png"/>
        @if(Auth::user()->role === 'client')
            <form method="POST" action="{{ route('promo') }}">
                @csrf
                <input type="text" placeholder="Promo Code" name="promo_code" class="promo"/>
                <button type="submit" class="done">Done</button>
            </form>
            <form method="POST" action="{{ route('buy') }}">
                @csrf
                <button type="submit" class="buybutton">
                    {{ session('price', 4.99) == 2.99 ? 'Buy X standard verification for 2.99$ !!!' : 'Buy X standard verification for 4.99$ !!!' }}
                </button>
            </form>
        @elseif(Auth::user()->role === 'admin' || Auth::user()->role === 'employee')
            <form method="GET" action="{{ route('viewSellings') }}">
                <button type="submit" class="buybutton">
                    View sellings
                </button>
            </form>
        @endif

        @if((Auth::user()->role === 'admin' || Auth::user()->role === 'employee') && isset($sellings))
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        @if (Auth::user()->role === 'employee' && isset($sellings))
                            <th>Phone</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($sellings as $selling)
                        <tr>
                            <td>{{ $selling->name }}</td>
                            <td>{{ $selling->email }}</td>
                            @if (Auth::user()->role === 'employee' && isset($sellings))
                                <td>{{ $selling->phone }}</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Total number of orders: {{ $totalSellings }}</p>
            <p>Total profit: {{ $profit }}</p>
        @endif
    </div>
</body>
</html>