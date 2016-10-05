<?php
require dirname(__DIR__) . "/modele/Model.php";

$lesVols = Model::getInstance()->getLesVols();
print_r($lesVols);

