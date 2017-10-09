<?php 

namespace Magestore\Exam\Controller\Adminhtml\Exam;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action MassStatus
 */
class MassStatus extends \Magestore\Exam\Controller\Adminhtml\Exam
{
    /**
     * Execute action
     */
    public function execute()
    {
        $examIds = $this->getRequest()->getParam('exams');
        $status = $this->getRequest()->getParam('status');

        if (!is_array($examIds) || empty($examIds)) {
            $this->messageManager->addError(__('Please select record(s).'));
        } else {
            /** @var \Magestore\Exam\Model\ResourceModel\Exam\Collection $collection */
            $collection = $this->_objectManager->create('Magestore\Exam\Model\ResourceModel\Exam\Collection');
            $collection->addFieldToFilter('staff_id', ['in' => $examIds]);
            try {
                foreach ($collection as $item) {
                    $item->setStatus($status)
                        ->setIsMassupdate(true)
                        ->save();
                }
                $this->messageManager->addSuccess(
                    __('A total of %1 record(s) have been changed status.', count($examIds))
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);;

        return $resultRedirect->setPath('*/*/');
    }
}
