<?php

namespace Legovaer\TravisCI\Entity;

use Legovaer\TravisCI\Util\EntityUtil;

class BaseEntity implements EntityInterface {

  /**
   * {@inheritdoc}
   */
  public function fromArray(array $buildData)
  {
    EntityUtil::fillFromArray($this, $buildData);
  }

}
