<?php

namespace Conceptive\Announcementbar\Model\Config\Source;

class Position implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $position = [
            ['value' => "Top", 'label' => __('Top')],
            ['value' => "Bottom", 'label' => __('Bottom')],
        ];
        return $position;
    }
}