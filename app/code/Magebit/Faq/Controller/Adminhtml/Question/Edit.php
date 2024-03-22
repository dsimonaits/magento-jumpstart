<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\Faq\Controller\Adminhtml\Question;

class Edit extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magebit_Faq::manage';
    protected $resultPageFactory;
    protected $faqModel;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magebit\Faq\Model\Question $faqModel
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->faqModel = $faqModel;
    }

    public function execute()
    {
        // Load ID from the request
        $id = $this->getRequest()->getParam('id');

        // Initialize model and load by ID if it's present
        $model = $this->faqModel;
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This FAQ no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        // Set data in the registry to make it available in the form
        $this->_coreRegistry->register('faq_question', $model);

        // Prepare the result page and set the active menu and title
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magebit_Faq::faq_manager');
        $title = $id ? __('Edit FAQ') : __('New FAQ');
        $resultPage->getConfig()->getTitle()->prepend($title);

        return $resultPage;
    }
}
