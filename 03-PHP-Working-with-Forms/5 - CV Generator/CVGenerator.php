<html>
<head>
    <title>CV Generator</title>
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
</body>
</html>