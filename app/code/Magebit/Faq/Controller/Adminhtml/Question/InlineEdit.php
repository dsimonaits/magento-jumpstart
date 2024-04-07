<?php

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magebit\Faq\Api\Data\QuestionInterface;
use Magebit\Faq\Api\QuestionRepositoryInterface as QuestionRepository;

class InlineEdit extends Action
{
    protected $jsonFactory;

    /**
     * @var QuestionRepository
     */
    protected $questionRepository;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        QuestionRepository $questionRepository
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->questionRepository = $questionRepository;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];
        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (empty($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $entityId) {
                    $modelData = $this->questionRepository->get($entityId);
                    try {
                        $modelData->setData(array_merge($modelData->getData(), $postItems[$entityId]));
                        $this->questionRepository->save($modelData);
                    } catch (\Exception $e) {
                        $messages[] = $this->getErrorWithBlockId(
                            $modelData,
                            __($e->getMessage())
                        );
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    protected function getErrorWithBlockId(QuestionInterface $modelData, $errorText)
    {
        return '[Block ID: ' . $modelData->getId() . '] ' . $errorText;
    }
}
