# Pixels Social Share

Social Share component for WordPress.

- Generate share url for most common social media platforms
- Either share current url, or given url

# Install

`composer require pixelshelsinki/social-share`

# Usage

Pixels Social Share exposes a main "Share" class with methods for each social media platform. Either call them directly in PHP, or hook them up as Twig functions when working with Timber.

### Using with PHP


```php
<?php
use Pixels\Components\SocialShare\Share;

// Current url
$facebook_share = Share::facebook();
$twitter_share  = Share::twitter();
$linkedin_share = Share::linkedin();
$whatsup_share  = Share:: whatsup();

// Given url.
$facebook_share = Share::facebook('https://www.pixels.fi/');
$twitter_share  = Share::twitter('https://www.pixels.fi/');
$linkedin_share = Share::linkedin('https://www.pixels.fi/');
$whatsup_share  = Share::whatsup('https://www.pixels.fi/');

```

### Using with Twig / Timber.

Easiest way is to register the factory functions as Twig helper functions.

```php
<?php
use \Timber\Twig_Function;

add_filter( 'get_twig', array( 'add_share_functions' ) );

function add_share_functions( $twig ) {
    // Social share functions.
    $twig->addFunction( new Twig_Function( 'facebook_share', '\\Pixels\\Components\\SocialShare\\Share::facebook' ) );
    $twig->addFunction( new Twig_Function( 'twitter_share', '\\Pixels\\Components\\SocialShare\\Share::twitter' ) );
    $twig->addFunction( new Twig_Function( 'linkedin_share', '\\Pixels\\Components\\SocialShare\\Share::linkedin' ) );
    $twig->addFunction( new Twig_Function( 'whatsup_share', '\\Pixels\\Components\\SocialShare\\Share::whatsup' ) );

    return $twig;
}

```
