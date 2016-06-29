# If Modified Since

PHP class to handle the `If Modifed Since` functionality as described [here](https://www.feedthebot.com/ifmodified.html).

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


That's it!
