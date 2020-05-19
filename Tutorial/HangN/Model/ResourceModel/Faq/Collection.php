<?php
namespace Tutorial\HangN\Model\ResourceModel\Faq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'faq_id';
	protected $_eventPrefix = 'tutorial_hangn_faq_collection';
	protected $_eventObject = 'faq_collection';

	protected function _construct()
	{
		$this->_init('Tutorial\HangN\Model\Faq', 'Tutorial\HangN\Model\ResourceModel\Faq');
	}

}