<?php

namespace Harsha\FirstModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Block extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'first_module_sample_table_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('first_module_sample_table', 'customer_id');
        $this->_useIsObjectNew = true;
    }
}
