# Checkwa
[![Latest Version](https://img.shields.io/github/release/myckhel/checkwa.svg?style=flat-square)](https://github.com/myckhel/checkwa/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/myckhel/checkwa.svg?style=flat-square)](https://packagist.org/packages/myckhel/checkwa)

Laravel package to check valid whatsapp number using checkwa api

## Requirements
PHP ^7

## Installation

Checkwa can be installed using composer

```bash
composer require myckhel/checkwa
```

## Setup

Publish the config file
```bash
php artisan vendor:publish --provider="myckhel\Checkwa\CheckwaServiceProvider"
```
checkwa.php should be copied to the config directory containing
```php
<?php
return [
  "apikey"          => env("CHECKWA_API_KEY"),
  "user"            => env("CHECKWA_USER"),
  "server"          => env("CHECKWA_SERVER", 462),
  "server_type"     => env("CHECKWA_SERVER_TYPE", "public"),
  "callback"        => env("CHECKWA_CALLBACK"),
];
```
Create environment variables in your app's .env file

```env
CHECKWA_API_KEY=XXXXXX-XXXXXX-XXXXXX-XXXXXX-XXXXXX
CHECKWA_USER=user
CHECKWA_SERVER=40
CHECKWA_CALLBACK=https://api.callback.url/checkwa/callback
```

## Usage

### Check Valid Whatsapp Number Using Public Server
```php
use Checkwa;
use Illuminate\Support\Str;
```
```php
public function checkWa(Request $request){

  return Checkwa::check($request->phone, $request->phone_code, ['token' => Str::random(), 'hide_image' => '1']);
}
```
#### Example Valid Response
```json
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
```php
use Checkwa;
use Illuminate\Support\Str;
```
```php
public function checkWa(Request $request){

  return Checkwa::check($request->phone, $request->phone_code, ['token' => Str::random(), 'hide_image' => '1']);
}
```
#### Example Valid Response Using Private Server
```json
{
    "code": "1",
    "server": "54",
    "server_status": "1",
    "server_ping": "2020-06-29 16:40:19",
    "token": "nRBoSTOHNx1ueIwP",
    "callback": "https://api.callback.url/checkwa/callback"
}
```
