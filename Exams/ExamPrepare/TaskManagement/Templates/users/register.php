<?php /** @var \TaskManagement\DTO\UserDTO $data */ ?>
<?php foreach ($errors as $error): ?>
    <p style="color:red"><?=$error;?></p>
<?php endforeach; ?>
<form method="POST">
    Username: <input value="<?= $data != null ? $data->getUsername() : "" ; ?>" type="text" name="username"/><br/>
    Password: <input value="<?= $data != null ? $data->getPassword() : "" ; ?>" type="password" name="password"/><br/>
    Confirm Password: <input type="password" name="confirm_password"/><br/>
    First Name: <input value="<?= $data != null ? $data->getFirstName() : "" ; ?>" type="text" name="first_name"/><br/>
    Last Name: <input value="<?= $data != null ? $data->getLastName() : "" ; ?>" type="text" name="last_name"/><br/>
    <input type="submit" name="register" value="Register!"/>
</form>