<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface QuestionRepositoryInterface
{
    public function save(QuestionInterface $question);
    public function get($id);
    public function getList(SearchCriteriaInterface $criteria);
    public function delete(QuestionInterface $question);
    public function deleteById($id);
}
