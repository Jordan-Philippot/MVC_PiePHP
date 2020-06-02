<?php

namespace Core;

use Core\Core;

require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

$app = new Core();
$app->run();
