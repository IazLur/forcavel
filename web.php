<?php

require_once('vendor/forcavel/bootstrap.php');

use vendor\forcavel\web\ArgumentClass;

ArgumentClass::ProcessArgument($_SERVER['argv']);

