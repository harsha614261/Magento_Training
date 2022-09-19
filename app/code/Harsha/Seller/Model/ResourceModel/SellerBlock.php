<?php

namespace Harsha\Seller\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SellerBlock extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'seller_table_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('seller_table', 'seller_id');
        $this->_useIsObjectNew = true;
    }
}
