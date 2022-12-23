## PHP Enum Methods


### Installation
```
composer require fatihirday/enummethods
``` 

### Examples
----

#### Create Enum
```php
<?php

use Fatihirday\EnumMethods\EnumMethods;

enum HttpMethods: string
{
    use EnumMethods;

    case GET = 'get';
    case POST = 'post';
}
```

#### Get Enum All Names
```php
<?php

HttpMethods::names();

// Array
// (
//     [0] => GET
//     [1] => POST
// )


HttpMethods::names(operator: ', ');

// GET, POST

```

#### Get Enum All Values
```php
<?php

HttpMethods::values();

// Array
// (
//     [0] => get
//     [1] => post
// )


HttpMethods::values(operator: ', ');

// get, post

```


#### Enum to Array
```php
<?php

HttpMethods::toArray();

//    Array
//    (
//        [GET] => get
//        [POST] => post
//    )


HttpMethods::toArray(key: 'value');

//    Array
//    (
//        [get] => GET
//        [post] => POST
//    )

```
