<html>
<head>
    <title>Text Filter</title>
    <style>
        body * {
            font-family: calibri, helvetica, arial;
            font-size: 14px;
        }
        fieldset {
            border: none;
        }
        textarea {
            height: 200px;
            width: 400px;
            margin-bottom: 20px;
        }
        input[type="text"] {
            margin-bottom: 20px;
            width: 400px;
        }
    </style>
</head>
<body>
    <form action="TextFilter.php" method="post">
        <fieldset>
            <textarea name="input-text"
                placeholder="Insert the text which will be processed here..."></textarea><br>
            <input type="text" name="banlist" placeholder="Insert banned words here..." /><br>
            <input type="submit" name="submit" value="Process" />
        </fieldset>
    </form>
    <?php
        if ($_POST) {
            $inputTxt = $_POST['input-text'];
            $banlist = explode(', ', $_POST['banlist']);
            echo "<br>";
            foreach ($banlist as $banword) {
                $censored = str_repeat('*', strlen($banword));
                $inputTxt = str_replace($banword, $censored, $inputTxt);
            }
            echo $inputTxt;
        }
    ?>
</body>
</html>