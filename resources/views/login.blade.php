<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <form action="/product/checkLogin" method="POST">
        @csrf

        <div>
            <label>Username:</label><br>
            <input type="text" name="username" required>
        </div>

        <br>

        <div>
            <label>Password:</label><br>
            <input type="password" name="pass" required>
        </div>

        <br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
