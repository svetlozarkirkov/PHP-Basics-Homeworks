<html>
<head>
    <title>Sentence Extractor</title>
    <style>
        fieldset {
            border: none;
        }
        textarea {
            height: 200px;
            width: 400px;
        }
        input[type="text"] {
            width: 400px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form action="SentenceExtractor.php" method="post">
        <fieldset>
            <textarea name="input-text" placeholder="Insert sentences here..."></textarea><br>
            <input type="text" name="word" placeholder="Insert word here..." />
            <input type="submit" name="submit" value="Process" />
        </fieldset>
    </form>
    <?php
        if ($_POST) {
            $sentences = preg_split('/\s*(?<=[.?!])\s+/', $_POST["input-text"], -1, PREG_SPLIT_NO_EMPTY);
            foreach ($sentences as $sentence) {
                $sentence = trim($sentence);
                if (preg_match('/(\s+)' . $_POST["word"] . '\1(.*)[.?!]/', $sentence)) {
                    echo $sentence . "<br/>";
                }
            }
        }
    ?>
</body>
</html>