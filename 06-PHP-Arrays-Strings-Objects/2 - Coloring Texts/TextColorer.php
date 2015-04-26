<html>
<head>
    <title>Coloring Texts</title>
    <style>
        fieldset {
            border: none;
        }
        textarea {
            height: 150px;
            width: 400px;
            margin-bottom: 20px;
        }
        div {
            margin-left: 10px;
            width: 400px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <form action="TextColorer.php" method="post">
        <fieldset>
            <textarea name="input-text" placeholder="What a wonderful world!"></textarea><br>
            <input type="submit" name="submit" value="Color text" />
        </fieldset>
    </form>
    <?php
        if ($_POST) {
            $inputStr = $_POST['input-text'];
            $stringLen = strlen($inputStr);
            echo "<div>";
            for($i = 0; $i < $stringLen; $i++) {
                $currChar = substr($inputStr, $i, 1 );
                if ($currChar != ' ') {
                    if (ord($currChar) % 2 === 0) {
                        echo "<span style=\"color:red;\">$currChar </span>";
                    } else {
                        echo "<span style=\"color:blue;\">$currChar </span>";
                    }
                }
            }
            echo "</div>";
        }
    ?>
</body>
</html>