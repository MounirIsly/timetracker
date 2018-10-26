<?php


function get_project_list() {
    include ('connection.php');
    try {
    return $db->query("SELECT project_id, title, category FROM projectList");
    } catch (Exception $e) {
        echo 'Error: '.$e->getMessage();
        } return false;
}

function add_project($title, $category) {
    include 'connection.php';
    $sql = $db->prepare("INSERT INTO projectList (title, category) VALUES(?, ?)");

    try {
        $sql->bindValue(1, $title, PDO::PARAM_STR);
        $sql->bindValue(2, $category, PDO::PARAM_STR);
        $sql->execute();


    } catch (Exception $e) {
        echo 'Error: '.$e->getMessage();
        return false;
    } return true;

}
//=====Add Task====================
function add_task($project_id, $title, $date, $time) {
    include 'connection.php';
    $sql = $db->prepare("INSERT INTO tasks (project_id,title, date, time) VALUES(?,?,?,?)");

    try {
        $sql->bindValue(1, $project_id, PDO::PARAM_INT);
        $sql->bindValue(2, $title, PDO::PARAM_STR);
        $sql->bindValue(3, $date, PDO::PARAM_STR);
        $sql->bindValue(4, $time, PDO::PARAM_INT);

        $sql->execute();


    } catch (Exception $e) {
        echo 'Error: '.$e->getMessage();
        return false;
    } return true;

}
//======Get task==========
function get_task_list() {
    include ('connection.php');
    $sql = 'SELECT tasks.*, projectList.title as project FROM tasks ' . ' JOIN projectList ON tasks.project_id = projectList.project_id';
    try {
    return $db->query($sql);
    } catch (Exception $e) {
        echo 'Error: '.$e->getMessage();
        } return false;
}

?>
