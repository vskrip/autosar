<?
# ����� ���������� �������
function GetPersonList($page_cur = 1) {
	global $plg;

	$pcount = 5; # ���������� ������� �� ����� ��������

	$body = "<table><tr><td><img src='../images/person_title.gif' /></td><td align='right' width='100%' colspan='11'><a href='#'><img src='../images/new.gif' border='0' class='btn' onClick='person_edit(0)' title='������� ����� �������'></a></td>";	
	# ������������ �������� �� �������
	
	$sql = "
		SELECT 
		as_persones.id,
		as_persones.code,
		as_persones.fullname,
		as_persones.memo
		FROM
			as_persones
		ORDER BY as_persones.fullname";			

	$result = mysql_query($sql);
	
	# ����� �� �����

	$body .= "<table width='100%' border='0' valign='top' class='news_text'>";
	
	if ($result){
		while ($row = mysql_fetch_object($result)) {
			$body .= "<tr>";
			$body .= "<td align='center' rowspan='5'>";
			$file = '../images/photos/' . urlencode($row->code) . '.gif';
			$im = (file_exists('../images/photos/' . $row->code . '.gif')) ? $file : "../images/photos/no_image.gif";	
			$body .= "<img src='$im' border='0'";
			$body .= " title='���������� ����������'>";
			$body .= "</td>";
			$body .= "<td></td></tr>";
			$body .= "<tr><td align='left' valign='top' width='400'><font size='5'>$row->fullname</font></td></tr>";
			$body .= "<td></td><tr>";
			$body .= "<td align='center' valign='top' width='200'>$row->memo</td>";
			$body .= "<tr><td align='left' valign='top'>";
			$body .= "</td>";
			$body .= "<td align='right' valign='top'>";
			$body .= "<a href='#'><img src='../images/edit.gif' onClick='person_edit($row->id)' border='0' class='btn' title='������������� �������'></a>&nbsp;";
			$body .= "<a href='#'><img src='../images/delete.gif' onClick='delete_item($row->id)' border='0' class='btn' title='������� ������'></a>";
			$body .= "</td></tr>";										
			$body .= "</tr>";
		}
	}
	$body .= "</table>";

	return $body;}
?>
