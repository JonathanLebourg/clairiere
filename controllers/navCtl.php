<?php

require 'models/specialities.php';
require 'models/workStyles.php';

$speciality = new speciality();
$listSpecialities = $speciality->listSpec();

$workStyle = new workStyle();
$listStyles = $workStyle->listStyles();
?>
  