<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\Branch;
use Legovaer\TravisCI\Entity\Repository;

class BranchManager extends EntityManager {

  /**
   * The Repository entity which is related to this branch.
   *
   * @var Repository
   */
  protected $repository;

  /**
   * {@inheritdoc}
   */
  public function getNewEntity() {
    if (!isset($this->repository)) {
      throw new \ErrorException("Repository has not been set.");
    }
    else {
      return new Branch($this->getRepository());
    }
  }

  /**
   * @return Repository
   */
  public function getRepository() {
    return $this->repository;
  }

  /**
   * Sets the repository based on the repository ID.
   *
   * @param int $repository_id
   *   The ID of the repository.
   */
  public function setRepository($repository_id) {
    $this->repository = new Repository();
    $this->repository->setId($repository_id);
  }

  /**
   * Get the details of a branch for the given Repository.
   *
   * @param int $branch_id
   *   The ID of the branch.
   *
   * @return array
   *   An array containing the entities related to the given Branch ID.
   */
  public function showBranch($branch_id) {
    return $this->getEntitiesByData($this->client->showBranch($this->getRepositoryId(), $branch_id));
  }

  /**
   * List all the branches of the current repository.
   *
   * @return array
   *   An array containing Branch entities.
   */
  public function listBranches() {
    return $this->getEntitiesByData($this->client->listBranches($this->getRepositoryId()));
  }

  /**
   * Helper method to get the ID of the current Repository.
   *
   * @return int
   *   The ID of the current repository.
   *
   * @throws \ErrorException
   *   When no repository has been set yet.
   */
  protected function getRepositoryId() {
    if (!isset($this->repository)) {
      throw new \ErrorException("Repository has not been set.");
    }
    else {
      return $this->repository->getId();
    }
  }

}
