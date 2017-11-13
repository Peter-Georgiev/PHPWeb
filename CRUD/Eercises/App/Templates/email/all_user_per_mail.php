<?php /** @var \App\Data\UserEmailDTO[] $data */ ?>

<h1> View all emails per user </h1>

<table border="1">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Fullname</th>
        <th>Birthday</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $userPerEmail): ?>
        <tr>
            <td><?= $userPerEmail->getId(); ?></td>
            <td><?= $userPerEmail->getUsername(); ?></td>
            <td><?= $userPerEmail->getFirstName(); ?> <?= $userPerEmail->getLastName(); ?></td>
            <td><?= $userPerEmail->getBornOn(); ?></td>
            <td><?= $userPerEmail->getEmail(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
Go back to your <a href="profile.php">your profile</a>.