<?php

namespace Legovaer\TravisCI\Entity;

class Build extends BaseEntity {
  const RESULT_OK = 0;

  const RESULT_FAILED = 1;

  /**
   * The ID.
   *
   * @var int
   */
  protected $id;

  /**
   * The Repository ID.
   *
   * @var int
   */
  protected $repository_id;

  /**
   * The commit ID.
   *
   * @var int
   */
  protected $commit_id;

  /**
   * The number.
   *
   * @var int
   */
  protected $number;

  /**
   * Indicates if the build is coming from a pull request.
   *
   * @var bool
   */
  protected $pull_request;

  /**
   * The title of the pull request if $pull_request is TRUE.
   *
   * @var string
   */
  protected $pull_request_title;

  /**
   * The number of the pull request if $pull_request is TRUE.
   *
   * @var int
   */
  protected $pull_request_number;

  /**
   * The build configuration (secure values and ssh keys are removed).
   *
   * @var array
   */
  protected $config;

  /**
   * The state.
   *
   * @var string
   */
  protected $state;

  /**
   * The time the build was started.
   *
   * @var \DateTime
   */
  protected $started_at;

  /**
   * The time the build was finished.
   *
   * @var \DateTime
   */
  protected $finished_at;

  /**
   * The duration of the build in a unix timestamp.
   *
   * @var int
   */
  protected $duration;

  /**
   * An array containing the list of jobs in the build matrix.
   *
   * @var array
   */
  protected $job_ids;

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
   * @return int
   */
  public function getCommitId() {
    return $this->commit_id;
  }

  /**
   * @param int $commit_id
   */
  public function setCommitId($commit_id) {
    $this->commit_id = $commit_id;
  }

  /**
   * @return int
   */
  public function getNumber() {
    return $this->number;
  }

  /**
   * @param int $number
   */
  public function setNumber($number) {
    $this->number = $number;
  }

  /**
   * @return boolean
   */
  public function isPullRequest() {
    return $this->pull_request;
  }

  /**
   * @param boolean $pull_request
   */
  public function setPullRequest($pull_request) {
    $this->pull_request = $pull_request;
  }

  /**
   * @return string
   */
  public function getPullRequestTitle() {
    return $this->pull_request_title;
  }

  /**
   * @param string $pull_request_title
   */
  public function setPullRequestTitle($pull_request_title) {
    $this->pull_request_title = $pull_request_title;
  }

  /**
   * @return int
   */
  public function getPullRequestNumber() {
    return $this->pull_request_number;
  }

  /**
   * @param int $pull_request_number
   */
  public function setPullRequestNumber($pull_request_number) {
    $this->pull_request_number = $pull_request_number;
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
   * @return int
   */
  public function getDuration() {
    return $this->duration;
  }

  /**
   * @param int $duration
   */
  public function setDuration($duration) {
    $this->duration = $duration;
  }

  /**
   * @return array
   */
  public function getJobIds() {
    return $this->job_ids;
  }

  /**
   * @param array $job_ids
   */
  public function setJobIds($job_ids) {
    $this->job_ids = $job_ids;
  }

}