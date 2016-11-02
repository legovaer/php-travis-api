<?php

namespace Legovaer\TravisCI\Util;

use Doctrine\Common\Inflector\Inflector;

class EntityUtil {
  /**
   * @param mixed $object
   * @param array $objectDataArray
   */
  public static function fillFromArray($object, array $objectDataArray)
  {
    foreach ($objectDataArray as $key => $value) {
      $method = 'set' . Inflector::classify($key);
      if (method_exists($object, $method)) {
        $object->$method($value);
      }
    }
  }

  /**
   * @param Object $object
   * @param array $valuesToCompare
   */
  public static function compareValues($object, array $valuesToCompare)
  {
    foreach ($valuesToCompare as $key => $value) {
      $method = 'get' . Inflector::classify($key);
      if (method_exists($object, $method)) {
        if ($value != $object->$method()) {
          return false;
        }
      }
    }

    return (bool) $valuesToCompare;
  }
}