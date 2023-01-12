<?php

namespace Conceptive\Announcementbar\Model;

use Conceptive\Announcementbar\Model\ResourceModel\Blog\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    /**
     * @var array
     */
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $barCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $barCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
   
    public function getData()
    {

        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $bar) {
            $this->loadedData[$bar->getBarId()] = $bar->getData();
        }
        return $this->loadedData;
    }
}
