<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>1</td>
                    <td>apple</td>
                    <td>1.00$</td>
                </tr>
                                <tr>
                    <td>2</td>
                    <td>orange</td>
                    <td>2.00$</td>
                </tr>
                                <tr>
                    <td>3</td>
                    <td>3nana</td>
                    <td>3.00$</td>
                </tr>
                                </tr>
                                <tr>
                    <td>4</td>
                    <td>watermelon</td>
                    <td>10.00$</td>
                </tr>
        </tbody>
    </table>
        <a href="{{ route('add') }}">Add New Product</a>
</body>
</html>