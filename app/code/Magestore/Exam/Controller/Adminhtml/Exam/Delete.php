<?php 

namespace Magestore\Exam\Controller\Adminhtml\Exam;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action Delete
 */
class Delete extends \Magestore\Exam\Controller\Adminhtml\Exam
{
    /**
     * Execute action
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('staff_id');
        try {
            /** @var \{{model_name}} $model */
            $model = $this->_objectManager->create('Magestore\Exam\Model\Exam')->setId($id);
            $model->delete();
            $this->messageManager->addSuccess(
                __('Delete successfully !')
            );
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}
