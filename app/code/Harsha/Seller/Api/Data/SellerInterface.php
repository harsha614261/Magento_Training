<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Harsha\Seller\Api\Data;



/**
 * CMS block interface.
 * @api
 * @since 100.0.2
 */
interface SellerInterface{
    /**
     *
     *
     * @param int $id
     * @return \Harsha\Seller\Api\Data\SellerInterface
     */
    public function setSellerId(int $id);

    /**
     * @return int|null
     */

    public function getSellerId();

    /**
     *
     *
     * @param string $name
     * @return \Harsha\Seller\Api\Data\SellerInterface
     */

    public function setSellerName(string $name);

    /**
     *
     * @return string|null
     */

    public function getSellerName(): string|null;

    /**
     *
     *
     * @param string $email
     * @return \Harsha\Seller\Api\Data\SellerInterface
     */
    public function setSellerEmail(string $email);

    /**
     *
     * @return string|null
     */

    public function getSellerEmail(): string|null;

    /**
     *
     * @return string|null
     */

    public function getSellerCity(): string|null;

    /**
     *
     *
     * @param string $sellerCity
     * @return \Harsha\Seller\Api\Data\SellerInterface
     */

    public function setSellerCity(string $sellerCity);



}
