<?php

namespace Magebit\FirstLayout\Controller\User;

use Magebit\FirstLayout\Model\UserRepository;
use Magebit\FirstLayout\Model\UserFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\View\Result\Page;
use Psr\Log\LoggerInterface;

class Index implements ActionInterface, HttpGetActionInterface, HttpPostActionInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ResultFactory
     */
    private $resultFactory;

    private $userFactory;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Index constructor.
     *
     * @param RequestInterface $request
     * @param ResultFactory $resultFactory
     * @param UserRepository $userRepository
     * @param LoggerInterface $logger
     */
    public function __construct(
        RequestInterface $request,
        ResultFactory $resultFactory,
        UserRepository $userRepository,
        LoggerInterface $logger,
        UserFactory $userFactory
    ) {
        $this->request = $request;
        $this->resultFactory = $resultFactory;
        $this->userRepository = $userRepository;
        $this->logger = $logger;
        $this->userFactory = $userFactory;
    }

    /**
     * @return Page
     * @throws NotFoundException
     */
    public function execute()
    {
        // Create a new user
        $user = $this->userFactory->create();
        $user->setData('firstname', 'Max');
        $user->setData('lastname', 'Doe');
        $user->setData('email', 'max-doe@gmail.com');

        // Log some information before saving the user
        $this->logger->info('Attempting to create a new user...');

        // Save the user
        try {
            $this->userRepository->save($user);
            $this->logger->info('User created successfully.');
            echo 'User created';
        } catch (\Exception $e) {
            echo
            $this->logger->error('Error creating user: ' . $e->getMessage());
            echo 'Error, check logs';
        }


        // Retrieve the user by ID
        $userId = $user->getId();
        $retrievedUser = $this->userRepository->getById($userId);

        // Log some information after retrieving the user
        $this->logger->info('Retrieved user information:', $retrievedUser->getData());

    }
}
