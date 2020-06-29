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
  public $hide_image  = 0;

  function __construct($type = "public", $config = [])
  {
    $prefix = $type === 'private' ? "private_" : "";

    $this->type       = $type;
    $this->url        = $type === 'private' ? $this->private_url : $this->public_url;
    $this->apikey     = config("checkwa.{$prefix}apikey");
    $this->user       = config("checkwa.{$prefix}user");
    $this->server     = config("checkwa.server");
    $this->callback   = config("checkwa.callback");
  }

  public function check($number, $code, $extra = [])
  {
    $response     = Http::withHeaders([
      'Content-Type' => 'application/json'
    ])->post($this->url, array_merge([
      'user'      => $this->user,
      'apikey'    => $this->apikey,
      'action'    => 'check',
      'num'       => $number,
      'cod'       => $code,
      'callback'  => $this->callback,
      'server'    => $this->server,
      // 'token'     => $extra['token'] ?? null,
      // 'hide_image'=> $extra['hide_image'] ?? 0,
    ], $extra));

    return $response->json();
  }
}

?>
