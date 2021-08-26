<?php

namespace App\Api\Instagram\Models;

class InstagramUserProfile
{
  public $id;

  public $username;

  public $picture;

  public $followers;

  public $followings;

    /**
     * @param $data
     */
  public function __construct($data)
  {
        $this->id = $data['id'];
        $this->username = $data['username'];
        $this->picture = $data['picture'];
        $this->followers = $data['followers'];
        $this->followings = $data['followings'];
  }
}
