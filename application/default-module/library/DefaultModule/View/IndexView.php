<?php

namespace DefaultModule\View;

/**
 * @package DefaultModule\View
 * @author Valérian Galliat
 */
class IndexView extends LayoutView
{
    /**
     * {@inheritdoc}
     */
    protected function getTitleBlock()
    {
        return 'Hello world!';
    }

    /**
     * {@inheritdoc}
     */
    protected function getBodyBlock()
    {
        return $this->renderTemplate('default-module/index', array('title' => $this->getTitleBlock()));
    }
}
