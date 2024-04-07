<?php
namespace Magebit\Faq\Block\Adminhtml\Question\Edit;

class GenericButton
{
    protected $urlBuilder;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
    }

    public function getBackUrl()
    {
        return $this->urlBuilder->getUrl('*/*/');
    }
}
