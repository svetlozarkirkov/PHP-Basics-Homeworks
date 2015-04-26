<html>
<head>
    <title>Sidebar Builder</title>
    <style>
        fieldset {
            border: none;
        }
        input {
            margin-top: 10px;
        }
        input[type="text"] {
            width: 200px;
        }
        div {
            background: #9bb4f7;
            background: url(data:image/svg+xml;base64,
                            PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy
                            8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEg
                            MSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPS
                            JncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIg
                            eDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PS
                            I1MCUiIHN0b3AtY29sb3I9IiM5YmI0ZjciIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0
                            b3Agb2Zmc2V0PSI1MSUiIHN0b3AtY29sb3I9IiM5ZmI2ZWYiIHN0b3Atb3BhY2l0eT0iMS
                            IvPgogICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjNjc4YWVhIiBzdG9w
                            LW9wYWNpdHk9IjEiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9Ij
                            AiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRl
                            ZCkiIC8+Cjwvc3ZnPg==);
            background: -moz-linear-gradient(top, #9bb4f7 50%, #9fb6ef 51%, #678aea 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(50%,#9bb4f7),
                        color-stop(51%,#9fb6ef), color-stop(100%,#678aea));
            background: -webkit-linear-gradient(top, #9bb4f7 50%,#9fb6ef 51%,#678aea 100%);
            background: -o-linear-gradient(top, #9bb4f7 50%,#9fb6ef 51%,#678aea 100%);
            background: -ms-linear-gradient(top, #9bb4f7 50%,#9fb6ef 51%,#678aea 100%);
            background: linear-gradient(to bottom, #9bb4f7 50%,#9fb6ef 51%,#678aea 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#9bb4f7',
                        endColorstr='#678aea',GradientType=0 );
            width: 150px;
            border-radius: 15px;
            box-shadow: 0 0 8px black;
            font-family: calibri, helvetica, arial;
        }
        h2 {
            margin-bottom: 2px;
            width: 90%;
            margin-left: auto;
            margin-right: 0;
            padding-top: 20px;
            font-size: 20px;
        }
        hr {
            width: 90%;
            margin-left: auto;
            margin-right: 0;
            height: 1px;
            background-color: black;
            border: none;
            margin-top: 0;
        }
        ul {
            padding-bottom: 20px;
        }
        li {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="SidebarBuilder.php" method="post">
        <fieldset>
            Categories: <input type="text" name="categories" /><br>
            Tags: <input type="text" name="tags" /><br>
            Months: <input type="text" name="months" /><br>
            <input type="submit" name="submit" value="Generate" />
        </fieldset>
    </form>
    <?php
        function drawSidebar($input, $title) {
            echo "<div><h2>$title</h2><hr><ul type='circle'>";
            foreach ($input as $value) {
                echo "<li>$value</li>";
            }
            echo "</ul></div>";
        }
        if ($_POST) {
            $categories = explode(', ', $_POST['categories']);
            $tags = explode(', ', $_POST['tags']);
            $months = explode(', ', $_POST['months']);
            drawSidebar($categories, 'Categories');
            drawSidebar($tags, 'Tags');
            drawSidebar($months, 'Months');
        }
    ?>
</body>
</html>