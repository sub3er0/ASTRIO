<?php

namespace Astrio\TrainingModule6\Model\Entity\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class MultiselectSource6 extends AbstractSource
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => 'label1', 'value' => 'value1'],
                ['label' => 'label2', 'value' => 'value2'],
                ['label' => 'label3', 'value' => 'value3'],
                ['label' => 'label4', 'value' => 'value4']
            ];
        }
        return $this->_options;
    }

    public function getOptionText($value)
    {
        return $value;
    }

}
