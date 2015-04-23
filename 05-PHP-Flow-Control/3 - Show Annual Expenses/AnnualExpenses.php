<html>
<head>
    <title>Show Annual Expenses</title>
    <style>
        table, table * {
            border: 1px solid black;
            padding: 2px;
        }
        fieldset {
            border: none;
        }
    </style>
</head>
<body>
    <form method="post" action="AnnualExpenses.php">
        <fieldset>
            Enter number of years:
            <input type="text" name="years" />
            <input type="submit" name="submit" value="Show Costs" />
        </fieldset>
    </form>
    <?php
        if ($_POST && $_POST['years']) {
            $years = intval($_POST['years']);
            $currYear = intval(date("Y"));
            echo "<table><thead><tr><th>Year</th>";
            for ($m = 1; $m <= 12; $m++) {
                $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                echo "<th>$month</th>";
            }
            echo "<th>Total:</th></thead><tbody>";
            for ($year = 0; $year < $years; $year++) {
                $currYearTotal = 0;
                echo "<tr><td>$currYear</td>";
                for ($month = 0; $month < 12; $month++) {
                    $getRandExpense = rand(0,999);
                    $currYearTotal += $getRandExpense;
                    echo "<td>$getRandExpense</td>";
                }
                echo "<td>$currYearTotal</td>";
                $currYear--;
            }
        } else {
            echo "Empty data!";
        }
    ?>
</body>
</html>