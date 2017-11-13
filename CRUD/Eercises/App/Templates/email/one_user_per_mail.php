<h1> View all emails per profile </h1>
<form method="post">
<table border="1">
    <thead>
    <tr>
        <?php /** @var \Generator|\App\Data\UserEmailDTO $data*/ ?>
        <th>Emails: <?= $data->current()->getFirstName(); ?> <?= $data->current()->getLastName(); ?></th>
        <th> Delete email! </th>
    </tr>
    </thead>
    <tbody>
    <?php /** @var \App\Data\UserEmailDTO[] $data */ ?>

    <?php foreach ($data as $userPerEmail): ?>
        <tr>
            <td><?= $userPerEmail->getEmail(); ?></td>
            <td><a href="remove_mail.php" id="removeMail" name="removeMail" action="post"> delete </a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</form>
Go back to your <a href="profile.php">your profile</a>.