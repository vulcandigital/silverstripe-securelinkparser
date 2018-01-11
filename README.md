# silverstripe-securelinkparser
This module provides you with a page and the functionality to redirect viewers to user defined links to:

## What's it do?
* Warns the viewer that they're about to be redirected to external link
* Give the user the ability to cancel the redirection. 
* If they cancel then provide them with an option to continue to the link anyway in case they changed their mind.

## Requirements
* silverstripe/framework: ^4
* silverstripe/cms: ^4

## Installation
```bash
composer install vulcandigital/silverstripe-securelinkparser
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