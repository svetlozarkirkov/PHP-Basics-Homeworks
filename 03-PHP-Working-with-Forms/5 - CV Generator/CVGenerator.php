<html>
<head>
    <title>CV Generator</title>
    <style>
        table, table tr, table td, table th {
            border: 1px solid black;
        }
    </style>
</head>
<body onload="addProgLang();addSpokenLang();">
    <script>
        var progLangsIdCounter = 0;
        var spokenLangsIdCounter = 0;
        function addProgLang() {
            progLangsIdCounter++;
            var defaultProgLang = document.createElement("div");
            defaultProgLang.setAttribute("id", "progLang" + progLangsIdCounter);
            defaultProgLang.innerHTML =
                "<input type='text' name='progLangs[]' />" +
                "<select name='progLangLevel'>" +
                "<option value='beginnerProg'>Beginner</option>" +
                "<option value='intermediateProg'>Intermediate</option>" +
                "<option value='advancedProg'>Advanced</option>" +
                "</select>"
            document.getElementById("progLangsInputs").appendChild(defaultProgLang);
        }
        function removeProgLang() {
            var parent = document.getElementById("progLangsInputs");
            if (parent.childNodes.length > 2) {
                var lastIndex = parent.childNodes.length-1;
                parent.removeChild(parent.childNodes[lastIndex]);
                progLangsIdCounter--;
            }
        }
        function addSpokenLang() {
            spokenLangsIdCounter++;
            var defaultSpokenLang = document.createElement("div");
            defaultSpokenLang.setAttribute("id", "spokenLang" + spokenLangsIdCounter);
            defaultSpokenLang.innerHTML =
                "<input type='text' name='spokenLangs[]' />" +
                "<select name='spokenLangComprehension'>" +
                "<option selected disabled>-Comprehension-</option>" +
                "<option value='beginnerCompr'>Beginner</option>" +
                "<option value='intermediateCompr'>Intermediate</option>" +
                "<option value='advancedCompr'>Advanced</option></select>" +
                "<select name='spokenLangReading'>" +
                "<option selected disabled>-Reading-</option>" +
                "<option value='beginnerReading'>Beginner</option>" +
                "<option value='intermediateReading'>Intermediate</option>" +
                "<option value='advancedReading'>Advanced</option></select>" +
                "<select name='spokenLangWriting'>" +
                "<option selected disabled>-Writing-</option>" +
                "<option value='beginnerWriting'>Beginner</option>" +
                "<option value='intermediateWriting'>Intermediate</option>" +
                "<option value='advancedWriting'>Advanced</option></select>";
            document.getElementById("langInputs").appendChild(defaultSpokenLang);
        }
        function removeSpokenLang() {
            var spokenLangParent = document.getElementById("langInputs");
            if (spokenLangParent.childNodes.length > 2) {
                var lastIndex = spokenLangParent.childNodes.length-1;
                spokenLangParent.removeChild(spokenLangParent.childNodes[lastIndex]);
                spokenLangsIdCounter--;
            }
        }
    </script>
    <form style="width:50%;" method="post" action="CVGenerator.php">
        <fieldset>
            <legend>Personal Information</legend>
            <input type="text" name="first-name" placeholder="First Name" /> <br>
            <input type="text" name="last-name" placeholder="Last Name" /> <br>
            <input type="email" name="email" placeholder="Email" /> <br>
            <input type="tel" name="telephone" placeholder="Phone Number" /> <br>
            Female <input type="radio" name="sex" value="female" />
            Male <input type="radio" name="sex" value="male" /> <br>
            Birth Date <br>
            <input type="date" name="birth-date" /> <br>
            Nationality <br>
            <select name="nationality">
                <option value="bulgarian">Bulgarian</option>
                <option value="french">French</option>
                <option value="german">German</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Last Work Position</legend>
            Company Name <input type="text" name="company-name" /> <br>
            From <input type="date" name="from-date" /> <br>
            To <input type="date" name="to-date" /> <br>
        </fieldset>
        <fieldset>
            <legend>Computer Skills</legend>
            Programming Languages <br>
            <div id="progLangsInputs">
            <!-- placeholder -->
            </div>
            <input type="button" name="eraseProgLang" value="Remove Language" onclick="removeProgLang()"/>
            <input type="button" name="insertProgLang" value="Add Language" onclick="addProgLang()" />
        </fieldset>
        <fieldset>
            <legend>Other Skills</legend>
            Languages <br>
            <div id="langInputs">
            <!-- placeholder -->
            </div>
            <input type="button" name="removeLang" value="Remove Language" onclick="removeSpokenLang()" />
            <input type="button" name="addLang" value="Add Language" onclick="addSpokenLang()" />
            <br> Driver's License <br>
            B <input type="checkbox" name="driver-license" value="B"/>
            A <input type="checkbox" name="driver-license" value="A"/>
            C <input type="checkbox" name="driver-license" value="C"/>
        </fieldset>
        <input type="submit" name="generateCV" value="Generate CV"/>
    </form>
    <?php
        $allValid = false;
        $validationErr = "Something is wrong! Make sure that you follow the instructions below:" . "<br>" .
                        "First Name & Last Name - use only letters, the length must be between 2 and 20 characters" .
                        "<br>" . "Company Name - use only letters and numbers,
                        length must be between 2 and 20 characters" . "<br>" .
                        "Phone number - use numbers, + , - , and spaces" . "<br>" .
                        "Email - use valid email, for example: someone@somesite.com";
        function normalize($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        function personalCheck($firstName, $lastName) {
            if (!preg_match('/^[a-zA-Z ]*$/', $firstName) || (!preg_match('/^[a-zA-Z ]*$/', $lastName)) ||
                strlen($firstName) < 2 || strlen($firstName) > 20 || strlen($lastName) < 2 ||
                strlen($lastName > 20)) {
                return false;
            } else {
                return true;
            }
        }
        function companyCheck($companyName) {
            if (!preg_match('/^[a-zA-Z0-9 ]*$/', $companyName) || strlen($companyName) < 2 ||
                strlen($companyName) > 20) {
                return false;
            } else {
                return true;
            }
        }
        function phoneCheck($phoneNumber) {
            if (!preg_match('/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i',
                $phoneNumber)) {
                return false;
            } else {
                return true;
            }
        }
        function emailCheck($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            } else {
                return true;
            }
        }
        function drawCV() {
            $progLangsSize = sizeof($_POST['progLangs']);
            echo '<table cellspacing="2px" cellpadding="2px"><thead><tr><th colspan="2">
                    Personal Information</th></tr></thead>
                    <tbody><tr><td>First Name</td><td>' . $_POST['first-name'] . '</td></tr>
                    <tr><td>Last Name</td><td>' . $_POST['last-name'] . '</td></tr>
                    <tr><td>Email</td><td>' . $_POST['email'] . '</td></tr>
                    <tr><td>Phone Number</td><td>' . $_POST['telephone'] . '</td></tr>
                    <tr><td>Gender</td><td>' . $_POST['sex'] . '</td></tr>
                    <tr><td>Birth Date</td><td>' . $_POST['birth-date'] . '</td></tr>
                    <tr><td>Nationality</td><td>' . $_POST['nationality'] . '</td></tr></tbody></table><br>
                    <table cellspacing="2px" cellpadding="2px"><thead><tr><th colspan="2">
                    Last Work Position</th></tr></thead><tbody>
                    <tr><td>Company Name</td><td>' . $_POST['company-name'] . '</td></tr>
                    <tr><td>From</td><td>' . $_POST['from-date'] . '</td></tr>
                    <tr><td>To</td><td>' . $_POST['to-date'] . '</td></tr></tbody></table><br>
                    <table cellspacing="2px" cellpadding="2px"><thead><tr><th colspan="3">
                    Computer Skills</th></tr></thead><tbody><tr><td rowspan="' . $progLangsSize . '">
                    Programming Languages</td></tr></tbody></table>';
        }
        if ($_POST) {
            $firstName = normalize($_POST['first-name']);
            $lastName = normalize($_POST['last-name']);
            $companyName = normalize($_POST['company-name']);
            $phoneNumber = normalize($_POST['telephone']);
            $email = normalize($_POST['email']);

            if (personalCheck($firstName, $lastName) && companyCheck($companyName) && emailCheck($email)) {
                    echo "All is valid!";
                    drawCV();
                } else {
                echo $validationErr;
            }
        }
    ?>
</body>
</html>