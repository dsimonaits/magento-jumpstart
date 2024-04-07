<?php
namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\Question;
use Magebit\Faq\Model\QuestionFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends Action
{
    const ADMIN_RESOURCE = 'Magebit_Faq::save';

    protected $questionFactory;
    protected $questionRepository;
    protected $dataPersistor;

    public function __construct(
        Action\Context $context,
        QuestionFactory $questionFactory,
        QuestionRepositoryInterface $questionRepository,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context);
        $this->questionFactory = $questionFactory;
        $this->questionRepository = $questionRepository;
        $this->dataPersistor = $dataPersistor;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

if (empty($data['question']) || empty($data['answer'])) {
    $this->messageManager->addErrorMessage(__('The question and answer fields cannot be empty.'));
    // Redirect back to form with or without the entity ID, based on your context
    return $resultRedirect->setPath('*/*/edit', ['id' => $data['id'] ?? null]);
}

        if ($data) {
            $id = $data['id'] ?? null;
            $model = ($id) ? $this->questionRepository->getById($id) : $this->questionFactory->create();

            $model->setData($data);

            try {
                $this->questionRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the question.'));
                $this->dataPersistor->clear('faq_question');
                return $this->processQuestionReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the question.'));
            }

            $this->dataPersistor->set('faq_question', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    private function processQuestionReturn($model, $data, $resultRedirect)
    {
        $redirect = $data['back'] ?? 'close';

        if ($redirect === 'continue') {
            return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
        } elseif ($redirect === 'duplicate') {
            // Handle duplication logic if necessary, similar to Magento CMS
        }
        return $resultRedirect->setPath('*/*/');
    }
}
