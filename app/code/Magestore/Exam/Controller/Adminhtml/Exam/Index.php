<?php 

namespace Magestore\Exam\Controller\Adminhtml\Exam;

use Magento\Framework\Controller\ResultFactory;

/**
 * Action Index
 */
class Index extends \Magestore\Exam\Controller\Adminhtml\Exam
{
    /**
     * Execute action
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Magestore_Exam::magestoreexam');

        return $resultPage;
    }
}
