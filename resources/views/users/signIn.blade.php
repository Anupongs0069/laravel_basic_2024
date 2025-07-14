@extends('layout')

@section('content')
    <div class="container">
        <h3>Sign In</h3>

        @if (@isset($errors))
            @if ($errors->has('search'))
                <div class="alert alert-danger">*** {{ $errors->first('search') }}"></div>
            @endif
        @endisset

        <form method="post" action="/user/signInProcess">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">

                @if (isset($errors))
                    @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">

                @if (@isset($errors))
                    @if ($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                @endif
            </div>
        
            <button type="submit" class="btn btn-primary mt-3">Sign In</button>
        </form>
    </div>
@endsection