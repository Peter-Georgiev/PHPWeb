<?php /** @var \App\Data\UserDTO $data */ ?>

<h1> Your profile </h1>
<form method="POST">
    <div>
        <label>
            Username:
            <input type="text" value="<?= $data->getUsername(); ?>" name="username"/>
        </label>
    </div>
    <div>
        <label>
            Password:
            <input type="text" name="password"/>
        </label>
    </div>
    <div>
        <label>
            First Name:
            <input type="text" value="<?= $data->getFirstName(); ?>" name="firstName"/>
        </label>
    </div>
    <div>
        <label>
            Last Name:
            <input type="text" value="<?= $data->getLastName(); ?>" name="lastName"/>
        </label>
    </div>
    <div>
        <label>
            Birthday:
            <input type="text" value="<?= $data->getBornOn(); ?>" name="bornOn"/>
        </label>
    </div>
    <div>
        <input type="submit" name="edit" value="Edit Profile!"/>
    </div>
    <?php ?>
</form>
View all emails per profile: <a href="one_user_per_mail.php">view</a> .
<br/>
Edit email address <a href="add_email.php">ADD</a>.
<br/>
You can <a href="logout.php">logout</a> or see <a href="all.php">all users</a>, <a href="all_user_per_mail.php">all emails per user</a> .