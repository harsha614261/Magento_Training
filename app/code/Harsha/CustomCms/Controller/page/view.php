<?php
namespace Harsha\CustomCms\Controller\page;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

class View implements \Magento\Framework\App\ActionInterface
{



    protected  $pagefactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
    ) {
        $this->pagefactory=$pageFactory;
        //parent::__construct($context);
    }
    public function execute()
    {
        $Result = $this->pagefactory->create(true);
        $Result->addHandle('cmspage_page_view');

        return $Result;
    }
}
