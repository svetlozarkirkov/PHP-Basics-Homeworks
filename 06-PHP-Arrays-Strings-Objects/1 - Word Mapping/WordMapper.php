<html>
<head>
    <title>Word Mapping</title>
    <style>
        textarea {
            height: 100px;
            width: 400px;
            margin-bottom: 15px;
            margin-top: 10px;
        }
        textarea:active, textarea:focus {
            box-shadow: 0 0 15px black;
        }
        fieldset {
            border: none;
        }
        table, table * {
            border: 1px solid black;
        }
        table td {
            padding-left: 10px;
            padding-right: 10px;
        }
        input[type="submit"] {
            height: 30px;
            border: 1px solid black;
            background-color: white;
            color: black;
            box-shadow: 0 0 2px black;
        }
        input[type="submit"]:hover {
            background-color: black;
            color: white;
            cursor: pointer;
            box-shadow: 0 0 7px black;
        }
    </style>
</head>
<body>
    <form method="post" action="WordMapper.php">
        <fieldset>
            <label for="input-text">Insert text below:</label><br>
            <textarea name="input-text" placeholder="The quick brown fox jumped over the lazy dog..."></textarea><br>
            <input type="submit" name="submit" value="Count Words" />
        </fieldset>
    </form>
    <?php
        if ($_POST) {
            preg_match_all('/\w+/', strtolower($_POST['input-text']), $words);
            $counts = array_count_values($words[0]);
            echo "<table><tbody>";
            foreach ($counts as $word=>$count) {
                echo "<tr><td>$word</td><td>$count</td>";
            }
            echo "</tbody></table>";
        }
    ?>
</body>
</html>