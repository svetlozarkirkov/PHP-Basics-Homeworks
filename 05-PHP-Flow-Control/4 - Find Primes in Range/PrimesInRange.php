<html>
<head>
    <title>Find Primes in Range</title>
    <style>
        fieldset {
            border: none;
        }
    </style>
</head>
<body>
    <form method="post" action="PrimesInRange.php">
        <fieldset>
            Starting index:
            <input type="text" name="start-index" />
            End:
            <input type="text" name="end-index" />
            <input type="submit" name="submit" />
        </fieldset>
    </form>
    <?php
        function isPrime($num) {
            if($num == 1)
                return false;

            if($num == 2)
                return true;

            if($num % 2 == 0) {
                return false;
            }
            for($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
                if($num % $i == 0)
                    return false;
            }
            return true;
        }
        if ($_POST) {
            $start = intval($_POST['start-index']);
            $end = intval($_POST['end-index']);
            if ($start < $end) {
                for ($i = $start; $i <= $end; $i++) {
                    if (isPrime($i)) {
                        echo "<b>$i</b>";
                    } else {
                        echo $i;
                    }
                    if ($i < $end) {
                        echo ", ";
                    }
                }
            } else {
                echo "Invalid data!";
            }
        }
    ?>
</body>
</html>