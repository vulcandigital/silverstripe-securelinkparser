<?php

namespace Vulcan\SecureLinkParser\Models;

use SilverStripe\ORM\DataObject;

/**
 * Class LinkHit
 * @package Vulcan\SecureLinkParser\Models
 *
 * @property string URL
 * @property int Hits
 */
class LinkHit extends DataObject
{
    private static $db = [
        'URL'  => 'Varchar(255)',
        'Hits' => 'Int'
    ];

    /**
     * @param     $url
     * @param int $amount
     *
     * @return int|mixed
     */
    public static function increment($url, $amount = 1)
    {
        $record = static::get()->filter('URL', $url)->first();

        if (!$record) {
            $record = static::create();
            $record->URL = $url;
        }

        $record->Hits = $record->Hits + $amount;
        $record->write();

        return $record->Hits;
    }
}