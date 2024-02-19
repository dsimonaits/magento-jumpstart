<?php

namespace Magebit\FirstLayout\Model;

use Magento\Framework\Model\AbstractModel;

class User extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Magebit\FirstLayout\Model\ResourceModel\User::class);
    }
}
