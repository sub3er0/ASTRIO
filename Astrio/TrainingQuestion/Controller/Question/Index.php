<?php

namespace Astrio\TrainingQuestion\Controller\Question;

use Astrio\TrainingQuestion\Model\Question;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Astrio\TrainingQuestion\Model\QuestionFactory;

class Index extends Action
{
    /**
     * @var \Astrio\TrainingQuestion\Model\QuestionFactory
     */
    protected $_modelQuestionFactory;

    /**
     * @param Context $context
     * @param QuestionFactory $modelQuestionFactory
     */
    public function __construct(
        Context $context,
        QuestionFactory $modelQuestionFactory
    ) {
        parent::__construct($context);
        $this->_modelQuestionFactory = $modelQuestionFactory;
    }

    public function execute()
    {
        $questionModel = $this->_modelQuestionFactory->create();

        // Load the item with ID is 1
        $item = $questionModel->load(1);
        var_dump($item->getData());

        // Get sample collection
        $questionCollection = $questionModel->getCollection();
        // Load all data of collection
        var_dump($questionCollection->getData());
    }
}
