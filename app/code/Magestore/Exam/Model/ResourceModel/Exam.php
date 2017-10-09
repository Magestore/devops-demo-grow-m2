<?php 

namespace Magestore\Exam\Model\ResourceModel;

/**
 * Resource Model Exam
 */
class Exam extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('magestore_salestaff','staff_id');
    }
}
