<?php

require_once('vendor/autoload.php');

use sagittaracc\core\File;

(new File('scratch.php'))->onChange(function(){
  // Time update has changed
  return $this->timeUpdateTrigger();
}, function(){
  echo 'Start tracking...';
  $this->track();
});
