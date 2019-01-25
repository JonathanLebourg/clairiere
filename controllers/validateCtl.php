<?php

require 'controllers/clientFormController.php';
require 'controllers/artistFormController.php';

$validUser = new user();
$validUserId = $validUser->lastUser();
$validUser->id = $validUserId->lastId;
$valid= $validUser->userById();


?>
