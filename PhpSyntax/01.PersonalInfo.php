<body>
<form method="get">
    First name: <input type="text" name="firstname"  value="FirstName"/><br>
    Last name: <input type="text" name="lastname" value="LastName"/><br>
    Age: <input type="number" name="age"/><br>
    <input type="submit" name="sbm" />
</form>

</body>
<?php

$fullName = '';
$age = 15;

if (isset($_GET['sbm'])) {
    $firstNane = $_GET['firstname'];
    $lastName = $_GET['lastname'];
    $age = intval($_GET['age']);
    if ($firstNane != 'FirstName' && $lastName != 'LastName') {
        $fullName = $firstNane . ' ' . $lastName;
    }
}

if ($fullName != '' && $age > 0) {
    echo 'My name is ' . $fullName . ' and I am ' . $age . ' year old.';
}

