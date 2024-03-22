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

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magebit_Faq::manage';
    protected $faqModel;
    protected $faqResourceModel;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magebit\Faq\Model\Question $faqModel,
        \Magebit\Faq\Model\ResourceModel\Question $faqResourceModel
    ) {
        parent::__construct($context);
        $this->faqModel = $faqModel;
        $this->faqResourceModel = $faqResourceModel;
    }

    public function execute()
    {
        // Check if form data is posted
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            // Initialize model
            $model = $this->faqModel;

            // Load the item if we have an ID
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $this->faqResourceModel->load($model, $id);
            }

            // Set data to model
            $model->setData($data);

            // Save model to database
            try {
                $this->faqResourceModel->save($model);
                $this->messageManager->addSuccessMessage(__('FAQ saved successfully.'));
                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    return $this->_redirect('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $this->_redirect('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $this->_redirect('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
            }
        }
        return $this->_redirect('*/*/');
    }
}
