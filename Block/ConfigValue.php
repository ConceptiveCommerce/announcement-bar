<?php
    namespace Conceptive\Announcementbar\Block;

    use Magento\Framework\View\Element\Template;
    use Magento\Framework\App\Config\ScopeConfigInterface;
    use Magento\Store\Model\ScopeInterface;

    class ConfigValue extends Template
    {
        protected $_scopeConfig;
 
        public function __construct(
            \Magento\Backend\Block\Template\Context $context,
            ScopeConfigInterface $scopeConfig,
            array $data = []
        ) {
            $this->_scopeConfig = $scopeConfig;
            parent::__construct($context, $data);
        }
         
        public function getConfigValue() 
        {
           $value = $this->_scopeConfig->getValue("section_design/group_id/theme_color");
           
           return $value;
        }
}