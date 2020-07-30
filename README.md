# Checkwa
[![Latest Version](https://img.shields.io/github/release/whatsnum/checkwa.svg?style=flat-square)](https://github.com/whatsnum/checkwa/releases)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/whatsnum/checkwa/run-tests?label=tests)
[![Total Downloads](https://img.shields.io/packagist/dt/whatsnum/checkwa.svg?style=flat-square)](https://packagist.org/packages/whatsnum/checkwa)

Laravel package to check valid whatsapp number using checkwa api

## Requirements
PHP ^7

## Installation

Checkwa can be installed by updating composer.json with
```
"require": {
  "whatsnum/laravel-checkwa": "dev-master"
},
"repositories": [
      {
        "type": "vcs",
        "url": "https://github.com/whatsnum/checkwa.git"
      }
    ]
```
Then run

```
composer update
```

## Setup

Publish the config file
```
php artisan vendor:publish --provider="Whatsnum\Checkwa\CheckwaProvider" --tag="config"
```
checkwa.php should be copied to the config directory containing
```
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
```
Create environment variables in your app's .env file

```
CHECKWA_API_KEY=XXXXXX-XXXXXX-XXXXXX-XXXXXX-XXXXXX
CHECKWA_USER=user
CHECKWA_SERVER=40
CHECKWA_CALLBACK=https://api.callback.url/checkwa/callback
CHECKWA_PRIVATE_API_KEY=XXXXXX-XXXXXX-XXXXXX-XXXXXX-XXXXXX
CHECKWA_PRIVATE_USER=user
```

## Usage

### Check Valid Whatsapp Number Using Public Server
```
use Whatsnum\Checkwa\Check;
use Illuminate\Support\Str;
```
```
public function checkWa(Request $request){

  $checkwa = new Check();

  return $checkwa->check($request->phone, $request->phone_code, ['token' => Str::random(), 'hide_image' => '1']);
}
```
#### Example Valid Response
```
{
    "code": "001",
    "checks": 5,
    "limit": 5,
    "number": "2348123456789",
    "num": "8123456789",
    "cod": "234",
    "lastseen": "",
    "status": " 234 812 345 6789",
    "picture": "https://api.checkwa.com/img/n/8123456789.jpg"
}
```

### Check Valid Whatsapp Number Using Private Server
```
use Whatsnum\Checkwa\Check;
use Illuminate\Support\Str;
```
```
public function checkWa(Request $request){

  $checkwa = new Check('private');

  return $checkwa->check($request->phone, $request->phone_code, ['token' => Str::random(), 'hide_image' => '1']);
}
```
#### Example Valid Response Using Private Server
```
{
    "code": "1",
    "server": "54",
    "server_status": "1",
    "server_ping": "2020-06-29 16:40:19",
    "token": "nRBoSTOHNx1ueIwP",
    "callback": "https://api.callback.url/checkwa/callback"
}
```
