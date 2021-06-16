<?php
namespace Astrio\TrainingModule1\Plugin;

use Astrio\TrainingModule1\Helper\Data;

class Task2Plugin
{
    protected $helper;

    public function __construct(Data $helper)
    {
        $this->helper = $helper;
    }

    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $text = $this->helper->getValue();
        $isEnabled = $this->helper->isEnabled();
        $result = 999;
        return $result;
    }
}
