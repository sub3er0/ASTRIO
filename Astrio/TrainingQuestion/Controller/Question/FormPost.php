<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Astrio\TrainingQuestion\Controller\Question;

use Astrio\TrainingQuestion\Model\QuestionFactory;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;


class FormPost extends \Magento\Framework\App\Action\Action implements HttpPostActionInterface
{

    /**
     * @var Context
     */
    private $context;

    private $questionFactory;

    private $storeManager;

    private $date;

    private $dataPersistor;

    private $questionResourse;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context,
        QuestionFactory $_questionFactory,
        \Astrio\TrainingQuestion\Model\ResourceModel\Question $questionResourse,
        DataPersistorInterface $dataPersistor,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        parent::__construct($context);
        $this->context = $context;
        $this->questionFactory = $_questionFactory;
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        $this->date = $date;
        $this->questionResourse = $questionResourse;
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
            $this->dataPersistor->clear('contact_us');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->dataPersistor->set('contact_us', $this->getRequest()->getParams());
        } catch (\Exception $e) {
            $this->dataPersistor->set('contact_us', $this->getRequest()->getParams());
            $this->messageManager->addErrorMessage(
                __('An error occurred while processing your form. Please try again later.')
            );
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
        $_data['store_id'] = $this->storeManager->getStore()->getId();
        $_data['creation_time '] = $this->date->gmtDate();
        $model->setData($_data);
        $this->questionResourse->save($model);
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
        if (trim($request->getParam('content')) === '') {
            throw new LocalizedException(__('Enter the question and try again.'));
        }
        if (trim($request->getParam('hideit')) !== '') {
            throw new \Exception();
        }

        return $request->getParams();
    }
}
