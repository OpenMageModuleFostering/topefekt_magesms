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
 class Topefekt_Magesms_Adminhtml_Magesms_PurchasecreditController extends Mage_Adminhtml_Controller_Action { public $profile; protected function _construct() { parent::_construct(); $this->profile = Mage::getSingleton('magesms/smsprofile'); } public function preDispatch() { parent::preDispatch(); if (!$this->profile->user->getUser()) { $this->setFlag('', self::FLAG_NO_DISPATCH, true); if (!empty($this->profile->_error)) { Mage::getSingleton('adminhtml/session')->addError(Mage::helper('magesms')->__($this->profile->_error)); } else { Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('Not registered yet? Create account now!')); } $this->_redirect('*/magesms_profile'); } return $this; } public function indexAction() { $this->_initAction(); $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock( 'Topefekt_Magesms_Block_Template', 'my_block_name_here2', array('template' => 'topefekt/magesms/purchasecredit.phtml') ); $this->getLayout()->getBlock('content')->append($i8ee45e0018a32fb1a855b82624506e35789cc4d2); $this->renderLayout(); return $this; } protected function _initAction() { $this->loadLayout() ->_setActiveMenu('magesms/purchasecredit') ->_addBreadcrumb(Mage::helper('magesms')->__('Purchase Credit'), Mage::helper('magesms')->__('Purchase Credit')) ->_title(Mage::helper('magesms')->__('MageSMS')) ->_title(Mage::helper('magesms')->__('Purchase Credit')); ; $this->getLayout()->getBlock('head')->addCss('css/topefekt/magesms/stylesheet.css') ->addJs('topefekt/jquery-1.9.1.min.js') ->addJs('topefekt/jquery-noconflict.js') ->addJs('topefekt/functions.js'); return $this; } } 