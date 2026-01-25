<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <form action="/product/registerRequest" method="POST">
        @csrf

        <div>
            <label>Username:</label><br>
            <input type="text" name="username" required>
        </div>

        <br>

        <div>
            <label>Password:</label><br>
            <input type="password" name="password" required>
        </div>

        <br>

        <div>
            <label>Confirm Password:</label><br>
            <input type="password" name="password_confirmation" required>
        </div>

        <br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
