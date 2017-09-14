<?php

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola",
    "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia",
    "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
    "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana",
    "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria",
    "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands",
    "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands",
    "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica",
    "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti",
    "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
    "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland",
    "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories",
    "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada",
    "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti",
    "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary",
    "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy",
    "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of",
    "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon",
    "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau",
    "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta",
    "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of",
    "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru",
    "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria",
    "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama",
    "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar",
    "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia",
    "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal",
    "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands",
    "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka",
    "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland",
    "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan",
    "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey",
    "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom",
    "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam",
    "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen",
    "Yugoslavia", "Zambia", "Zimbabwe");
$_skillLevel = array("Beginner", "Programmer", "Ninja");
$_skillComputerInputField = "<input type='text' name='skillComputerInputField'/>";
$_comprehension = array("intermediate", "advanced");
$_levels = array("beginner", "intermediate", "advanced");
$count = 1;

?>
<!DOCTYPE html>
<style>
    .info {
        width: 400px;
        height: 200px;
        border: 1px solid black;
    }
    .workPosition {
        width: 400px;
        height: 88px;
        border: 1px solid black;
    }
    .computerSkills {
        width: 400px;
        height: auto;
        border: 1px solid black;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV Generator</title>
</head>
<body>
<div>
    <fieldset class="info">
        <legend>Personal Information</legend>
        <form>
            <input type="text" name="firstName" placeholder="First Name" /><br/>
            <input type="text" name="lastName" placeholder="Last Name" /><br/>
            <input type="text" name="email" placeholder="Email" /><br/>
            <input type="text" name="phoneNumber" placeholder="Phone Number" /><br/>
            Femal<input type="radio" name="sex" />
            Male<input type="radio" name="sex" /><br/>
            Birth Date<br/>
            <input type="date" name="date" placeholder="dd/mm/yyyy"/><br/>
            Nationality<br/>
            <select>
                <?php foreach ($countries as $item):?>
                    <?= "<option name=\"$item\">$item</option>";?>
                <?php endforeach;?>
            </select>
        </form>
    </fieldset>
</div>
<div>
    <fieldset class="workPosition">
        <legend>Last Work Position</legend>
        <form>
            Company Name <input type="text" name="company"/><br/>
            From <input type="date" name="fromWork" placeholder="dd/mm/yyyy"/><br/>
            To <input type="date" name="toWork" placeholder="dd/mm/yyyy"/>
        </form>
    </fieldset>
</div>
<div>
    <fieldset class="computerSkills">
        <legend>Computer Skills</legend>
        <form>
            Programming Languages<br/>
            <?php for ($i = 0; $i < conputerSkillCount($count); $i++):?>
            <?= $_skillComputerInputField.'<br/>'?>
            <?php endfor;?>
            <?php var_dump($_GET)?>
            <input type="submit" name="removeComputerSkills" value="Remove Language"/>
            <input id="sub" type="submit" name="addConputerSkills" value="Add Language" onclick="insert()" />
        </form>
    </fieldset>
</div>
</body>
</html>
<?php

function conputerSkillCount($count) {
    $_GET['addConputerSkills']='dasd';
    if (isset($_GET['removeComputerSkills'])) {
        if ($count > 1){
            $count--;
        }
    } elseif (isset($_GET['addConputerSkills'])){
        $count++;
    }

    return $count;
}