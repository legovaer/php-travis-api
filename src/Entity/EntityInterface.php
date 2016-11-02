<?php

namespace Legovaer\TravisCI\Entity;

interface EntityInterface {

  /**
   * Fills in all the parameters of this object using an array.
   *
   * @param array $buildData
   */
  public function fromArray(array $buildData);

}