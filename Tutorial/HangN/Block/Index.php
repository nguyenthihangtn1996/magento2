<?php
namespace Tutorial\HangN\Block;
class Index extends \Magento\Framework\View\Element\Template
{
	protected $_faqFactory;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Tutorial\HangN\Model\FaqFactory $faqFactory
	)
	{
		$this->_faqFactory = $faqFactory;
		parent::__construct($context);
	}

	public function getFaqCollection(){
		$faq = $this->_faqFactory->create();
		
		return $faq->getCollection();
	}
	
	public function displayCollection()
	{
		$page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
		$pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : 10;

		$getFaqCollection =  $this->_faqFactory->create()->getCollection();

		// $getFaqCollection->addFieldToFilter('Status', '1'); // if you want to use filter
		
		$getFaqCollection->setPageSize($pageSize);
		$getFaqCollection->setCurPage($page);
		
		return $getFaqCollection;
	}
	protected function _prepareLayout()
	{
		parent::_prepareLayout();

		if ($this->displayCollection()) {
			$pager = $this->getLayout()->createBlock(
				'Magento\Theme\Block\Html\Pager',
				'Tutorial_HangN_faq.tutorialmagento2.record.pager'
			)->setAvailableLimit(array(10 => 10, 15 => 15, 20 => 20, 25 => 25))->setShowPerPage(true)->setCollection(
				$this->displayCollection()
			);
			$this->setChild('pager', $pager);
			$this->displayCollection()->load();
		}
		return $this;
	}

	public function getPagerHtml()
	{
		return $this->getChildHtml('pager');
	}
}