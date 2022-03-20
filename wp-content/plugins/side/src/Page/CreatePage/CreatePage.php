<?php

namespace SideInc\Page\CreatePage;

use SideInc\Page\Page;

defined('ABSPATH') || die();

/**
 * This class will programatically create
 * a new page for the property listing page
 * However, it will not do it more than once
 */
class CreatePage extends Page
{
    /**
     * The ID of the created page
     *
     * @var string
     */
    protected $pageID;

    public function __construct()
    {
        parent::__construct();

        //fail fast
        if($this->pageExists()) return;

        $this->createPage();
    }

    /**
     * Creates the page in
     * which the listing of
     * properties will be seen
     *
     * @return 
     */
    private function createPage()
    {        
        $pageID = wp_insert_post(
                [
                'comment_status' => 'close',
                'ping_status'    => 'close',
                'post_author'    => 1,
                'post_title'     => ucwords($this->pageTitle),
                'post_name'      => strtolower(str_replace(' ', '-', trim($this->pageTitle))),
                'post_status'    => 'publish',
                'post_content'   => '',
                'post_type'      => 'page',
                'meta_input'     => [
                    $this->metaKey => $this->metaValue
                ]
            ],
                true
        );
    }
}
