<?php

namespace Legovaer\TravisCI\Entity;

use Legovaer\TravisCI\ConfigurationManager;

class Configuration extends BaseEntity {

  /**
   * @var array|bool
   */
  protected $before_install;

  /**
   * @var array|bool
   */
  protected $install;

  /**
   * @var array|bool
   */
  protected $before_script;

  /**
   * @var array|bool
   */
  protected $script;

  /**
   * @var array|bool
   */
  protected $after_script;

  /**
   * @var array|bool
   */
  protected $after_success;

  /**
   * @var array|bool
   */
  protected $after_failure;

  /**
   * @var array|bool
   */
  protected $before_deploy;

  /**
   * @var array|bool
   */
  protected $deploy;

  /**
   * @var array|bool
   */
  protected $after_deploy;

  /**
   * @var array|bool
   */
  protected $git;

  protected $branches;

  protected $language;

  protected $matrix;

  protected $hosts;

  /**
   * @return array|bool
   */
  public function getBeforeInstall() {
    return $this->before_install;
  }

  /**
   * @param array|bool $before_install
   */
  public function setBeforeInstall($before_install) {
    $this->before_install = $before_install;
  }

  /**
   * @return array|bool
   */
  public function getInstall() {
    return $this->install;
  }

  /**
   * @param array|bool $install
   */
  public function setInstall($install) {
    $this->install = $install;
  }

  /**
   * @return array|bool
   */
  public function getBeforeScript() {
    return $this->before_script;
  }

  /**
   * @param array|bool $before_script
   */
  public function setBeforeScript($before_script) {
    $this->before_script = $before_script;
  }

  /**
   * @return array|bool
   */
  public function getScript() {
    return $this->script;
  }

  /**
   * @param array|bool $script
   */
  public function setScript($script) {
    $this->script = $script;
  }

  /**
   * @return array|bool
   */
  public function getAfterScript() {
    return $this->after_script;
  }

  /**
   * @param array|bool $after_script
   */
  public function setAfterScript($after_script) {
    $this->after_script = $after_script;
  }

  /**
   * @return array|bool
   */
  public function getAfterSuccess() {
    return $this->after_success;
  }

  /**
   * @param array|bool $after_success
   */
  public function setAfterSuccess($after_success) {
    $this->after_success = $after_success;
  }

  /**
   * @return array|bool
   */
  public function getAfterFailure() {
    return $this->after_failure;
  }

  /**
   * @param array|bool $after_failure
   */
  public function setAfterFailure($after_failure) {
    $this->after_failure = $after_failure;
  }

  /**
   * @return array|bool
   */
  public function getBeforeDeploy() {
    return $this->before_deploy;
  }

  /**
   * @param array|bool $before_deploy
   */
  public function setBeforeDeploy($before_deploy) {
    $this->before_deploy = $before_deploy;
  }

  /**
   * @return array|bool
   */
  public function getDeploy() {
    return $this->deploy;
  }

  /**
   * @param array|bool $deploy
   */
  public function setDeploy($deploy) {
    $this->deploy = $deploy;
  }

  /**
   * @return array|bool
   */
  public function getAfterDeploy() {
    return $this->after_deploy;
  }

  /**
   * @param array|bool $after_deploy
   */
  public function setAfterDeploy($after_deploy) {
    $this->after_deploy = $after_deploy;
  }

  /**
   * @return array|bool
   */
  public function getGit() {
    return $this->git;
  }

  /**
   * @param array|bool $git
   */
  public function setGit($git) {
    $this->git = $git;
  }

  /**
   * @return mixed
   */
  public function getBranches() {
    return $this->branches;
  }

  /**
   * @param mixed $branches
   */
  public function setBranches($branches) {
    $this->branches = $branches;
  }

  /**
   * @return mixed
   */
  public function getLanguage() {
    return $this->language;
  }

  /**
   * @param mixed $language
   */
  public function setLanguage($language) {
    $this->language = $language;
  }

  /**
   * @return mixed
   */
  public function getMatrix() {
    return $this->matrix;
  }

  /**
   * @param mixed $matrix
   */
  public function setMatrix($matrix) {
    $this->matrix = $matrix;
  }

  /**
   * @return mixed
   */
  public function getHosts() {
    return $this->hosts;
  }

  /**
   * @param mixed $hosts
   */
  public function setHosts($hosts) {
    $this->hosts = $hosts;
  }

  /**
   * Creates the content of the .travis.yml file.
   */
  public function __toString() {
    $configuration_manager = new ConfigurationManager();
    return $configuration_manager->generateYamlFile($this);
  }

  public function fromYaml() {
    $configuration_manager = new ConfigurationManager();
    return $configuration_manager->fillFromYaml();
  }
}