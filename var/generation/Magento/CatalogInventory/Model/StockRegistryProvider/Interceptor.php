<?php
namespace Magento\CatalogInventory\Model\StockRegistryProvider;

/**
 * Interceptor class for @see \Magento\CatalogInventory\Model\StockRegistryProvider
 */
class Interceptor extends \Magento\CatalogInventory\Model\StockRegistryProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\CatalogInventory\Api\StockRepositoryInterface $stockRepository, \Magento\CatalogInventory\Api\Data\StockInterfaceFactory $stockFactory, \Magento\CatalogInventory\Api\StockItemRepositoryInterface $stockItemRepository, \Magento\CatalogInventory\Api\Data\StockItemInterfaceFactory $stockItemFactory, \Magento\CatalogInventory\Api\StockStatusRepositoryInterface $stockStatusRepository, \Magento\CatalogInventory\Api\Data\StockStatusInterfaceFactory $stockStatusFactory, \Magento\CatalogInventory\Api\StockCriteriaInterfaceFactory $stockCriteriaFactory, \Magento\CatalogInventory\Api\StockItemCriteriaInterfaceFactory $stockItemCriteriaFactory, \Magento\CatalogInventory\Api\StockStatusCriteriaInterfaceFactory $stockStatusCriteriaFactory)
    {
        $this->___init();
        parent::__construct($stockRepository, $stockFactory, $stockItemRepository, $stockItemFactory, $stockStatusRepository, $stockStatusFactory, $stockCriteriaFactory, $stockItemCriteriaFactory, $stockStatusCriteriaFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getStock($scopeId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStock');
        if (!$pluginInfo) {
            return parent::getStock($scopeId);
        } else {
            return $this->___callPlugins('getStock', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getStockItem($productId, $scopeId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStockItem');
        if (!$pluginInfo) {
            return parent::getStockItem($productId, $scopeId);
        } else {
            return $this->___callPlugins('getStockItem', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getStockStatus($productId, $scopeId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStockStatus');
        if (!$pluginInfo) {
            return parent::getStockStatus($productId, $scopeId);
        } else {
            return $this->___callPlugins('getStockStatus', func_get_args(), $pluginInfo);
        }
    }
}
