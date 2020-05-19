<?php
namespace Tutorial\HangN\Controller\Adminhtml\Faq;
 
class Save extends \Magento\Backend\App\Action
{

    var $faqFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Tutorial\HangN\Model\FaqFactory $faqFactory,
        \Tutorial\HangN\Model\FaqStoreFactory $faqStoreFactory,
        \Tutorial\HangN\Logger\Logger $log

        
    ) {
        parent::__construct($context);
        $this->faqFactory = $faqFactory;
        $this->faqStoreFactory = $faqStoreFactory;
        $this->log=$log;

    }
 
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('tutorial_hangn/faq/addrow');
            return;
        }
        try {
            $rowData = $this->faqFactory->create();
            $faqStoreData = $this->faqStoreFactory->create();
            $store_id = $data['store_id'];


            $rowData->setData($data);

            if (isset($data['faq_id'])) {
                $rowData->setEntityId($data['faq_id']);
                $collection = $this->_objectManager->create('\Tutorial\HangN\Model\ResourceModel\FaqStore\Collection');
                
                $collection->addFieldToFilter('faq_id', ['eq'=>$data['faq_id']]);

                $row = $collection->getData()[0];

                $this->log->info(json_encode($row));
                $faqStoreData->setId($row['id']);

            }


            $rowData->save();

            $faqStoreData->setFAQ_Id($rowData->getData('faq_id'));
            $faqStoreData->setStore_Id($store_id);

            $faqStoreData->save();

            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('tutorial_hangn/faq');
    }
 
}