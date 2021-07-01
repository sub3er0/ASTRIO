<?php

namespace Astrio\TrainingQuestion\Controller\Question;

use Astrio\TrainingQuestion\Model\Question;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Astrio\TrainingQuestion\Model\QuestionFactory;

class Index extends Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

}
