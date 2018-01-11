<?php

namespace Vulcan\SecureLinkParser;

use SilverStripe\Core\Config\Configurable;
use SilverStripe\Core\Injector\Injectable;
use Vulcan\SecureLinkParser\Pages\SecureLinkParserPage;

/**
 * Class SecureLinkParser
 * @package Vulcan\SecureLinkParser
 */
class SecureLinkParser
{
    use Injectable, Configurable;

    public static function getSecureLink($externalUrl)
    {
        $linkPage = static::getPage();
        return $linkPage->Link('?url=' . $externalUrl);
    }

    /**
     * @return \SilverStripe\ORM\DataObject|SecureLinkParserPage
     * @throws \RuntimeException
     */
    public static function getPage()
    {
        $linkPage = SecureLinkParserPage::get()->first();

        if (!$linkPage) {
            throw new \RuntimeException('No SecureLinkParserPage was found in SiteTree');
        }

        return $linkPage;
    }
}