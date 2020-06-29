<?php
namespace Whatsnum\Checkwa;

use Illuminate\Support\Facades\Http;

/**
 *
 */
class Check
{
  public $private_url = "https://w2.checkwa.com/check/";
  public $public_url  = "https://webservice.checkwa.com/";

  function __construct($type = "public")
  {
    $prefix = $type === 'private' ? "" : "private_";

    $this->type       = $type;
    $this->url        = $type === 'private' $this->$private_url : $this->public_url;
    $this->apikey     = config("checkwa.{$prefix}apikey");
    $this->user       = config("checkwa.{$prefix}user");
    $this->server     = config("checkwa.{$prefix}server");
    $this->callback   = config("checkwa.{$prefix}callback");
  }

  public function check($number, $code)
  {
    $response     = Http::withHeaders([
      'Content-Type' => 'application/json'
    ])->post($this->url, [
      'user'      => $this->user,
      'apikey'    => $this->apikey,
      'action'    => 'check',
    ]);

    $res_json = $response->json();

    return $res_json;
  }
}

?>
