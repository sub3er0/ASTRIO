<?php
namespace Astrio\TrainingModule1\Plugin;

class Task2Plugin
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $result = 999;
        return $result;
    }
}
