<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\Build;
use Legovaer\TravisCI\Entity\Repository;

class BuildManager extends EntityManager {

  /**
   * {@inheritdoc}
   */
  public function getNewEntity() {
    return new Build();
  }

  /**
   * Lists all of the builds based on a list of IDs.
   *
   * @param array $build_ids
   *   An array containing the IDs of the builds.
   *
   * @return array
   *   An array containing the build entities.
   */
  public function getBuildsByIds(array $build_ids) {
    return $this->getEntitiesByData($this->client->listBuildsByIds($build_ids));
  }

  /**
   * Get a list of builds from a given Repository.
   *
   * @param Repository $repository
   *   The repository.
   *
   * @return array
   *   An array containing the build entities.
   */
  public function getBuildsByRepository(Repository $repository) {
    return $this->getEntitiesByData($this->client->listBuildsByRepository($repository->getId()));
  }

  /**
   * Filter a list of builds of a given repository id.
   *
   * @param array $ids
   *   (optional) List of build ids to fetch.
   * @param int $repository_id
   *   (optional) The ID of a repository where the build belongs to.
   * @param string $slug
   *   (optional) The slug the build belongs to.
   * @param int $number
   *   (optional) Filter by build number, requires slug or repository_id
   * @param $after_number
   *   (optional) List build after a given build number (use for pagination),
   *   requires slug or repository_id.
   * @param $event_type
   *   (optional) Limit build to given event type (push or pull_request)
   *
   * @return array
   *   An array containing the build entities.
   */
  public function filterBuilds($ids = NULL, $repository_id = NULL, $slug = NULL, $number = NULL, $after_number = NULL, $event_type = NULL) {
    return $this->getEntitiesByData(
      $this->client->filterBuilds($ids, $repository_id, $slug, $number, $after_number, $event_type)
    );
  }

  /**
   * Filter a list of builds of a given repository id.
   *
   * @param string $repository_id
   *   The id of the repository.
   * @param int $number
   *   (optional) Filter by build number.
   * @param $after_number
   *   (optional) List build after a given build number (use for pagination)
   * @param $event_type
   *   (optional) Limit build to given event type (push or pull_request)
   *
   * @return array
   *   An array containing the build entities.
   */
  public function filterBuildsByRepository(Repository $repository, $number = NULL, $after_number = NULL, $event_type = NULL) {
    return $this->getEntitiesByData(
      $this->client->filterBuildsByRepositoryId($repository->getId(), $number, $after_number, $event_type)
    );
  }

  /**
   * Get the details of a given build.
   *
   * @param int $build_id
   *   The ID of the build.
   *
   * @return array
   *   An array containing the build entities.
   */
  public function showBuild(Build $build) {
    return $this->getEntitiesByData($this->client->showBuild($build->getId()));
  }

  /**
   * Get the details of a given build based upon the repository id and the build
   * id.
   *
   * @param Repository $repository
   *   The Repository entity
   * @param Build $build
   *   The Build entity.
   *
   * @return array
   *   The data of the given build.
   */
  public function showBuildByRepositoryAndBuild(Repository $repository, Build $build) {
    return $this->getEntitiesByData(
      $this->client->showBuildByRepositoryIdAndBuildId($repository->getId(), $build->getId())
    );
  }

  /**
   * Cancel a build.
   *
   * @param Build $build
   *   The Build entity that needs to be cancelled.
   */
  public function cancelBuild(Build $build) {
    $this->client->cancelBuild($build->getId());
  }

  /**
   * Restart a build.
   *
   * @param Build $build
   *   The Build entity that needs to be restarted.
   */
  public function restartBuild(Build $build) {
    $this->client->restartBuild($build->getId());
  }

}
