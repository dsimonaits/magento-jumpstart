<?php

namespace Magebit\Faq\Block\Adminhtml\Question\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndClose extends GenericButton implements ButtonProviderInterface
{
     public function getButtonData()
    {
        return [
            'label' => __('Save Question and Close'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'on_click' => 'saveAndClose()',
        ];
    }
}
