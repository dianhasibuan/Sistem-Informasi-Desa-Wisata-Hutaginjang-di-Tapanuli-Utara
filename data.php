<?php
session_start();
error_reporting(1);
include('includes/config.php');

return json_encode($results);
