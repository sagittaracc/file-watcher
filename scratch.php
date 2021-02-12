<?php

require_once('vendor/autoload.php');

use sagittaracc\core\File;

(new File('scratch.php'))->onChange('timeUpdate', function(){
  echo 'tracking';
  $this->track();
});
