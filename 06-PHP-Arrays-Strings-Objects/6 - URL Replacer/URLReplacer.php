<html>
<head>
    <title>URL Replacer</title>
    <style>
        fieldset {
            border: none;
        }
        textarea {
            height: 150px;
            width: 400px;
            margin-bottom: 10px;
        }
        div {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
            width: 90%;
        }
        div p {
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="URLReplacer.php" method="post">
        <fieldset>
            <textarea name="input-text" placeholder="Insert text here..."></textarea><br>
            <input type="submit" name="submit" value="Process" />
        </fieldset>
    </form>
    <?php
        if ($_POST) {
            echo "<div>" . preg_replace('/<a href=\\"([^\\"]*)\\">(.*)<\/a>/iU', '[URL=$1]$2[/URL]',
                    $_POST['input-text']) . "</div>";
        }
    ?>
</body>
</html>