<%
' ���ܣ��������֧�����˻����ܽӿڽ���ҳ
' �汾��3.3
' ���ڣ�2012-07-17
' ˵����
' ���´���ֻ��Ϊ�˷����̻����Զ��ṩ���������룬�̻����Ը����Լ���վ����Ҫ�����ռ����ĵ���д,����һ��Ҫʹ�øô��롣
' �ô������ѧϰ���о�֧�����ӿ�ʹ�ã�ֻ���ṩһ���ο���
	
' /////////////////ע��/////////////////
' ������ڽӿڼ��ɹ������������⣬���԰��������;�������
' 1���̻��������ģ�https://b.alipay.com/support/helperApply.htm?action=consultationApply�����ύ���뼯��Э�������ǻ���רҵ�ļ�������ʦ������ϵ��Э�����
' 2���̻��������ģ�http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9��
' 3��֧������̳��http://club.alipay.com/read-htm-tid-8681712.html��
' /////////////////////////////////////

%>
<html>
<head>
	<META http-equiv=Content-Type content="text/html; charset=gb2312">
<title>֧�����������֧�����˻����ܽӿ�</title>
</head>
<body>

<!--#include file="class/alipay_submit.asp"-->

<%
'/////////////////////�������/////////////////////

        '�������첽֪ͨҳ��·��
        notify_url = "http://�̻����ص�ַ/batch_trans_notify-ASP-GBK/notify_url.asp"
        '��http://��ʽ������·�����������?id=123�����Զ������
        '�����˺�
        email = Request.Form("WIDemail")
        '����
        '�����˻���
        account_name = Request.Form("WIDaccount_name")
        '�������֧�����˺�����ʵ������˾֧�����˺��ǹ�˾����
        '���������
        pay_date = Request.Form("WIDpay_date")
        '�����ʽ����[4λ]��[2λ]��[2λ]���磺20100801
        '���κ�
        batch_no = Request.Form("WIDbatch_no")
        '�����ʽ����������[8λ]+���к�[3��16λ]���磺201008010000001
        '�����ܽ��
        batch_fee = Request.Form("WIDbatch_fee")
        '���������detail_data��ֵ�����н����ܺ�
        '�������
        batch_num = Request.Form("WIDbatch_num")
        '���������detail_data��ֵ�У���|���ַ����ֵ�������1�����֧��1000�ʣ�����|���ַ����ֵ�����999����
        '������ϸ����
        detail_data = Request.Form("WIDdetail_data")
        '�����ʽ����ˮ��1^�տ�ʺ�1^��ʵ����^������1^��ע˵��1|��ˮ��2^�տ�ʺ�2^��ʵ����^������2^��ע˵��2....

'/////////////////////�������/////////////////////

'���������������
sParaTemp = Array("service=batch_trans_notify","partner="&partner,"_input_charset="&input_charset  ,"notify_url="&notify_url   ,"email="&email   ,"account_name="&account_name   ,"pay_date="&pay_date   ,"batch_no="&batch_no   ,"batch_fee="&batch_fee   ,"batch_num="&batch_num   ,"detail_data="&detail_data  )

'��������
Set objSubmit = New AlipaySubmit
sHtml = objSubmit.BuildRequestForm(sParaTemp, "get", "ȷ��")
response.Write sHtml


%>
</body>
</html>
