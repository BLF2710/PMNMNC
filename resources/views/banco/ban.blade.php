<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .chessboard {
        border-collapse: collapse;
        margin: 20px;
    }
    .chessboard td {
        width: 50px;
        height: 50px;
        border: 1px solid #000;
    }
    .black {
        background-color: #000;
    }
    .white {
        background-color: #fff;
    }
</style>

<body>
    <table class="chessboard">
    @for ($i = 0; $i < $n; $i++)
        <tr>
            @for ($j = 0; $j < $n; $j++)
                <td class="{{ ($i + $j) % 2 == 0 ? 'white' : 'black' }}"></td>
            @endfor
        </tr>
    @endfor
</table>
</body>
</html>