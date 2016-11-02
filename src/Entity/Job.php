<?php

namespace Legovaer\TravisCI\Entity;

class Job extends BaseEntity {

  /**
   * The Job ID.
   *
   * @var int
   */
  protected $id;

  /**
   * The build ID.
   *
   * @var string
   */
  protected $build_id;

  /**
   * The repository ID.
   *
   * @var int
   */
  protected $repository_id;

  /**
   * The commit ID.
   *
   * @var string
   */
  protected $commit_id;

  /**
   * The log ID.
   *
   * @var int
   */
  protected $log_id;

  /**
   * The job number.
   *
   * @var string
   */
  protected $number;

  /**
   * The configuration excluding secure values & ssh keys.
   *
   * @var array
   */
  protected $config;

  /**
   * The Job state.
   *
   * @var string
   */
  protected $state;

  /**
   * Time when the job was started.
   *
   * @var \DateTime
   */
  protected $started_at;

  /**
   * Time when the job was finished.
   *
   * @var \DateTime
   */
  protected $finished_at;

  /**
   * The Job Queue
   *
   * @var array
   */
  protected $queue;

  /**
   * Whether or not the job influences the build state.
   *
   * @var bool
   */
  protected $allow_failure;

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
  public function getBuildId() {
    return $this->build_id;
  }

  /**
   * @param string $build_id
   */
  public function setBuildId($build_id) {
    $this->build_id = $build_id;
  }

  /**
   * @return int
   */
  public function getRepositoryId() {
    return $this->repository_id;
  }

  /**
   * @param int $repository_id
   */
  public function setRepositoryId($repository_id) {
    $this->repository_id = $repository_id;
  }

  /**
   * @return string
   */
  public function getCommitId() {
    return $this->commit_id;
  }

  /**
   * @param string $commit_id
   */
  public function setCommitId($commit_id) {
    $this->commit_id = $commit_id;
  }

  /**
   * @return int
   */
  public function getLogId() {
    return $this->log_id;
  }

  /**
   * @param int $log_id
   */
  public function setLogId($log_id) {
    $this->log_id = $log_id;
  }

  /**
   * @return string
   */
  public function getNumber() {
    return $this->number;
  }

  /**
   * @param string $number
   */
  public function setNumber($number) {
    $this->number = $number;
  }

  /**
   * @return array
   */
  public function getConfig() {
    return $this->config;
  }

  /**
   * @param array $config
   */
  public function setConfig($config) {
    $this->config = $config;
  }

  /**
   * @return string
   */
  public function getState() {
    return $this->state;
  }

  /**
   * @param string $state
   */
  public function setState($state) {
    $this->state = $state;
  }

  /**
   * @return \DateTime
   */
  public function getStartedAt() {
    return $this->started_at;
  }

  /**
   * @param \DateTime $started_at
   */
  public function setStartedAt($started_at) {
    $this->started_at = $started_at;
  }

  /**
   * @return \DateTime
   */
  public function getFinishedAt() {
    return $this->finished_at;
  }

  /**
   * @param \DateTime $finished_at
   */
  public function setFinishedAt($finished_at) {
    $this->finished_at = $finished_at;
  }

  /**
   * @return array
   */
  public function getQueue() {
    return $this->queue;
  }

  /**
   * @param array $queue
   */
  public function setQueue($queue) {
    $this->queue = $queue;
  }

  /**
   * @return boolean
   */
  public function isAllowFailure() {
    return $this->allow_failure;
  }

  /**
   * @param boolean $allow_failure
   */
  public function setAllowFailure($allow_failure) {
    $this->allow_failure = $allow_failure;
  }

  /**
   * @return array
   */
  public function getAnnotationIds() {
    return $this->annotation_ids;
  }

  /**
   * @param array $annotation_ids
   */
  public function setAnnotationIds($annotation_ids) {
    $this->annotation_ids = $annotation_ids;
  }

  /**
   * List of annotation ids.
   *
   * @var array
   */
  protected $annotation_ids;

}
