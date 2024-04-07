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
use Psr\Log\LoggerInterface;

class Index extends \Magento\Backend\App\Action
{
    protected $logger;
    const ADMIN_RESOURCE = 'Magebit_Faq::manage'; // Must match the ACL resource ID

    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory, LoggerInterface $logger
    ) {
        $this->logger =$logger;
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $this->logger->info("FAQ page accessed");

        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magebit_Faq::faq_manager'); // Must match the menu ID
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ Questions'));

        return $resultPage;
    }
}
