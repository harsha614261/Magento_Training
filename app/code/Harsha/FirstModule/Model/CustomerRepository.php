<?php

namespace Harsha\FirstModule\Model;


use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
class CustomerRepository
{
    protected $ResourceModel;
    protected $block;
    protected $blockfactory;
    protected $collectionFactory;
    protected $searchCriteriaBuilder;
    protected $sortOrderBuilder;
    private $collectionProcessor;
    public function __construct(
        \Harsha\FirstModule\Model\ResourceModel\Block $ResourceModel,
        \Harsha\FirstModule\Model\BlockFactory $blockFactory,
        \Harsha\FirstModule\Model\ResourceModel\Block\CollectionFactory $collectionfactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        CollectionProcessorInterface $collectionProcessor,

    ){
        $this->ResourceModel=$ResourceModel;
        $this->blockfactory=$blockFactory;
        $this->collectionFactory=$collectionfactory;
        $this->searchCriteriaBuilder=$searchCriteriaBuilder;
        $this->sortOrderBuilder=$sortOrderBuilder;
        $this->collectionProcessor=$collectionProcessor;
    }

    /**
     * @throws NoSuchEntityException
     */
    public function getById(): Block
    {
        $dataBlock=$this->blockfactory->create();
        $this->ResourceModel->load($dataBlock,2);
        if(empty($dataBlock)){
            throw new NoSuchEntityException(__('The CMS block with the "%1" ID doesn\'t exist.', 1));
        }
        //$block = $dataBlock->getData();
        return $dataBlock;
    }

    /**
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function saveData($block):void{
        //$block = $this->blockfactory->create();
        $block->setCustomerName("HariHarsha");
        $block->setCustomerAge(22);
        $this->ResourceModel->save($block);
    }

    /**
     * @throws NoSuchEntityException
     * @throws \Exception
     */
    public function delete(): void
    {
        $sample=$this->getById();
        $this->ResourceModel->delete($sample);
    }

    public function getList(SearchCriteriaInterface $searchCriteria): array
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToSelect(['customer_id','customer_name']);
        $this->collectionProcessor->process($searchCriteria,$collection);
        return $collection->getData();


        return $collection->getData();
    }

    public function getAll(){
        $sortoder = $this->sortOrderBuilder->setField("customer_name")->create();
        $search = $this->searchCriteriaBuilder->addSortOrder($sortoder);
        $searchcriteria=$this->searchCriteriaBuilder->create();
        $searchres=$this->getList($searchcriteria);
        return $searchres;

    }

}

