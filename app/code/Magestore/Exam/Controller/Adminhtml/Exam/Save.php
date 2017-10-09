<?php 

namespace Magestore\Exam\Controller\Adminhtml\Exam;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action Save
 */
class Save extends \Magestore\Exam\Controller\Adminhtml\Exam
{
    /**
     * Execute action
     */
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        if ($data = $this->getRequest()->getPostValue()) {
            /** @var \Magestore\Exam\Model\Exam $model */
            $model = $this->_objectManager->create('Magestore\Exam\Model\Exam');

            if ($id = $this->getRequest()->getParam('staff_id')) {
                $model->load($id);
            }

            $model->setData($data);

            try {
                $model->save();

                $this->messageManager->addSuccess(__('The record has been saved.'));
                $this->_getSession()->setFormData(false);

                if ($this->getRequest()->getParam('back') === 'edit') {
                    return $resultRedirect->setPath(
                        '*/*/edit',
                        [
                            'staff_id' => $model->getId(),
                            '_current' => true,
                        ]
                    );
                } elseif ($this->getRequest()->getParam('back') === 'new') {
                    return $resultRedirect->setPath(
                        '*/*/new',
                        ['_current' => true]
                    );
                }

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->messageManager->addException($e, __('Something went wrong while saving the record.'));
            }

            $this->_getSession()->setFormData($data);

            return $resultRedirect->setPath(
                '*/*/edit',
                ['staff_id' => $this->getRequest()->getParam('staff_id')]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}
