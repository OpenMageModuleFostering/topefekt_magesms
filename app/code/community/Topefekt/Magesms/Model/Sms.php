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
class Topefekt_Magesms_Model_Sms extends Varien_Object { const SENT = 1; const ERROR = 2; const DELIVERED = 3; const UNAVAILABLE = 4; const SIMULATION = 5; const SCHEDULED = 6; const DELETED = 7; const DND = 8; const DUPLICATE = 9; const TYPE_ADMIN = 1; const TYPE_CUSTOMER = 2; const TYPE_MARKETING = 3; const TYPE_SIMPLE = 4; protected $_routes_type = array( self::TYPE_ADMIN => 'admin', self::TYPE_CUSTOMER => 'customer', self::TYPE_MARKETING => 'customer', self::TYPE_SIMPLE => 'customer'); private $v3a95f9a85ae3fecc89b69aa9ea2d057ac2807b0b = true; public function _construct() { $this->setData(array( 'recipient' => new Varien_Data_Collection(), 'message' => '', 'subject' => '', 'unicode' => false, 'sendlater' => false, 'type' => self::TYPE_SIMPLE, 'priority' => true, 'unique' => false, 'adminId' => 0, 'customerId' => 0, 'recipientName' => '', 'storeId' => null )); parent::_construct(); } public function send() { $ibcdf76f8c9ddc330c79f805116a8bb146c43749d6abff7c4dab2aa28578ae1dc49699ba6b1d18c18 = Mage::getSingleton('magesms/smsprofile'); try { $ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f = array(); if (!strlen($this->getMessage())) { $ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f[] = Mage::helper('magesms')->__('Fill in SMS text.'); } if (is_array($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f) && sizeof($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f)) Mage::throwException($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f[0]); if ($this->getSendlater()) { $ibcdf76f8c9ddc330c79f805116a8bb146c43749d8284e7e828b5452004207db69edd7aa7ff0703ab = Mage::getModel('core/date')->gmtTimestamp(); if ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d8284e7e828b5452004207db69edd7aa7ff0703ab >= $this->getSendlater()) $ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f[] = Mage::helper('magesms')->__('Wrong time of SMS sending.'); } if (is_array($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f) && sizeof($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f)) Mage::throwException($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f[0]); if (!count($this->getRecipient())) $ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f[] = Mage::helper('magesms')->__('Recipients found: 0'); if (is_array($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f) && sizeof($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f)) Mage::throwException($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f[0]); $ibcdf76f8c9ddc330c79f805116a8bb146c43749dcd14fe4ea296b55b8ecbf19d2fd7bfef3a511519 = html_entity_decode($this->getMessage(), ENT_QUOTES, 'UTF-8'); $if295547318143e26fc7026b92d58e3d1eec229db = Mage::helper('magesms')->countSms($ibcdf76f8c9ddc330c79f805116a8bb146c43749dcd14fe4ea296b55b8ecbf19d2fd7bfef3a511519, $this->getUnicode()); if (!$ibcdf76f8c9ddc330c79f805116a8bb146c43749d6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->simulatesms && count($this->getRecipient())*$if295547318143e26fc7026b92d58e3d1eec229db*0.05 > $ibcdf76f8c9ddc330c79f805116a8bb146c43749d6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->credit) $ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f[] = Mage::helper('magesms')->__('You do not have enough credit to send SMS to all ') .count($this->getRecipient()).Mage::helper('magesms')->__(' recipients.'); if (is_array($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f) && sizeof($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f)) Mage::throwException($ibcdf76f8c9ddc330c79f805116a8bb146c43749dbdd27a8dd714410289189d318feb96fe6ed8e07f[0]); $ibcdf76f8c9ddc330c79f805116a8bb146c43749d854b57231c05dbaa7f22331dbaed4152a402d2f1 = new Zend_Locale_Data(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749d065c883e3f45e58104d21f8196ee3fe9bd2f513d = $ibcdf76f8c9ddc330c79f805116a8bb146c43749d854b57231c05dbaa7f22331dbaed4152a402d2f1->getList('en-EN', 'phonetoterritory'); $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2 = array('number'=>array(), 'isms'=>array(), 'sendertype'=>array(), 'senderID'=>array(), 'admin_id'=>array(), 'customer_id'=>array(), 'data' => array()); $ibcdf76f8c9ddc330c79f805116a8bb146c43749d = 0; foreach($this->getRecipient() as $ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802) { $ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f = $ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getNumber(); $i037b855bc01175f2c77d5c3e19eda9a0003feff4 = $ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getCountry() ? $ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getCountry() : ''; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df0177bfe4bf22cfbb3da2ac06eca557829f0a4cd = ''; if ($i037b855bc01175f2c77d5c3e19eda9a0003feff4 && $ibcdf76f8c9ddc330c79f805116a8bb146c43749d065c883e3f45e58104d21f8196ee3fe9bd2f513d[$i037b855bc01175f2c77d5c3e19eda9a0003feff4] && !(strpos($ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f, '+') === 0 || strpos($ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f, '00') === 0)) { if (strpos($ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f, '0') === 0) $ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f = substr($ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f, 1); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df0177bfe4bf22cfbb3da2ac06eca557829f0a4cd = $ibcdf76f8c9ddc330c79f805116a8bb146c43749d065c883e3f45e58104d21f8196ee3fe9bd2f513d[$i037b855bc01175f2c77d5c3e19eda9a0003feff4]; } $i813c950729f632ca03f8c203c0a769de5e8bdf29 = Mage::helper('magesms')->prepareNumber($ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f, $this->_routes_type[$this->getType()], $ibcdf76f8c9ddc330c79f805116a8bb146c43749df0177bfe4bf22cfbb3da2ac06eca557829f0a4cd, $this->getStoreId()); if(is_array($i813c950729f632ca03f8c203c0a769de5e8bdf29)) { if ($this->getUnique()) { if (in_array($i813c950729f632ca03f8c203c0a769de5e8bdf29['mobile'], $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'])) continue; } $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'][] = $i813c950729f632ca03f8c203c0a769de5e8bdf29['mobile']; $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['isms'][] = $i813c950729f632ca03f8c203c0a769de5e8bdf29['isms']; $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['sendertype'][] = $i813c950729f632ca03f8c203c0a769de5e8bdf29['sendertype']; $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][] = $i813c950729f632ca03f8c203c0a769de5e8bdf29['senderID']; $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['admin_id'][] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getAdminId(); $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customer_id'][] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getCustomerId(); $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getRecipient(); if ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->hasText()) { $i42745015bca99637011d2ba8a559beb3a8b0961f = html_entity_decode($ibcdf76f8c9ddc330c79f805116a8bb146c43749d90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getText(), ENT_QUOTES, 'UTF-8'); $i42745015bca99637011d2ba8a559beb3a8b0961f = addslashes($i42745015bca99637011d2ba8a559beb3a8b0961f); $i42745015bca99637011d2ba8a559beb3a8b0961f = str_replace("&amp;", "%26", $i42745015bca99637011d2ba8a559beb3a8b0961f); $i42745015bca99637011d2ba8a559beb3a8b0961f = str_replace("&", "%26", $i42745015bca99637011d2ba8a559beb3a8b0961f); $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d] = $i42745015bca99637011d2ba8a559beb3a8b0961f; } } $ibcdf76f8c9ddc330c79f805116a8bb146c43749d++; } if ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->simulatesms) { foreach($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'] as $ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039 => $ibcdf76f8c9ddc330c79f805116a8bb146c43749df2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b = Mage::getModel('magesms/smshistory'); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNumber('+'.$ibcdf76f8c9ddc330c79f805116a8bb146c43749df2eee0665f163a28f4adcfe84e3fc666bf1bcd89); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setDate(date('Y-m-d H:i:s')); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setText($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setTotal(Mage::helper('magesms')->countSms($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039], $this->getUnicode())); } else { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setText($ibcdf76f8c9ddc330c79f805116a8bb146c43749dcd14fe4ea296b55b8ecbf19d2fd7bfef3a511519); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setTotal($if295547318143e26fc7026b92d58e3d1eec229db); } $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::SIMULATION); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSender($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setUnicode($this->getUnicode()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setType($this->getType()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('SMS SIMULATION (Sending of SMS was simulated. Recipient will not receive SMS)')); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSmsid('simulate'.md5(microtime())); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSubject($this->getSubject()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setAdminId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['admin_id'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setCustomerId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customer_id'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setRecipient($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->save(); } if (count($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'])) Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('SMS was sent (simulation).')); $this->v3a95f9a85ae3fecc89b69aa9ea2d057ac2807b0b = false; } else { $ia61712c27ea241bd7a543dc2b02ea572274d0322 = 'username='.urlencode($ibcdf76f8c9ddc330c79f805116a8bb146c43749d6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->user).'&password='.urlencode($ibcdf76f8c9ddc330c79f805116a8bb146c43749d6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->passwd) .'&unicode='.($this->getUnicode() ? 1 : 0); if ($this->getPriority()) $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&action=sendsms&number='.urlencode($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'][0]) .'&isms='.urlencode($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['isms'][0]).'&sender='.urlencode($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][0]); else $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&action=sendsmsall'.($this->getType() == self::TYPE_MARKETING ? '2' : '').'&number='.implode(';', $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number']) .'&isms='.implode(';', $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['isms']).'&sender='.implode(';', $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID']); if ($this->getType() == self::TYPE_MARKETING && !empty($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'])) foreach ($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'] as $ibcdf76f8c9ddc330c79f805116a8bb146c43749d=>$ibcdf76f8c9ddc330c79f805116a8bb146c43749df2eee0665f163a28f4adcfe84e3fc666bf1bcd89) $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&data'.$ibcdf76f8c9ddc330c79f805116a8bb146c43749d.'='.$ibcdf76f8c9ddc330c79f805116a8bb146c43749df2eee0665f163a28f4adcfe84e3fc666bf1bcd89; else { $i42745015bca99637011d2ba8a559beb3a8b0961f = html_entity_decode($ibcdf76f8c9ddc330c79f805116a8bb146c43749dcd14fe4ea296b55b8ecbf19d2fd7bfef3a511519, ENT_QUOTES, 'UTF-8'); $i42745015bca99637011d2ba8a559beb3a8b0961f = addslashes($i42745015bca99637011d2ba8a559beb3a8b0961f); $i42745015bca99637011d2ba8a559beb3a8b0961f = str_replace("&amp;", "%26", $i42745015bca99637011d2ba8a559beb3a8b0961f); $i42745015bca99637011d2ba8a559beb3a8b0961f = str_replace("&", "%26", $i42745015bca99637011d2ba8a559beb3a8b0961f); $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&data='.$i42745015bca99637011d2ba8a559beb3a8b0961f; } if ($this->getSendlater()) $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&datelater='.urlencode($this->getSendlater()); if ($this->getHookName()) { $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&HN='.$this->getHookName(); } $ibcdf76f8c9ddc330c79f805116a8bb146c43749d55dd4e7042a1f9031b84f07f04c37165ce3d0720 = Mage::getModel('magesms/api')->serverPost($ia61712c27ea241bd7a543dc2b02ea572274d0322, false); if (!empty($ibcdf76f8c9ddc330c79f805116a8bb146c43749d55dd4e7042a1f9031b84f07f04c37165ce3d0720)) { if (strpos($ibcdf76f8c9ddc330c79f805116a8bb146c43749d55dd4e7042a1f9031b84f07f04c37165ce3d0720, 'QQQ___QQQ') !== false) $ibcdf76f8c9ddc330c79f805116a8bb146c43749dd18c7e5bc71d5242a8b8cc24d43559e5dccbddb5 = explode("QQQ___QQQ", $ibcdf76f8c9ddc330c79f805116a8bb146c43749d55dd4e7042a1f9031b84f07f04c37165ce3d0720); else $ibcdf76f8c9ddc330c79f805116a8bb146c43749dd18c7e5bc71d5242a8b8cc24d43559e5dccbddb5 = array($ibcdf76f8c9ddc330c79f805116a8bb146c43749d55dd4e7042a1f9031b84f07f04c37165ce3d0720); foreach($ibcdf76f8c9ddc330c79f805116a8bb146c43749dd18c7e5bc71d5242a8b8cc24d43559e5dccbddb5 as $ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039 => $ibcdf76f8c9ddc330c79f805116a8bb146c43749df2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { $ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a = Mage::getModel('magesms/api')->parser($ibcdf76f8c9ddc330c79f805116a8bb146c43749df2eee0665f163a28f4adcfe84e3fc666bf1bcd89, '__'); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b = Mage::getModel('magesms/smshistory'); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNumber('+'.$if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setDate(date('Y-m-d H:i:s')); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setText($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setTotal(Mage::helper('magesms')->countSms($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['data'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039], $this->getUnicode())); } else { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setText($ibcdf76f8c9ddc330c79f805116a8bb146c43749dcd14fe4ea296b55b8ecbf19d2fd7bfef3a511519); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setTotal($if295547318143e26fc7026b92d58e3d1eec229db); } $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::ERROR); if (isset($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['data'][1])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setPrice($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['data'][1]); if (isset($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['data'][2])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setCredit($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['data'][2]); if (isset($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['data'][0])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSmsid($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['data'][0]); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSender($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['admin_id'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setAdminId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['admin_id'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setUnicode($this->getUnicode()); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customer_id'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setCustomerId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customer_id'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setRecipient($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setUnicode($this->getUnicode()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setType($this->getType()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSubject($this->getSubject()); if ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 1 || $ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 11) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::SENT); } elseif ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 111) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::SCHEDULED); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('SMS will be send later - ').Mage::helper('core')->formatDate(date('Y-m-d H:i:s', $this->getSendlater()), 'medium', true)); } elseif ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 9) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('wrong number or unavailable')); } elseif ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 15) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('unauthorized senderID in confirmation sms')); } elseif ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 10) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('low credit for sending sms')); } elseif ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 22) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('unicode is not supported')); } elseif ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 23) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('message duplicity')); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::DUPLICATE); } elseif ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['error'])); } elseif ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 4) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('')); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customerID'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setCustomerId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customerID'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setRecipient($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$ibcdf76f8c9ddc330c79f805116a8bb146c43749d670253c23c6fcba76bc4256a88fdd8fbc1041039]); } else { continue; } $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->save(); } $this->v3a95f9a85ae3fecc89b69aa9ea2d057ac2807b0b = false; if ($i5ee2fa256ff77dd811a9c1911f7563263a694e4b->getStatus() == self::SENT) Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('SMS was sent.')); elseif ($i5ee2fa256ff77dd811a9c1911f7563263a694e4b->getStatus() == self::SCHEDULED) Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('SMS was saved.')); else { Mage::getSingleton('adminhtml/session')->addError($i5ee2fa256ff77dd811a9c1911f7563263a694e4b->getNote()); $this->v3a95f9a85ae3fecc89b69aa9ea2d057ac2807b0b = true; } } } } catch (Exception $i8c174347956f0a76258a09557543e84f88beb4a0) { Mage::getSingleton('adminhtml/session')->addError($i8c174347956f0a76258a09557543e84f88beb4a0->getMessage()); } } public function setRecipient($ia61712c27ea241bd7a543dc2b02ea572274d0322) { if (is_string($ia61712c27ea241bd7a543dc2b02ea572274d0322)) { $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setNumber($ia61712c27ea241bd7a543dc2b02ea572274d0322); $this->getRecipient()->addItem($ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6); } elseif (is_array($ia61712c27ea241bd7a543dc2b02ea572274d0322)) { foreach ($ia61712c27ea241bd7a543dc2b02ea572274d0322 as $ibcdf76f8c9ddc330c79f805116a8bb146c43749debe3a16a01f87f9a4ebbb9731163db3e3e64cc3d) { if (!trim($ibcdf76f8c9ddc330c79f805116a8bb146c43749debe3a16a01f87f9a4ebbb9731163db3e3e64cc3d)) continue; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setNumber(trim($ibcdf76f8c9ddc330c79f805116a8bb146c43749debe3a16a01f87f9a4ebbb9731163db3e3e64cc3d)); $this->getRecipient()->addItem($ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6); } } return $this; } public function addRecipient($ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f, $ia61712c27ea241bd7a543dc2b02ea572274d0322 = array()) { $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setNumber($ibcdf76f8c9ddc330c79f805116a8bb146c43749d39404799a9171a012cb8b15cd8f27b347aa44a5f); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['country'])) $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setCountry($ia61712c27ea241bd7a543dc2b02ea572274d0322['country']); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['customerId'])) $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setCustomerId($ia61712c27ea241bd7a543dc2b02ea572274d0322['customerId']); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['adminId'])) $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setAdminId($ia61712c27ea241bd7a543dc2b02ea572274d0322['adminId']); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['recipient'])) $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setRecipient($ia61712c27ea241bd7a543dc2b02ea572274d0322['recipient']); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['text'])) $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setText($ia61712c27ea241bd7a543dc2b02ea572274d0322['text']); $this->getRecipient()->addItem($ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6); return $this; } public function isError() { return $this->v3a95f9a85ae3fecc89b69aa9ea2d057ac2807b0b ? true : false; } public function status($ibcdf76f8c9ddc330c79f805116a8bb146c43749d7e9551ab4470830f87be4f9ff5edc75013bc9257 = false) { $i2e68560d8e15e3c18bb400939778a6bf1ae47190 = array(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::SENT); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_sent.png'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('SENT to recipient')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::ERROR); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_canceled.gif'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('ERROR')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::DELIVERED); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_accepted.gif'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('DELIVERED to recipient')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::UNAVAILABLE); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_buffered.png'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('RECIPIENT UNAVAILABLE')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::SIMULATION); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_simulation.png'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('SIMULATION')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::SCHEDULED); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_scheduled.png'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('SCHEDULED')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::DELETED); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_deleted.png'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('DELETED')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::DND); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_donotdisturb.png'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('DO NOT DISTURB registry (DND)')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::DUPLICATE); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_duplicate.png'); $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('DUPLICATE')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $ibcdf76f8c9ddc330c79f805116a8bb146c43749df66cdb02406b60b7d525f1fed0b5904ce5586ee6; if ($ibcdf76f8c9ddc330c79f805116a8bb146c43749d7e9551ab4470830f87be4f9ff5edc75013bc9257 === false) return $i2e68560d8e15e3c18bb400939778a6bf1ae47190; elseif (isset($i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749d7e9551ab4470830f87be4f9ff5edc75013bc9257])) return $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$ibcdf76f8c9ddc330c79f805116a8bb146c43749d7e9551ab4470830f87be4f9ff5edc75013bc9257]; return false; } } 