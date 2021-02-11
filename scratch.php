<?php

require_once('vendor/autoload.php');

use sagittaracc\core\File;

(new File('c:\Users\arutyunyan\Downloads\bootstrap-4.0.0\tmp\file-watcher\scratch.php'))->onChange('timeUpdate', function(){
  echo 'Start tracking...';
});
