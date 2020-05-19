<?php

namespace Tutorial\HangN\Model;

class Store implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');

        $storeManagerDataList = $storeManager->getStores();
        $options = [];

        foreach ($storeManagerDataList as $key => $value) {
            $options[] = ['label' => $value['name'],  'value' => $key ];
        }
        return $options;
    }
}