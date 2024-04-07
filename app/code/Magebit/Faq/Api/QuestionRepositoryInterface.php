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
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Interface for CRUD operations for Question data.
 *
 * @api
 */
interface QuestionRepositoryInterface
{
    /**
     * Save question.
     *
     * @param QuestionInterface $question
     * @return QuestionInterface
     * @throws CouldNotSaveException
     */
    public function save(QuestionInterface $question);

    /**
     * Retrieve question.
     *
     * @param int $id
     * @return QuestionInterface
     * @throws NoSuchEntityException If question with the specified ID does not exist.
     */
    public function get($id);

    /**
     * Retrieve questions matching the specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Delete question.
     *
     * @param QuestionInterface $question
     * @return bool true on success
     * @throws CouldNotDeleteException
     */
    public function delete(QuestionInterface $question);

    /**
     * Delete question by ID.
     *
     * @param int $id
     * @return bool true on success
     * @throws CouldNotDeleteException
     */
    public function deleteById($id);
}
