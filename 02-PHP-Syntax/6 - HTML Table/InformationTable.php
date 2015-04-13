<html>
<head>
    <title>Information Table</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php
        $info = array(
                    "Name"=>"Gosho",
                    "Phone number"=>"0882-321-423",
                    "Age"=>"24",
                    "Address"=>"Hadji Dimitar"
        );
        echo '<table cellspacing="0"><tbody>';
        foreach($info as $x => $x_value) {
            echo '<tr><th>' . $x . '</th><td>' . $x_value . '</td></tr>';
        }
        echo '</tbody>';
    ?>
</head>
<body>
</body>
</html>