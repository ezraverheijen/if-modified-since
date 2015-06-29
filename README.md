# If Modified Since

PHP class to handle the `If Modifed Since` functionality as described [here](https://www.feedthebot.com/ifmodified.html).

Requires PHP >= 5.4

If you're using a PHP version lower than 5.4 replace `http_response_code(304)` in the `setHeaders()` method with:

```php
$protocol = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0';
header($protocol . ' 304 Not Modified');
```

**NOTE**: This code always needs to run before ANY other output!

### Example 1:

```php
<?php
require 'if-modified-since.php';

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
    new IfModifiedSince( $timestamp );
} );
```

### Example 3 (Kirby):

1. Copy the `if-modified-since` folder into site/plugins
2. Add the following line of code to site/snippets/header.php

```php
<?php new IfModifiedSince($page->modified()) ?>
<!DOCTYPE html>
<html>
<head>
// rest of the page
```

That's it!
