<?php
return [
  "apikey"          => env("CHECKWA_API_KEY"),
  "user"            => env("CHECKWA_USER"),
  "server"          => env("CHECKWA_SERVER", 462),
  "server_type"     => env("CHECKWA_SERVER_TYPE", "public"),
  "callback"        => env("CHECKWA_CALLBACK"),
];
