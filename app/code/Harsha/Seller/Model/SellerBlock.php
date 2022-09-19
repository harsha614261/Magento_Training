<?php

namespace Harsha\Seller\Model;

use Harsha\Seller\Model\ResourceModel\SellerBlock as ResourceModel;
use Magento\Framework\Model\AbstractModel;
use Harsha\Seller\Api\Data\SellerInterface;

class SellerBlock extends AbstractModel implements \Harsha\Seller\Api\Data\SellerInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'seller_table_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function setSellerId(int $id)
    {
        return $this->setData("seller_id",$id);
    }

    public function getSellerId():int|null
    {
        return $this->getData("seller_id");
    }

    public function setSellerName(string $name)
    {

        return $this->setData("seller_name",$name);
    }

    public function getSellerName(): string|null
    {

        return $this->getData("seller_name");
    }
    public function getSellerEmail():string|null
    {

        return $this->getData("seller_email");
    }
    public function setSellerEmail(string $email)
    {

        return $this->setData("seller_email",$email);
    }

    public function getSellerCity():string|null
    {

        return $this->getData("seller_city");
    }
    public function setSellerCity(string $sellerCity)
    {

        return $this->setData("seller_city",$sellerCity);
    }

}
