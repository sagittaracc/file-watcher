<?php

namespace sagittaracc\Base;

abstract class Cache {
  abstract public static function exists($name);
  abstract public static function file($name);
  abstract public static function create($name);
}