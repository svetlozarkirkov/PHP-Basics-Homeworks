<html>
<head>
    <title>Calculate Interest</title>
</head>
<body>
    <form action="CalculateInterest.php" method="post">
        <label for="input-amount">Enter Amount:</label>
        <input type="text" name="input-amount" /><br>
        <input type="radio" name="currencies" value="usd" checked/>
        <label>USD</label>
        <input type="radio" name="currencies" value="eur" />
        <label>EUR</label>
        <input type="radio" name="currencies" value="bgn" />
        <label>BGN</label><br>
        <label for="compd-interest-amount">Compount Interest Amount</label>
        <input type="text" name="compd-interest-amount" /><br>
        <select name="time-periods">
            <option value="six-months">6 Months</option>
            <option value="one-year">1 Year</option>
            <option value="two-years">2 Years</option>
            <option value="five-years">5 Years</option>
        </select>
        <input type="submit" name="calculate" value="Calculate" />
    </form>

    <?php
        if ($_POST) {
            $initialAmount = floatval($_POST['input-amount']);
            $compdInterest = floatval($_POST['compd-interest-amount']);
            $totalMonths = 0;
            switch ($_POST['time-periods']) {
                case 'six-months':
                    $totalMonths = 6;
                    break;
                case 'one-year':
                    $totalMonths = 12;
                    break;
                case 'two-years':
                    $totalMonths = 24;
                    break;
                case 'five-years':
                    $totalMonths = 60;
                default:
                    echo 'Error';
                    break;
            }
            $interestPerMonth = $compdInterest / 12;
            $finalAmount = $initialAmount;
            for ($i = 0; $i < $totalMonths; $i++) {
                $finalAmount += $finalAmount * ($interestPerMonth / 100);
            }
            $currSel = $_POST['currencies'];
            $currSym = '';
            switch ($currSel) {
                case 'usd':
                    $currSym = '&#36;';
                    break;
                case 'eur':
                    $currSym = '&#128;';
                    break;
                case 'bgn':
                    $currSym = 'BGN';
                    break;
                default:
                    echo 'Error';
                    break;
            }
            echo '<br>' . $currSym . ' ' . number_format(round($finalAmount, 2), 2, '.', '');
        }
    ?>
</body>
</html>