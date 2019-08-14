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
 class Topefekt_Magesms_Adminhtml_Magesms_AdminsmsController extends Topefekt_Magesms_Controller_Action { private $v2b483c223d472d1fb22c9823dcc35f84765b2c06 = array(); public function _construct() { $this->v2b483c223d472d1fb22c9823dcc35f84765b2c06 = new Varien_Data_Collection(); $this->v2b483c223d472d1fb22c9823dcc35f84765b2c06->addItem(new Varien_Object( array( 'group' => 'order_status', 'name' =>Mage::helper('magesms')->__('Order status'), 'icon' => 'magesms/AdminOrders.gif' ) ))->addItem(new Varien_Object( array( 'group' => 'order', 'name' =>Mage::helper('magesms')->__('Order'), 'icon' => 'magesms/AdminOrders.gif' ) ))->addItem(new Varien_Object( array( 'group' => 'account', 'name' =>Mage::helper('magesms')->__('Account'), 'icon' => 'magesms/AdminCustomers.gif' ) ))->addItem(new Varien_Object( array( 'group' => 'product', 'name' => Mage::helper('magesms')->__('Product'), 'icon' => 'AdminCatalog.gif' ) ))->addItem(new Varien_Object( array( 'group' => 'contactform', 'name' => Mage::helper('magesms')->__('Contact form'), 'icon' => 'AdminCatalog.gif' ) )); parent::_construct(); } public function indexAction() { $this->_initAction(); $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock( 'Topefekt_Magesms_Block_Template', 'my_block_name_here', array('template' => 'topefekt/magesms/adminsms.phtml') ); foreach ($this->v2b483c223d472d1fb22c9823dcc35f84765b2c06 as $i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc) { $i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc->setHooks(Mage::helper('magesms')->getHooks($i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc['group'], 'admins')); } $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = new Varien_Data_Collection(); Mage::dispatchEvent('topefekt_magesms_adminsms_groups', array('groups' => $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a)); foreach ($ia8a35a47a8e61218e15d1a33dac64bdc2449c01a as $i4abcdb69150d2b99477ddace90c2020fb244c4f6) { if ($i4abcdb69150d2b99477ddace90c2020fb244c4f6->getGroup() && !$this->v2b483c223d472d1fb22c9823dcc35f84765b2c06->getItemByColumnValue('group', $i4abcdb69150d2b99477ddace90c2020fb244c4f6->getGroup())) { $this->v2b483c223d472d1fb22c9823dcc35f84765b2c06->addItem($i4abcdb69150d2b99477ddace90c2020fb244c4f6); } else { foreach($i4abcdb69150d2b99477ddace90c2020fb244c4f6->getHooks() as $i42ee48f418943c9662de0976069476c7dc8f620d) { if ($i42ee48f418943c9662de0976069476c7dc8f620d->getName() && ($i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc = $this->v2b483c223d472d1fb22c9823dcc35f84765b2c06->getItemByColumnValue('group', $i42ee48f418943c9662de0976069476c7dc8f620d->getGroup()))) { $ib621bf9fa69ea2cdc5a9bc8679d915479caec16a = $i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc->getHooks(); $ib621bf9fa69ea2cdc5a9bc8679d915479caec16a[$i42ee48f418943c9662de0976069476c7dc8f620d->getName()] = $i42ee48f418943c9662de0976069476c7dc8f620d; $i45529c33bd7aa0ebcc4b6e41bd3e02f2889252fc->setHooks($ib621bf9fa69ea2cdc5a9bc8679d915479caec16a); } } } } $i8ee45e0018a32fb1a855b82624506e35789cc4d2->setGroups($this->v2b483c223d472d1fb22c9823dcc35f84765b2c06); $this->getLayout()->getBlock('content')->append($i8ee45e0018a32fb1a855b82624506e35789cc4d2); $this->renderLayout(); return $this; } public function saveunicodeAction() { $i7137e40370cf1c5ccf937060891613788203e2d6 = 'default'; $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd = Mage::getSingleton('magesms/hooks_unicode') ->getCollection() ->addFilter('area', $i7137e40370cf1c5ccf937060891613788203e2d6) ->addFilter('type', 'admin') ->getFirstItem(); if (!count($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->getData())) { $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd = Mage::getSingleton('magesms/hooks_unicode'); $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->setArea($i7137e40370cf1c5ccf937060891613788203e2d6); $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->setType('admin'); $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->setUnicode($this->getRequest()->getParam('unicode' , 0)); } else { $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->setUnicode($this->getRequest()->getParam('unicode' , 0)); } $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->save(); Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('Unicode was saved.')); $this->_redirect('*/*/'); return $this; } public function savehookAction() { $i30f20aafde612a957f7f966cb5b85e35782bc88a = $this->getRequest()->getParam('type'); $i2bd9743336318d0e14be0600c9129730279505dd = $this->getRequest()->getParam('name'); $i24273814df383b4a6926acc1db1a788b12f5a411 = $this->getRequest()->getParam('text' , ''); $id2202a8a92e3022b2b00717b92bc918373dc2edc = $this->getRequest()->getParam('plugin'); if ($i30f20aafde612a957f7f966cb5b85e35782bc88a && $i2bd9743336318d0e14be0600c9129730279505dd && $i24273814df383b4a6926acc1db1a788b12f5a411) { if ($id2202a8a92e3022b2b00717b92bc918373dc2edc) { Mage::dispatchEvent('topefekt_magesms_adminsms_save'); } else { $if739aceffec69fa2733946a3d319defaa354082d = Mage::getSingleton('magesms/hooks_'.$i30f20aafde612a957f7f966cb5b85e35782bc88a) ->getCollection() ->addFilter('name', $i2bd9743336318d0e14be0600c9129730279505dd); foreach($if739aceffec69fa2733946a3d319defaa354082d as $i42ee48f418943c9662de0976069476c7dc8f620d) { $i42ee48f418943c9662de0976069476c7dc8f620d->delete(); } } foreach($this->getRequest()->getParams() as $i670253c23c6fcba76bc4256a88fdd8fbc1041039=>$iacbd1c78463510856e506611fe14b5e1173581a6) { if (strpos($i670253c23c6fcba76bc4256a88fdd8fbc1041039, 'active_') === 0) { $ia61712c27ea241bd7a543dc2b02ea572274d0322 = explode('_', $i670253c23c6fcba76bc4256a88fdd8fbc1041039); $i42ee48f418943c9662de0976069476c7dc8f620d = Mage::getModel('magesms/hooks_'.$i30f20aafde612a957f7f966cb5b85e35782bc88a) ->setName($i2bd9743336318d0e14be0600c9129730279505dd) ->setSmstext($i24273814df383b4a6926acc1db1a788b12f5a411) ->setAdminId($ia61712c27ea241bd7a543dc2b02ea572274d0322[2]) ->setStoreGroupId($ia61712c27ea241bd7a543dc2b02ea572274d0322[3]) ->save(); } else { continue; } } Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('Text of SMS was saved.')); } $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = array('_fragment' => $i2bd9743336318d0e14be0600c9129730279505dd); $this->_redirect('*/*/', $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a); return $this; } protected function _initAction() { parent::_initAction(); $this->_setActiveMenu('magesms/adminsms') ->_title(Mage::helper('magesms')->__('Admin SMS')) ; return $this; } } 