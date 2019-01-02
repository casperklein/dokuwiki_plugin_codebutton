<?php
/**
 * Action Plugin: Inserts a button into the toolbar to add file tags
 *
 * @author Heiko Barth
 */
 
if (!defined('DOKU_INC')) die();
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN', DOKU_INC . 'lib/plugins/');
require_once (DOKU_PLUGIN . 'action.php');
 
class action_plugin_codebutton extends DokuWiki_Action_Plugin {
 
    /**
     * Return some info
     */
    function getInfo() {
        return array (
            'author' => 'Heiko Barth',
            'date' => '2018-09-17',
            'name' => 'Toolbar Code Button',
            'desc' => 'Inserts a code button into the toolbar',
            'url' => 'https://www.heiko-barth.de/downloads/dw_codebutton.zip',
        );
    }
 
    /**
     * Register the eventhandlers
     */
    function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button', array ());
    }
 
    /**
     * Inserts the toolbar button
     */
    function insert_button(& $event, $param) {
        $event->data[] = array (
            'type' => 'format',
            'title' => $this->getLang('insertcode'),
            'icon' => '../../plugins/codebutton/image/code.png',
            'open' => '<file>\n',
            'close' => '\n</file>',
        );
    }
 
}
