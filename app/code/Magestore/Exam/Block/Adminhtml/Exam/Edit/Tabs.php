<?php 

namespace Magestore\Exam\Block\Adminhtml\Exam\Edit;

/**
 * Tabs containerTabs
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('form_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Exam Information'));
    }
}
