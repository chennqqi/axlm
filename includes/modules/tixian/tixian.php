<?php

/**
 * ECSHOP ֧�������
 * ============================================================================
 * * ��Ȩ���� 2005-2012 �Ϻ���������Ƽ����޹�˾������������Ȩ����
 * ��վ��ַ: http://www.ecshop.com��
 * ----------------------------------------------------------------------------
 * �ⲻ��һ�������������ֻ���ڲ�������ҵĿ�ĵ�ǰ���¶Գ����������޸ĺ�
 * ʹ�ã�������Գ���������κ���ʽ�κ�Ŀ�ĵ��ٷ�����
 * ============================================================================
 * $Author: douqinghua $
 * $Id: alipay.php 17217 2011-01-19 06:29:08Z douqinghua $
 */

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

$tixian = ROOT_PATH . 'includes/modules/tixian/alipayapi.php';

if (file_exists($tixian))
{
    global $_LANG;

    include_once($tixian);
}


 $payment = payment_info($order['pay_id']);

        include_once('includes/modules/payment/' . $payment['pay_code'] . '.php');

        $pay_obj    = new $payment['pay_code'];

        $pay_online = $pay_obj->get_code($order, unserialize_config($payment['pay_config']));
		
		/* �����޸�_start  By www.ecshop68.com */
		$payment_www_com=unserialize_config($payment['pay_config']);
		if ($payment['pay_code']=='alipay_bank')
		{
			$payment_www_com['www_ecshop68_com_alipay_bank'] = $_POST['www_68ecshop_com_bank'] ? trim($_POST['www_68ecshop_com_bank']) : "www_ecshop68_com";
			
			$pay_online = $pay_obj->get_code($order, $payment_www_com);			
		}
        
		/* �����޸�_end  By www.ecshop68.com */

        $order['pay_desc'] = $payment['pay_desc'];

        $smarty->assign('pay_online', $pay_online);