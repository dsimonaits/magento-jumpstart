<?php
namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magebit\Faq\Model\QuestionFactory;
class Edit extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magebit_Faq::edit';

    protected $resultPageFactory;
    protected $faqFactory;

    protected $_coreRegistry;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magebit\Faq\Model\QuestionFactory $faqFactory,
        Registry $coreRegistry // Add this line
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->faqFactory = $faqFactory;
        $this->_coreRegistry = $coreRegistry; // Add this line
    }

    public function execute()
    {
        // Load ID from the request
        $id = $this->getRequest()->getParam('id');

        // Initialize the model based on the ID
        $model = $this->faqFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This question no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        // Register the model so that other blocks can use it
        $this->_coreRegistry->register('faq_question', $model);

        // Build edit form
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magebit_Faq::faq_manager');
        $title = $model->getId() ? __('Edit Question') : __('New Question');
        $resultPage->getConfig()->getTitle()->prepend($title);

        return $resultPage;
    }
}
