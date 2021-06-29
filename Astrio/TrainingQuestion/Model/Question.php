<?php

namespace Astrio\TrainingQuestion\Model;

use Magento\Framework\Model\AbstractModel;

class Question extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Astrio\TrainingQuestion\Model\ResourceModel\Question');
    }
}
