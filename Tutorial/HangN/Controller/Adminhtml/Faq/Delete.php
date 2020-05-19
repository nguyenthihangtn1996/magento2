<?php
namespace Tutorial\HangN\Controller\Adminhtml\Faq;

class Delete extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Tutorial_HangN::faq_delete';

    public function execute()
    {
        $bannerId = (int)$this->getRequest()->getParam('faq_id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($bannerId && (int) $bannerId > 0) {
            try {
                $model = $this->_objectManager->create('Tutorial\HangN\Model\Faq');
                $model->load($bannerId);
                $model->delete();
                $this->messageManager->addSuccess(__('The Faq has been deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/index');
            }
        }
        $this->messageManager->addError(__('Faq doesn\'t exist any longer.'));
        return $resultRedirect->setPath('*/*/index');
    }
}
