<?php
declare(strict_types = 1);
(bool)$isFieldEmpty = false;

if(isset($_GET['sbm'])){
    if ($_GET['categories'] != '' && $_GET['tags'] != '' && $_GET['months'] != ''){
        $categories = explode(', ', trim($_GET['categories']));
        $tags = explode(', ', trim($_GET['tags']));
        $months = explode(', ', trim($_GET['months']));
    } else {
        $isFieldEmpty = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navigation Builder</title>
</head>
<body>
<div>
    <form method="get">
        Categories: <input type="text" name="categories"/><br/>
        Tags: <input type="text" name="tags"/><br/>
        Months: <input type="text" name="months"/><br/>
        <input type="submit" name="sbm" value=" Generate "/>
    </form>
</div>
<div>
    <?php if($isFieldEmpty): ?>
        <?= 'The field empty';?>
    <?php endif;?>
    <?php if(isset($_GET['sbm']) && !$isFieldEmpty): ?>
    <h2>Categories</h2>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li><?= $category;?></li>
        <?php endforeach;?>
    </ul>
    <h2>Tags</h2>
    <ul>
        <?php foreach ($tags as $tag): ?>
            <li><?= $tag;?></li>
        <?php endforeach;?>
    </ul>
    <h2>Months</h2>
    <ul>
        <?php foreach ($months as $month): ?>
            <li><?= $month;?></li>
        <?php endforeach;?>
    </ul>
    <?php endif;?>
</div>
</body>
</html>
