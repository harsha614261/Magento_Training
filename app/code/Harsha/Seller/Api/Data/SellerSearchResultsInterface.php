<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Harsha\Seller\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for cms block search results.
 * @api
 * @since 100.0.2
 */
interface SellerSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get blocks list.
     *
     * @return \Harsha\Seller\Api\Data\SellerInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     *
     * @param \Harsha\Seller\Api\Data\SellerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
