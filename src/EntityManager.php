<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\EntityInterface;

abstract class EntityManager implements EntityManagerInterface {

  /**
   * The TravisCI Client.
   *
   * @var Client
   */
  protected $client;

  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * {@inheritdoc}
   */
  public function getEntitiesByData($entities_data) {
    $entities = [];

    foreach ($entities_data as $entity_data) {
      $account = $this->getNewEntity();
      $account->fromArray($entity_data);
      $accounts[] = $account;
    }

    return $entities;
  }

  /**
   * {@inheritdoc}
   */
  public function getEntities() {
    return $this->getEntitiesByData($this->getEntityData());
  }
}
