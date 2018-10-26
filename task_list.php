<?php
include ('inc/connection.php');
include ('inc/header.php');
require ('inc/functions.php');
?>
<div class='add'>
<h1>Add Task</h1>
<ul>
<?php
foreach(get_task_list() as $item) {
echo "<li>".$item['title']."</li>";
}
?>
    </ul>

</div>
