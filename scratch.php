<?php

require_once('vendor/autoload.php');

use sagittaracc\core\File;

(new File('scratch.php'))->onChange(function(){

  // file hash has been changed
  $newHash = md5($this->readLine(3));
  $oldHash = $this->getHash();
  if ($newHash === $oldHash)
    return false;

  return $newHash;

}, function($newHash){

  // this runs if event has been triggered
  echo 'Start tracking...';
  $this->track($newHash);

});
