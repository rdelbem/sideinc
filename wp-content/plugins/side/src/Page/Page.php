<?php

namespace SideInc\Page;

defined('ABSPATH') || die();

/**
 * Model for the other page related
 * classes; it contains all the required
 * or basic methods
 */
class Page
{
    /**
     * Title of the page
     * programmatically created
     *
     * @var string
     */
    public $pageTitle;

    /**
     * Post meta meta key
     *
     * @var string
     */
    public $metaKey;

    /**
     * Post meta meta value
     *
     * @var string
     */
    public $metaValue;

    public function __construct()
    {
        $this->pageTitle = PROPERTY_LISTING_PAGE_NAME;

        $this->metaKey = PROPERTY_LISTING_META_KEY;

        $this->metaValue = PROPERTY_LISTING_META_VALUE;
    }

    /**
     * Checks if the page
     * already exists
     *
     * @return boolean
     */
    public function pageExists()
    {
        $page = get_page_by_title($this->pageTitle, 'OBJECT', 'page');

        if(empty($page)) {
            return false;
        }

        return true;
    }

    /**
     * Returns the ID of the correct
     * page/post created by this plugin
     *
     * @return array
     */
    public function getPageID()
    {
        global $wpdb;

        $query = "SELECT `post_id` from $wpdb->postmeta WHERE `meta_value` = '" . $this->metaValue ."'";

        $results = $wpdb->get_results($query, ARRAY_A);

        if(is_array($results)){
            $results = $results[0]['post_id'];
        }

        return $results;
    }
}
