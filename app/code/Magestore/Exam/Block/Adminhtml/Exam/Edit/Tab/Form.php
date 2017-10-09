<?php 

namespace Magestore\Exam\Block\Adminhtml\Exam\Edit\Tab;

use Magento\Backend\Block\Widget\Tab\TabInterface;

/**
 * Class Tab GeneralTab
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic implements TabInterface
{

    /**
     * @var \Magento\Framework\Locale\ResolverInterface
     */
    protected $_locale;
    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $_localeDate;
    /*
     * get date time from system
     * */
    protected $dateTime;
    /**
     * Tab constructor
     *
     * @param \Magento\Backend\Block\Template\Context   $context
     * @param \Magento\Framework\Registry               $registry
     * @param \Magento\Framework\Data\FormFactory       $formFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Framework\Locale\ResolverInterface $locale,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate,
        \Magento\Framework\Stdlib\DateTime\Timezone $dateTime,
        array $data = array()
    ) {
        $this->_locale = $locale;
        $this->_localeDate = $localeDate;
        $this->dateTime = $dateTime;

        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * get registry model.
     *
     * @return \Magento\Framework\Model\AbstractModel|null
     */
    public function getRegistryModel()
    {
        return $this->_coreRegistry->registry('registry_model');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Form information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Form information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    protected function _prepareForm()
    {
        $model = $this->getRegistryModel();

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('general_fieldset', ['legend' => __('Exam Information')]);

        if ($model->getId()) {
            $fieldset->addField('staff_id', 'hidden', ['name' => 'staff_id']);
        }

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true,
                'style' =>  'max-width: 350px',
            ]
        );

        $dateFormat = 'M/d/yyyy';
        $timeFormat = 'h:mm a';
        if($model->hasData('birthday')) {

            $datetime = $this->dateTime->date($model->getData('birthday'), null, $this->_localeDate->getConfigTimezone());
//            $datetime = new \DateTime($dataObj->getData('start_time'));

            $model->setData('birthday',$datetime);

        }
        $style = 'color: #000;background-color: #fff; font-weight: bold; font-size: 13px;';
        $fieldset->addField(
            'birthday',
            'date',
            [
                'name' => 'birthday',
                'label' => __('Birthday'),
                'title' => __('Birthday'),
                'required' => true,
                'style' => $style,
                'class' => 'required-entry',
                'date_format' => $dateFormat,
                'time_format' => $timeFormat,
                'note' => implode(' ', [$dateFormat, $timeFormat]),
            ]
        );

        $fieldset->addField(
            'phone',
            'text',
            [
                'name' => 'phone',
                'label' => __('Phone'),
                'title' => __('Phone'),
                'required' => true,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'sex',
            'text',
            [
                'name' => 'sex',
                'label' => __('Sex'),
                'title' => __('Sex'),
                'required' => false,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'address',
            'text',
            [
                'name' => 'address',
                'label' => __('Address'),
                'title' => __('Address'),
                'required' => false,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'start_working_date',
            'date',
            [
                'name' => 'start_working_date',
                'label' => __('Start Working'),
                'title' => __('Start Working'),
                'required' => true,
                'style' => $style,
                'class' => 'required-entry',
                'date_format' => $dateFormat,
                'time_format' => $timeFormat,
                'note' => implode(' ', [$dateFormat, $timeFormat]),
            ]
        );

        $fieldset->addField(
            'username',
            'text',
            [
                'name' => 'username',
                'label' => __('Username'),
                'title' => __('Username'),
                'required' => false,
                'style' =>  'max-width: 350px',
            ]
        );

        $fieldset->addField(
            'password',
            'password',
            [
                'name' => 'password',
                'label' => __('Password'),
                'title' => __('Password'),
                'required' => false,
                'style' =>  'max-width: 350px',
                'note' => 'In your controller, You must change formate md5 type for your password to safe sercurity',
            ]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'title' => __('Status'),
                'options' => \Magestore\Exam\Model\Status::getAvailableStatuses(),
            ]
        );

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
