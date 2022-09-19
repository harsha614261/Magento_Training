<?php

namespace Harsha\FirstModule\Model;

use Harsha\FirstModule\Model\ResourceModel\Block as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class Block extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'first_module_sample_table_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }
    public function setCustomerName($x): Block
    {
        return $this->setData("customer_name", $x);
    }
    public function setCustomerAge($y): Block
    {
        return $this->setData("customer_age",$y);
    }

}
