<?php

namespace SideInc\Page\DeletePage;

use SideInc\Page\Page;

defined('ABSPATH') || die();

/**
 * Programmatically delete the page
 * Property Listing
 */
class DeletePage extends Page
{

    public function __construct()
    {
        parent::__construct();

        //fail fast
        if(!$this->pageExists()) return;

        $this->deletePage();
    }

    /**
     * This method deletes not only the
     * page this plugin created, but all
     * related data stored in db
     *
     * @return void
     */
    private function deletePage()
    {
        wp_delete_post($this->getPageID(), true);
    }

}
