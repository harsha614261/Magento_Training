<?php

namespace Harsha\Seller\Model;
use Harsha\Seller\Api\Data;
use Harsha\Seller\Api\SellerRepositoryInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class SellerRepository implements SellerRepositoryInterface
{
    protected $sellerBlockFactory;
    protected $Resource;
    protected $collectionFactory;

    public function __construct(
        \Harsha\Seller\Model\SellerBlockFactory $sellerBlockFactory,
        \Harsha\Seller\Model\ResourceModel\SellerBlock $resource,
        \Harsha\Seller\Model\ResourceModel\SellerBlock\CollectionFactory $collectionFactory,
    ) {
        $this->sellerBlockFactory=$sellerBlockFactory;
        $this->Resource=$resource;
        $this->collectionFactory=$collectionFactory;
    }

    /**
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(Data\SellerInterface $seller): Data\SellerInterface
    {
        try {
            if (!empty($seller)) {
                $this->Resource->save($seller);
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
        $newBlock=$this->sellerBlockFactory->create();
        $this->Resource->load($newBlock,$id);
        if (!$newBlock->getId()) {
            throw new NoSuchEntityException(__('The CMS block with the "%1" ID doesn\'t exist.', $id));
        }
        return $newBlock;

    }

    /**
     * @throws \Exception
     */
    public function delete(int $id): bool
    {

        try {
                $data = $this->getById($id);
                $this->Resource->delete($data);
        }catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function getAll(): mixed
    {
        $collection = $this->collectionFactory->create();
        return $collection->getData();

    }

}
