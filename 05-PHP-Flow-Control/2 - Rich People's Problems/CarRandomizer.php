<html>
<head>
    <title>Rich People's Problems</title>
    <style>
        fieldset {
            border: none;
        }
        table, table * {
            border: 1px solid black;
            padding: 2px;
        }
    </style>
</head>
<body>
    <form method="post" action="CarRandomizer.php">
        <fieldset>
            Enter cars:
            <input type="text" name="cars" />
            <input type="submit" name="submit" value="Show Result" />
        </fieldset>
    </form>
    <?php
        $cars = explode(", ", @$_POST['cars']);
        $colors = ["green", "yellow", "blue", "red", "black", "white", "orange", "beige"];
        if ($_POST && array_filter($cars)) {
            echo "<table><thead><th>Car</th><th>Color</th><th>Count</th></thead><tbody>";
            for ($entry = 0; $entry < sizeof($cars); $entry++) {
                $randomQuantity = rand(1,5);
                $randomColor = $colors[rand(0, count($colors) - 1)];
                echo "<tr><td>$cars[$entry]</td><td>$randomColor</td><td>$randomQuantity</td>";
            }
            echo "</tbody></table>";
        } else if ($_POST && !array_filter($cars)) {
            echo "Empty data!";
        } else {
            echo "No data!";
        }
    ?>
</body>
</html>