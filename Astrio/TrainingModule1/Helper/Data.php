<?php

namespace Astrio\TrainingModule1\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    public function isEnabled($scope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE)
    {
        return $this->scopeConfig->isSetFlag(
            "a_unique_section_id/a_unique_group_id/select_id",
            $scope
        );
    }
    public function getValue($scope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE)
    {
        return $this->scopeConfig->getValue(
            "a_unique_section_id/a_unique_group_id/text_id",
            $scope
        );
    }

}
