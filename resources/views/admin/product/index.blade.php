<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   @extends('layout.admin')
    @section('content')
    <table class="table table-bordered table-striped">
        <a href="{{ url('products/add/') }}">Add</a>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ( $products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>{{ $product['stock'] }}</td>
            <td>
                <a href="{{ url('products/edit/'.$product['id']) }}">Edit</a>
            </td>
            <td>
                <form action="{{ url('/products/delete/'.$product['id']) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        
        @endforeach
    </table>
@endsection 
</body>
</html>
