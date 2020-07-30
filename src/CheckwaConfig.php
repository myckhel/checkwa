<?php
namespace Myckhel\Checkwa;

/**
 *
 */
class CheckwaConfig
{

  public $private_url = "https://w2.checkwa.com/check/";
  public $public_url  = "https://webservice.checkwa.com/";

  function __construct($config = [])
  {
    $type             = config("checkwa.server_type");
    // $prefix           = $type === 'private' ? "private_" : "";

    $this->type       = $type;
    $this->url        = $type === 'private' ? $this->private_url : $this->public_url;
    $this->apikey     = config("checkwa.apikey");
    $this->user       = config("checkwa.user");
    $this->server     = config("checkwa.server");
    $this->callback   = config("checkwa.callback");
  }

}
