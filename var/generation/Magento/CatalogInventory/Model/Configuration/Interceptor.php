<?php
namespace Magento\CatalogInventory\Model\Configuration;

/**
 * Interceptor class for @see \Magento\CatalogInventory\Model\Configuration
 */
class Interceptor extends \Magento\CatalogInventory\Model\Configuration implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\ProductTypes\ConfigInterface $config, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\CatalogInventory\Helper\Minsaleqty $minsaleqtyHelper, \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($config, $scopeConfig, $minsaleqtyHelper, $storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultScopeId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDefaultScopeId');
        if (!$pluginInfo) {
            return parent::getDefaultScopeId();
        } else {
            return $this->___callPlugins('getDefaultScopeId', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getIsQtyTypeIds($filter = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getIsQtyTypeIds');
        if (!$pluginInfo) {
            return parent::getIsQtyTypeIds($filter);
        } else {
            return $this->___callPlugins('getIsQtyTypeIds', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isQty($productTypeId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isQty');
        if (!$pluginInfo) {
            return parent::isQty($productTypeId);
        } else {
            return $this->___callPlugins('isQty', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function canSubtractQty($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canSubtractQty');
        if (!$pluginInfo) {
            return parent::canSubtractQty($store);
        } else {
            return $this->___callPlugins('canSubtractQty', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getMinQty($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMinQty');
        if (!$pluginInfo) {
            return parent::getMinQty($store);
        } else {
            return $this->___callPlugins('getMinQty', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getMinSaleQty($store = null, $customerGroupId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMinSaleQty');
        if (!$pluginInfo) {
            return parent::getMinSaleQty($store, $customerGroupId);
        } else {
            return $this->___callPlugins('getMinSaleQty', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getMaxSaleQty($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMaxSaleQty');
        if (!$pluginInfo) {
            return parent::getMaxSaleQty($store);
        } else {
            return $this->___callPlugins('getMaxSaleQty', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getNotifyStockQty($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getNotifyStockQty');
        if (!$pluginInfo) {
            return parent::getNotifyStockQty($store);
        } else {
            return $this->___callPlugins('getNotifyStockQty', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getEnableQtyIncrements($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEnableQtyIncrements');
        if (!$pluginInfo) {
            return parent::getEnableQtyIncrements($store);
        } else {
            return $this->___callPlugins('getEnableQtyIncrements', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getQtyIncrements($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getQtyIncrements');
        if (!$pluginInfo) {
            return parent::getQtyIncrements($store);
        } else {
            return $this->___callPlugins('getQtyIncrements', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getBackorders($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBackorders');
        if (!$pluginInfo) {
            return parent::getBackorders($store);
        } else {
            return $this->___callPlugins('getBackorders', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getManageStock($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getManageStock');
        if (!$pluginInfo) {
            return parent::getManageStock($store);
        } else {
            return $this->___callPlugins('getManageStock', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getCanBackInStock($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCanBackInStock');
        if (!$pluginInfo) {
            return parent::getCanBackInStock($store);
        } else {
            return $this->___callPlugins('getCanBackInStock', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isShowOutOfStock($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isShowOutOfStock');
        if (!$pluginInfo) {
            return parent::isShowOutOfStock($store);
        } else {
            return $this->___callPlugins('isShowOutOfStock', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isAutoReturnEnabled($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isAutoReturnEnabled');
        if (!$pluginInfo) {
            return parent::isAutoReturnEnabled($store);
        } else {
            return $this->___callPlugins('isAutoReturnEnabled', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function isDisplayProductStockStatus($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isDisplayProductStockStatus');
        if (!$pluginInfo) {
            return parent::isDisplayProductStockStatus($store);
        } else {
            return $this->___callPlugins('isDisplayProductStockStatus', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultConfigValue($field, $store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDefaultConfigValue');
        if (!$pluginInfo) {
            return parent::getDefaultConfigValue($field, $store);
        } else {
            return $this->___callPlugins('getDefaultConfigValue', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigItemOptions()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getConfigItemOptions');
        if (!$pluginInfo) {
            return parent::getConfigItemOptions();
        } else {
            return $this->___callPlugins('getConfigItemOptions', func_get_args(), $pluginInfo);
        }
    }
}
