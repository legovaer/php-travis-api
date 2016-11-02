<?php

namespace Legovaer\TravisCI\Entity;

class Repository extends BaseEntity {

  /**
   * Repository ID.
   *
   * @var int
   */
  protected $id;

  /**
   * Repsository slug.
   *
   * @var string
   */
  protected $slug;

  /**
   * Description of the GitHub repository.
   *
   * @var string
   */
  protected $description;

  /**
   * Build ID of the last Build.
   *
   * @var int
   */
  protected $last_build_id;

  /**
   * Build Number of the last Build.
   *
   * @var int
   */
  protected $last_build_number;

  /**
   * Build state of the last Build.
   *
   * @var string
   */
  protected $last_build_state;

  /**
   * Build duration of the last build.
   *
   * @var \DateTime
   */
  protected $last_build_duration;

  /**
   * Build started at of the last build.
   *
   * @var \DateTime
   */
  protected $last_build_started_at;

  /**
   * Build finished at of the last build.
   *
   * @var \DateTime
   */
  protected $last_build_finished_at;

  /**
   * Code language on GitHub.
   *
   * @var string
   */
  protected $github_language;

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
  public function getSlug() {
    return $this->slug;
  }

  /**
   * @param string $slug
   */
  public function setSlug($slug) {
    $this->slug = $slug;
  }

  /**
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * @param string $description
   */
  public function setDescription($description) {
    $this->description = $description;
  }

  /**
   * @return int
   */
  public function getLastBuildId() {
    return $this->last_build_id;
  }

  /**
   * @param int $last_build_id
   */
  public function setLastBuildId($last_build_id) {
    $this->last_build_id = $last_build_id;
  }

  /**
   * @return int
   */
  public function getLastBuildNumber() {
    return $this->last_build_number;
  }

  /**
   * @param int $last_build_number
   */
  public function setLastBuildNumber($last_build_number) {
    $this->last_build_number = $last_build_number;
  }

  /**
   * @return string
   */
  public function getLastBuildState() {
    return $this->last_build_state;
  }

  /**
   * @param string $last_build_state
   */
  public function setLastBuildState($last_build_state) {
    $this->last_build_state = $last_build_state;
  }

  /**
   * @return \DateTime
   */
  public function getLastBuildDuration() {
    return $this->last_build_duration;
  }

  /**
   * @param \DateTime $last_build_duration
   */
  public function setLastBuildDuration($last_build_duration) {
    $this->last_build_duration = $last_build_duration;
  }

  /**
   * @return \DateTime
   */
  public function getLastBuildStartedAt() {
    return $this->last_build_started_at;
  }

  /**
   * @param \DateTime $last_build_started_at
   */
  public function setLastBuildStartedAt($last_build_started_at) {
    $this->last_build_started_at = $last_build_started_at;
  }

  /**
   * @return \DateTime
   */
  public function getLastBuildFinishedAt() {
    return $this->last_build_finished_at;
  }

  /**
   * @param \DateTime $last_build_finished_at
   */
  public function setLastBuildFinishedAt($last_build_finished_at) {
    $this->last_build_finished_at = $last_build_finished_at;
  }

  /**
   * @return string
   */
  public function getGithubLanguage() {
    return $this->github_language;
  }

  /**
   * @param string $github_language
   */
  public function setGithubLanguage($github_language) {
    $this->github_language = $github_language;
  }

}