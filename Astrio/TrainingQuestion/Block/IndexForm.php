<?php
namespace Astrio\TrainingQuestion\Block;
class IndexForm extends \Magento\Framework\View\Element\Template
{
    protected $questionFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Astrio\TrainingQuestion\Model\QuestionFactory $questionFactory
    )
    {
        $this->questionFactory = $questionFactory;
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

    public function getSortedQuestionsCollection(){
        $question = $this->questionFactory->create();
        $questionsCollection =  $question->getCollection()->getData();

        usort($questionsCollection, function($a, $b)
        {
            if ($a["store_id"] == $b["store_id"])
                return (0);
            return (($a["store_id"] < $b["store_id"]) ? -1 : 1);
        });
        return $questionsCollection;
    }
}
