<?php 

namespace SideInc\Page\TrashPage;

use SideInc\Page\Page;

defined('ABSPATH') || die();

/**
 * This class will programmatically
 * trash the page created by Id
 */
class TrashPage extends Page
{
    public function __construct()
    {
        parent::__construct();

        //fail fast
        if(!$this->pageExists()) return;

        $this->trashPage();
    }

    /**
     * Method that moves to trash
     * the page created by this plugin
     *
     * @return void
     */
    public function trashPage()
    {
        wp_trash_post($this->getPageID());
    }
}
