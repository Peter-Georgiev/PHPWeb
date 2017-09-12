<form method="post">
    <select name="people[]" multiple="multiple">
        <option value="Mario">Mario</option>
        <option value="Svetlin">Svetlin</option>
        <option value="Teodor">Teodor</option>
    </select>
    <input type="submit" value="submit"/>
</form>
<?php
var_dump($_POST['people']);

if (isset($_POST['people'])) {
    foreach($_POST['people'] as $person) {
        echo htmlspecialchars($person) . '</br>';
    }
}

