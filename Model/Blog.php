<?php

namespace Conceptive\Announcementbar\Model;

use Magento\Framework\Model\AbstractModel;
use Conceptive\Announcementbar\Model\ResourceModel\Blog as BlogResourceModel;

class Blog extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(BlogResourceModel::class);
    }
}