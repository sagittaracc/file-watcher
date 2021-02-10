<?php

namespace sagittaracc;

use sagittaracc\Base\Cache;

class Db extends Cache {
  public static function exists($name) {
    return true;
  }

  public static function file($name) {
    return new class {
      public function getLastModified() {
        return 1612968154;
      }
	};
  }
  
  public static function create($name) {
    
  }
}