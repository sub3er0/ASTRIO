<?php
namespace Astrio\TrainingModule1\Controller;

class CustomRouter implements \Magento\Framework\App\RouterInterface
{
    protected $actionFactory;
    protected $_response;
    public function __construct(
        \Magento\Framework\App\ActionFactory $actionFactory,
        \Magento\Framework\App\ResponseInterface $response
    ) {
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
    }

    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');

        if (strpos($identifier, 'lesson.html') !== false) {
            $request->setModuleName('trainingmodule1');
            $request->setControllerName('mycontroller');
            $request->setActionName('index');
            //return $this->actionFactory->create('Magento\Framework\App\Action\Forward', ['request' => $request]);
            return $this->actionFactory->create(Forward::class, ['request' => $request]);
        }
        return null;
    }
}
