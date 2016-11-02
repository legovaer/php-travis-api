<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\Repository;

class RepositoryManager extends EntityManager {

  /**
   * Get a repository by ID.
   *
   * @param int $id
   *   The ID of the repository.
   *
   * @return array
   *   Array containing the matching Repository entities.
   */
  public function getRepositoryById($id) {
    return $this->getEntitiesByData($this->client->getRepositoryById($id));
  }

  /**
   * Get a repository by a slug.
   *
   * @param string $slug
   *   The slug of the repository. (E.g. dcip/dc_travis)
   *
   * @return array
   *   Array containing the matching Repository entities.
   */
  public function getRepositoryBySlug($slug) {
    return $this->getEntitiesByData($this->client->getRepositoryBySlug($slug));
  }

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
   *   An array containing Repositories.
   */
  public function filterRepositories($ids = NULL, $member = NULL, $owner_name = NULL, $slug = NULL, $search = NULL, $active = NULL) {
    return $this->getEntitiesByData($this->client->filterRepositories($ids, $member, $owner_name, $slug, $search, $active));
  }


}