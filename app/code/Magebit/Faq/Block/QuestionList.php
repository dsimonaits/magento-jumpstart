<?php

namespace Magebit\Faq\Block;

class QuestionList extends \Magento\Framework\View\Element\Template
{
    protected $_faqCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magebit\Faq\Model\ResourceModel\Question\CollectionFactory $faqCollectionFactory,
        array $data = []
    ) {
        $this->_faqCollectionFactory = $faqCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getFaqQuestions()
    {
        $collection = $this->_faqCollectionFactory->create();
        $collection->setOrder('position', 'ASC');
        return $collection;
    }
}
