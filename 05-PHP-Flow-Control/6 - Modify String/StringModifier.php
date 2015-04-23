<html>
<head>
    <title>Modify String</title>
    <style>
        fieldset {
            border: none;
        }
    </style>
</head>
<body>
    <form action="StringModifier.php" method="post">
        <fieldset>
            <input type="text" name="input" />
            <input type="radio" name="method-select" value="palindrome" checked />
            Check Palindrome
            <input type="radio" name="method-select" value="reverse" />
            Reverse String
            <input type="radio" name="method-select" value="split" />
            Split
            <input type="radio" name="method-select" value="hash" />
            Hash String
            <input type="radio" name="method-select" value="shuffle" />
            Shuffle String
            <input type="submit" name="submit" />
        </fieldset>
    </form>
    <?php
        function isPalindrome($string) {
            $temp = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $string));
            return $temp == strrev($temp);
        }
        if ($_POST) {
            $method = $_POST['method-select'];
            $inputStr = $_POST['input'];
            if ($inputStr) {
                switch ($method) {
                    case 'palindrome':
                        if (isPalindrome($inputStr)) {
                            echo "$inputStr is a palindrome!";
                        } else {
                            echo "$inputStr is not a palindrome!";
                        }
                    break;
                    case 'reverse':
                        $reversed = strrev($inputStr);
                        echo $reversed;
                        break;
                    case 'split':
                        for ($i = 0; $i < strlen($inputStr); $i++) {
                            echo $inputStr[$i] . " ";
                        }
                        break;
                    case 'hash':
                        $salt = password_hash($inputStr, PASSWORD_BCRYPT);
                        echo crypt($inputStr, $salt);
                        break;
                    case 'shuffle':
                        echo str_shuffle($inputStr);
                        break;
                    default :
                        echo "Something went wrong!";
                        break;
                }
            } else {
                echo "Empty data!";
            }
        }
    ?>
</body>
</html>