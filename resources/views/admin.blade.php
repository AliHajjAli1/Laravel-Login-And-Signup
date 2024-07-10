<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .title {
            font-weight: 700;
            color: rgb(220, 38, 38);
            font-size: 1.5rem;
            margin-bottom: 1rem;
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
        .delete-form button {
            background-color: rgb(220, 38, 38);
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .delete-form button:hover {
            background-color: rgb(180, 30, 30);
        }
        .promo {
            border-width: 1px;
            --tw-border-opacity: 1;
            border-color: rgb(252 165 165 / var(--tw-border-opacity));
            border-radius: 1rem; /* 16px */
            margin-top: 10px;
        }
        .done {
            border-radius: 1rem;
            background-color: rgb(220, 38, 38);
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        .alert-success {
            color: green;
            font-weight: bold;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <label class="title">Users List, Total: {{ $userCount }}</label>
    <table>
    @csrf
        <thead>
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    <form class="delete-form" action="{{ action('App\Http\Controllers\AdminController@deleteUser', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form class="delete-form" action="{{ action('App\Http\Controllers\AdminController@gotoSellings') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit">Go to Dashboard</button>
    </form>
    <form method="POST" action="{{ action('App\Http\Controllers\AdminController@addPromo') }}" method="Post">
        @csrf
        <input type="text" placeholder="Add Promo Code" name="new_promo_code" class="promo"/>
        <button type="submit" class="done">Done</button>
        @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    </form>
</body>
</html>