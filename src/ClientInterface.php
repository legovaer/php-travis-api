<?php

namespace Legovaer\TravisCI;

interface ClientInterface {

  /**
   * Get a list of accounts.
   *
   * @return array
   *   An array containing Account objects.
   */
  public function getAccounts();

  /**
   * Get a specific job.
   *
   * @param int $id
   *   The ID of the Job.
   *
   * @return array
   *   The details about the job.
   */
  public function getJob($id);

  /**
   * Get multiple jobs.
   *
   * @param array $ids
   *   The ids of the jobs.
   *
   * @return array
   *   A list of Jobs.
   */
  public function getJobs(array $ids);

  /**
   * Filter jobs.
   *
   * At least one of the three filtes needs to be given.
   *
   * @param array|bool $ids
   *   (optional) A list of ids.
   * @param bool $state
   *   (optional) The state of the jobs.
   * @param bool $queue
   *   (optional) The queue the jobs need to be filtered on.
   *
   * @return array
   *   A list of filtered jobs.
   */
  public function filterJobs($ids = NULL, $state = NULL, $queue = NULL);

  /**
   * Get a repository by ID.
   *
   * @param int $id
   *   The ID of the repository.
   *
   * @return array
   *   The data of the repository.
   */
  public function getRepositoryById($id);

  /**
   * Get a repository by slug.
   *
   * @param string $slug
   *   The slug of the repository.
   *
   * @return array
   *   The data of the repository.
   */
  public function getRepositoryBySlug($slug);

  /**
   * Filter repositories.
   *
   * @param FALSE|array $ids
   *   List of repository ids to fetch, cannot be combined with other parameters
   * @param FALSE|string $member
   *   Filter by user that has access to it (github login)
   * @param FALSE|string $owner_name
   *   Filter by owner name (first segment of slug)
   * @param FALSE|string $slug
   *   Filter by slug
   * @param FALSE|string $search
   *   Filter by search term
   * @param bool $active
   *
   * @return array
   *   An array containing repositories.
   */
  public function filterRepositories($ids = NULL, $member = NULL, $owner_name = NULL, $slug = NULL, $search = NULL, $active = NULL);

  /**
   * List the latest 25 branches of a given repository.
   *
   * @param int $repository_id
   *   The given repository.
   *
   * @return array
   *   An array containing the latest 25 branches of the given repository.
   */
  public function listBranches($repository_id);

  /**
   * Get the details of one specific branch.
   *
   * @param int $repository_id
   *   The ID of the Repository.
   * @param $branch_id
   *   The ID of the Branch.
   *
   * @return array
   *   The data related to the build of the given Branch.
   */
  public function showBranch($repository_id, $branch_id);

  /**
   * Get all of the broadcast messages.
   *
   * @return array
   *   The data related to the broadcast messages.
   */
  public function getBroadcasts();

  /**
   * Lists all of the builds based on a list of IDs.
   *
   * @param array $ids
   *   An array containing the IDs of the builds.
   *
   * @return array
   *   The data related to the builds.
   */
  public function listBuildsByIds(array $ids);

  /**
   * Lists all of the builds of a given repository.
   *
   * @param int $repository_id
   *
   * @return array
   *   The data related to the builds.
   */
  public function listBuildsByRepository($repository_id);

  /**
   * Lists all of the builds of a given slug.
   *
   * @param string $slug
   *   The slug of a repository.
   *
   * @return mixed
   *   The data related to the builds.
   */
  public function listBuildsBySlug($slug);

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
   *   A list of builds.
   */
  public function filterBuilds($ids = NULL, $repository_id = NULL, $slug = NULL, $number = NULL, $after_number = NULL, $event_type = NULL);

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
   * @return array
   *   A list of builds.
   */
  public function filterBuildsByRepositoryId($repository_id, $number = NULL, $after_number = NULL, $event_type = NULL);

  /**
   * Filter a list of builds of a given repository slug.
   *
   * @param string $repository_slug
   *   The slug of the repository.
   * @param int $number
   *   (optional) Filter by build number.
   * @param $after_number
   *   (optional) List build after a given build number (use for pagination)
   * @param $event_type
   *   (optional) Limit build to given event type (push or pull_request)
   * @return mixed
   */
  public function filterBuildsByRepositorySlug($repository_slug, $number = NULL, $after_number = NULL, $event_type = NULL);

  /**
   * Get the details of a given build.
   *
   * @param int $build_id
   *   The ID of the build.
   *
   * @return array
   *   The data of the given build.
   */
  public function showBuild($build_id);

  /**
   * Get the details of a given build based upon the repository id and the build
   * id.
   *
   * @param int $repository_id
   *   The ID of the repository.
   * @param int $build_id
   *   The ID of the build.
   *
   * @return array
   *   The data of the given build.
   */
  public function showBuildByRepositoryIdAndBuildId($repository_id, $build_id);

  /**
   * Get the details of a given build based upon the repository slug and the
   * build ID.
   *
   * @param string $repository_slug
   *   The slug of the repository.
   * @param int $build_id
   *   The ID of the build.
   *
   * @return array
   *   The data of the given build.
   */
  public function showBuildByRepositorySlugAndBuildId($repository_slug, $build_id);

  /**
   * Cancel a build.
   *
   * @param int $build_id
   *   The ID of the build.
   */
  public function cancelBuild($build_id);

  /**
   * Restart a build.
   * @param int $build_id
   *   The ID of the build.
   */
  public function restartBuild($build_id);

}