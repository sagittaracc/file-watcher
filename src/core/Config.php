<?php

namespace sagittaracc\core;

class Config {
  public static $cache = null;
  private static $cacheHandler = '';

  public static function init() {
    if (class_exists(self::$cacheHandler))
      self::$cache = new self::$cacheHandler;
  }
}

Config::init();
