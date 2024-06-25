<?php

namespace ABD\RTLSwitcher\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Page\Config as PageConfig;
use Magento\Store\Model\StoreManagerInterface;

class AddDirToBody implements ObserverInterface
{
    const ELEMENT_NAME = 'dir';

    /**
     * @var PageConfig
     */
    protected $pageConfig;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;


    /**
     * @param StoreManagerInterface $storeManager
     * @param PageConfig $pageConfig
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        PageConfig $pageConfig
    ) {
        $this->storeManager = $storeManager;
        $this->pageConfig = $pageConfig;
    }

    /**
     * @param Observer $observer
     * @return void
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function execute(Observer $observer)
    {
        if ($this->getStoreLanguageCode() === "en") {
            $this->pageConfig->setElementAttribute(
                PageConfig::ELEMENT_TYPE_BODY,
                self::ELEMENT_NAME,
                "ltr"
            );
        }

        if ($this->getStoreLanguageCode() === "ar") {
            $this->pageConfig->setElementAttribute(
                PageConfig::ELEMENT_TYPE_BODY,
                self::ELEMENT_NAME,
                "rtl"
            );
        }
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    protected function getStoreLanguageCode(): string
    {
        $storeLanguage = $this->storeManager->getStore()->getLanguage();
        if ($storeLanguage === "English") {
            return "en";
        } else {
            return "ar";
        }
    }
}
