<?php /** @var \TaskManagement\DTO\DashboardDTO $data */ ?>
<h1>All Tasks</h1>
<a href="add_task.php">Add new task</a> | <a href="report.php">Report page</a> | <a href="logout.php">logout</a>
<br/>
<table border="1">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($data->getTasks() as $task): ?>
        <tr>
            <td><?=$task->getTitle();?></td>
            <td><?=$task->getCategory()->getName();?></td>
            <td><?=$task->getAuthor()->getUsername();?></td>
            <td><a href="edit_task.php?id=<?=$task->getId();?>">edit task</a></td>
            <td><a href="delete_task.php?id=<?=$task->getId();?>">delete task</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php if($data->hasPrevious()): ?>
    <a href="dashboard.php?page=1">First</a> §§
    <a href="dashboard.php?page=<?=$data->getCurrentPage()-1;?>">Previous</a> |
<?php endif; ?>
<?php for($i = 1; $i <= $data->getAllPages(); $i++): ?>
    <?php if($data->getCurrentPage() == $i): ?>
            <?= $i ?> |
    <?php else: ?>
            <a href="dashboard.php?page=<?=$i;?>"><?= $i; ?></a> |
    <?php endif; ?>
<?php endfor; ?>
<?php if($data->hasNext()): ?>
    <a href="dashboard.php?page=<?=$data->getCurrentPage()+1;?>">Next</a> §§
    <a href="dashboard.php?page=<?=$data->getAllPages();?>">Last</a>
<?php endif; ?>



