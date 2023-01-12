<?php

namespace Conceptive\Announcementbar\Model\Config\Source;

class Font implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $sizes = array();
        for($i = 1; $i <= 100; $i++)
        { 
            if ($i % 2 == 0)
            {
                $size = $i . "px";
                $sizes[] = array('value' => "$size", 'label' => "$size");
            }
        }
        return $sizes;
    }
}