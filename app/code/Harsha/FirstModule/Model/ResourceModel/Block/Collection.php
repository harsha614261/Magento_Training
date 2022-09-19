<?php

namespace Harsha\FirstModule\Model\ResourceModel\Block;

use Harsha\FirstModule\Model\Block as Model;
use Harsha\FirstModule\Model\ResourceModel\Block as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'first_module_sample_table_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
