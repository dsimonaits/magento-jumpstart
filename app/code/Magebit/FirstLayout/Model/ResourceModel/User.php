<?php

namespace Magebit\FirstLayout\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class User extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_entity', 'entity_id'); // Adjust table name and primary key as needed
    }
}
