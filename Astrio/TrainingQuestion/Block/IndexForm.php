<?php
namespace Astrio\TrainingQuestion\Block;
class IndexForm extends \Magento\Framework\View\Element\Template
{
    protected $questionFactory;
    protected $questionCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Astrio\TrainingQuestion\Model\QuestionFactory $questionFactory,
        \Astrio\TrainingQuestion\Model\ResourceModel\Question\CollectionFactory $questionCollectionFactory
    )
    {
        $this->questionFactory = $questionFactory;
        $this->questionCollectionFactory = $questionCollectionFactory;
        parent::__construct($context);
    }

    public function getFormAction()
    {
        return $this->getUrl('trainingquestion/question/form', ['_secure' => true]);
    }

    public function getQuestionsCollection(){
        $post = $this->questionFactory->create();
        return $post->getCollection();
    }

    public function getFiltredQuestionsCollection(){
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->create('\Magento\Store\Model\StoreManagerInterface');
        $storeId = $storeManager->getStore()->getId();

        $questionsCollection = $this->questionCollectionFactory->create();
        $questionsCollection->addFieldToFilter('store_id', $storeId);

        return $questionsCollection->getItems();
    }
}
