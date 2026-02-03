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
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        @foreach ( $products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['price'] }}</td>
            <td>{{ $product['stock'] }}</td>
        </tr>
        
        @endforeach
    </table>
@endsection 
</body>
</html>
