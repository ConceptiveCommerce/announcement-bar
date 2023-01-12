<?php
namespace Conceptive\Announcementbar\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Conceptive\Announcementbar\Model\ResourceModel\Blog\Grid\Collection;

class NoticeContent extends Template
{

    public $_collection;
    protected $scopeConfig;
    public function __construct(Context $context, Collection $collection, ScopeConfigInterface $scopeConfig, array $data = [])
    {
        $this->_collection = $collection;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getNoticeContent()
    {
        $Manager = \Magento\Framework\App\ObjectManager::getInstance();

        $Noticecollection = $Manager->create('Conceptive\Announcementbar\Model\ResourceModel\Blog\Grid\Collection');
      
        return $Noticecollection;
    }
    public function getConfigValue($groupId, $fieldId) 
    {
       $value = $this->_scopeConfig->getValue("section_id/$groupId/$fieldId");
       return $value;
    }

}
