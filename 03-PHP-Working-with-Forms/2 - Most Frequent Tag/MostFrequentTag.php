<html>
<head>
    <title>Most Frequent Tag</title>
</head>
<body>
    <form action="MostFrequentTag.php" method="post">
        <label for="input-field">Enter Tags:<br></label>
        <input type="text" name="input-field" style="margin-top:20px;" />
        <input type="submit" name="submit-query" />
    </form>

    <?php
        if($_POST) {
            $freqArr = array_count_values(explode(', ', $_POST['input-field']));
            arsort($freqArr);
            foreach ($freqArr as $tag => $freq) {
                echo $tag . ' : ' . $freq . ' times<br>';
            }
            echo '<br> Most Frequent Tag is: ' . array_keys($freqArr)[0];
        }
    ?>
</body>
</html>