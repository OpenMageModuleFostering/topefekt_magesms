<?php
/**
 * Mage SMS - SMS notification & SMS marketing
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the BSD 3-Clause License
 * It is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/BSD-3-Clause
 *
 * @category    TOPefekt
 * @package     TOPefekt_Magesms
 * @copyright   Copyright (c) 2012-2014 TOPefekt s.r.o. (http://www.mage-sms.com)
 * @license     http://opensource.org/licenses/BSD-3-Clause
 */
 class Topefekt_Magesms_Block_ShowTabsAdminBlock extends Mage_Adminhtml_Block_Widget_Tabs { public function __construct() { parent::__construct(); $this->setId('my_custom_freely_assigned_id_for_tabs'); } protected function _beforeToHtml() { $this->addTab('custom_assigned_tab1_id_name', array( 'label' => Mage::helper('smsmagentohelper1')->__('Custom tab1 here'), 'title' => Mage::helper('smsmagentohelper1')->__('My custom tab1 title here'), 'content' => 'Some content here. We could add direct string here, or we can use something like $this->getLayout()->createBlock("adminhtml/cms_page_edit_tab_main")->toHtml()', 'active' => true )); $this->addTab('custom_aka_freely_assigned_tab2_id_name', array( 'label' => Mage::helper('smsmagentohelper1')->__('Custom tab2 here'), 'title' => Mage::helper('smsmagentohelper1')->__('My custom tab2 title here'), 'content' => 'Another content here. As mentioned, we could add direct string here, or we can use something like $this->getLayout()->createBlock("adminhtml/cms_page_edit_tab_main")->toHtml()', 'active' => false )); $this->addTab('custom_aka_freely_assigned_tab3_id_name', array( 'label' => Mage::helper('smsmagentohelper1')->__('Custom tab3 here<br />(usses class block)'), 'title' => Mage::helper('smsmagentohelper1')->__('My custom tab3 title here'), 'content' => $this->getLayout()->createBlock("smsmagentoblock2/SampleBlockForTabAreaShowoff")->toHtml(), 'active' => false )); $this->addTab('custom_aka_freely_assigned_tab4_id_name', array( 'label' => Mage::helper('smsmagentohelper1')->__('Custom tab4 here<br />(usses class block and external view file)'), 'title' => Mage::helper('smsmagentohelper1')->__('My custom tab4 title here'), 'content' => $this->getLayout()->createBlock("smsmagentoblock1/SampleBlockForTabAreaShowoffWithExtraInfo")->toHtml(), 'active' => false )); return parent::_beforeToHtml(); } }