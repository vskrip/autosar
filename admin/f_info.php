<?
function getcount($sql) {	
	$result = mysql_query($sql);
	$row = mysql_fetch_object($result);
	return $row->sm;
}

function GetInfo() {

	$body = "<table><tr><td>";
	$body .= "<img src='../images/rasp_title.gif' /></td>";
	$body .= "<tr collspan='2'><td></td></tr></table>";	
	
	$body .= "<blockquote>";
	$body .= "<font class='news_text'>� ������� \"����������\" ���� ������ ���������� <b>" . getcount("select count(id) as sm from as_persones") . "</b> �������.<br /><br />� ������ ������� ������ ������ �� ������ ������� ������, �������� �� ����� (1, 2, ...). ��� ����, ����� ������ ���������� ��� �������� ������� ��������, ������� ����������� ������, � ��������� � ���� ������ ������ - \"����������\". ������������� ����������� �������� ������������ ���������� - ���� \"����������\".</font><br><br>";
	$body .= "</blockquote>";
	
	$body .= "<table><tr><td>";
	$body .= "<img src='../images/person_title.gif' /></td>";
	$body .= "<tr collspan='2'><td></td></tr></table>";	
	
	$body .= "<blockquote>";
	$body .= "<font class='news_text'>� ������� \"��������\" ���� ������ ���������� <b>" . getcount("select count(id) as sm from as_persones") . "</b> �������.<br /><br />� ������ ������� ������ ������ � ��������������: ����������, �.�.�., ������/���������.</font><br><br>";
	$body .= "</blockquote>";
		
	$body .= "<table><tr><td>";
	$body .= "<img src='../images/otz_title.gif' /></td>";
	$body .= "<tr collspan='2'><td></td></tr></table>";	
	
	$body .= "<blockquote>";
	$body .= "<font class='news_text'>������� ������� �������� <b>" . getcount("select count(id) as sm from as_board") . " </b> ������� </font>";
	$body .= "<font class='news_text'>, �� ��� �� ���������� <b>" . getcount("select count(id) as sm from as_board where visibled = 'N' or visibled is NULL") . "</b> �������.<br /><br />��� ������� �������� ������ � ��������������, ��������� ������������ �����. ������ �� ���� ������� ��������� �� ����� ��� ��������� ����������� ������ ����� ����, ��� ������������� ����� ��������� ��������������� ����. ��� �������������, ���������� ������ ����� ���������������.</font>";
	$body .= "</blockquote>";
	
	$body .= "<br>";
	
	$body .= "<div align='center'><font class='news_text'>��� ���������� ����������� �������� �������� ����������� ��� ������ </font></div>";
	
	return  $body;
}
?>