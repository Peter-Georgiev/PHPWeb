<?php $isSubmit = false;?>
<!DOCTYPE html>
<style>
    .name, .age {
        border: 1px solid black;
        margin: 0px 0px 2px 0px;
        width: 180px;
    }
    .submit {
        width: auto;
    }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit</title>
</head>
<body>
<form method="get">
    <input type="text" class="name" name="name" placeholder="Name" /><br>
    <input type="text" class="age" name="age" placeholder="Age" /><br>
    <input type="radio" name="gender" value="Male" /> Male<br>
    <input type="radio" name="gender" value="Female" /> Female<br>
    <input type="submit" name="sbm" class="submit" />
</form>
<div>
    <?= $isSubmit ? $messages : ''?>
</div>
</body>
</html>
<?php
if (isset($_GET['sbm']) && isset($_GET['gender'])) {
    $isSubmit = true;
    $name = $_GET['name'];
    $age = $_GET['age'];
    $gender = $_GET['gender'];
    $messages = "My name is $name. I am $age. I am $gender.";
    echo $messages;
}