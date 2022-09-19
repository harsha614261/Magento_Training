<?php

namespace Harsha\Seller\Model\ResourceModel\SellerBlock;

use Harsha\Seller\Model\ResourceModel\SellerBlock as ResourceModel;
use Harsha\Seller\Model\SellerBlock as Model;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'seller_table_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
