<?php

namespace Vulcan\SecureLinkParser\Pages;

use SilverStripe\Control\Director;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\Requirements;
use Vulcan\SecureLinkParser\Models\LinkHit;

/**
 * Class SecureLinkParserPageController
 * @package Vulcan\SecureLinkParser\Pages
 */
class SecureLinkParserPageController extends \PageController
{
    private static $allowed_actions = [
        'index'
    ];

    public function init()
    {
        parent::init();

        Requirements::javascript('vulcandigital/silverstripe-securelinkparser:javascript/securelinkparser.js');
    }

    /**
     * Handle the redirection
     *
     * @param HTTPRequest $request
     *
     * @return \SilverStripe\Control\HTTPResponse|string
     */
    public function index(HTTPRequest $request)
    {
        $url = $request->getVar('url');
        $validUrl = ($url) ? filter_var($url, FILTER_VALIDATE_URL) : false;

        if ($validUrl) {
            LinkHit::increment($url);

            return $this->render([
                'Destination' => $url
            ]);
        }

        return $this->redirect(Director::baseURL());
    }
}