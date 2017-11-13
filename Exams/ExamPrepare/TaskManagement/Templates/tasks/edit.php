<?php /** @var \TaskManagement\DTO\EditTaskDTO $data */ ?>
<h1>Edit task "<?=$data->getTask()->getTitle();?>"</h1>

<form method="post">
    Title: <input type="text" value="<?= $data->getTask()->getTitle(); ?>" name="title" minlength="3"
                  maxlength="50"/><br/>
    Category: <select name="category_id">
        <?php foreach ($data->getCategories() as $category): ?>
            <?php if ($data->getTask()->getCategory()->getId() == $category->getId()): ?>
                <option selected="selected" value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php else: ?>
                <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br/>
    Description: <textarea name="description" minlength="10" maxlength="10000"><?=$data->getTask()->getDescription();?></textarea><br/>
    Location: <input value="<?= $data->getTask()->getLocation(); ?>" type="text" name="location" minlength="3" maxlength="100"/><br/>
    Started On: <input type="date" value="<?= $data->getTask()->getStartedOn(); ?>" name="started_on"/><br/>
    Due date: <input type="date" value="<?= $data->getTask()->getDueDate(); ?>" name="due_date"/><br/>
    <input type="submit" name="edit" value="Edit"/>
</form>
<br/>
<a href="dashboard.php">List</a>