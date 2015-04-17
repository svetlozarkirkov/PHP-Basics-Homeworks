<html>
<head>
    <title>Print Tags</title>
</head>
<body>
    <form action="PrintTags.php" method="post">
        <label for="input-field">Enter Tags:<br></label>
        <input type="text" name="input-field" style="margin-top:20px;" />
        <input type="submit" name="submit-query" />
    </form>

    <?php
        if($_POST) {
            $tagsArr = explode(', ', $_POST['input-field']);
            foreach ($tagsArr as $index => $tag) {
                echo $index . ' : ' . $tag . '<br>';
            }
        }
    ?>
</body>
</html>