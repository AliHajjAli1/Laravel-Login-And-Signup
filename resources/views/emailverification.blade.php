@extends('layouts.app')

@section('content')
<div class="container">
    <div role="alert">
        A fresh verification link has been sent to your email address.
    </div>

    Before proceeding, please check your email for a verification link.
    If you did not receive the email,
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">click here to request another</button>.
    </form>
</div>
@endsection
