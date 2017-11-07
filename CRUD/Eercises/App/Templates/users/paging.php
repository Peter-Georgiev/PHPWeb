<?php /** @var \App\Http\UserHttpHandler $data */ ?>
<div>
    <label>Pages: </label>
        <?php for ($page = 1; $page <= $data['pages']; $page ++): ?>
            <a href="?p=<?= $page; ?>"> page -> <?= $page; ?></a>
        <?php endfor; ?>
    <label> of <?= $data['pages']; ?>.</label>
</div>
