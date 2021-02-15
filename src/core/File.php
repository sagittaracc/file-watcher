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
      if (!($event instanceof \Closure))
        throw new \Exception("Event should be function!");

      if (!$this->filename)
        throw new \Exception("File not found!");

      if (!Config::$cache)
        throw new \Exception('Cache not defined! Please define this in config!');

      if ($data = $event->call($this))
        $callback->call($this, $data);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  public function readLine($index) {
    if (!$this->filename)
      throw new \Exception("File not found!");

    $lines = [];
    $handle = fopen($this->filename, "r");
    $currentLine = 1;
    if ($handle) {
      while (($buffer = fgets($handle)) !== false) {
        $lines[$currentLine] = $buffer;
        if ($index === $currentLine) break;
        $currentLine++;
      }
      fclose($handle);
    }

    return $lines[$index];
  }

  public function getHash() {
    if (!Config::$cache->exists($this->filename))
      return null;

    return Config::$cache->file($this->filename)->getHash();
  }

  public function track($hash = '') {
    Config::$cache->update($this->filename, $hash);
  }

  public function timeUpdateTrigger() {
    if (!Config::$cache->exists($this->filename))
      return true;

    return filemtime($this->filename) <> strtotime(Config::$cache->file($this->filename)->getLastModified());
  }
}
