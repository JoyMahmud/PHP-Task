<?php
include_once ('calculation.php');
$result = new calculator();
$result->add($_POST);
$result-> getData();

?>
<a href="create.php">Back</a>
