<?php

namespace sagittaracc\core;

abstract class Cache {
  abstract public function exists($name);
  abstract public function file($name);
  abstract public function get($name);
  abstract public function update($name);
}
