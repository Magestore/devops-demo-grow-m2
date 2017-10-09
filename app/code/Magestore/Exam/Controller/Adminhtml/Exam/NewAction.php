<?php 

namespace Magestore\Exam\Controller\Adminhtml\Exam;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action NewAction
 */
class NewAction extends \Magestore\Exam\Controller\Adminhtml\Exam
{
    /**
     * Execute action
     */
    public function execute()
    {
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);

        return $resultForward->forward('edit');
    }
}
