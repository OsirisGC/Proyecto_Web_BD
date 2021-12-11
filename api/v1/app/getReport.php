<?php
include_once ($_SERVER["DOCUMENT_ROOT"]. "/proyecto/api/v1/controller/user.php");

$user = new User();
$response = $user -> getReport();
$user -> response($response);