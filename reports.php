<?php
require ('inc/functions.php');
include ('inc/connection.php');
include ('inc/header.php');
?>
<div class="add">
<h1>Reports</h1>
<table>
<?php 
$total = 0;
foreach(get_task_list() as $item) {
    $total += $item['time'];
    echo "<tr>\n";
    echo "<td>".$item['title']."</td>\n";
    echo "<td>".$item['date']."</td>\n";
    echo "<td>".$item['time']."</td>\n";

    echo "</tr>\n";
}
?>
<tr>
<th colspan='2'>Grand Total</th>
<th><?php echo $total; ?></th>
</tr>
</table>

</div>
