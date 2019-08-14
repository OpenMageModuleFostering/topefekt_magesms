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
 class Topefekt_Magesms_Adminhtml_Magesms_SendsmsController extends Mage_Adminhtml_Controller_Action { public $profile; protected function _construct() { $this->profile = Mage::getSingleton('magesms/smsprofile'); } public function preDispatch() { parent::preDispatch(); if (!$this->profile->user->getUser()) { $this->setFlag('', self::FLAG_NO_DISPATCH, true); if (!empty($this->profile->_error)) { Mage::getSingleton('adminhtml/session')->addError(Mage::helper('magesms')->__($this->profile->_error)); } else { Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('Not registered yet? Create account now!')); } $this->_redirect('*/magesms_profile'); } return $this; } public function indexAction() { $this->_initAction(); $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock( 'Topefekt_Magesms_Block_Template', 'my_block_name_here', array('template' => 'topefekt/magesms/sendsms.phtml') ); $this->getLayout()->getBlock('content')->append($i8ee45e0018a32fb1a855b82624506e35789cc4d2); $this->renderLayout(); return $this; } public function sendAction() { if ( $this->getRequest()->getPost() ) { try { $iacbd1c78463510856e506611fe14b5e1173581a6 = Mage::app()->getRequest(); $idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('text'); $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('unicode') ? true : false; $ifc17de93671eea5715520ecfbc4dc543818685b8 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('unique') ? true : false; $ief058b7f255db4398d193a2545513eb1c6eb5e8b = explode(',', $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('recipients')); if (!empty($_FILES['sms_file']['tmp_name']) && is_uploaded_file($_FILES['sms_file']['tmp_name'])) { $ief058b7f255db4398d193a2545513eb1c6eb5e8b = array_merge($ief058b7f255db4398d193a2545513eb1c6eb5e8b, str_getcsv(file_get_contents($_FILES['sms_file']['tmp_name']), "\n")); } if (!$ief058b7f255db4398d193a2545513eb1c6eb5e8b) Mage::throwException(Mage::helper('magesms')->__('Recipients found: 0')); if (!$idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa) Mage::throwException(Mage::helper('magesms')->__('Fill in SMS text.')); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f = Mage::getModel('magesms/sms'); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setRecipient($ief058b7f255db4398d193a2545513eb1c6eb5e8b) ->setMessage($idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa) ->setType(Topefekt_Magesms_Model_Sms::TYPE_SIMPLE) ->setPriority(false) ->setUnicode($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd) ->setUnique($ifc17de93671eea5715520ecfbc4dc543818685b8); if ($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('sendlater') && $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl')) { $i4c323947385ff52539168f26084feed4bc17e2dc = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl'); $i6aa8d50211ad373efab0896425f6f5fa0e013c29 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl_hour'); $if8001c570b9f0e904df8b36797628015beb8fa80 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl_min'); $i836a3cd8c554d1c35cc3c6cf3e3f49052b683096 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datereal', 0); $i4c323947385ff52539168f26084feed4bc17e2dc = Mage::getModel('core/date')->gmtTimestamp(strtotime("$i4c323947385ff52539168f26084feed4bc17e2dc $i6aa8d50211ad373efab0896425f6f5fa0e013c29:$if8001c570b9f0e904df8b36797628015beb8fa80:00") + 3600*$i836a3cd8c554d1c35cc3c6cf3e3f49052b683096); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setSendlater($i4c323947385ff52539168f26084feed4bc17e2dc); } $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->send(); $this->_redirect('*/*/index'); } catch (Exception $i8c174347956f0a76258a09557543e84f88beb4a0) { $this->_initAction(); $i8ee45e0018a32fb1a855b82624506e35789cc4d2 = $this->getLayout()->createBlock( 'Topefekt_Magesms_Block_Template', 'my_block_name_here', array('template' => 'topefekt/magesms/sendsms.phtml') ); $this->getLayout()->getBlock('content')->append($i8ee45e0018a32fb1a855b82624506e35789cc4d2); Mage::getSingleton('adminhtml/session')->addError($i8c174347956f0a76258a09557543e84f88beb4a0->getMessage()); $this->renderLayout(); } } else { $this->_redirect('*/*/index'); } return $this; } public function loadCustomersAction() { $i4d3f3bffcd16d5910b26a4511d33ad3b5e4c61d4 = ''; if ($this->getRequest()->getParams()) { $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2 = $this->getRequest(); if ($i933cfa8bba921101c14f35998fc501e030c9db5b = $i628d8ebfdcd1b4d13c7bb90cffb2f53678d994d2->getParam('char')) { $i854b57231c05dbaa7f22331dbaed4152a402d2f1 = new Zend_Locale_Data(); $i065c883e3f45e58104d21f8196ee3fe9bd2f513d = $i854b57231c05dbaa7f22331dbaed4152a402d2f1->getList('en-EN', 'phonetoterritory'); $ibad8f78c098260b16424eb12ceee5f8336591d56 = Mage::helper('magesms')->getCustomerCollection(); $ibad8f78c098260b16424eb12ceee5f8336591d56->addFieldToFilter('lastname', array('like' => $i933cfa8bba921101c14f35998fc501e030c9db5b.'%')); $ibad8f78c098260b16424eb12ceee5f8336591d56->addAttributeToSort('lastname', 'ASC'); foreach($ibad8f78c098260b16424eb12ceee5f8336591d56 as $i21e55df616c305955791876c1eb4da83448beba2) { $i4d3f3bffcd16d5910b26a4511d33ad3b5e4c61d4 .= $i21e55df616c305955791876c1eb4da83448beba2->getLastname().', '.$i21e55df616c305955791876c1eb4da83448beba2->getFirstname().';'; $id1caa2f79c0787a3e797d6d388cd6f00ced4282f = Mage::helper('magesms')->prepareNumber($i21e55df616c305955791876c1eb4da83448beba2->getTelephone(), 'customer', empty($i065c883e3f45e58104d21f8196ee3fe9bd2f513d[$i21e55df616c305955791876c1eb4da83448beba2->getCountryId()]) ? '' : $i065c883e3f45e58104d21f8196ee3fe9bd2f513d[$i21e55df616c305955791876c1eb4da83448beba2->getCountryId()]); $i4d3f3bffcd16d5910b26a4511d33ad3b5e4c61d4 .= $id1caa2f79c0787a3e797d6d388cd6f00ced4282f['mobile']."\n"; } } } $this->getResponse()->clearHeaders()->setHeader('Content-Type', 'text/html')->setBody($i4d3f3bffcd16d5910b26a4511d33ad3b5e4c61d4); } protected function _initAction() { $this->loadLayout() ->_setActiveMenu('magesms/sendsms') ->_addBreadcrumb(Mage::helper('magesms')->__('Send SMS'), Mage::helper('magesms')->__('Send SMS')) ->_title(Mage::helper('magesms')->__('MageSMS')) ->_title(Mage::helper('magesms')->__('Send SMS')) ; $this->getLayout()->getBlock('head')->addCss('css/topefekt/magesms/stylesheet.css') ->addJs('topefekt/functions.js'); return $this; } } 