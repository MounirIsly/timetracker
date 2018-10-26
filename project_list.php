<?php
include ('inc/connection.php');
include ('inc/header.php');
include ('inc/functions.php');
?>

<div class="add">
<h1>Project list</h1>
<span><a href="project.php"><p>Add Project</p></a>

<ul>
<?php
foreach(get_project_list() as $item) {
echo "<li>".$item['title']."</li>";
}
?>
    </ul>

</div>
