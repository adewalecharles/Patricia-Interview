# Quick Documentation

## Installation

To install this lumen laravel project, you must run the commands bellow.

```bash
git pull

composer install

php artisan jwt:secret
```

# Quick API Documentation

## LOGIN

REQUEST: POST

ENDPOINT: /api/vi/login

Payload: 

identity -> username/password
password -> your_sercret_password

Sample Response:

```bash
{
   {
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE2MDA5NDk4MjEsImV4cCI6MTYwMDk1MzQyMSwibmJmIjoxNjAwOTQ5ODIxLCJqdGkiOiJPcDNlZ29GdWtsNmRoYVJJIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.SuCYUBFv8CTyZR6Fk4wREw82BBHZaS90-vNCK7zAg9Y",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": {
        "id": 1,
        "username": "adewalecharles",
        "email": "shyprince1@gmail.com",
        "created_at": "2020-09-24T12:16:03.000000Z",
        "updated_at": "2020-09-24T12:16:03.000000Z"
    }
}
}
```

## REGISTER

REQUEST: POST

ENDPOINT: /api/v1/register

Payload:

username -> 
email ->
password ->
password_confirmation -> 

Sample Response:

```bash
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvcmVnaXN0ZXIiLCJpYXQiOjE2MDA5NDk3NjMsImV4cCI6MTYwMDk1MzM2NCwibmJmIjoxNjAwOTQ5NzY0LCJqdGkiOiJJaFR4bEdLMmE1bTdMRWpxIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.3hoQpziQeXSrl5b6TVS3v7Lh2WKaT9AOIG9gv-4E4yY",
    "token_type": "bearer",
    "expires_in": 3600,
    "user": null
}
```

## CURRENTLY AUTH USER PROFILE
REQUEST: GET

ENDPOINT: /api/v1/profile

Payload:

Authorization: Bearer token

## GET ALL USER LIST

REQUEST: GET

ENDPOINT: /api/v1/users

Sample Response:

```bash
{
    "users": [
        {
            "id": 1,
            "username": "adewalecharles",
            "email": "shyprince1@gmail.com",
            "created_at": "2020-09-24T12:16:03.000000Z",
            "updated_at": "2020-09-24T12:16:03.000000Z"
        }
    ]
}
```

## GET A PARTICULAR USER

REQUEST: GET

ENDPOINT: /api/v1/single-user/{id}

Note id is the id of the user

# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
