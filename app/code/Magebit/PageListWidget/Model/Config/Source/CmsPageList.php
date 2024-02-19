<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\PageListWidget\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Cms\Model\ResourceModel\Page\CollectionFactory as PageCollectionFactory;

class CmsPageList implements OptionSourceInterface
{
    protected PageCollectionFactory $pageCollectionFactory;

    public function __construct(PageCollectionFactory $pageCollectionFactory)
    {
        $this->pageCollectionFactory = $pageCollectionFactory;
    }

    public function toOptionArray(): array
    {
        $collection = $this->pageCollectionFactory->create();
        $pages = [];
        // Retrieve all CMS pages for Specific Pages Multiselect
        foreach ($collection as $page) {

            $pages[] = ['value' => $page->getId(), 'label' => $page->getTitle()];
        }
        return $pages;
    }
}
