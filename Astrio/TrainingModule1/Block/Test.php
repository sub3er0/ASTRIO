<?php

namespace Astrio\TrainingModule1\Block;

use Magento\Framework\View\Element\AbstractBlock;

class Test extends AbstractBlock {

    protected function _toHtml()
    {
        $html = 'TEST';
        return $html;
    }
}
