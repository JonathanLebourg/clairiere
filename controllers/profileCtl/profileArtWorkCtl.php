<?php

require 'models/artWorks.php';

$work = new artWork();
$work->idArtWork = $_GET['id'];
$workById = $work->SeeArtWork();