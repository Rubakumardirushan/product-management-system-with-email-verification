<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/deletecss.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="text-center mb-4">Delete Products</h1>
    <table>
        <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{$product->price}}/=</td>
                    <td>
                        <form  method="POST" action="{{route('products.destroy',$product->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="text-center mt-3">
        <a href="{{ route('products.show') }}" class="btn btn-primary">View Page</a>
    </div>
</div>

</body>
</html>
