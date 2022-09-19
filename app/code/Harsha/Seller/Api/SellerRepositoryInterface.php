<?php
namespace Harsha\Seller\Api;
use Harsha\Seller\Api\Data\SellerInterface;
use Harsha\Seller\Api\Data\SellerSearchResultsInterface;

/**
 * CMS block CRUD interface.
 * @api
 * @since 100.0.2
 */
interface SellerRepositoryInterface{

    /**
     * @param \Harsha\Seller\Api\Data\SellerInterface $seller
     * @return \Harsha\Seller\Api\Data\SellerInterface
     */
    public function save(Data\SellerInterface $seller): Data\SellerInterface;

    /**
     * @param int $id
     * @return \Harsha\Seller\Api\Data\SellerInterface
     */
    public function getById(int $id):Data\SellerInterface;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @return SellerSearchResultsInterface
     */
    public function getAll(): \Magento\Framework\Api\SearchResultsInterface;


//    /**
//     * @param $id
//     * @return \Harsha\SellerBlock\Api\Data\SellerInterface
//     */
//    public function getById($id): Data\SellerInterface;
//
//    /**
//     * @return \Harsha\SellerBlock\Api\Data\SellerInterface
//     */
//    public function getAll(): Data\SellerInterface;

}
