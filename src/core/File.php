<?php

namespace sagittaracc\core;

class File {
  private $filename = null;

  function __construct($filename) {
    if (file_exists($filename))
      $this->filename = realpath($filename);
  }

  public function onChange($event, $callback) {
    try {
      $eventTrigger = "{$event}Trigger";
      if (method_exists($this, $eventTrigger))
        if ($this->$eventTrigger())
          $callback->call($this);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function track() {
    Config::$cache->update($this->filename);
  }

  private function timeUpdateTrigger() {
    if (!$this->filename)
      throw new \Exception("File not found!");

    if (!Config::$cache)
      throw new \Exception('Cache not defined! Please define this in config!');

    if (!Config::$cache->exists($this->filename))
      return true;

    return filemtime($this->filename) <> strtotime(Config::$cache->file($this->filename)->getLastModified());
  }
}
