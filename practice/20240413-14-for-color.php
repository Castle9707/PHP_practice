<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>

    <table>
        <?php for ($i = 0; $i < 16; $i++): ?>
            <tr>
                <td style="background-color: #<?= sprintf('%X', $i) ?>00"></td>
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>