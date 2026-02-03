<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="/products/{{ $product->id }}" method="post">
        @method ('PUT')
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value = {{ $product->name }}>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value = {{ $product->price }}><br>
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" value = {{ $product->stock }}><br><br>
        <button type="submit" value="Update Product">Add Product</button>
    </form>
</body>
</html>