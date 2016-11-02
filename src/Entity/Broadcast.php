<?php

namespace Legovaer\TravisCI\Entity;

class Broadcast extends BaseEntity {

  /**
   * The ID.
   *
   * @var int
   */
  protected $id;

  /**
   * The message.
   *
   * @var string
   */
  protected $message;

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
  public function getMessage() {
    return $this->message;
  }

  /**
   * @param string $message
   */
  public function setMessage($message) {
    $this->message = $message;
  }

}
