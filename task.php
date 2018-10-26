<?php
include ('inc/connection.php');
include ('inc/header.php');
require ('inc/functions.php');
$project_id = $title = $date = $time = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $project_id = trim(filter_input(INPUT_POST, 'project_id', FILTER_SANITIZE_NUMBER_INT));
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING));
    $time = trim(filter_input(INPUT_POST, 'time', FILTER_SANITIZE_NUMBER_INT));
    
    $dateMatch = explode('/', $date);

    if(empty($project_id) OR empty($title) OR empty($date) OR empty($time)){
        $error_message = 'Please fill in the required fields';
    } elseif (count($dateMatch) != 3
    OR strlen($dateMatch[0]) != 2
    OR strlen($dateMatch[1]) != 2
    OR strlen($dateMatch[2]) != 4
    OR !checkdate($dateMatch[0], $dateMatch[1], $dateMatch[2])
    ) {     
     $error_message = 'Invalid date';
    } else {
     if (add_task($project_id,$title, $date, $time));
        header('Location: task_list.php');
        exit;

    }

}

?>

<div class="add">
    <h1>Add Task</h1>
    <?php
    if(isset($error_message )) {
        echo "<p class='error'>$error_message</p>";
    }
    ?>
   
    <form method="post" action="task.php">
        <label for="select-project">Select Project</label></br>
        <select name="project_id" id="project_id"><option>Select One</option> 
        <?php
foreach(get_project_list() as $item) {
echo "<option value='".$item['project_id']."'";
if($project_id == $item['project-id']) {
    echo 'Selected';
}
echo">".$item['title']."</option>";
}
?>
</select></br>
     
        <label for="title">Title</label></br>
        <input type="text" id="title" name="title" value="<?php htmlspecialchars($title); ?>"></br>
        <label for="date">Date</label></br>
        <input type="text" id="date" name="date" value="<?php htmlspecialchars($date); ?>" placeholder="mm/dd/yy">
        <label for="time">Time</label></br>
        <input type="text" name="time" id="time" value="<?php htmlspecialchars($time); ?>">
        <input type="submit" value="Submit">



    </form>
