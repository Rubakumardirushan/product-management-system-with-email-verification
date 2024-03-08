<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/creatcss.css') }}" rel="stylesheet">
    <title>View All Products</title>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-md-6 text-center">
                <h1>View All Products</h1>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products.create') }}" class="btn btn-success btn-create">Create Product</a>
                    <a href="{{ route('products.delete') }}" class="btn btn-danger btn-delete">Delete Products</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img  src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h6 class="card-title">Name: {{ $product->name }}</h6>
                            <p class="card-text">Description:  {{ $product->description }}</p>
                            <p class="card-text">Price: {{ $product->price }}/=</p>
                            <a href="{{ route('products.updateview', $product->id) }}" class="btn btn-primary">Update</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
