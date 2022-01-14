<?php
  include_once "includes/function.php";
  $place_holder = "test";
  $set_state = "";
  $stateName = "state";
  $stateAbrv = "";
  include_once("includes/dbconnect.php");
  showState($connection, $stateName, $stateAbrv, $place_holder);

?>
