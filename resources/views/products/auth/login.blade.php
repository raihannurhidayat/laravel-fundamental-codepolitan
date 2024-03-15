@extends("layouts.app")

@section("title", 'login')

@section("content")
<div class="row">
    <div class="col-md-4"></div>

    <div class="card col-md-4">
        <div class="card-body">
            <div class="text-center mb-3">Login</div>
            <form action="{{ url('loginpage') }}" method="POST" class="form-control">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
