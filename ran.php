<?php
error_reporting(1);

 class WsMessageSend
    {
    	const wsdl="https://dx.ipyy.net/webservice.asmx?wsdl";
    	
    	static function send($username,$password,$mobiles,$content,$extnumber,$plansendtime=null)
    	{
    		$client=new SoapClient(self::wsdl);
    		$sms=array(
    				'Msisdns'=>$mobiles,
    				'SMSContent'=>$content,
    				'ExtNumber'=>$extnumber,
    		);
    		if($plansendtime!=null && $plansendtime!=''){
    			$sms['PlanSendTime']=$plansendtime;
    		}
    		//print_r($sms);
    		$body=array(
    				'userName'=>$username,
    				'password'=>$password,
					'sms'=>$sms
    		);
     		$result=$client->__call("SendSms", array($body));
    		//$client->__soapCall("SendSms", array($body));
    		if(is_soap_fault($result))
    		{
    			echo "faultcode:",$result->faultcode,"faultstring:",$result->faultstring;
    			return null;
    		}
    		else 
    		{
    			$data=$result->SendSmsResult;
    			return $data;
    		}
    	}
    }
	
	function sendSMS($mobile,$content,$time='',$mid='')
{
	//$content = iconv('utf-8','gbk',$content);	    
    $username="axlm_sms";							//��Ϊʵ���˻���
    $password="Aa123123";							//��Ϊʵ�ʶ��ŷ�������
    $mobiles="15865943529";					//Ŀ���ֻ����룬����ð�ǡ�,���ָ�
    //$content="php��soap�ӿڷ��Ͳ���,������֤�룺8888�����š�";
    $extnumber="";
    
    //��ʱ���ŷ���ʱ��,��ʽ 2016-12-06T08:09:10+08:00��null��մ���ʾΪ�Ƕ�ʱ����(��ʱ����)
    $plansendtime=$time;						    
    //$plansendtime='2016-12-06T08:09:10+08:00'
    $result=WsMessageSend::send($username, $password, $mobiles, $content,$extnumber,$plansendtime);

    if($result==null)
    {
    	echo "�ӿڵ���ʧ��";
    }
    else
    {
    	//print_r($result);
        echo "������Ϣ��ʾ��",$result->Description,"\n";
        echo "����״̬Ϊ��",$result->StatusCode,"\n";
        echo "������",$result->Amount,"\n";
        //echo "���ر�������ID��",$result->MsgId,"\n";
        echo "���سɹ���������",$result->SuccessCounts,"\n";
    }

}

$mobile_code = 123543;
	// ��������
	//$content = sprintf($_LANG['mobile_code_template'], $GLOBALS['_CFG']['shop_name'], $mobile_code, $GLOBALS['_CFG']['shop_name']);
	$content = "��Ʒ��Ρ�������֤��Ϊ��".$mobile_code;
	/* ���ͼ�����֤�ʼ� */
	// $result = true;
	$result = sendSMS($mobile_phone, $content);
	
?>

?>