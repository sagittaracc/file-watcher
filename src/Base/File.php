<?php

namespace sagittaracc\Base;

use sagittaracc\Db;
use sagittaracc\FileSystem;

class File {
  private $filename = null;

  function __construct($filename) {
    if (file_exists($filename))
      $this->filename = $filename;
  }
  
  public function watch() {
    Db::create($this->filename);
  }

  public function onChange($event, $callback) {
    $eventTrigger = "{$event}Trigger";
	if (method_exists($this, $eventTrigger))
      if ($this->$eventTrigger())
        $callback->call($this);
  }
  
  private function timeUpdateTrigger() {
    if (!$this->filename)
      return false;

	if (!Db::exists($this->filename))
      return true;

    return filemtime($this->filename) <> Db::file($this->filename)->getLastModified();
  }
}