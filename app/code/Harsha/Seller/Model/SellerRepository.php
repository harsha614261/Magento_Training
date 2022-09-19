<?php
declare(strict_types = 1);
namespace Harsha\Seller\Model;
use Harsha\Seller\Api\Data;
use Harsha\Seller\Api\SellerRepositoryInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class SellerRepository implements SellerRepositoryInterface
{
    private $sellerBlockFactory;
    private $resource;
    private $collectionFactory;
    private $sellerSearchResultsFactory;
    public function __construct(
        \Harsha\Seller\Model\SellerBlockFactory $sellerBlockFactory,
        \Harsha\Seller\Model\ResourceModel\SellerBlock $resource,
        \Harsha\Seller\Model\ResourceModel\SellerBlock\CollectionFactory $collectionFactory,
        \Magento\Framework\Api\SearchResultsInterfaceFactory $sellerSearchResultsFactory,
    ) {
        $this->sellerBlockFactory = $sellerBlockFactory;
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
        $this->sellerSearchResultsFactory = $sellerSearchResultsFactory;

    }

    /**
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     * @throws CouldNotSaveException
     */
    public function save(Data\SellerInterface $seller): Data\SellerInterface
    {
        try {
            if (!empty($seller)) {
                $this->resource->save($seller);
            }
        }catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $seller;
    }

    /**
     * @throws NoSuchEntityException
     */
    public function getById(int $id): Data\SellerInterface
    {
        $seller = $this->sellerBlockFactory->create();
        $this->resource->load($seller,$id);
        if (!$seller->getId()) {
            throw new NoSuchEntityException(__('The CMS block with the "%1" ID doesn\'t exist.', $id));
        }
        return $seller;

    }

    /**
     * @throws \Exception
     */
    public function delete(int $id): bool
    {
        try {
            $seller = $this->getById($id);
            $this->resource->delete($seller);
        }catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function getAll(): \Magento\Framework\Api\SearchResultsInterface
    {
        $collection = $this->collectionFactory->create();
        $searchResults = $this->sellerSearchResultsFactory->create();
        $searchResults->setItems($collection->getData());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;

    }

}
