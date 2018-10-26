<?php
require('inc/functions.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $category = trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING));
    if(empty($title) OR empty($category)){
        $error_message = 'Please fill in the required fields';
    } else {
     if (add_project($title, $category));
        header('Location: project_list.php');
        exit;
    }
}

include ('inc/header.php');

?>

<div class="add">
    <h1>Add Project</h1>
    <?php
    if(isset($error_message )) {
        echo "<p class='error'>$error_message</p>";
    }
    ?>
    <form method="POST" action="project.php">
        <label for="title">Title</label></br>
        <input type="text" id="title" name="title" value=""></br>
        <label for="category">Category</label></br>
        <select id="category" name="category"><option>Select One</option>
        <option value="billable">Billable</option>
        <option value="charity">Charity</option>
        <option value="personal">Personal</option>

    </select></br>
        <input type="submit" value="Submit">



    </form>
</div>
