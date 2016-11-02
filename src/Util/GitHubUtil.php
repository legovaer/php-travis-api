<?php

namespace Legovaer\TravisCI\Util;

use GuzzleHttp\Client;

class GitHubUtil {

  public function getRawFileContents($slug, $fileName, $branch = 'master') {
    $client = new Client();
    $url = "https://rawgit.com/$slug/$branch/$fileName";
    return $client->get($url)->getBody()->getContents();
  }

}