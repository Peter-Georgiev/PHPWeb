<form method="get">
    <div>
        Delimeter:
        <select name="delimeter">
            <option value=",">,</option>
            <option value="|">|</option>
            <option value="&">&amp;</option>
        </select>
    </div>
    <div>
        Names:
        <input type="text" name="names"/>
    </div>
    <div>
        Ages:
        <input type="text" name="ages"/>
    </div>
    <div>
        <input type="submit" name="filter" value=" Filter! "/>
    </div>
</form>
<?php if (isset($names, $ages)): ?>
    <table border="1" cellpadding="0">
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($names); $i++): ?>
            <?php if (intval($ages[$i]) >= 18): ?>
                <tr>
                    <td><?= $names[$i]; ?></td>
                    <td><?= $ages[$i]; ?></td>
                </tr>
            <?php endif; ?>
        <?php endfor; ?>
        </tbody>
    </table>
<?php endif; ?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<?php if ($count > 0): ?>
<div class="container">
    <ul class="pager">
        <?php for ($i = 1; $i < $count; $i++): ?>
            <?= '<li><a href="?page=' . $i . '">' . 'Previous' . '</a></li>' ?>
            <?= '<li><a href="?page=' . $i . '">' . $i . '</a></li>' ?>
        <?php endfor; ?>
        <li><a href="?page=<?php $count; ?>">Next</a></li>
    </ul>
</div>
<?php endif; var_dump($_REQUEST)?>