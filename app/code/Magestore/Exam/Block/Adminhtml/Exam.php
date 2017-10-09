<?php 

namespace Magestore\Exam\Block\Adminhtml;

/**
 * Grid Container Exam
 */
class Exam extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_exam';
        $this->_blockGroup = 'Magestore_Exam';
        $this->_headerText = __('Exam grid');
        $this->_addButtonLabel = __('Add New Exam');

        parent::_construct();
    }
}
