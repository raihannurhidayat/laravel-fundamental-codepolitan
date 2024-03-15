<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="bootstrap-5/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h1 class="my-4">List Products</h1>
        <a href="{{ url('products/add') }}" class="btn btn-primary mb-4">Add Product</a>
        <div class="d-flex flex-wrap gap-4">
            @foreach ($products as $product)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rp.{{ $product->price }} </h6>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="{{ url("products/$product->id") }}" class="btn btn-warning">Details</a>
                        <a href="{{ url("products/edit/$product->id") }}" class="btn btn-success">Update</a>
                        <form action="{{ url("products/$product->id") }}" method="POST" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
