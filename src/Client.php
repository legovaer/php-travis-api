<?php

namespace Legovaer\TravisCI;

class Client implements ClientInterface {

  /**
   * @var \GuzzleHttp\Client
   */
  protected $client;

  public function __construct($token) {
    $this->client = new \GuzzleHttp\Client([
      'base_url' => ['https://api.travis-ci.org'],
      'defaults' => [
        'headers' => [
          'Authorization' => "token $token",
          'Accept' => "application/vnd.travis-ci.2+json",
        ],
      ],
    ]);

  }


  /** 
   * {@inheritdoc} 
   */
  public function getAccounts() {
    return $this->__getContents('/accounts');
  }

  /**
   * {@inheritdoc}
   */
  public function getJob($id) {
    return $this->__getContents("/jobs/$id");
  }

  /**
   * {@inheritdoc}
   */
  public function getJobs(array $ids) {
    return $this->__getJobs(['ids' => $ids]);
  }

  /**
   * {@inheritdoc}
   */
  public function filterJobs($ids = NULL, $state = NULL, $queue = NULL) {
    if (empty($ids) && empty($state) && empty($queue)) {
      throw new \InvalidArgumentException('This method requires at least one parameter');
    }

    $arguments = [];
    if ($ids) { $arguments['ids'] = $ids; }
    if ($state) { $arguments['state'] = $state; }
    if ($queue) { $arguments['queue'] = $queue; }

    return $this->__getJobs($arguments);
  }
  
  /**
   * {@inheritdoc}
   */
  public function getRepositoryById($id) {
    return $this->__getContents("/repository/$id");
  }

  /**
   * {@inheritdoc}
   */
  public function getRepositoryBySlug($slug) {
    return $this->__getContents("/repository/$slug");
  }

  /**
   * {@inheritdoc}
   */
  public function filterRepositories($ids = NULL, $member = NULL, $owner_name = NULL, $slug = NULL, $search = NULL, $active = NULL) {
    $arguments = [
      'ids' => $ids,
      'member' => $member,
      'owner_name' => $owner_name,
      'slug' => $slug,
      'search' => $search,
      'active' => $active,
    ];

    return $this->__getContents('/repos', $arguments);
  }

  /**
   * {@inheritdoc}
   */
  public function listBranches($repository_id) {
    return $this->__getContents("/repos/$repository_id/branches");
  }

  /**
   * {@inheritdoc}
   */
  public function showBranch($repository_id, $branch_id) {
    return $this->__getContents("/repos/$repository_id/branches/$branch_id");
  }

  /**
   * {@inheritdoc}
   */
  public function getBroadcasts() {
    return $this->__getContents("/broadcasts");
  }

  /**
   * {@inheritdoc}
   */
  public function listBuildsByIds(array $ids) {
    return $this->__getContents("/builds", ["ids" => $ids]);
  }

  /**
   * {@inheritdoc}
   */
  public function listBuildsByRepository($repository_id) {
    return $this->__getContents("/repos/$repository_id/builds");
  }

  /**
   * {@inheritdoc}
   */
  public function listBuildsBySlug($slug) {
    return $this->__getContents("/repos/$slug/builds");
  }

  /**
   * {@inheritdoc}
   */
  public function filterBuilds($ids = NULL, $repository_id = NULL, $slug = NULL, $number = NULL, $after_number = NULL, $event_type = NULL) {
    $attributes = [
      "ids" => $ids,
      "repository_id" => $repository_id,
      "slug" => $slug,
      "number" => $number,
      "after_number" => $after_number,
      "event_type" => $event_type,
    ];

    return $this->__getContents("/builds", $attributes);
  }

  /**
   * {@inheritdoc}
   */
  public function filterBuildsByRepositoryId($repository_id, $number = NULL, $after_number = NULL, $event_type = NULL) {
    $attributes = [
      "number" => $number,
      "after_number" => $after_number,
      "event_type" => $event_type,
    ];

    return $this->__getContents("/repos/$repository_id/builds", $attributes);
  }

  /**
   * {@inheritdoc}
   */
  public function filterBuildsByRepositorySlug($repository_slug, $number = NULL, $after_number = NULL, $event_type = NULL) {
    $attributes = [
      "number" => $number,
      "after_number" => $after_number,
      "event_type" => $event_type,
    ];

    return $this->__getContents("/repos/$repository_slug/builds", $attributes);
  }

  /**
   * {@inheritdoc}
   */
  public function showBuild($build_id) {
    return $this->__getContents("/builds/$build_id");
  }

  /**
   * {@inheritdoc}
   */
  public function showBuildByRepositoryIdAndBuildId($repository_id, $build_id) {
    return $this->__getContents("/repos/$repository_id/builds/$build_id");
  }

  /**
   * {@inheritdoc}
   */
  public function showBuildByRepositorySlugAndBuildId($repository_slug, $build_id) {
    return $this->__getContents("/repos/$repository_slug/builds/$build_id");
  }

  /**
   * {@inheritdoc}
   */
  public function cancelBuild($build_id) {
    $this->__getContents("/builds/$build_id/cancel");
  }

  /**
   * {@inheritdoc}
   */
  public function restartBuild($build_id) {
    $this->__getContents("/builds/$build_id/restart");
  }

  /**
   * Helper method to get jobs based upon arguments.
   *
   * @param array $arguments
   *   A list of arguments.
   *
   * @return array
   *   The jobs based upon the arguments.
   */
  protected function __getJobs(array $arguments) {
    return $this->__getContents('/jobs', $arguments);
  }

  /**
   * Helper method to interact with the client.
   *
   * @param $uri
   *   The URI that needs to be accessed.
   * @param array $arguments
   *   (optional) A list of arguments that need to be passed.
   *
   * @return array
   *   The data of the result.
   */
  protected function __getContents($uri, $arguments = NULL) {
    return $this->client->get($uri, $arguments)->getBody()->getContents();
  }

}
