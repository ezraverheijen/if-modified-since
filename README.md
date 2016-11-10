# If-Modified-Since

![Version](https://img.shields.io/badge/version-1.2.0-green.svg) ![License](https://img.shields.io/badge/license-MIT-green.svg) ![PHP Version](https://img.shields.io/badge/PHP-5.4%2B-red.svg)

*Version 1.1.0*

PHP class to handle the `If-Modifed-Since` functionality as described [here](https://varvy.com/ifmodified.html).

## Setup

**IMPORTANT**: This code always needs to run before ANY other output!

### Example 1:

```php
<?php
require 'if-modified-since.php';

use EzraVerheijen\Classes\IfModifiedSince;

$timestamp = filemtime(__FILE__);
new IfModifiedSince($timestamp);
?>
<!DOCTYPE html>
<html>
<head>
// rest of the page
```

### Example 2 (WordPress):

```php
<?php
require 'if-modified-since.php';

add_action( 'template_redirect', function() {
    global $post;
    $timestamp = get_post_modified_time( 'U', false, $post->ID );
    new EzraVerheijen\Classes\IfModifiedSince( $timestamp );
} );
```

## Changelog

**1.2.0**

- Added namespace

**1.1.0**

- Removed support for PHP < 5.4

**1.0.0**

- Initial release

## Requirements

- PHP 5.4+

## Disclaimer

This software is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/ezraverheijen/if-modified-since/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this software in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Ezra Verheijen](https://github.com/ezraverheijen)