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
 class Topefekt_Magesms_Model_Hooks extends Mage_Core_Model_Abstract { public static $groups = array( 'order_status' => 0, 'order' => 1, 'account' => 2, 'product' => 3, 'contactform' => 4 ); protected function _construct() { $this->_init('magesms/hooks'); } public function send($i41496536c6b29c24b90c374d9fc25143f114dc9a, $i5e65dd16263683749d16a84171f719e768ed14b5) { $i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18 = Mage::getSingleton('magesms/smsprofile'); if ($i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->user) { $i589c2cccd18de711ec5e779b98b9f98d0347a925 = Mage::app()->getStore()->getGroupId(); if (!$i589c2cccd18de711ec5e779b98b9f98d0347a925 && $i5e65dd16263683749d16a84171f719e768ed14b5->hasStoreId()) { $i589c2cccd18de711ec5e779b98b9f98d0347a925 = Mage::getModel('core/store')->load($i5e65dd16263683749d16a84171f719e768ed14b5->getStoreId())->getGroupId(); } if ($i5e65dd16263683749d16a84171f719e768ed14b5->getStore()) $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66 = $i5e65dd16263683749d16a84171f719e768ed14b5->getStore()->getId(); elseif (Mage::app()->getStore()) $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66 = Mage::app()->getStore()->getStoreId(); else $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66 = null; if (Mage::registry('magesms_store_id')) Mage::unregister('magesms_store_id'); Mage::register('magesms_store_id', $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66, true); $ib8622dd6b5bb413f7d6f85eb31e2abce529ae0a8 = Mage::getSingleton('magesms/hooks_admins')->getCollection(); if ($i589c2cccd18de711ec5e779b98b9f98d0347a925 || !Mage::getSingleton('admin/session')->isLoggedIn()) { $ib8622dd6b5bb413f7d6f85eb31e2abce529ae0a8->addFieldToFilter('store_group_id', $i589c2cccd18de711ec5e779b98b9f98d0347a925); } else { $ib8622dd6b5bb413f7d6f85eb31e2abce529ae0a8->getSelect()->group('admin_id'); } if ($i41496536c6b29c24b90c374d9fc25143f114dc9a == 'updateOrderStatus') $ib8622dd6b5bb413f7d6f85eb31e2abce529ae0a8->addFieldToFilter('name', 'orderStatus'.ucfirst($i5e65dd16263683749d16a84171f719e768ed14b5->getStatus())); else $ib8622dd6b5bb413f7d6f85eb31e2abce529ae0a8->addFieldToFilter('name', $i41496536c6b29c24b90c374d9fc25143f114dc9a); if ($ib8622dd6b5bb413f7d6f85eb31e2abce529ae0a8->count()) { $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd = Mage::getSingleton('magesms/hooks_unicode')->getCollection() ->addFieldToFilter('type', 'admin')->getFirstItem(); foreach($ib8622dd6b5bb413f7d6f85eb31e2abce529ae0a8 as $i3d68c0cf53594c3449a7debf01d1c337a93fc4ae) { $i2977ace3ff82db806c1e7c92dd6811f3d76f0e87 = Mage::getModel('magesms/admins')->load($i3d68c0cf53594c3449a7debf01d1c337a93fc4ae->getAdminId()); if (!$i2977ace3ff82db806c1e7c92dd6811f3d76f0e87) continue; $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f = Mage::getModel('magesms/sms'); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->addRecipient($i2977ace3ff82db806c1e7c92dd6811f3d76f0e87->getNumber(), array('recipient' => $i2977ace3ff82db806c1e7c92dd6811f3d76f0e87->getName(), 'adminId' => $i2977ace3ff82db806c1e7c92dd6811f3d76f0e87->getId())) ->setMessage($this->prepareText($i3d68c0cf53594c3449a7debf01d1c337a93fc4ae->getSmstext(), $i41496536c6b29c24b90c374d9fc25143f114dc9a, $i5e65dd16263683749d16a84171f719e768ed14b5)) ->setSubject($i41496536c6b29c24b90c374d9fc25143f114dc9a) ->setType(Topefekt_Magesms_Model_Sms::TYPE_ADMIN) ->setPriority(true) ->setUnicode($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->getUnicode()) ->setStoreId($i3bf172bc34c83f4a18624b192bc0bd7c4d647a66); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setHookName($i41496536c6b29c24b90c374d9fc25143f114dc9a); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->send(); } } $i71e09ed37bc7273d250df9932c1693668e879cdd = Mage::getSingleton('magesms/hooks_customers')->getCollection() ->addFieldToFilter('active', 1); if ($i41496536c6b29c24b90c374d9fc25143f114dc9a == 'updateOrderStatus') $i71e09ed37bc7273d250df9932c1693668e879cdd->addFieldToFilter('name', 'orderStatus'.ucfirst($i5e65dd16263683749d16a84171f719e768ed14b5->getStatus())); else $i71e09ed37bc7273d250df9932c1693668e879cdd->addFieldToFilter('name', $i41496536c6b29c24b90c374d9fc25143f114dc9a); if ($i71e09ed37bc7273d250df9932c1693668e879cdd->count()) { $if2014d170e15e7f6f64523fd3238720980ceb64a = Mage::getSingleton('magesms/hooks_unicode')->getCollection() ->addFieldToFilter('type', 'customer'); if ($i5e65dd16263683749d16a84171f719e768ed14b5 instanceof Mage_Sales_Model_Order) { $ic010a5d08128ec6abcd0a1a16cb1d8abe7bf2142 = Mage::getConfig()->getNode('default/config/optout')->sku; $ib8129b89cda7dae2cfe1b114353de8ba2385974e = Mage::getModel('catalog/product')->setStoreId($i3bf172bc34c83f4a18624b192bc0bd7c4d647a66)->loadByAttribute('sku', $ic010a5d08128ec6abcd0a1a16cb1d8abe7bf2142); if ($ib8129b89cda7dae2cfe1b114353de8ba2385974e && $ib8129b89cda7dae2cfe1b114353de8ba2385974e->getStatus() == Mage_Catalog_Model_Product_Status::STATUS_ENABLED) { $i32ce098f2dde8081cf3c4de31f52b408a6ad48be = $i5e65dd16263683749d16a84171f719e768ed14b5->getItemsCollection(); $ibfceba0b027e7caa5ff39764963a80a73f4cdfeb = false; foreach($i32ce098f2dde8081cf3c4de31f52b408a6ad48be as $i69a1201e93806d55c970dfb18feec53d221ba37b) { if ($i69a1201e93806d55c970dfb18feec53d221ba37b->getSku() == $ic010a5d08128ec6abcd0a1a16cb1d8abe7bf2142) { $ibfceba0b027e7caa5ff39764963a80a73f4cdfeb = true; break; } } if (!$ibfceba0b027e7caa5ff39764963a80a73f4cdfeb) return $this; } if ($i6abff7c4dab2aa28578ae1dc49699ba6b1d18c18->user->getPrefbilling()) { $i1f1945594819c4321de45ac15ed6d4dc07f41e2f = $i5e65dd16263683749d16a84171f719e768ed14b5->getShippingAddress()->getTelephone(); $idcde4f5fb5532c8e634fa3aa4c7ce182a046d76b = $i5e65dd16263683749d16a84171f719e768ed14b5->getShippingAddress()->getCountryId(); if (!$i1f1945594819c4321de45ac15ed6d4dc07f41e2f) { $i1f1945594819c4321de45ac15ed6d4dc07f41e2f = $i5e65dd16263683749d16a84171f719e768ed14b5->getBillingAddress()->getTelephone(); $idcde4f5fb5532c8e634fa3aa4c7ce182a046d76b = $i5e65dd16263683749d16a84171f719e768ed14b5->getBillingAddress()->getCountryId(); } } else { $i1f1945594819c4321de45ac15ed6d4dc07f41e2f = $i5e65dd16263683749d16a84171f719e768ed14b5->getBillingAddress()->getTelephone(); $idcde4f5fb5532c8e634fa3aa4c7ce182a046d76b = $i5e65dd16263683749d16a84171f719e768ed14b5->getBillingAddress()->getCountryId(); if (!$i1f1945594819c4321de45ac15ed6d4dc07f41e2f) { $i1f1945594819c4321de45ac15ed6d4dc07f41e2f = $i5e65dd16263683749d16a84171f719e768ed14b5->getShippingAddress()->getTelephone(); $idcde4f5fb5532c8e634fa3aa4c7ce182a046d76b = $i5e65dd16263683749d16a84171f719e768ed14b5->getShippingAddress()->getCountryId(); } } $ifb2b31a17a2f13d19aebc5823ae02f42988a78f2 = $i5e65dd16263683749d16a84171f719e768ed14b5->getCustomerId(); if (!$ifb2b31a17a2f13d19aebc5823ae02f42988a78f2) $ifb2b31a17a2f13d19aebc5823ae02f42988a78f2 = 0; $i489c048e0604d314330360b5ee23b42f486ebb98 = $i5e65dd16263683749d16a84171f719e768ed14b5->getCustomerName(); } else { $i1f1945594819c4321de45ac15ed6d4dc07f41e2f = ''; $ifb2b31a17a2f13d19aebc5823ae02f42988a78f2 = $i5e65dd16263683749d16a84171f719e768ed14b5->getId(); } if (!$i1f1945594819c4321de45ac15ed6d4dc07f41e2f) { $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a = Mage::app()->getRequest()->getParams(); foreach(array('mobilenumber', 'mobile_number', 'phone', 'phone_number', 'telephone', 'mobile') as $i670253c23c6fcba76bc4256a88fdd8fbc1041039) { if (!empty($ia8a35a47a8e61218e15d1a33dac64bdc2449c01a[$i670253c23c6fcba76bc4256a88fdd8fbc1041039])) { $i1f1945594819c4321de45ac15ed6d4dc07f41e2f = $ia8a35a47a8e61218e15d1a33dac64bdc2449c01a[$i670253c23c6fcba76bc4256a88fdd8fbc1041039]; $idcde4f5fb5532c8e634fa3aa4c7ce182a046d76b = Mage::getStoreConfig('general/country/default', $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66);; break; } } } if ($i1f1945594819c4321de45ac15ed6d4dc07f41e2f && is_numeric($ifb2b31a17a2f13d19aebc5823ae02f42988a78f2)) { if ($idcde4f5fb5532c8e634fa3aa4c7ce182a046d76b) { $i854b57231c05dbaa7f22331dbaed4152a402d2f1 = new Zend_Locale_Data(); $i065c883e3f45e58104d21f8196ee3fe9bd2f513d = $i854b57231c05dbaa7f22331dbaed4152a402d2f1->getList('en-EN', 'phonetoterritory'); $i7492a7ab99a6ff1e0ae253366480ecb40a550224 = $i065c883e3f45e58104d21f8196ee3fe9bd2f513d[$idcde4f5fb5532c8e634fa3aa4c7ce182a046d76b]; } else { $i7492a7ab99a6ff1e0ae253366480ecb40a550224 = ''; } $i6d6da9eb4bc3bca1db3f4eb2b907f496d625d20f = ''; foreach($i71e09ed37bc7273d250df9932c1693668e879cdd as $ifede0aa7d9c3f77f8ca4eb9c1002d82f3a770ae7) { if ($ifede0aa7d9c3f77f8ca4eb9c1002d82f3a770ae7->getMutation() == $i7492a7ab99a6ff1e0ae253366480ecb40a550224) { $i6d6da9eb4bc3bca1db3f4eb2b907f496d625d20f = $ifede0aa7d9c3f77f8ca4eb9c1002d82f3a770ae7->getSmstext(); break; } elseif ($ifede0aa7d9c3f77f8ca4eb9c1002d82f3a770ae7->getMutation() == 'default') $i6d6da9eb4bc3bca1db3f4eb2b907f496d625d20f = $ifede0aa7d9c3f77f8ca4eb9c1002d82f3a770ae7->getSmstext(); } if ($i6d6da9eb4bc3bca1db3f4eb2b907f496d625d20f) { $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f = Mage::getModel('magesms/sms'); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->addRecipient($i1f1945594819c4321de45ac15ed6d4dc07f41e2f, array('recipient' => $i489c048e0604d314330360b5ee23b42f486ebb98, 'customerId' => $ifb2b31a17a2f13d19aebc5823ae02f42988a78f2, 'country' => $idcde4f5fb5532c8e634fa3aa4c7ce182a046d76b)) ->setMessage($this->prepareText($i6d6da9eb4bc3bca1db3f4eb2b907f496d625d20f, $i41496536c6b29c24b90c374d9fc25143f114dc9a, $i5e65dd16263683749d16a84171f719e768ed14b5)) ->setSubject($i41496536c6b29c24b90c374d9fc25143f114dc9a) ->setType(Topefekt_Magesms_Model_Sms::TYPE_CUSTOMER) ->setPriority(true) ->setStoreId($i3bf172bc34c83f4a18624b192bc0bd7c4d647a66); foreach($if2014d170e15e7f6f64523fd3238720980ceb64a as $ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd) { if ($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->getArea() == $i7492a7ab99a6ff1e0ae253366480ecb40a550224) { $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setUnicode($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->getUnicode()); break; } elseif ($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->getArea() == 'default') $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setUnicode($ie8d90f6313614fbb6564426c0b0cb59a0ca4cecd->getUnicode()); } $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->setHookName($i41496536c6b29c24b90c374d9fc25143f114dc9a); $i2012325f8714e1168a6c4fd06b9fa8eee23fcc7f->send(); } } } } return $this; } public function prepareText($idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa, $i41496536c6b29c24b90c374d9fc25143f114dc9a, $i5e65dd16263683749d16a84171f719e768ed14b5) { if (preg_match_all('/{(.*?)}/', $idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa, $ia00c63b7b8f0d76f361b9bd281e5073cc0d0aa3e)) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b = array(); foreach($ia00c63b7b8f0d76f361b9bd281e5073cc0d0aa3e[1] as $iebd691e534c6cf2e84cf8a88790a5271154fca05) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b[$iebd691e534c6cf2e84cf8a88790a5271154fca05] = '{'.$iebd691e534c6cf2e84cf8a88790a5271154fca05.'}'; } if ($i5e65dd16263683749d16a84171f719e768ed14b5->getStore()) $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66 = $i5e65dd16263683749d16a84171f719e768ed14b5->getStore()->getId(); elseif (Mage::app()->getStore()) $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66 = Mage::app()->getStore()->getStoreId(); else $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66 = null; if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_domain'])) { $ic157485eecbe64d400493d7b9e7f434b83aca5d0 = parse_url(Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB)); $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_domain'] = $ic157485eecbe64d400493d7b9e7f434b83aca5d0['host'].($ic157485eecbe64d400493d7b9e7f434b83aca5d0['path'] != '/' ? $ic157485eecbe64d400493d7b9e7f434b83aca5d0['path'] : ''); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_name'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_name'] = Mage::getStoreConfig('general/store_information/name', $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_name2'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_name2'] = Mage::app()->getStore()->getName(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_email'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_email'] = Mage::getStoreConfig('trans_email/ident_general/email', $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_phone'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['shop_phone'] = Mage::getStoreConfig('general/store_information/phone', $i3bf172bc34c83f4a18624b192bc0bd7c4d647a66); } if ($i41496536c6b29c24b90c374d9fc25143f114dc9a == 'contactForm') { $iacbd1c78463510856e506611fe14b5e1173581a6 = Mage::app()->getRequest(); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email'] = trim($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('email')); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_name'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_name'] = trim($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('name')); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_phone'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_phone'] = trim($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('telephone')); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_message'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_message'] = trim($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('comment')); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_message_short1'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_message_short1'] = Mage::helper('magesms')->substr(trim($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('comment')), 0, 120); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_message_short2'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_message_short2'] = Mage::helper('magesms')->substr(trim($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('comment')), 0, 100); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_message_short3'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_message_short3'] = Mage::helper('magesms')->substr(trim($iacbd1c78463510856e506611fe14b5e1173581a6->getPost('comment')), 0, 80); } } if ($i41496536c6b29c24b90c374d9fc25143f114dc9a == 'customerRegisterSuccess') { if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_id'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_id'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getId(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getEmail(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_password'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_password'] = Mage::app()->getRequest()->getParam('password'); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_firstname'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_firstname'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getFirstname(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_lastname'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_lastname'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getLastname(); } } if ($i41496536c6b29c24b90c374d9fc25143f114dc9a == 'newOrder' || $i41496536c6b29c24b90c374d9fc25143f114dc9a == 'updateOrderStatus' || $i41496536c6b29c24b90c374d9fc25143f114dc9a == 'updateOrderTrackingNumber') { if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_id'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_id'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getCustomerId(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getCustomerEmail(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_firstname'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_firstname'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getCustomerFirstname(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_lastname'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_lastname'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getCustomerLastname(); } if (!isset($i22b151d2a920ca46892d343096abbccfad9f3678)) $i22b151d2a920ca46892d343096abbccfad9f3678 = $i5e65dd16263683749d16a84171f719e768ed14b5->getShippingAddress(); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_company'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_company'] = $i22b151d2a920ca46892d343096abbccfad9f3678->getCompany(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_address'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_address'] = $i22b151d2a920ca46892d343096abbccfad9f3678->getStreet(1); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_postcode'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_postcode'] = $i22b151d2a920ca46892d343096abbccfad9f3678->getPostcode(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_city'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_city'] = $i22b151d2a920ca46892d343096abbccfad9f3678->getCity(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_country'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_country'] = $i22b151d2a920ca46892d343096abbccfad9f3678->getCountry(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_state'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_state'] = $i22b151d2a920ca46892d343096abbccfad9f3678->getRegion(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_phone'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_phone'] = $i22b151d2a920ca46892d343096abbccfad9f3678->getTelephone(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_vat_number'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_vat_number'] = $i22b151d2a920ca46892d343096abbccfad9f3678->getVatId(); } if (!isset($i560c12365c45b205daa0512840c70486783226b1)) $i560c12365c45b205daa0512840c70486783226b1 = $i5e65dd16263683749d16a84171f719e768ed14b5->getBillingAddress(); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_company'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_company'] = $i560c12365c45b205daa0512840c70486783226b1->getCompany(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_firstname'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_firstname'] = $i560c12365c45b205daa0512840c70486783226b1->getFirstname(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_lastname'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_lastname'] = $i560c12365c45b205daa0512840c70486783226b1->getLastname(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_address'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_address'] = $i560c12365c45b205daa0512840c70486783226b1->getStreet(1); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_postcode'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_postcode'] = $i560c12365c45b205daa0512840c70486783226b1->getPostcode(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_city'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_city'] = $i560c12365c45b205daa0512840c70486783226b1->getCity(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_country'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_country'] = $i560c12365c45b205daa0512840c70486783226b1->getCountry(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_state'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_state'] = $i560c12365c45b205daa0512840c70486783226b1->getRegion(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_phone'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_phone'] = $i560c12365c45b205daa0512840c70486783226b1->getTelephone(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_vat_number'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_invoice_vat_number'] = $i560c12365c45b205daa0512840c70486783226b1->getVatId(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_id'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_id'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getIncrementId(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_payment'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_payment'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getPayment()->getMethodInstance()->getTitle(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_payment_html'])) { $ic078737049591e1e2db7c285f3e3b95cb867c6d0 = Mage::helper('payment')->getInfoBlock($i5e65dd16263683749d16a84171f719e768ed14b5->getPayment()) ->setIsSecureMode(true); $ic078737049591e1e2db7c285f3e3b95cb867c6d0->getMethod()->setStore($i3bf172bc34c83f4a18624b192bc0bd7c4d647a66); $i42745015bca99637011d2ba8a559beb3a8b0961f = strip_tags($ic078737049591e1e2db7c285f3e3b95cb867c6d0->toHtml()); $i42745015bca99637011d2ba8a559beb3a8b0961f = preg_replace('/  +/', ' ', $i42745015bca99637011d2ba8a559beb3a8b0961f); $i42745015bca99637011d2ba8a559beb3a8b0961f = preg_replace("/ \n/", "\n", $i42745015bca99637011d2ba8a559beb3a8b0961f); $i42745015bca99637011d2ba8a559beb3a8b0961f = preg_replace("/\n /", "\n", $i42745015bca99637011d2ba8a559beb3a8b0961f); $i42745015bca99637011d2ba8a559beb3a8b0961f = preg_replace("/\n\n+/", "\n", $i42745015bca99637011d2ba8a559beb3a8b0961f); $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_payment_html'] = trim($i42745015bca99637011d2ba8a559beb3a8b0961f); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_total_paid'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_total_paid'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getGrandTotal(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_currency'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_currency'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getOrderCurrency()->getCurrencyCode(); } $this->f2b4066ec99f97011a4a9f20dd18d97b5a49b8b51($i0933475b5bd80561a9f50282fd9eb0b8345cec4b, $i5e65dd16263683749d16a84171f719e768ed14b5->getCreatedAt()); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['delivery_date'])) { $ifd002a4ef735f38a6030baa73fafafa1118ff492 = Mage::getModel('ecommerceteam_ddc/order'); if ($ifd002a4ef735f38a6030baa73fafafa1118ff492) { $i82d8f80a6f30d2bff1b6b037fd170117a61f4e69 = $ifd002a4ef735f38a6030baa73fafafa1118ff492->load($i5e65dd16263683749d16a84171f719e768ed14b5->getEntityId(), 'order_id')->getData(); if (isset($i82d8f80a6f30d2bff1b6b037fd170117a61f4e69['order_id'])) { if (strtotime($i82d8f80a6f30d2bff1b6b037fd170117a61f4e69['delivery_date'])) { $i5b8dea0c150539c8b78ffa4a4ee9b4ea0bf09414 = Mage::getSingleton('core/locale')->date($i82d8f80a6f30d2bff1b6b037fd170117a61f4e69['delivery_date'], Zend_Date::ISO_8601, null, false)->toString(Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_FULL)); $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['delivery_date'] = $i5b8dea0c150539c8b78ffa4a4ee9b4ea0bf09414; } } elseif ($i2d35534ee8eb5c1c7e742a61e000486ce24db667 = Mage::app()->getRequest()->getParam('delivery_date')) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['delivery_date'] = $i2d35534ee8eb5c1c7e742a61e000486ce24db667; } } } if ($i41496536c6b29c24b90c374d9fc25143f114dc9a == 'newOrder') { if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['cart_id'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['cart_id'] = Mage::getSingleton('checkout/session')->getQuoteId(); } $i32ce098f2dde8081cf3c4de31f52b408a6ad48be = $i5e65dd16263683749d16a84171f719e768ed14b5->getItemsCollection(); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder1'])) { $i813c950729f632ca03f8c203c0a769de5e8bdf29 = array(); foreach($i32ce098f2dde8081cf3c4de31f52b408a6ad48be as $i69a1201e93806d55c970dfb18feec53d221ba37b) { $i813c950729f632ca03f8c203c0a769de5e8bdf29[] = $i69a1201e93806d55c970dfb18feec53d221ba37b->getId().'/'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getName().'/'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getQtyOrdered(); } $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder1'] = implode('; ', $i813c950729f632ca03f8c203c0a769de5e8bdf29); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder2'])) { $i813c950729f632ca03f8c203c0a769de5e8bdf29 = array(); foreach($i32ce098f2dde8081cf3c4de31f52b408a6ad48be as $i69a1201e93806d55c970dfb18feec53d221ba37b) { $i813c950729f632ca03f8c203c0a769de5e8bdf29[] = 'id:'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getId().', ' .Mage::helper('magesms')->__('name').':'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getName().', ' .Mage::helper('magesms')->__('qty').':'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getQtyOrdered(); } $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder2'] = implode('; ', $i813c950729f632ca03f8c203c0a769de5e8bdf29); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder3'])) { $i813c950729f632ca03f8c203c0a769de5e8bdf29 = array(); foreach($i32ce098f2dde8081cf3c4de31f52b408a6ad48be as $i69a1201e93806d55c970dfb18feec53d221ba37b) { $i813c950729f632ca03f8c203c0a769de5e8bdf29[] = $i69a1201e93806d55c970dfb18feec53d221ba37b->getId().'/'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getQtyOrdered(); } $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder3'] = implode('; ', $i813c950729f632ca03f8c203c0a769de5e8bdf29); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder4'])) { $i813c950729f632ca03f8c203c0a769de5e8bdf29 = array(); foreach($i32ce098f2dde8081cf3c4de31f52b408a6ad48be as $i69a1201e93806d55c970dfb18feec53d221ba37b) { $i813c950729f632ca03f8c203c0a769de5e8bdf29[] = 'id:'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getId().', ' .Mage::helper('magesms')->__('qty').':'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getQtyOrdered(); } $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder4'] = implode('; ', $i813c950729f632ca03f8c203c0a769de5e8bdf29); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder5'])) { $i813c950729f632ca03f8c203c0a769de5e8bdf29 = array(); foreach($i32ce098f2dde8081cf3c4de31f52b408a6ad48be as $i69a1201e93806d55c970dfb18feec53d221ba37b) { $i813c950729f632ca03f8c203c0a769de5e8bdf29[] = $i69a1201e93806d55c970dfb18feec53d221ba37b->getId().'/'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getSku().'/'.$i69a1201e93806d55c970dfb18feec53d221ba37b->getQtyOrdered(); } $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['newOrder5'] = implode('; ', $i813c950729f632ca03f8c203c0a769de5e8bdf29); } } if ($i41496536c6b29c24b90c374d9fc25143f114dc9a == 'updateOrderStatus' || $i41496536c6b29c24b90c374d9fc25143f114dc9a == 'updateOrderTrackingNumber') { $i9805d668f75b6b461f88474f57c5f6aa86a87316 = $i5e65dd16263683749d16a84171f719e768ed14b5->getTracksCollection()->getLastItem(); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['carrier_name'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['carrier_name'] = $i9805d668f75b6b461f88474f57c5f6aa86a87316->getTitle(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_shipping_number'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_shipping_number'] = $i9805d668f75b6b461f88474f57c5f6aa86a87316->getTrackNumber(); } $i2977ace3ff82db806c1e7c92dd6811f3d76f0e87 = Mage::getSingleton('admin/session')->getUser(); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['employee_id'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['employee_id'] = $i2977ace3ff82db806c1e7c92dd6811f3d76f0e87->getId(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['employee_email'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['employee_email'] = $i2977ace3ff82db806c1e7c92dd6811f3d76f0e87->getEmail(); } } } if ($i41496536c6b29c24b90c374d9fc25143f114dc9a == 'productOutOfStock' || $i41496536c6b29c24b90c374d9fc25143f114dc9a == 'productLowStock') { if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_id'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_id'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getProductId(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_quantity'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_quantity'] = $i5e65dd16263683749d16a84171f719e768ed14b5->getQty(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_name']) || isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_ref'])) { $i69a1201e93806d55c970dfb18feec53d221ba37b = Mage::getModel('catalog/product'); $i69a1201e93806d55c970dfb18feec53d221ba37b->load($i5e65dd16263683749d16a84171f719e768ed14b5->getProductId()); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_name'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_name'] = $i69a1201e93806d55c970dfb18feec53d221ba37b->getName(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_ref'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['product_ref'] = $i69a1201e93806d55c970dfb18feec53d221ba37b->getSku(); } } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_id']) || isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email']) || isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_lastname']) || isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_firstname'])) { if ($i21e55df616c305955791876c1eb4da83448beba2 = Mage::getSingleton('customer/session')->getCustomer()) { if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_id'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_id'] = $i21e55df616c305955791876c1eb4da83448beba2->getId(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_email'] = $i21e55df616c305955791876c1eb4da83448beba2->getEmail(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_lastname'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_lastname'] = $i21e55df616c305955791876c1eb4da83448beba2->getLastname(); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_firstname'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['customer_firstname'] = $i21e55df616c305955791876c1eb4da83448beba2->getFirstname(); } } } } foreach($i0933475b5bd80561a9f50282fd9eb0b8345cec4b as $i670253c23c6fcba76bc4256a88fdd8fbc1041039=>$if2eee0665f163a28f4adcfe84e3fc666bf1bcd89) { $idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa = str_replace('{'.$i670253c23c6fcba76bc4256a88fdd8fbc1041039.'}', $if2eee0665f163a28f4adcfe84e3fc666bf1bcd89, $idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa); } } return $idfc9fbe8edf868c14fc4a3f15c7f40aabfa080aa; } private function f2b4066ec99f97011a4a9f20dd18d97b5a49b8b51(&$i0933475b5bd80561a9f50282fd9eb0b8345cec4b, $i53ddb2282ac3aca0d44abe35abcf69959ed66574) { if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date'] = $i53ddb2282ac3aca0d44abe35abcf69959ed66574; } $i17c20960d197486b19dc890665362a4f2fd6f24a = date_parse($i53ddb2282ac3aca0d44abe35abcf69959ed66574); if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date1'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date1'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['day'].'.'.$i17c20960d197486b19dc890665362a4f2fd6f24a['month'].'.'.$i17c20960d197486b19dc890665362a4f2fd6f24a['year']; } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date2'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date2'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['day'].'/'.$i17c20960d197486b19dc890665362a4f2fd6f24a['month'].'/'.$i17c20960d197486b19dc890665362a4f2fd6f24a['year']; } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date3'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date3'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['day'].'-'.$i17c20960d197486b19dc890665362a4f2fd6f24a['month'].'-'.$i17c20960d197486b19dc890665362a4f2fd6f24a['year']; } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date4'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date4'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['year'].'-'.$i17c20960d197486b19dc890665362a4f2fd6f24a['month'].'-'.$i17c20960d197486b19dc890665362a4f2fd6f24a['day']; } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date5'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date5'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['month'].'.'.$i17c20960d197486b19dc890665362a4f2fd6f24a['day'].'.'.$i17c20960d197486b19dc890665362a4f2fd6f24a['year']; } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date6'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date6'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['month'].'/'.$i17c20960d197486b19dc890665362a4f2fd6f24a['day'].'/'.$i17c20960d197486b19dc890665362a4f2fd6f24a['year']; } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date7'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_date7'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['month'].'-'.$i17c20960d197486b19dc890665362a4f2fd6f24a['day'].'-'.$i17c20960d197486b19dc890665362a4f2fd6f24a['year']; } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_time'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_time'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['hour'].':'.sprintf('%02.0f', $i17c20960d197486b19dc890665362a4f2fd6f24a['minute']); } if (isset($i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_time1'])) { $i0933475b5bd80561a9f50282fd9eb0b8345cec4b['order_time1'] = $i17c20960d197486b19dc890665362a4f2fd6f24a['hour'].':'.sprintf('%02.0f', $i17c20960d197486b19dc890665362a4f2fd6f24a['minute']).':'.sprintf('%02.0f', $i17c20960d197486b19dc890665362a4f2fd6f24a['second']); } } } 