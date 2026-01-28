<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Age</h1>
    <form action="/product/checkAge" method="POST">
    @csrf
    <label for="age">Nhập tuổi:</label>
    <input type="text" id="age" name="age" required><br><br>
    <input type="submit" value="Xác nhận tuổi">
    </form>
</body>
</html>