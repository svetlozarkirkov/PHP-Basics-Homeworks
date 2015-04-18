<?php
    session_start();
    if (!isset($_SESSION['counter'])) {
        $_SESSION['counter'] = 0;
    }
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
        $validTags = ['head', 'title', 'body', 'table', 'div', 'p', 'span', 'video', 'a']; // only portion of the tags included
        if ($_POST) {
            if (in_array($_POST['input'],$validTags)) {
                $_SESSION['counter']++;
                echo '<span style="font-size:24px;font-weight: bold;">
                        Valid HTML tag! <br> Score: ' . $_SESSION['counter'] . '</span><br>';
            } else {
                echo '<span style="font-size:24px;font-weight: bold;">
                        Invalid HTML tag! <br> Score: ' . $_SESSION['counter'] . '</span><br>';
            }
        }
    ?>
</body>
</html>