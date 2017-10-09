<?php

namespace Magestore\Exam\Block;

/**
 * Block Exammage
 */
class Exammage extends \Magento\Framework\View\Element\Template
{
    /*
   * get request http
   *\Magento\Framework\App\Request\Http $request
   */
    protected $_request;
    /**
     * Popupplus store manager.
     *
     * @var
     */
    protected$_storeManager;
    /**
     * Block constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Request\Http $request,
        array $data = array()
    ) {
        parent::__construct($context, $data);
        $this->_storeManager=$storeManager;
        $this->_request = $request;
    }

    public function getbaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    /*get module name*/
    /**
     * @return string
     */
    public function getRouterName()
    {
        return $this->_request->getRouteName();
    }

    /*get module name*/
    /**
     * @return string
     */
    public function getModuleName()
    {
        return $this->_request->getModuleName();
    }

    /*get controller name*/
    /**
     * @return string
     */
    public function getController()
    {
        return $this->_request->getControllerName();
    }

    /*get action name*/
    /**
     * @return string
     */
    public function getActionName()
    {
        return $this->_request->getActionName();
    }

    /*
         * get Current URL
         * **/
    public function getCurrentUrl()
    {
        return $this->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true]);
    }

    /*
     * get Real URL
     * **/
    public function getUrlReal()
    {
        return $this->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => false]);
    }

}
