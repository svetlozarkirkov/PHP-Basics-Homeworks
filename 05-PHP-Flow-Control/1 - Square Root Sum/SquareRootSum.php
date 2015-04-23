<html>
<head>
    <title>Square Root Sum</title>
    <style>
        table, table * {
            border: 1px solid black;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <th>Number</th>
            <th>Square</th>
        </thead>
        <tbody>
            <?php
                $totalSum = 0;
                for ($num = 0; $num <= 100; $num += 2) {
                    $currNumSqrt = round(sqrt($num), 2);
                    $totalSum += $currNumSqrt;
                    echo "<tr><td>$num</td><td>$currNumSqrt</td></tr>";
                }
                echo "<tr><th>Total:</th><td>$totalSum</td>"
            ?>
        </tbody>
    </table>
</body>
</html>
