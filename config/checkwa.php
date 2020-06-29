<?php
return [
  "apikey"          => env("CHECKWA_API_KEY"),
  "user"            => env("CHECKWA_USER"),
  "server"          => env("CHECKWA_SERVER", 462),
  "callback"        => env("CHECKWA_CALLBACK"),
  "private_apikey"  => env("CHECKWA_PRIVATE_API_KEY"),
  "private_user"    => env("CHECKWA_PRIVATE_USER"),
];
?>
