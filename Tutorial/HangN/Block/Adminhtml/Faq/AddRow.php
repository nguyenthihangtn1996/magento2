<?php
  
namespace Tutorial\HangN\Block\Adminhtml\Faq;

class AddRow extends \Magento\Backend\Block\Widget\Form\Container
{
 
    protected $_coreRegistry = null;


    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) 
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'faq_id';
        $this->_blockGroup = 'Tutorial_HangN';
        $this->_controller = 'adminhtml_faq';
        parent::_construct();

        $this->buttonList->update('save', 'label', __('Save'));
        
        $this->buttonList->remove('reset');
    }


    public function getHeaderText()
    {
        return __('Add RoW Data');
    }

    public function getFormActionUrl()
    {
        if ($this->hasFormActionUrl()) {
            return $this->getData('form_action_url');
        }

        return $this->getUrl('*/*/save');
    }
}