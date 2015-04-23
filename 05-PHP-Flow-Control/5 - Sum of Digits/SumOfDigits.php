<html>
<head>
    <title>Sum of Digits</title>
    <style>
        fieldset {
            border: none;
        }
        table, table * {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="SumOfDigits.php" method="post">
        <fieldset>
            Input String:
            <input type="text" name="input" />
            <input type="submit" name="submit" />
        </fieldset>
    </form>
    <?php
        if ($_POST) {
            $inputArr = explode(", ", $_POST['input']);
            if (array_filter($inputArr)) {
                echo "<table><tbody>";
                for ($i = 0; $i < count($inputArr); $i++) {
                    echo "<tr>";
                    if (intval($inputArr[$i])) {
                        if (is_numeric($inputArr[$i])) {
                            $sumDigits = array_sum(str_split($inputArr[$i]));
                            echo "<td>$inputArr[$i]</td><td>$sumDigits</td>";
                        } else {
                            echo "<td>$inputArr[$i]</td><td>I cannot sum that</td>";
                        }
                    } else {
                        echo "<td>$inputArr[$i]</td><td>I cannot sum that</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "Invalid data!";
            }
        } else {
            echo "Use comma and space to split individual numbers!";
        }
    ?>
</body>
</html>