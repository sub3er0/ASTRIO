<?php

namespace Astrio\TrainingModule1\Block;

class Block5 extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }
    public function saySomething()
    {
        return __('<br>' . 'Hello from Block5 function saySomething');
    }
}
