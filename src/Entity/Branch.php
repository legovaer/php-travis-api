<?php

namespace Legovaer\TravisCI\Entity;

class Branch extends BaseEntity {

  /**
   * The ID of the Branch.
   *
   * @var int
   */
  protected $id;

  /**
   * The ID of the repository.
   *
   * @var int
   */
  protected $repository_id;

  /**
   * The ID of the commit.
   *
   * @var int
   */
  protected $commit_id;

  /**
   * The number of the build.
   *
   * @var int
   */
  protected $number;

  /**
   * The configuration used for the build of this branch.
   *
   * @var array
   */
  protected $config;

  /**
   * The build state of this branch.
   *
   * @var string
   */
  protected $state;

  /**
   * The time when the build of this branch started.
   *
   * @var \DateTime
   */
  protected $started_at;

  /**
   * The time when the build of this branch was finished.
   *
   * @var \DateTime
   */
  protected $finished_at;

  /**
   * The time it took to build this branch in unix datetime.
   *
   * @var int
   */
  protected $duration;

  /**
   * An array containing the jobs.
   *
   * @var array
   */
  protected $job_ids;

  /**
   * Indicates if the build is dedicated to a pull request.
   *
   * @var bool
   */
  protected $pull_request;

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
   * @return Repository
   */
  public function getRepository() {
    return $this->repository;
  }

  /**
   * @param Repository $repository
   */
  public function setRepository($repository) {
    $this->repository = $repository;
  }

  /**
   * @var Repository
   */
  protected $repository;

  /**
   * Constructs a Branch.
   *
   * @param Repository $repository
   *   The Repository where this Branch belongs to.
   */
  public function __construct(Repository $repository) {
    $this->repository = $repository;
    $this->repository_id = $repository->getId();
  }

}
