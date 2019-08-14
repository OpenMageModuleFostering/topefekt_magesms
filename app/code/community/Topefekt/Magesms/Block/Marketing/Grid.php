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
 class Topefekt_Magesms_Block_Marketing_Grid extends Mage_Adminhtml_Block_Widget_Grid { public function __construct() { parent::__construct(); $this->setSaveParametersInSession(false); $this->setFilterVisibility(false); $this->setFilterData($this->getRequest()->getParam('filter')); } protected function _prepareCollection() { $iff7e46827cbb6547116c592bf800f4687428abf9 = Mage::registry('magesms_marketing_collection'); $this->setCollection($iff7e46827cbb6547116c592bf800f4687428abf9); parent::_prepareCollection(); $this->setAdditionalJavaScript('countitSMS.marketingCount = '.$this->getCollection()->getSize().";\ncountitSMS.count();\n"); return $this; } public function _construct() { } protected function _prepareColumns() { $this->addColumn('entity_id', array( 'header'=>Mage::helper('magesms')->__('Customer ID'), 'width' => '50px', 'index' => 'entity_id', 'type' => 'number', ) ); $this->addColumn('lastname', array( 'index' => 'lastname', 'header'=>Mage::helper('magesms')->__('Last name'), ) ); $this->addColumn('firstname', array( 'header'=>Mage::helper('magesms')->__('First name'), 'index' => 'firstname', ) ); $this->addColumn('country_id', array( 'header'=>Mage::helper('magesms')->__('Country'), 'width' => '50', 'index' => 'country_id', 'sortable' => false, ) ); $this->addColumn('Telephone', array( 'header'=>Mage::helper('magesms')->__('Mobile number'), 'width' => '130', 'index' => 'telephone', 'sortable' => false, ) ); if (!Mage::app()->isSingleStoreMode()) { $this->addColumn('website_id', array( 'header' => Mage::helper('customer')->__('Website'), 'align' => 'center', 'width' => '100px', 'type' => 'options', 'options' => Mage::getSingleton('adminhtml/system_store')->getWebsiteOptionHash(true), 'index' => 'website_id', )); } $this->addColumn('action', array( 'header'=>Mage::helper('magesms')->__('Action'), 'align' => 'center', 'width' => '80px', 'type' => 'action', 'getter' => 'getId', 'actions' => array( array( 'caption' => Mage::helper('magesms')->__('REMOVE customer from this list'), 'title' => Mage::helper('magesms')->__('REMOVE customer from this list'), 'field' => 'id', 'onclick' => 'filterRemoveCustomerSubmit(this)', 'class' => 'action-remove', 'id' => '', ) ), 'sortable' => false, 'index' => 'store', 'is_system' => true, ) ); return parent::_prepareColumns(); } public function getRowUrl($iebe3a16a01f87f9a4ebbb9731163db3e3e64cc3d) { return $this->getUrl('*/customer/edit', array('id' => $iebe3a16a01f87f9a4ebbb9731163db3e3e64cc3d->getId())); } public function getRowClickCallback() { return 'openGridRowMagesms'; } public function getFilterData() { $iea2d876101fbc4dc03450ed5474bbd8a6fb905a2 = Mage::helper('adminhtml')->prepareFilterString($this->filter_data); $iea2d876101fbc4dc03450ed5474bbd8a6fb905a2 = Mage::helper('magesms')->filterDates($iea2d876101fbc4dc03450ed5474bbd8a6fb905a2, array('reg_from', 'reg_to', 'birth_from', 'birth_to')); $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = new Varien_Object(); foreach ($iea2d876101fbc4dc03450ed5474bbd8a6fb905a2 as $i670253c23c6fcba76bc4256a88fdd8fbc1041039 => $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { if (!empty($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) || is_numeric($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89)) { $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a->setData($i670253c23c6fcba76bc4256a88fdd8fbc1041039, $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89); } } return $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a; } } 