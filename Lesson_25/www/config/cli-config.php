<?php
require_once('vendor/autoload.php');
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$entityManager = \Otus\Database::bootDoctrine();
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);