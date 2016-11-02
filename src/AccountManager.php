<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\Account;

class AccountManager extends EntityManager {

  /**
   * Get the list of accounts.
   *
   * @return array
   *   A list containing Account objects.
   */
  public function getAccounts() {
    return $this->getEntitiesByData($this->client->getAccounts());
  }

  public function getEntityData() {
    return $this->client->getAccounts();
  }
  public function getNewEntity() {
    return new Account();
  }
}
