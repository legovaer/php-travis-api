<?php

namespace Legovaer\TravisCI\Entity;

class Account extends BaseEntity {

  /**
   * User or organization ID.
   *
   * @var int
   */
  protected $id;

  /**
   * Account name on GitHub.
   *
   * @var string
   */
  protected $name;

  /**
   * Account login on GitHub.
   *
   * @var string
   */
  protected $login;

  /**
   * Indicates if the account is a user or organization
   * @var string (user|organization)
   */
  protected $type;

  /**
   * Number of repositories.
   *
   * @var int
   */
  protected $repos_count;

  /**
   * Whether or not the account has a valid subscription.
   *
   * @var bool
   */
  protected $subscribed;

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @return string
   */
  public function getLogin() {
    return $this->login;
  }

  /**
   * @param string $login
   */
  public function setLogin($login) {
    $this->login = $login;
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param string $type
   */
  public function setType($type) {
    $this->type = $type;
  }

  /**
   * @return int
   */
  public function getReposCount() {
    return $this->repos_count;
  }

  /**
   * @param int $repos_count
   */
  public function setReposCount($repos_count) {
    $this->repos_count = $repos_count;
  }

  /**
   * @return boolean
   */
  public function isSubscribed() {
    return $this->subscribed;
  }

  /**
   * @param boolean $subscribed
   */
  public function setSubscribed($subscribed) {
    $this->subscribed = $subscribed;
  }

}
