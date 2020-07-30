<?php
namespace Myckhel\Checkwa\Traits;

use Illuminate\Support\Facades\Http;

/**
 * Default Check Mobi Requests
 */
trait HasQuery
{
  public static function check($number, $code, $extra = []){
    return self::post('', self::merge(
      [
        'action'    => 'check',
        'num'       => $number,
        'cod'       => $code,
        // 'hide_image'=> $extra['hide_image'] ?? 0,
      ], $extra
    ))->json();
  }
}
