<?php

namespace Magebit\Faq\Block\Adminhtml\Question\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class BackButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Go Back'),
            'class' => 'back primary',
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'sort_order' => 80,
        ];
    }
}
