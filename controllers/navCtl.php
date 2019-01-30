        <?php
require 'models/specialities.php';

$speciality = new speciality();
$listSpecialities = $speciality->listSpec();
        ?>
  