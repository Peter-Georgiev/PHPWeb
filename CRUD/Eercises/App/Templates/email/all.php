<?php  /** @var \App\Data\EmailDTO[] $data*/ ?>

<h1> All Mails</h1>

<table border="1">
    <thead>
    <tr>
        <th>Id</th>
        <th>User ID</th>
        <th>email</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $mail): ?>
        <tr>
            <td><?= $mail->getId(); ?></td>
            <td><?= $mail->getUserId(); ?></td>
            <td><?= $mail->getEmail(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
