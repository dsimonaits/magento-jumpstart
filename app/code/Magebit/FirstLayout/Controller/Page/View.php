<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\FirstLayout\Controller\Page;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;

class View implements ActionInterface
{
    private PageFactory $resultPageFactory;

    public function __construct(PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute(): Page
    {
        /** @var Page $page */
        $page = $this->resultPageFactory->create();

        /** @var Template $block */

        $block = $page->getLayout()->getBlock('magebit.first.layout.example');
        $block->setData('custom_parameter', 'Data from the Controller');

        return $page;
    }
}
