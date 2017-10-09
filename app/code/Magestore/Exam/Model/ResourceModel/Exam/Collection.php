<?php 

namespace Magestore\Exam\Model\ResourceModel\Exam;

/**
 * Collection Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'staff_id';
    /**
     * store view id.
     *
     * @var int
     */
    protected $_storeViewId = null;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * added table
     * @var array
     */
    protected $_addedTable = [];

    /**
     * @var bool
     */
    protected $_isLoadSliderTitle = FALSE;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\Timezone
     */
    protected $_stdTimezone;

    /**
     * _construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magestore\Exam\Model\Exam', 'Magestore\Exam\Model\ResourceModel\Exam');
    }

    /**
     * @param \Magento\Framework\Data\Collection\EntityFactoryInterface    $entityFactory
     * @param \Psr\Log\LoggerInterface                                     $logger
     * @param \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy
     * @param \Magento\Framework\Event\ManagerInterface                    $eventManager
     * @param \Zend_Db_Adapter_Abstract                                    $connection
     * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb              $resource
     */
    public function __construct(
        \Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
        \Magento\Framework\Event\ManagerInterface $eventManager,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Stdlib\DateTime\Timezone $stdTimezone,
        $connection = null,
        \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null
    ) {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->_storeManager = $storeManager;
        $this->_stdTimezone = $stdTimezone;
        if ($storeViewId = $this->_storeManager->getStore()->getId()) {
            $this->_storeViewId = $storeViewId;
        }
    }

    /**
     * Before load action.
     *
     * @return $this
     */
    protected function _beforeLoad()
    {

        return parent::_beforeLoad();
    }



    /**
     * set order random by banner id
     *
     * @return $this
     */
    public function setOrderRandByBannerId()
    {
        $this->getSelect()->orderRand('main_table.staff_id');

        return $this;
    }

    /**
     * get store view id.
     *
     * @return int [description]
     */
    public function getStoreViewId()
    {
        return $this->_storeViewId;
    }

    /**
     * set store view id.
     *
     * @param int $storeViewId [description]
     */
    public function setStoreViewId($storeViewId)
    {
        $this->_storeViewId = $storeViewId;

        return $this;
    }

    /**
     * Multi store view.
     *
     * @param string|array      $field
     * @param null|string|array $condition
     */
//    public function addFieldToFilter($field, $condition = null)
//    {
//        $attributes = array(
//            'name',
//            'status',
//            'birthday',
//            'phone',
//            'sex',
//            'maintable',
//        );
//        $storeViewId = $this->getStoreViewId();
//
//        if (in_array($field, $attributes) && $storeViewId) {
//            if (!in_array($field, $this->_addedTable)) {
//                $sql = sprintf(
//                    'main_table.staff_id = %s.staff_id AND %s.store_id = %s  AND %s.attribute_code = %s ',
//                    $this->getConnection()->quoteTableAs($field),
//                    $this->getConnection()->quoteTableAs($field),
//                    $this->getConnection()->quote($storeViewId),
//                    $this->getConnection()->quoteTableAs($field),
//                    $this->getConnection()->quote($field)
//                );
//
//                $this->getSelect()
//                    ->joinLeft(array($field => $this->getTable('magestore_salestaff')), $sql, array());
//                $this->_addedTable[] = $field;
//            }
//
//            $fieldNullCondition = $this->_translateCondition("$field.value", ['null' => TRUE]);
//
//            $mainfieldCondition = $this->_translateCondition("main_table.$field", $condition);
//
//            $fieldCondition = $this->_translateCondition("$field.value", $condition);
//
//            $condition = $this->_implodeCondition(
//                $this->_implodeCondition($fieldNullCondition, $mainfieldCondition, \Zend_Db_Select::SQL_AND),
//                $fieldCondition,
//                \Zend_Db_Select::SQL_OR
//            );
//
//            $this->_select->where($condition, NULL, \Magento\Framework\DB\Select::TYPE_CONDITION);
//
//            return $this;
//        }
//        if ($field == 'staff_id') {
//            $field = 'main_table.staff_id';
//        }
//
//        return parent::addFieldToFilter($field, $condition);
//    }

    /**
     * @param $firstCondition
     * @param $secondCondition
     * @param $type
     * @return string
     */
    protected function _implodeCondition($firstCondition, $secondCondition, $type)
    {
        return '(' . implode(') ' . $type . ' (', [$firstCondition, $secondCondition]) . ')';
    }

    /**
     * get read connnection.
     */
    public function getConnection()
    {
        return $this->getResource()->getConnection();
    }

    /**
     * Multi store view.
     */
    protected function _afterLoad()
    {
        parent::_afterLoad();

        return $this;
    }

}
