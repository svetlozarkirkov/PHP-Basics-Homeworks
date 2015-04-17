<?php
    session_start();
?>
<html>
<head>
    <title>HTML Tags Counter</title>
</head>
<body>
    <form method="post" action="HTMLTagsCounter.php">
        <label>Enter HTML Tags:</label><br><br>
        <input type="text" name="input" />
        <input type="submit" name="submit" value="Submit" />
    </form>

    <?php
        if ($_POST) {
            $inputStr = $_POST['input'];
            $_SESSION['validTags'][] = $inputStr;
        }
        echo '<br>';
        var_dump($_SESSION);
    ?>
</body>
</html>