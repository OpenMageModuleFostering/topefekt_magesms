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
class Topefekt_Magesms_Model_Sms extends Varien_Object { const SENT = 1; const ERROR = 2; const DELIVERED = 3; const UNAVAILABLE = 4; const SIMULATION = 5; const SCHEDULED = 6; const DELETED = 7; const DND = 8; const DUPLICATE = 9; protected $_routes_type = array( 1 => 'admin', 2 => 'customer', 3 => 'customer', 4 => 'customer'); public function _construct() { $this->setData(array( 'recipient' => new Varien_Data_Collection(), 'message' => '', 'subject' => '', 'unicode' => false, 'sendlater' => false, 'type' => 4, 'priority' => true, 'unique' => false, 'adminId' => 0, 'customerId' => 0, 'recipientName' => '', 'storeId' => null )); parent::_construct(); } public function send() { $i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18 = Mage::getSingleton('magesms/smsprofile'); try { $ibdd27a8dd714410289189d318feb96fe6ed8e07f = array(); if (!strlen($this->getMessage())) { $ibdd27a8dd714410289189d318feb96fe6ed8e07f[] = Mage::helper('magesms')->__('Fill in SMS text.'); } if (is_array($ibdd27a8dd714410289189d318feb96fe6ed8e07f) && sizeof($ibdd27a8dd714410289189d318feb96fe6ed8e07f)) Mage::throwException($ibdd27a8dd714410289189d318feb96fe6ed8e07f[0]); if ($this->getSendlater()) { $i8284e7e828b5452004207db69edd7aa7ff0703ab = Mage::getModel('core/date')->gmtTimestamp(); if ($i8284e7e828b5452004207db69edd7aa7ff0703ab >= $this->getSendlater()) $ibdd27a8dd714410289189d318feb96fe6ed8e07f[] = Mage::helper('magesms')->__('Wrong time of SMS sending.'); } if (is_array($ibdd27a8dd714410289189d318feb96fe6ed8e07f) && sizeof($ibdd27a8dd714410289189d318feb96fe6ed8e07f)) Mage::throwException($ibdd27a8dd714410289189d318feb96fe6ed8e07f[0]); if (!count($this->getRecipient())) $ibdd27a8dd714410289189d318feb96fe6ed8e07f[] = Mage::helper('magesms')->__('Recipients found: 0'); if (is_array($ibdd27a8dd714410289189d318feb96fe6ed8e07f) && sizeof($ibdd27a8dd714410289189d318feb96fe6ed8e07f)) Mage::throwException($ibdd27a8dd714410289189d318feb96fe6ed8e07f[0]); $icd14fe4ea296b55b8ecbf19d2fd7bfef3a511519 = html_entity_decode($this->getMessage(), ENT_QUOTES, 'UTF-8'); $if295547318143e26fc7026b92d58e3d1eec229db = Mage::helper('magesms')->countSms($icd14fe4ea296b55b8ecbf19d2fd7bfef3a511519, $this->getUnicode()); if (!$i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->simulatesms && count($this->getRecipient())*$if295547318143e26fc7026b92d58e3d1eec229db*0.05 > $i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->credit) $ibdd27a8dd714410289189d318feb96fe6ed8e07f[] = Mage::helper('magesms')->__('You do not have enough credit to send SMS to all ') .count($this->getRecipient()).Mage::helper('magesms')->__(' recipients.'); if (is_array($ibdd27a8dd714410289189d318feb96fe6ed8e07f) && sizeof($ibdd27a8dd714410289189d318feb96fe6ed8e07f)) Mage::throwException($ibdd27a8dd714410289189d318feb96fe6ed8e07f[0]); $i854b57231c05dbaa7f22331dbaed4152a402d2f1 = new Zend_Locale_Data(); $i065c883e3f45e58104d21f8196ee3fe9bd2f513d = $i854b57231c05dbaa7f22331dbaed4152a402d2f1->getList('en-EN', 'phonetoterritory'); $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2 = array('number'=>array(), 'isms'=>array(), 'sendertype'=>array(), 'senderID'=>array(), 'admin_id'=>array(), 'customer_id'=>array()); foreach($this->getRecipient() as $i90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802) { $i39404799a9171a012cb8b15cd8f27b347aa44a5f = $i90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getNumber(); $i037b855bc01175f2c77d5c3e19eda9a0003feff4 = $i90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getCountry() ? $i90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getCountry() : ''; $if0177bfe4bf22cfbb3da2ac06eca557829f0a4cd = ''; if ($i037b855bc01175f2c77d5c3e19eda9a0003feff4 && $i065c883e3f45e58104d21f8196ee3fe9bd2f513d[$i037b855bc01175f2c77d5c3e19eda9a0003feff4] && !(strpos($i39404799a9171a012cb8b15cd8f27b347aa44a5f, '+') === 0 || strpos($i39404799a9171a012cb8b15cd8f27b347aa44a5f, '00') === 0)) { if (strpos($i39404799a9171a012cb8b15cd8f27b347aa44a5f, '0') === 0) $i39404799a9171a012cb8b15cd8f27b347aa44a5f = substr($i39404799a9171a012cb8b15cd8f27b347aa44a5f, 1); $if0177bfe4bf22cfbb3da2ac06eca557829f0a4cd = $i065c883e3f45e58104d21f8196ee3fe9bd2f513d[$i037b855bc01175f2c77d5c3e19eda9a0003feff4]; $i39404799a9171a012cb8b15cd8f27b347aa44a5f = $if0177bfe4bf22cfbb3da2ac06eca557829f0a4cd.$i39404799a9171a012cb8b15cd8f27b347aa44a5f; } $i813c950729f632ca03f8c203c0a769de5e8bdf29 = Mage::helper('magesms')->prepareNumber($i39404799a9171a012cb8b15cd8f27b347aa44a5f, $this->_routes_type[$this->getType()], $if0177bfe4bf22cfbb3da2ac06eca557829f0a4cd, $this->getStoreId()); if(is_array($i813c950729f632ca03f8c203c0a769de5e8bdf29)) { if ($this->getUnique()) { if (in_array($i813c950729f632ca03f8c203c0a769de5e8bdf29['mobile'], $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'])) continue; } $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'][] = $i813c950729f632ca03f8c203c0a769de5e8bdf29['mobile']; $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['isms'][] = $i813c950729f632ca03f8c203c0a769de5e8bdf29['isms']; $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['sendertype'][] = $i813c950729f632ca03f8c203c0a769de5e8bdf29['sendertype']; $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][] = $i813c950729f632ca03f8c203c0a769de5e8bdf29['senderID']; $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['admin_id'][] = $i90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getAdminId(); $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customer_id'][] = $i90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getCustomerId(); $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][] = $i90bf5ab4e4ec7f89dc69f079d1a10e0bfa14c802->getRecipient(); } } if ($i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->simulatesms) { foreach($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'] as $i670253c23c6fcba76bc4256a88fdd8fbc1041039 => $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b = Mage::getModel('magesms/smshistory'); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNumber('+'.$if2eee0665f163a28f4adcfe84e3fc666bf1bcd89); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setDate(date('Y-m-d H:i:s')); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setText($icd14fe4ea296b55b8ecbf19d2fd7bfef3a511519); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::SIMULATION); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSender($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setUnicode($this->getUnicode()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setType($this->getType()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('SMS SIMULATION (Sending of SMS was simulated. Recipient will not receive SMS)')); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSmsid('simulate'.md5(microtime())); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setTotal($if295547318143e26fc7026b92d58e3d1eec229db); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSubject($this->getSubject()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setAdminId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['admin_id'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setCustomerId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customer_id'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setRecipient($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->save(); } if (count($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'])) Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('SMS was sent (simulation).')); } else { $ia61712c27ea241bd7a543dc2b02ea572274d0322 = 'username='.$i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->user.'&password='.$i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->passwd .'&unicode='.($this->getUnicode() ? 1 : 0).'&data='.$icd14fe4ea296b55b8ecbf19d2fd7bfef3a511519; if ($this->getPriority()) $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&action=sendsms&number='.$if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'][0] .'&isms='.$if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['isms'][0].'&sender='.$if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][0]; else $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&action=sendsmsall&number='.implode(';', $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number']) .'&isms='.implode(';', $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['isms']).'&sender='.implode(';', $if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID']); if ($this->getSendlater()) $ia61712c27ea241bd7a543dc2b02ea572274d0322 .= '&datelater='.$this->getSendlater(); $i55dd4e7042a1f9031b84f07f04c37165ce3d0720 = Mage::getModel('magesms/api')->serverPost($ia61712c27ea241bd7a543dc2b02ea572274d0322, false); if (!empty($i55dd4e7042a1f9031b84f07f04c37165ce3d0720)) { if (strpos($i55dd4e7042a1f9031b84f07f04c37165ce3d0720, 'QQQ___QQQ') !== false) $id18c7e5bc71d5242a8b8cc24d43559e5dccbddb5 = explode("QQQ___QQQ", $i55dd4e7042a1f9031b84f07f04c37165ce3d0720); else $id18c7e5bc71d5242a8b8cc24d43559e5dccbddb5 = array($i55dd4e7042a1f9031b84f07f04c37165ce3d0720); foreach($id18c7e5bc71d5242a8b8cc24d43559e5dccbddb5 as $i670253c23c6fcba76bc4256a88fdd8fbc1041039 => $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { $i17c20960d197486b19dc890665362a4f2fd6f24a = Mage::getModel('magesms/api')->parser($if2eee0665f163a28f4adcfe84e3fc666bf1bcd89, '__'); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b = Mage::getModel('magesms/smshistory'); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNumber('+'.$if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['number'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setDate(date('Y-m-d H:i:s')); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setText($icd14fe4ea296b55b8ecbf19d2fd7bfef3a511519); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::ERROR); if (isset($i17c20960d197486b19dc890665362a4f2fd6f24a['data'][1])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setPrice($i17c20960d197486b19dc890665362a4f2fd6f24a['data'][1]); if (isset($i17c20960d197486b19dc890665362a4f2fd6f24a['data'][2])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setCredit($i17c20960d197486b19dc890665362a4f2fd6f24a['data'][2]); if (isset($i17c20960d197486b19dc890665362a4f2fd6f24a['data'][0])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSmsid($i17c20960d197486b19dc890665362a4f2fd6f24a['data'][0]); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSender($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['senderID'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['admin_id'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setAdminId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['admin_id'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setUnicode($this->getUnicode()); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customer_id'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setCustomerId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customer_id'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setRecipient($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setUnicode($this->getUnicode()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setType($this->getType()); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setTotal($if295547318143e26fc7026b92d58e3d1eec229db); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setSubject($this->getSubject()); if ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 1 || $i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 11) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::SENT); } elseif ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 111) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::SCHEDULED); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('SMS will be send later - ').Mage::helper('core')->formatDate(date('Y-m-d H:i:s', $this->getSendlater()), 'medium', true)); } elseif ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $i17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 9) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('wrong number or unavailable')); } elseif ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $i17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 15) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('unauthorized senderID in confirmation sms')); } elseif ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $i17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 10) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('low credit for sending sms')); } elseif ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $i17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 22) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('unicode is not supported')); } elseif ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3 && $i17c20960d197486b19dc890665362a4f2fd6f24a['datasrc'] == 23) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('message duplicity')); $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setStatus(self::DUPLICATE); } elseif ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 3) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__($i17c20960d197486b19dc890665362a4f2fd6f24a['error'])); } elseif ($i17c20960d197486b19dc890665362a4f2fd6f24a['errno'] == 4) { $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setNote(Mage::helper('magesms')->__('')); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customerID'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setCustomerId($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['customerID'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); if (isset($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039])) $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->setRecipient($if85a12d6e5fb576dbfd0203ae61d13b94a9fadd2['recipient'][$i670253c23c6fcba76bc4256a88fdd8fbc1041039]); } else { continue; } $i5ee2fa256ff77dd811a9c1911f7563263a694e4b->save(); } if ($i5ee2fa256ff77dd811a9c1911f7563263a694e4b->getStatus() == self::SENT) Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('SMS was sent.')); elseif ($i5ee2fa256ff77dd811a9c1911f7563263a694e4b->getStatus() == self::SCHEDULED) Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magesms')->__('SMS was saved.')); else Mage::getSingleton('adminhtml/session')->addError($i5ee2fa256ff77dd811a9c1911f7563263a694e4b->getNote()); } } } catch (Exception $i8c174347956f0a76258a09557543e84f88beb4a0) { Mage::getSingleton('adminhtml/session')->addError($i8c174347956f0a76258a09557543e84f88beb4a0->getMessage()); } } public function setRecipient($ia61712c27ea241bd7a543dc2b02ea572274d0322) { if (is_string($ia61712c27ea241bd7a543dc2b02ea572274d0322)) { $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setNumber($ia61712c27ea241bd7a543dc2b02ea572274d0322); $this->getRecipient()->addItem($if66cdb02406b60b7d525f1fed0b5904ce5586ee6); } elseif (is_array($ia61712c27ea241bd7a543dc2b02ea572274d0322)) { foreach ($ia61712c27ea241bd7a543dc2b02ea572274d0322 as $iebe3a16a01f87f9a4ebbb9731163db3e3e64cc3d) { if (!trim($iebe3a16a01f87f9a4ebbb9731163db3e3e64cc3d)) continue; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setNumber(trim($iebe3a16a01f87f9a4ebbb9731163db3e3e64cc3d)); $this->getRecipient()->addItem($if66cdb02406b60b7d525f1fed0b5904ce5586ee6); } } return $this; } public function addRecipient($i39404799a9171a012cb8b15cd8f27b347aa44a5f, $ia61712c27ea241bd7a543dc2b02ea572274d0322 = array()) { $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setNumber($i39404799a9171a012cb8b15cd8f27b347aa44a5f); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['country'])) $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setCountry($ia61712c27ea241bd7a543dc2b02ea572274d0322['country']); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['customerId'])) $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setCustomerId($ia61712c27ea241bd7a543dc2b02ea572274d0322['customerId']); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['adminId'])) $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setAdminId($ia61712c27ea241bd7a543dc2b02ea572274d0322['adminId']); if (isset($ia61712c27ea241bd7a543dc2b02ea572274d0322['recipient'])) $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setRecipient($ia61712c27ea241bd7a543dc2b02ea572274d0322['recipient']); $this->getRecipient()->addItem($if66cdb02406b60b7d525f1fed0b5904ce5586ee6); return $this; } public function status($i7e9551ab4470830f87be4f9ff5edc75013bc9257 = false) { $i2e68560d8e15e3c18bb400939778a6bf1ae47190 = array(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::SENT); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_sent.png'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('SENT to recipient')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::ERROR); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_canceled.gif'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('ERROR')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::DELIVERED); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_accepted.gif'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('DELIVERED to recipient')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::UNAVAILABLE); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_buffered.png'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('RECIPIENT UNAVAILABLE')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::SIMULATION); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_simulation.png'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('SIMULATION')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::SCHEDULED); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_scheduled.png'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('SCHEDULED')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::DELETED); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_deleted.png'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('DELETED')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::DND); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_donotdisturb.png'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('DO NOT DISTURB registry (DND)')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; $if66cdb02406b60b7d525f1fed0b5904ce5586ee6 = new Varien_Object(); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setStatus(self::DUPLICATE); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setIcon('i_duplicate.png'); $if66cdb02406b60b7d525f1fed0b5904ce5586ee6->setName(Mage::helper('magesms')->__('DUPLICATE')); $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$if66cdb02406b60b7d525f1fed0b5904ce5586ee6->status] = $if66cdb02406b60b7d525f1fed0b5904ce5586ee6; if ($i7e9551ab4470830f87be4f9ff5edc75013bc9257 === false) return $i2e68560d8e15e3c18bb400939778a6bf1ae47190; elseif (isset($i2e68560d8e15e3c18bb400939778a6bf1ae47190[$i7e9551ab4470830f87be4f9ff5edc75013bc9257])) return $i2e68560d8e15e3c18bb400939778a6bf1ae47190[$i7e9551ab4470830f87be4f9ff5edc75013bc9257]; return false; } } 