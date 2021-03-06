<?php

namespace Tutorial\HangN\Model\ResourceModel;

class FaqStore extends \Magento\Framework\Model\ResourceModel\Db\AbstractDB
{
    protected $_idFieldName = 'id';

    protected $_date;

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        $resultPrefix = null
    ) {
        parent::__construct($context);
        $this->_date = $date;
    }

    protected function _construct()
    {
        $this->_init('faq_store', 'id');
    }
}