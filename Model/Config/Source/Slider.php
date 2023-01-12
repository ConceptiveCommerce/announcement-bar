<?php

namespace Conceptive\Announcementbar\Model\Config\Source;

class Slider implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $direction = [
            ['value' => "normal", 'label' => __('Left-To-Right')],
            ['value' => "reverse", 'label' => __('Right-To-Left')],
            ['value' => "alternate", 'label' => __('Left-Right-Left')],
            ['value' => "alternate-reverse", 'label' => __('Right-Left-Right')],
        ];
      
        return $direction;
    }
}