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
 * @copyright   Copyright (c) 2012-2017 TOPefekt s.r.o. (http://www.mage-sms.com)
 * @license     http://opensource.org/licenses/BSD-3-Clause
 */
 class Topefekt_Magesms_Adminhtml_Magesms_CustomersmsController extends Topefekt_Magesms_Controller_Action { private $v2b483c223d472d1fb22c9823dcc35f84765b2c06 = array(); public function _construct() { $this->v2b483c223d472d1fb22c9823dcc35f84765b2c06 = new Varien_Data_Collection(); $this->v2b483c223d472d1fb22c9823dcc35f84765b2c06->addItem(new Varien_Object( array( 'group' => 'order_status', 'name' => 'Order status', 'icon' => 'magesms/AdminOrders.gif' ) ))->addItem(new Varien_Object( array( 'group' => 'order', 'name' => 'Order', 'icon' => 'magesms/AdminOrders.gif' ) ))->addItem(new Varien_Object( array( 'group' => 'account', 'name' => 'Account', 'icon' => 'magesms/AdminCustomers.gif' ) )); parent::_construct(); } public function indexAction() { $this->_initAction(); $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock( 'Topefekt_Magesms_Block_Template', 'my_block_name_here', array('template' => 'topefekt/magesms/customersms.phtml') ); $ie54fcd5470bd7f31f709089290e33bb03e655c25 = Mage::helper('magesms')->getMutations(); $i7137e40370cf1c5ccf937060891613788203e2d6 = $this->getRequest()->getParam('mutation'); if ($i7137e40370cf1c5ccf937060891613788203e2d6 && !in_array($i7137e40370cf1c5ccf937060891613788203e2d6, array_keys($ie54fcd5470bd7f31f709089290e33bb03e655c25))) $i7137e40370cf1c5ccf937060891613788203e2d6 = ''; if (isset($ie54fcd5470bd7f31f709089290e33bb03e655c25[$i7137e40370cf1c5ccf937060891613788203e2d6])) { $ie54fcd5470bd7f31f709089290e33bb03e655c25[$i7137e40370cf1c5ccf937060891613788203e2d6]['selected'] = 1; $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setMutationLabel($ie54fcd5470bd7f31f709089290e33bb03e655c25[$i7137e40370cf1c5ccf937060891613788203e2d6]['label']); $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setMutationValue($ie54fcd5470bd7f31f709089290e33bb03e655c25[$i7137e40370cf1c5ccf937060891613788203e2d6]['value']); } else { foreach ($ie54fcd5470bd7f31f709089290e33bb03e655c25 as &$i593f9fb6306ab4cdb862f1ef6769504d63647c90) { $i7137e40370cf1c5ccf937060891613788203e2d6 = $i593f9fb6306ab4cdb862f1ef6769504d63647c90['value']; $i593f9fb6306ab4cdb862f1ef6769504d63647c90['selected'] = 1; $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setMutationLabel($i593f9fb6306ab4cdb862f1ef6769504d63647c90['label']); $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setMutationValue($i593f9fb6306ab4cdb862f1ef6769504d63647c90['value']); break; } } $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setMutations($ie54fcd5470bd7f31f709089290e33bb03e655c25); foreach ($this->v2b483c223d472d1fb22c9823dcc35f84765b2c06 as $i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc) { $i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc->setHooks(Mage::helper('magesms')->getHooks($i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc['group'], 'customers', $i7137e40370cf1c5ccf937060891613788203e2d6)); } $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = new Varien_Data_Collection(); Mage::dispatchEvent('topefekt_magesms_customersms_groups', array('groups' => $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a)); foreach ($ia8a35a47a8e61218e15d1a33dac64bdc2449c01a as $i4abcdb69150d2b99477ddace90c2020fb244c4f6) { if ($i4abcdb69150d2b99477ddace90c2020fb244c4f6->getGroup() && !$this->v2b483c223d472d1fb22c9823dcc35f84765b2c06->getItemByColumnValue('group', $i4abcdb69150d2b99477ddace90c2020fb244c4f6->getGroup())) { $this->v2b483c223d472d1fb22c9823dcc35f84765b2c06->addItem($i4abcdb69150d2b99477ddace90c2020fb244c4f6); } else { foreach($i4abcdb69150d2b99477ddace90c2020fb244c4f6->getHooks() as $i42ee48f418943c9662de0976069476c7dc8f620d) { if ($i42ee48f418943c9662de0976069476c7dc8f620d->getName() && ($i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc = $this->v2b483c223d472d1fb22c9823dcc35f84765b2c06->getItemByColumnValue('group', $i42ee48f418943c9662de0976069476c7dc8f620d->getGroup()))) { $ib621bf9fa69ea2cdc5a9bc8679d915479caec16a = $i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc->getHooks(); $ib621bf9fa69ea2cdc5a9bc8679d915479caec16a[$i42ee48f418943c9662de0976069476c7dc8f620d->getName()] = $i42ee48f418943c9662de0976069476c7dc8f620d; $i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc->setHooks($ib621bf9fa69ea2cdc5a9bc8679d915479caec16a); } } } } $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setGroups($this->v2b483c223d472d1fb22c9823dcc35f84765b2c06); $this->getLayout()->getBlock('content')->append($i8ee45e0018a32fb1a855b82624506e35789cc4d2); $this->renderLayout(); return $this; } public function saveunicodeAction() { $i7137e40370cf1c5ccf937060891613788203e2d6 = $this->getRequest()->getParam('mutation'); if ($i7137e40370cf1c5ccf937060891613788203e2d6) { $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd = Mage::getSingleton('magesms/hooks_unicode') ->getCollection() ->addFilter('area', $i7137e40370cf1c5ccf937060891613788203e2d6) ->addFilter('type', 'customer') ->getFirstItem(); if (!count($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->getData())) { $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd = Mage::getSingleton('magesms/hooks_unicode'); $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->setArea($i7137e40370cf1c5ccf937060891613788203e2d6); $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->setType('customer'); $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->setUnicode($this->getRequest()->getParam('unicode' , 0)); } else { $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->setUnicode($this->getRequest()->getParam('unicode' , 0)); } $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->save(); Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('Unicode was saved.')); } $this->_redirect('*/*/', array('mutation' => $i7137e40370cf1c5ccf937060891613788203e2d6)); return $this; } public function savehookAction() { $i7137e40370cf1c5ccf937060891613788203e2d6 = $this->getRequest()->getParam('mutation', 'default'); $i30f20aafde612a957f7f966cb5b85e35782bc88a = $this->getRequest()->getParam('type'); $i2bd9743336318d0e14be0600c9129730279505dd = $this->getRequest()->getParam('name'); $id2202a8a92e3022b2b00717b92bc918373dc2edc = $this->getRequest()->getParam('plugin'); $i24273814df383b4a6926acc1db1a788b12f5a411 = $this->getRequest()->getParam('text' , ''); if ($i30f20aafde612a957f7f966cb5b85e35782bc88a && $i2bd9743336318d0e14be0600c9129730279505dd && $i24273814df383b4a6926acc1db1a788b12f5a411) { if ($id2202a8a92e3022b2b00717b92bc918373dc2edc) { Mage::dispatchEvent('topefekt_magesms_customersms_save'); } else { $i42ee48f418943c9662de0976069476c7dc8f620d = Mage::getSingleton('magesms/hooks_'.$i30f20aafde612a957f7f966cb5b85e35782bc88a) ->getCollection() ->addFilter('name', $i2bd9743336318d0e14be0600c9129730279505dd) ->addFilter('mutation', $i7137e40370cf1c5ccf937060891613788203e2d6) ->getFirstItem(); if (!count($i42ee48f418943c9662de0976069476c7dc8f620d->getData())) { $i42ee48f418943c9662de0976069476c7dc8f620d = Mage::getSingleton('magesms/hooks_'.$i30f20aafde612a957f7f966cb5b85e35782bc88a); $i42ee48f418943c9662de0976069476c7dc8f620d->setMutation($i7137e40370cf1c5ccf937060891613788203e2d6); $i42ee48f418943c9662de0976069476c7dc8f620d->setName($i2bd9743336318d0e14be0600c9129730279505dd); } $i42ee48f418943c9662de0976069476c7dc8f620d->setActive($this->getRequest()->getParam('active' , 0)); $i42ee48f418943c9662de0976069476c7dc8f620d->setSmstext($i24273814df383b4a6926acc1db1a788b12f5a411); $i42ee48f418943c9662de0976069476c7dc8f620d->save(); } Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('Text of SMS was saved.')); } $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = array('_fragment' => $i2bd9743336318d0e14be0600c9129730279505dd); if ($i7137e40370cf1c5ccf937060891613788203e2d6 != 'default') $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a += array('mutation' => $i7137e40370cf1c5ccf937060891613788203e2d6); $this->_redirect('*/*/', $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a); return $this; } protected function _initAction() { parent::_initAction(); $this->_setActiveMenu('magesms/customersms') ->_title(Mage::helper('magesms')->__('Customer SMS')) ; return $this; } protected function _isAllowed() { return Mage::getSingleton('admin/session')->isAllowed('magesms/settings/customersms'); } } 