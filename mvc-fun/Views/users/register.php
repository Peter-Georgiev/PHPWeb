<?php /** @var \Core\View\ViewInterface $this */ ?>
<h1> --REGISTER-- </h1>
<form method="post" action="<?= $this->url('users', 'registerProcess');?>">
    <div>
        <label>
            Username:
            <input type="text" name="username"/>
        </label>
    </div>
    <div>
        <label>
            Password:
            <input type="password" name="password"/>
        </label>
    </div>
    <div>
        <label>
            Confirm password:
            <input type="password" name="confirmPassword"/>
        </label>
    </div>
    <div>
        <input type="submit" name="register" value="Register!" />
    </div>
</form>
