<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\EntityInterface;

interface EntityManagerInterface {

  /**
   * Get a new entity.
   *
   * @return EntityInterface
   */
  public function getNewEntity();

  /**
   * Get a list of entities.
   *
   * @return array
   *   Array containing EntityInterface objects.
   */
  public function getEntities();


}