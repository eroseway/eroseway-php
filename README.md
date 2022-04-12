# ERoseway PHP API client

ERoseway API Client for PHP.

## Manual installation

Download the
[latest release](https://github.com/ERoseway/ERoseway-php/releases). Then, to use
the bindings, include the `init.php` file.

```
require_once('/path/to/ERoseway-php/init.php');
```

## Requirements

- PHP 5.6.0+


# Usage

```PHP

require_once('vendor/autoload.php');


$api_client = new ERoseway\APIClient(
    'MY_CLINIC_ID',
    'MY_API_KEY',
    'MY_API_SECRET'
);

$users = $api_client->request(
    'get',
    'clinic-users',
    [
        'attributes' => [
            'first_name',
            'last_name'
        ],
        'filters-q' => 'ant'
    ]
);

```
