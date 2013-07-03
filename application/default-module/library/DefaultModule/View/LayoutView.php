<?php

namespace DefaultModule\View;

use Squirrel\Framework\View\HtmlView;

/**
 * @package DefaultModule\View
 * @author Valérian Galliat
 */
class LayoutView extends HtmlView
{
    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return $this->renderTemplate('default-module/layout');
    }

    /**
     * @return string
     */
    protected function getTitleBlock()
    {
        return '';
    }

    /**
     * @return string
     */
    protected function getStylesBlock()
    {
        return $this->html->style($this->getAsset('styles/reset.css'));
    }

    /**
     * @return string
     */
    protected function getBodyBlock()
    {
        return '';
    }

    /**
     * @return string
     */
    protected function getScriptsBlock()
    {
        return '';
    }
}
