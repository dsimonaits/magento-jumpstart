<?php
namespace Magebit\Faq\Api\Data;
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for question search results.
 *
 * @api
 */
interface QuestionSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list of questions.
     *
     * @return \Magebit\Faq\Api\Data\QuestionInterface[]
     */
    public function getItems();

    /**
     * Set list of questions.
     *
     * @param \Magebit\Faq\Api\Data\QuestionInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
