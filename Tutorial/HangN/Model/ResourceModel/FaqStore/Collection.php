<?php

namespace Tutorial\HangN\Model\ResourceModel\FaqStore;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            'Tutorial\HangN\Model\FaqStore',
            'Tutorial\HangN\Model\ResourceModel\FaqStore'
        );
    }
}