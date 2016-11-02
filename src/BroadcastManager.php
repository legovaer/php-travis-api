<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\Broadcast;

class BroadcastManager extends EntityManager {

  /**
   * {@inheritdoc}
   */
  public function getNewEntity() {
    return new Broadcast();
  }

  /**
   * Get a list of broadcasts.
   *
   * @return array
   *   An array containing the Broadcast entities.
   */
  public function getBroadcasts() {
    return $this->getEntitiesByData($this->client->getBroadcasts());
  }

}
