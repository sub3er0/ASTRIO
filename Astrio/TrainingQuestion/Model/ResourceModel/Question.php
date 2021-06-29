<?php

namespace Astrio\TrainingQuestion\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Question extends AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('training_question', 'question_id');
    }
}
