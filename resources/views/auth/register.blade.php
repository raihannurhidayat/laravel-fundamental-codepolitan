@extends('layouts.app')

@section('title', 'Register Page')

@section('content')
    <div class="row">
        <div class="col-md-4"></div>

        <div class="card col-md-4">
            <div class="card-body">
                <div class="text-center mb-3">Register</div>

                @if (session()->has('status'))
                    <div class="alert alert-danger">
                        {{ session()->get('status') }}
                    </div>
                @endif

                <form action="{{ url('register') }}" method="POST" class="form-control">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if($errors->has('name'))
                        <span class="text-danger"> {{ $errors->first("name") }} </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @if($errors->has('email'))
                        <span class="text-danger"> {{ $errors->first("email") }} </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if($errors->has('password'))
                        <span class="text-danger"> {{ $errors->first("password") }} </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
