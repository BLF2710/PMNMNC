<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layout.admin')
    @section('content')
    <h1>Add New Product</h1>
    <form action="/products/store" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br>
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock"><br><br>
        <button type="submit">Add Product</button>
    </form>
    @endsection
</body>
</html>