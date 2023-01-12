<?php
namespace Conceptive\Announcementbar\Model\ResourceModel\Blog;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Conceptive\Announcementbar\Model\Blog as BlogModel;
use Conceptive\Announcementbar\Model\ResourceModel\Blog as BlogResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(BlogModel::class, BlogResourceModel::class);
    }
}