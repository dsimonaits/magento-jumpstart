<?php
/**
 * @copyright Copyright (c) 2024 Magebit (https://magebit.com/)
 * @author info@magebit.com
 * @license GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\ResourceModel\Question as ResourceQuestion;
use Magebit\Faq\Model\ResourceModel\Question\Collection as QuestionCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;


class QuestionRepository implements QuestionRepositoryInterface
{
    protected $resource;
    protected $questionFactory;
    protected $questionCollectionFactory;
    protected $collectionProcessor;

    public function __construct(
        ResourceQuestion $resource,
        QuestionFactory $questionFactory,
        QuestionCollectionFactory $questionCollectionFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->questionFactory = $questionFactory;
        $this->questionCollectionFactory = $questionCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(QuestionInterface $question)
    {
        try {
            $this->resource->save($question);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $question;
    }

    public function get($id)
    {
        $question = $this->questionFactory->create();
        $this->resource->load($question, $id);
        if (!$question->getId()) {
            throw new NoSuchEntityException(__('Unable to find question with ID "%1"', $id));
        }
        return $question;
    }

    // Implement the rest of the repository methods...
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->questionCollectionFactory->create();
        $this->collectionProcessor->process($criteria, $collection);

        /** @var \Magento\Framework\Api\SearchResults $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
    /**
     * @throws CouldNotSaveException
     */
    public function delete(QuestionInterface $question): void
    {
        try {
            $this->resource->delete($question);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
    }


    public function deleteById($id)
    {
        $question = $this->get($id);
        return $this->delete($question);
    }
}
