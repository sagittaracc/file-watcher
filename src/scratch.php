<?php

use sagittaracc\Base\File;

(new File('scratch.php'))->onChange('timeUpdate', function(){
  echo 'Start tracking...';
  $this->watch();
});