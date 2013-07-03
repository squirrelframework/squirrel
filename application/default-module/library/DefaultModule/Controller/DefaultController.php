<?php

namespace DefaultModule\Controller;

use Squirrel\Framework\Controller\Controller;

/**
 * Default controller showing a simple HTML page.
 *
 * @package DefaultModule\Controller
 * @author Valérian Galliat
 */
class DefaultController extends Controller
{
    /**
     * Shows the main page.
     */
    public function indexAction()
    {
        $this->context->get('response')->setBody($this->renderView('DefaultModule\View\IndexView'));
    }
}
