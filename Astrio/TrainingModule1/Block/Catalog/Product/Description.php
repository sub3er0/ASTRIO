<?php

namespace Astrio\TrainingModule1\Block\Catalog\Product;

class Description extends \Magento\Catalog\Block\Product\View\Description
{
    public function _beforeToHtml()
    {
        $this->getProduct()->setData('description', 'Мое описание');
    }
}

?>
