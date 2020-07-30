<?php
namespace Myckhel\Checkwa\Traits;

use Illuminate\Support\Facades\Http;
use Myckhel\Checkwa\CheckwaConfig;

/**
 *
 */
trait Request
{
  public static function cw(){
    return new CheckwaConfig;
  }

  public static function post($endpoint, $params)
  {
    return self::request($endpoint, $params, 'post');
  }

  public static function delete($endpoint, $params)
  {
    return self::request($endpoint, $params, 'delete');
  }

  public static function put($endpoint, $params)
  {
    return self::request($endpoint, $params, 'put');
  }

  public static function get($endpoint, $params)
  {
    return self::request($endpoint, $params);
  }

  public static function merge($ar, $arr){
    return array_merge($ar, $arr);
  }

  public static function request($endpoint, $params, $method = 'get')
  {
    $cw       = self::cw();

    $type     = $cw->type;
    $url      = $cw->url;
    $apikey   = $cw->apikey;
    $user     = $cw->user;
    $server   = $cw->server;
    $callback = $cw->callback;

    $res = Http::withHeaders([
      'Content-Type'  => 'application/json',
    ])
    ->$method(
      $url,
      self::merge(
        [
          'user'      => $user,
          'apikey'    => $apikey,
          'callback'  => $callback,
          'server'    => $server,
        ],
        $params,
      )
    );

    if ($res->failed()) {
      $res->throw();
    } else {
      return $res;
    }
  }
}
