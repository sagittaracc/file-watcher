<?php

require_once('vendor/autoload.php');

use sagittaracc\core\File;

(new File('scratch.php'))->onChange(function(){

  // return if time update has changed
  return $this->timeUpdateTrigger();
  return false;

}, function(){

  // this runs if event has been triggered
  echo 'Start tracking...';
  $this->track();

});
