<?php 

namespace SideInc;

defined('ABSPATH') || die();

use SideInc\Page\CreatePage\CreatePage;
use SideInc\Page\DeletePage\DeletePage;
use SideInc\Page\TrashPage\TrashPage;

/**
 * This is a bootstrap class
 * that shall be used to invoke
 * all other plugin functionalities
 */
class SideInc
{
    public function __construct($pluginLifeCycle)
    {
        //It will not execute except it is admin
        if(!is_admin()) return;

        //Runs once the plugin is activated
        if($pluginLifeCycle === ACTIVATE) new CreatePage();

        //Runs once the plugin is deactivated
        if($pluginLifeCycle === DEACTIVATE) new TrashPage();

        //Runs once the plugin is unistalled
        if($pluginLifeCycle === UNINSTALL) new DeletePage();
    }
}
