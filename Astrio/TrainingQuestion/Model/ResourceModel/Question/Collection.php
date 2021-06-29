<?php

namespace Astrio\TrainingQuestion\Model\ResourceModel\Question;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Astrio\TrainingQuestion\Model\Question',
            'Astrio\TrainingQuestion\Model\ResourceModel\Question'
        );
    }
}
