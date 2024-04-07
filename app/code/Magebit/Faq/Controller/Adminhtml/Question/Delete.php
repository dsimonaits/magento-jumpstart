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

class Delete extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magebit_Faq::delete';
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
        // Load the item ID from the request
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            try {
                // Load the model
                $model = $this->faqModel;
                $this->faqResourceModel->load($model, $id);

                // Delete the model
                $this->faqResourceModel->delete($model);

                // Display success message
                $this->messageManager->addSuccessMessage(__('The FAQ has been deleted.'));

                // Redirect to the grid page
                return $this->_redirect('*/*/');
            } catch (\Exception $e) {
                // Display error message
                $this->messageManager->addErrorMessage($e->getMessage());

                // Redirect back to the edit form if there is an error
                return $this->_redirect('*/*/edit', ['id' => $id]);
            }
        }

        // Display error message if no ID found
        $this->messageManager->addErrorMessage(__('We can\'t find a FAQ to delete.'));

        // Redirect to the grid page
        return $this->_redirect('*/*/');
    }
}
