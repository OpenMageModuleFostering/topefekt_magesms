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
 class Topefekt_Magesms_Adminhtml_Magesms_MarketingController extends Mage_Adminhtml_Controller_Action { public $profile; protected $_filterData; protected function _construct() { $this->profile = Mage::getSingleton('magesms/smsprofile'); } public function preDispatch() { parent::preDispatch(); if (!$this->profile->user->getUser()) { $this->setFlag('', self::FLAG_NO_DISPATCH, true); if (!empty($this->profile->_error)) { Mage::getSingleton('adminhtml/session')->addError(Mage::helper('magesms')->__($this->profile->_error)); } else { Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('Not registered yet? Create account now!')); } $this->_redirect('*/magesms_profile'); } else { $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa = Mage::helper('adminhtml')->prepareFilterString($this->getRequest()->getParam('filter')); $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa = $this->_filterDates($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa, array('reg_from', 'reg_to', 'birth_from', 'birth_to')); $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = new Varien_Object(); foreach ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa as $i670253c23c6fcba76bc4256a88fdd8fbc1041039 => $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { if (!empty($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) || is_numeric($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89)) { $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a->setData($i670253c23c6fcba76bc4256a88fdd8fbc1041039, $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89); } } $this->_filterData = $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a; $ia309f32db02d9de4490b0dcce975d0ccbce2c215 = Mage::helper('adminhtml')->prepareFilterString($this->getRequest()->getParam('sms')); $ia309f32db02d9de4490b0dcce975d0ccbce2c215 = $this->_filterDates($ia309f32db02d9de4490b0dcce975d0ccbce2c215, array('datumodesl')); $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = new Varien_Object(); foreach ($ia309f32db02d9de4490b0dcce975d0ccbce2c215 as $i670253c23c6fcba76bc4256a88fdd8fbc1041039 => $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { if (!empty($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) || is_numeric($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89)) { $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a->setData($i670253c23c6fcba76bc4256a88fdd8fbc1041039, $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89); } } $this->_smsData = $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a; } return $this; } public function indexAction() { $this->_initAction(); $iff7e46827cbb6547116c592bf800f4687428abf9 = $this->_getCollection(); Mage::register('magesms_marketing_collection', $iff7e46827cbb6547116c592bf800f4687428abf9); $i5509ac707290a86add15ab0ce4da982d395f4c4f = $this->getLayout()->createBlock( 'Topefekt_Magesms_Block_Template', 'my_block_name_here', array('template' => 'topefekt/magesms/marketing.phtml') ); $i5509ac707290a86add15ab0ce4da982d395f4c4f->setSmsData($this->_smsData ? $this->_smsData : $this->getRequest()->getParams()); $i5509ac707290a86add15ab0ce4da982d395f4c4f->setFilterData($this->_filterData); $this->getLayout()->getBlock('content')->append($i5509ac707290a86add15ab0ce4da982d395f4c4f); $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a = $this->getLayout()->createBlock('magesms/marketing_form'); $iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a->setFilterData($this->_filterData); $this->getLayout()->getBlock('content')->append($iba20acc78644ac0e9cd48ea35d8ad03b058f6b5a); $i42cf41da37138d64d37b0778e6561aab5e1239d6 = $this->getLayout()->createBlock('magesms/marketing'); $i42cf41da37138d64d37b0778e6561aab5e1239d6->setFilterData($this->_filterData); $this->getLayout()->getBlock('content')->append($i42cf41da37138d64d37b0778e6561aab5e1239d6); $this->renderLayout(); return $this; } public function sendAction() { if ( $this->getRequest()->getPost() ) { try { $iacbd1c78463510856e506611fe14b5e1173581a6 = Mage::app()->getRequest(); $idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('text'); $ifc17de93671eea5715520ecfbc4dc543818685b8 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('unique') ? true : false; $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('unicode') ? true : false; $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f = Mage::getModel('magesms/sms'); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setMessage($idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa) ->setType(3) ->setPriority(false) ->setUnicode($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd) ->setUnique($ifc17de93671eea5715520ecfbc4dc543818685b8); if ($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('sendlater') && $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl')) { $i4c323947385ff52539168f26084feed4bc17e2dc = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl'); $i6aa8d50211ad373efab0896425f6f5fa0e013c29 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl_hour'); $if8001c570b9f0e904df8b36797628015beb8fa80 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datumodesl_min'); $i836a3cd8c554d1c35cc3c6cf3e3f49052b683096 = $iacbd1c78463510856e506611fe14b5e1173581a6->getPost('datereal', 0); $i4c323947385ff52539168f26084feed4bc17e2dc = strtotime("$i4c323947385ff52539168f26084feed4bc17e2dc $i6aa8d50211ad373efab0896425f6f5fa0e013c29:$if8001c570b9f0e904df8b36797628015beb8fa80:00") + 3600*$i836a3cd8c554d1c35cc3c6cf3e3f49052b683096; $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setSendlater($i4c323947385ff52539168f26084feed4bc17e2dc); } foreach($this->_getCollection() as $iff7e46827cbb6547116c592bf800f4687428abf9) { $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->addRecipient($iff7e46827cbb6547116c592bf800f4687428abf9->getTelephone(), array( 'country' => $iff7e46827cbb6547116c592bf800f4687428abf9->getCountryId(), 'customerId' => $iff7e46827cbb6547116c592bf800f4687428abf9->getId(), 'recipient' => $iff7e46827cbb6547116c592bf800f4687428abf9->getFirstname().' '.$iff7e46827cbb6547116c592bf800f4687428abf9->getLastname())); } $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->send(); $this->_redirectReferer(); } catch (Exception $i8c174347956f0a76258a09557543e84f88beb4a0) { Mage::getSingleton('adminhtml/session')->addError($i8c174347956f0a76258a09557543e84f88beb4a0->getMessage()); $this->indexAction(); } } else { $this->_redirect('*/*/index'); } return $this; } protected function _getCollection() { $iff7e46827cbb6547116c592bf800f4687428abf9 = Mage::helper('magesms')->getCustomerCollection(); $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa = $this->_filterData; if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getGender()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('gender', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getGender()); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getFirstname()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('firstname', array('like' => $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getFirstname().'%')); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getLastname()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('lastname', array('like' => $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getLastname().'%')); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getWebsiteId()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('website_id', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getWebsiteId()); if (!is_null($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getGroupId(null))) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('group_id', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getGroupId()); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getType() == 1) $iff7e46827cbb6547116c592bf800f4687428abf9->joinAttribute('billing_vat_id', 'customer_address/vat_id', 'default_billing', null, 'left') ->addFieldToFilter('billing_vat_id', array('notnull' => true)); elseif ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getType() == 2) $iff7e46827cbb6547116c592bf800f4687428abf9->joinAttribute('billing_vat_id', 'customer_address/vat_id', 'default_billing', null, 'left') ->addFieldToFilter('billing_vat_id', array('null' => true)); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getNewsletter()) { $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect() ->joinLeft( array('ns' => $iff7e46827cbb6547116c592bf800f4687428abf9->getTable('newsletter/subscriber')), 'ns.customer_id = e.entity_id' ); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getNewsletter() == 1) $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect() ->where('ns.`subscriber_status` = 1'); else $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect() ->where('ns.`subscriber_status` = 0 OR ns.`subscriber_status` IS NULL'); } if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getCountryId()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('billing_country_id', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getCountryId()); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getCity()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('billing_city', array('like' => '%'.$i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getCity().'%')); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegAllyears()) { if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegFrom()) $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect() ->where('DAYOFYEAR(DATE_ADD(created_at, INTERVAL (YEAR(?) - YEAR(created_at)) YEAR)) >= DAYOFYEAR(?)', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegFrom()); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegTo()) $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect() ->where('DAYOFYEAR(DATE_ADD(created_at, INTERVAL (YEAR(?) - YEAR(created_at)) YEAR)) <= DAYOFYEAR(?)', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegTo()); } else { if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegFrom()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('created_at', array('from' => $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegFrom().' 00:00:00')); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegTo()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('created_at', array('to' => $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getRegTo().' 23:59:59')); } if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthAllyears()) { $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('dob', array('notnull' => true)); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthFrom()) $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect() ->where('DAYOFYEAR(DATE_ADD(at_dob.value, INTERVAL (YEAR(?) - YEAR(at_dob.value)) YEAR)) >= DAYOFYEAR(?)', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthFrom()); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthTo()) $iff7e46827cbb6547116c592bf800f4687428abf9->getSelect() ->where('DAYOFYEAR(DATE_ADD(at_dob.value, INTERVAL (YEAR(?) - YEAR(at_dob.value)) YEAR)) <= DAYOFYEAR(?)', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthTo()); } else { if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthFrom()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('dob', array('from' => $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthFrom().' 00:00:00')); if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthTo()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('dob', array('to' => $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getBirthTo().' 23:59:59')); } if ($i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getCustomerNot()) $iff7e46827cbb6547116c592bf800f4687428abf9->addFieldToFilter('entity_id', array('nin' => explode(',', $i5b3aa260bb208b1f4c5808ffd6ec3b60c98869aa->getCustomerNot()))); return $iff7e46827cbb6547116c592bf800f4687428abf9; } protected function _initAction() { $this->loadLayout() ->_setActiveMenu('magesms/marketing') ->_addBreadcrumb(Mage::helper('magesms')->__('SMS Marketing'), Mage::helper('magesms')->__('SMS Marketing')) ->_title(Mage::helper('magesms')->__('MageSMS')) ->_title(Mage::helper('magesms')->__('SMS Marketing')) ; $this->getLayout()->getBlock('head')->addCss('css/topefekt/magesms/stylesheet.css') ->addJs('topefekt/jquery-1.9.1.min.js') ->addJs('topefekt/jquery-noconflict.js') ->addJs('topefekt/functions.js'); return $this; } } 