<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This file is part of the Magebit package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Cms\Model\ResourceModel\Page\Collection;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magento\Cms\Model\ResourceModel\Page\CollectionFactory as CmsPageCollectionFactory;
class PageList extends Template implements BlockInterface
{

    /**
     * Set the template for the block
     */
    protected $_template = "page-list.phtml";

    /**
     * Widget option for display mode
     */
    const WIDGET_DISPLAY_MODE = 'display_mode';

    /**
     * Widget option for selected pages
     */
    const WIDGET_SELECTED_PAGES = 'selected_pages';

    /**
     * @var CmsPageCollectionFactory
     */
    protected CmsPageCollectionFactory $cmsPageCollectionFactory;


    /**
     * PageList constructor.
     *
     * @param Template\Context $context
     * @param CmsPageCollectionFactory $cmsPageCollectionFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        CmsPageCollectionFactory $cmsPageCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->cmsPageCollectionFactory = $cmsPageCollectionFactory;
    }

    /**
     * Retrieve CMS pages based on widget options
     *
     * @return Collection
     */

    public function getCmsPages(): Collection
    {

        $displayMode = $this->getData(self::WIDGET_DISPLAY_MODE);
        $selectedPages = $this->getData(self::WIDGET_SELECTED_PAGES);

        if($displayMode === "all") {
            // Retrieve all CMS pages
            $cmsPages = $this->cmsPageCollectionFactory->create();
        } elseif($displayMode === "specific" && !empty($selectedPages)) {
            $selectedPageIds = is_array($selectedPages) ? $selectedPages : explode(',', $selectedPages);
            $cmsPages = $this->cmsPageCollectionFactory->create()->addFieldToFilter('page_id', ['in' => $selectedPageIds]);

        } else {
            // Default to an empty collection
            $cmsPages = $this->cmsPageCollectionFactory->create();
        }

        return $cmsPages;

    }

}
