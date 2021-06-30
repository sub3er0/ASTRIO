<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Astrio\TrainingQuestion\Controller\Question;

use Astrio\TrainingQuestion\Model\QuestionFactory;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Contact\Model\ConfigInterface;
use Magento\Contact\Model\MailInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\DataObject;
use Magento\Framework\Stdlib\DateTime;

class FormPost extends \Magento\Framework\App\Action\Action implements HttpPostActionInterface
{

    /**
     * @var Context
     */
    private $context;

    private $questionFactory;

    private $_storeManager;

    private $_date;

    private $dataPersistor;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context,
        QuestionFactory $_questionFactory,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context);
        $this->context = $context;
        $this->questionFactory = $_questionFactory;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Post user question
     *
     * @return Redirect
     */
    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }
        try {
            $this->validatedParams();
            $this->saveData();
            $this->messageManager->addSuccessMessage(
                __('Thanks for contacting us with your comments and questions. We\'ll respond to you very soon.')
            );
            //$this->dataPersistor->clear('contact_us');
        } catch (\Exception $e) {

            //$this->dataPersistor->set('contact_us', $this->getRequest()->getParams());
        }
        return $this->resultRedirectFactory->create()->setPath('trainingquestion/question/form');
    }

    /**
     * @param array $post Post data from contact form
     * @return void
     */
    private function saveData()
    {
        $model = $this->questionFactory->create();
        $data = (array)$this->getRequest()->getPost();
        $_data['name'] = $data['name'];
        $_data['content'] = $data['content'];
        $storeManager = \Magento\Framework\App\ObjectManager::getInstance()->get('\Magento\Store\Model\StoreManagerInterface');
        $_data['store_id'] = $storeManager->getStore()->getId();
        $date = \Magento\Framework\App\ObjectManager::getInstance()->get('\Magento\Framework\Stdlib\DateTime\DateTime');
        $_data['creation_time '] = $date->gmtDate();
        $model->setData($_data);
        $model->save();
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function validatedParams()
    {
        $request = $this->getRequest();
        if (trim($request->getParam('name')) === '') {
            throw new LocalizedException(__('Enter the Name and try again.'));
        }
        if (trim($request->getParam('question')) === '') {
            throw new LocalizedException(__('Enter the question and try again.'));
        }
        if (trim($request->getParam('hideit')) !== '') {
            throw new \Exception();
        }

        return $request->getParams();
    }
}
