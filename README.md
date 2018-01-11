# silverstripe-securelinkparser
This module provides you with a page and the functionality to redirect viewers to user defined links to:

> **TL;DR** Will convert "https://google.com" into "https://yourdomain.com/external-links?url=https://google.com"

## What's it do?
* Warns the viewer that they're about to be redirected to external link
* Give the user the ability to cancel the redirection. 
* If they cancel then provide them with an option to continue to the link anyway in case they changed their mind.
* Track how many hits an external URL has had from your domain.
* Prevents potentially breaking SSL due to insecure links

## Requirements
* silverstripe/framework: ^4
* silverstripe/cms: ^4

## Installation
```bash
composer install vulcandigital/silverstripe-securelinkparser
```

## Usage
An extension is packaged with this module and gives you access to the `$SecureUserDefinedLink` method from within any `PageController`

```twig
<a href='$SecureUserDefinedLink($CustomLink)'>$CustomLinkTitle</a>
```

or

```php
$link = \Vulcan\SecureLinkParser\SecureLinkParser::getSecureLink($this->CustomLink);
```

## Configuration
The only configuration variable available is `create_default_page`, which will create the redirection page automatically upon `dev/build`

```yml
Vulcan\SecureLinkParser\Pages\SecureLinkParserPage:
    create_default_page: true
```

> This is disabled by default, so you will need to create the page yourself anywhere in the site tree.

## License

[BSD 3-Clause](LICENSE.md) © Vulcan Digital Ltd