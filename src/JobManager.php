<?php

namespace Legovaer\TravisCI;

use Legovaer\TravisCI\Entity\Job;

class JobManager extends EntityManager {

  /**
   * Get a Job.
   *
   * @param $id
   *   The ID of the Job.
   *
   * @return Job
   *   The Job.
   */
  public function getJob($id) {
    if (!is_numeric($id)) {
      throw new \InvalidArgumentException('This method requires a numeric job id.');
    }

    $job = new Job();
    $job->fromArray($this->client->getJob($id));
    return $job;
  }

  /**
   * Get multiple jobs.
   *
   * @param array $ids
   *   A list of Job IDs.
   *
   * @return array
   *   A list of Jobs.
   */
  public function getJobs(array $ids) {
    return $this->__getJobsByData($this->client->getJobs($ids));
  }

  /**
   * Filter Jobs on IDs, State or Queue list.
   *
   * @param bool|array $ids
   * @param bool $state
   * @param bool $queue
   */
  public function filterJobs($ids = FALSE, $state = FALSE, $queue = FALSE) {
    return $this->__getJobsByData($this->client->filterJobs($ids, $state, $queue));
  }

  /**
   * Helper method for getting Jobs.
   *
   * @param array $jobs_data
   *   A list of data from jobs.
   *
   * @return array
   *   A list of Jobs.
   */
  protected function __getJobsByData(array $jobs_data) {
    $jobs = [];

    foreach($jobs_data as $job_data) {
      $job = new Job();
      $job->fromArray($job_data);
      $jobs[] = $job;
    }

    return $jobs;
  }

}