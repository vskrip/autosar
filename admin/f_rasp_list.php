<?
# ����� ����� ���������� ������� � ���������
function GetRasp() {
	global $plg;
 
	$body = "<table><tr><td><img src='../images/rasp_title.gif' /></td>";		
		
/*	$sql = "
		SELECT 
		as_rasp.id,
		as_class.id as class_id,
		as_class.title as class_title,
		as_rasp.group,
		date_format(as_rasp.dt_begin_edu, '%d.%m.%Y %H:%i')as b_date,
		date_format(as_rasp.dt_exam_class, '%d.%m.%Y %H:%i')as e_date,
		date_format(as_rasp.dt_exam_gibdd, '%d.%m.%Y %H:%i')as e_g_date,
		as_rasp.memo
		FROM
			as_rasp, as_class
		WHERE as_rasp.class = as_class.id
		ORDER BY as_rasp.class, as_rasp.group";		*/
		
	#
	# ������ 1.02
	# ��������� � ������� ���������� - ������ ����� �������
	#				
	
	$sql = "
		SELECT 
		as_rasp.id,
		as_class.id as class_id,
		as_class.title as class_title,
		as_rasp.group,
		date_format(as_rasp.dt_begin_edu, '%d.%m.%Y')as b_date,
		date_format(as_rasp.dt_exam_class, '%H:%i')as e_b_time,
		date_format(as_rasp.dt_exam_gibdd, '%H:%i')as e_f_time,
		as_rasp.memo
		FROM
			as_rasp, as_class
		WHERE as_rasp.class = as_class.id
		ORDER BY as_rasp.class, as_rasp.group";			
	
	$result = mysql_query($sql);
	
	#
	# ������ 1.05
	# ��������� ���������� � ����� �� ��������
	#	
	
	$sql_info = "
			SELECT
			as_price.id,
			as_price.memo
			FROM
				as_price";

	$result_info = mysql_query($sql_info);


	# ����� �� �����
	# ������ 1.05. �������� height='50' � ��������� ������ ������

	$body .= "<table width='100%' border='0' class='news_text'><tr align='center'>";
	
/*	$body .= "<td class='header_title' valign='top'>������</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>���� � ����� ������ �������</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>���� � ����� ������ ��������</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>���� � ����� ������ ����� �������� � �����</td>";	
	$body .= "<td></td>";
	$body .= "<td class='header_title' valign='top'>����������</td><td></td><td></td>";*/

	#
	# ������ 1.02
	# ��������� � ������� ���������� - �������� ���������� ����� �������
	#		

/*	$body .= "<td class='header_title' valign='top'>����� ������</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>������ �������</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>���������� �������</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>���� ��������� �����</td>";	
	$body .= "<td></td>";
	$body .= "<td class='header_title' valign='top'>������� ��������� ����</td><td></td><td></td>";*/
	

	#
	# ������ 1.05
	# ��������� ���������� � ����� �� ��������
	#	

	if ($result_info) {
		while($row_info = mysql_fetch_object($result_info)) {
			$body .= "</tr>";
			$body .= "<tr><td colspan='11' align='left' valign='top' width='*'>$row_info->memo</td></tr><tr>";	
		}	
	}	


	# ������ 1.05

	$body .= "<tr><td align='right' width='100%' colspan='11'>";
	$body .= "<a href='#'><img src='../images/edit.gif' onClick='javascript:price_edit()' border='0' alt='�������������'></a>";	
	$body .= "</td></tr>";	
	$body .= "<tr><td colspan='11'></td></tr>";


	#
	# ������ 1.04
	# ��������� � ������� ���������� - ���������� ������� ���
	#		
	$body .= "<td class='header_title' width='200' valign='top'>���� ������ ������� ����� ������</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='20' valign='top'>����� ������ �������</td>";
	$body .= "<td></td>";
#	$body .= "<td class='header_title' width='20' valign='top'>����� ��������� �������</td>";
#	$body .= "<td></td>";
	$body .= "<td class='header_title' valign='top' align='right' width='*'>������� ��������� ����</td><td></td><td></td>";		
	$body .= "</tr>";
	$body .= "<tr><td align='right' width='100%' colspan='11'>";
	$body .= "<a href='#'><img src='../images/new.gif' onClick='javascript:rasp_edit(0)' border='0' alt='�������'></a>";	
	$body .= "</td></tr>";	
	$body .= "<tr><td colspan='11'></td></tr>";
	
	$cur_class='';
	
	if ($result){
		while ($row = mysql_fetch_object($result)) {
		#���������� �������� �� �������
			if($cur_class!=$row->class_id) {
				$body .= "<tr align='center' height='30'><td colspan='11'><b><i>������� ����� �� ����� $row->class_title</b></i></td></tr>";
				$cur_class=$row->class_id;
			}
			#
			# ������ 1.04
			# ��������� � ������� ���������� - ���������� ������� ���
			#						
/*			$body .= "<tr height='30'>";
			$body .= "<td align='center' valign='top' width='200'>$row->group</td>";
			$body .= "<td></td>";
			$body .= "<td align='center' valign='top' width='200'>$row->b_date</td>";
			$body .= "<td></td>";
			$body .= "<td align='center' valign='top' width='200'>$row->e_date</td>";
			$body .= "<td></td>";
			$body .= "<td align='center' valign='top' width='200'>$row->e_g_date</td>";			
			$body .= "<td></td>";
			$body .= "<td align='center' valign='top' width='240'>$row->memo</td>";
			$body .= "<td align='right' valign='top'>";*/
			
			$body .= "<tr height='30'>";
			$body .= "<td align='center' valign='top' width='200'>$row->b_date</td>";
			$body .= "<td></td>";
			$body .= "<td align='center' valign='top' width='20'>$row->e_b_time</td>";
			$body .= "<td></td>";
#			$body .= "<td align='center' valign='top' width='20'>$row->e_f_time</td>";
#			$body .= "<td></td>";
			$body .= "<td align='right' valign='top' width='*'>$row->memo&nbsp;&nbsp;&nbsp;</td>";
			$body .= "<td align='right' valign='top'>";			
			
			$body .= "<a href='#'><img src='../images/edit.gif' onClick='rasp_edit($row->id)' border='0' class='btn' title='�������� ������ ����������'></a>&nbsp;";
			$body .= "<a href='#'><img src='../images/delete.gif' onClick='delete_item($row->id)' border='0' class='btn' title='������� ������'></a>";
			$body .= "</td>";										
			$body .= "</tr>";
		}
	}
	$body .= "</table><br>";
	
	return $body;
}

?>