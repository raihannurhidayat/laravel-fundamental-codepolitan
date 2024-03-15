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
        <h1 class="my-4">Detail Product</h1>
        <div class="card">
            <h5 class="card-header"> {{ $product->name }} </h5>
            <div class="card-body">
                <h5 class="card-title">Harga : Rp.{{ $product->price }}</h5>
                <small>{{$product->updated_at}}</small>
                <p class="card-text">{{ $product->description }}</p>
                <a href="{{ url("products") }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</body>

</html>
