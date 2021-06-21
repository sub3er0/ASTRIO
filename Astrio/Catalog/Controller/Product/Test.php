<?php

namespace Astrio\Catalog\Controller\Product;

use Magento\Framework\Controller\ResultFactory;

class Test extends \Magento\Framework\App\Action\Action

{

    public function __construct(
        \Magento\Framework\App\Action\Context $context
    )
    {
        return parent::__construct($context);
    }

    public function execute()
    {
        /* Create array for return value */
        $response['value1'] = "Value one";
        $response['value2'] = "Value Two";
        $response['value3'] = "Value Three";

        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($response);

        return $resultJson; // return json object
    }

}
