<?php

namespace Astrio\TrainingModule1\Block;

class Block7 extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }
    public function displaySomething()
    {
        return __('<br>' . 'Hello from Block7 function displaySomething');
    }
}
