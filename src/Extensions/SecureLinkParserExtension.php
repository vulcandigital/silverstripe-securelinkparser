<?php

namespace Vulcan\SecureLinkParser\Extensions;

use SilverStripe\Core\Extension;
use Vulcan\SecureLinkParser\SecureLinkParser;

class SecureLinkParserExtension extends Extension
{
    public function SecureUserProvidedLink($link)
    {
        return SecureLinkParser::getSecureLink($link);
    }
}