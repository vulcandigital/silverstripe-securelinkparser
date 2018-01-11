<?php

namespace Vulcan\SecureLinkParser\Pages;

use SilverStripe\Control\Director;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\Requirements;
use Vulcan\SecureLinkParser\Models\LinkHit;

/**
 * Class SecureLinkParserPage
 * @package Vulcan\SecureLinkParser\Pages
 */
class SecureLinkParserPage extends \Page
{
    private static $create_default_page = false;

    public function requireDefaultRecords()
    {
        parent::requireDefaultRecords();

        if (!static::get()->first() && $this->config()->get('create_default_page')) {
            $page = static::create();
            $page->Title = 'Redirecting';
            $page->ShowInSearch = false;
            $page->ShowInMenus = false;
            $page->URLSegment = 'external-links';
            $page->write();

            $page->publishSingle();
        }
    }
}