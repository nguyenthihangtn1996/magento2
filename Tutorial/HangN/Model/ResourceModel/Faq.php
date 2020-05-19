<?php
namespace Tutorial\HangN\Model\ResourceModel;


class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('tutorial_hangn_faq', 'faq_id');
	}
	
}