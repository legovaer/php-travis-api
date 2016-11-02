<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\Configuration;
use Legovaer\TravisCI\Util\EntityUtil;
use Symfony\Component\Yaml\Yaml;

class ConfigurationManager {

  /**
   * @param Entity\Configuration $configuration
   */
  public function generateYamlFile(\Legovaer\TravisCI\Entity\Configuration $configuration) {
    $settings = $this->toArray($configuration);
    return Yaml::dump($settings);
  }

  /**
   * Translates a Configuration object to an array.
   *
   * @param Entity\Configuration $configuration
   *
   * @return array
   *   The array containing all the values.
   */
  protected function toArray(\Legovaer\TravisCI\Entity\Configuration $configuration) {
    $settings = [];

    $configuration_values = [
      'before_install' => $configuration->getBeforeInstall(),
      'before_script' => $configuration->getBeforeScript(),
      'before_deploy' => $configuration->getBeforeDeploy(),
      'install' => $configuration->getInstall(),
      'script' => $configuration->getScript(),
      'deploy' => $configuration->getDeploy(),
      'after_deploy' => $configuration->getAfterDeploy(),
      'after_failure' => $configuration->getAfterFailure(),
      'after_success' => $configuration->getAfterSuccess(),
    ];

    foreach ($configuration_values as $parameter => $value) {
      if ($value) {
        $settings[$parameter] = $value;
      }
    }
  }

  /**
   * Add a task to a step in the configuration.
   *
   * @param string $step
   *   The step of the build lifecycle.
   *
   * @param string $task
   *   The task which needs to be executed.
   */
  public function appendStep($step, $task) {
    $this->addStep($step, $task, 'append');
  }

  public function prependStep($step, $task) {
    $this->addStep($step, $task, 'prepend');
  }

  /**
   * Adds a step to the configuration.
   *
   * @param $step
   *   The step of the build lifecycle.
   * @param $task
   *   The task which needs to be executed.
   * @param string $location
   *   Will be either "prepend" or "append".
   */
  protected function addStep($step, $task, $location = 'prepend') {
    $steps = ['before_install', 'install', 'before_script', 'script',
      'after_success', 'after_failure', 'before_deploy', 'deploy',
      'after_deploy', 'after_script'];

    if (array_search($step, $steps)) {
      switch ($location) {
        case "append":
          array_push($this->$step, $task);
          break;

        case "prepend":
          array_unshift($this->$step, $task);
          break;
      }
    }
  }

  /**
   * Creates a Configuration entity from a yaml file.
   *
   * @param string $yaml
   *   The content of the YAML file.
   *
   * @return Configuration
   *   The entity that has been created based upon the YAML content.
   */
  public function fillFromYaml($yaml) {
    $configuration = new Configuration();
    EntityUtil::fillFromArray($configuration, Yaml::parse($yaml));
    return $configuration;
  }

}
