<?php

namespace Magebit\FirstLayout\Model;

use Magebit\FirstLayout\Model\ResourceModel\User as UserResource;
use Magebit\FirstLayout\Model\UserFactory;

class UserRepository
{
    /**
     * @var UserResource
     */
    private $userResource;

    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * UserRepository constructor.
     *
     * @param UserResource $userResource
     * @param UserFactory $userFactory
     */
    public function __construct(
        UserResource $userResource,
        UserFactory $userFactory
    ) {
        $this->userResource = $userResource;
        $this->userFactory = $userFactory;
    }

    /**
     * Save user data.
     *
     * @param User $user
     * @return User
     */
    public function save(User $user)
    {
        $this->userResource->save($user);
        return $user;
    }

    /**
     * Get user by ID.
     *
     * @param int $userId
     * @return User
     */
    public function getById($userId)
    {
        $user = $this->userFactory->create();
        $this->userResource->load($user, $userId);
        return $user;
    }
}
