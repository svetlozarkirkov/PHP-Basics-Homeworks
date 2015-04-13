<html>
<head>
    <title>Get Form Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <input type="text" name="name" placeholder="Name..."><br>
            <input type="text" name="age" placeholder="Age..."><br>
            <input type="radio" name="sex" value="male" checked>Male<br>
            <input type="radio" name="sex" value="female">Female<br>
            <input type="submit" name="submit"><br>
        </fieldset>
    </form>
    <?php
        if($_POST) {
            echo 'My name is ' . $_POST['name'] . ".\n";
            echo 'I am ' . (int)$_POST['age'] . ' years old. I am ' . htmlspecialchars($_POST['sex']) . ".";
        }
    ?>
</body>
</html>