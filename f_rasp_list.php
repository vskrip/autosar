<?
# Вывод расписания занятий
function GetRasp() {

	$body = "<table><tr><td></td>";	
	# Формирование запросов на выборку
	
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
		ORDER BY as_rasp.class, as_rasp.group";*/

	#
	# Версия 1.02
	# Изменения в таблице расписания - удален вывод времени
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
	# Версия 1.05
	# Добавлена информация о ценах на обучение
	#	
	
	$sql_info = "
			SELECT
			as_price.id,
			as_price.memo
			FROM
				as_price";

	$result_info = mysql_query($sql_info);
	

	# Вывод на экран
	# Версия 1.05. Параметр height='50' в следующей строке удален

	$body .= "<table width='100%' border='0' class='news_text'><tr align='center'>";
/*	$body .= "<td class='header_title' valign='top'>Группа</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>Дата и время начала занятий</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>Дата и время начала экзамена</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>Дата и время начала сдачи экзамена в ГИБДД</td>";	
	$body .= "<td></td>";
	$body .= "<td class='header_title' valign='top'>Примечание</td>";*/
	
	#
	# Версия 1.02
	# Изменения в таблице расписания - заголовки в полях таблицы
	#	
	
/*	$body .= "<td class='header_title' valign='top'>Номер группы</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>Начало занятий</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>Внутренний экзамен</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='200' valign='top'>Дата экзаменов ГИБДД</td>";	
	$body .= "<td></td>";
	$body .= "<td class='header_title' valign='top'>Наличие свободных мест</td>";	*/
	
	#
	# Версия 1.05
	# Добавлена информация о ценах на обучение
	#	

	if ($result_info) {
		while($row_info = mysql_fetch_object($result_info)) {
			$body .= "</tr>";
			$body .= "<tr><td colspan='11' align='left' valign='top' width='*'><strong>$row_info->memo</strong></td></tr><tr>";	
		}	
	}	
	
	$body .= "<tr><td colspan='11'></td></tr>";


	#
	# Версия 1.04
	# Изменения в таблице расписания - количество полей два
	#		
	
	$body .= "<td class='header_title' width='200' valign='top'>Начало занятий новой группы</td>";
	$body .= "<td></td>";
	$body .= "<td class='header_title' width='20' valign='top'>Время начала занятий</td>";
	$body .= "<td></td>";
#	$body .= "<td class='header_title' width='20' valign='top'>Время окончания занятий</td>";
#	$body .= "<td></td>";
	$body .= "<td class='header_title' valign='top' width='*' align='right'>Наличие свободных мест</td>";		
	
	
	$body .= "</tr>";
	$body .= "<tr><td colspan='11'></td></tr>";
	
	$cur_class='';
	
	if ($result){
		while ($row = mysql_fetch_object($result)) {
		#Подготовим параметр на выборку
			if($cur_class!=$row->class_id) {
				$body .= "<tr align='center' height='30'><td colspan='11'><b><i>Учебный класс на улице $row->class_title</b></i></td></tr>";
				$cur_class=$row->class_id;
			}
			
	#
	# Версия 1.04
	# Изменения в таблице расписания - количество полей два
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
			$body .= "</tr>";*/
			
			$body .= "<tr height='30'>";
			$body .= "<td align='center' valign='top' width='200'>$row->b_date</td>";
			$body .= "<td></td>";
			$body .= "<td align='center' valign='top' width='20'>$row->e_b_time</td>";
			$body .= "<td></td>";
#			$body .= "<td align='center' valign='top' width='20'>$row->e_f_time</td>";
#			$body .= "<td></td>";
			$body .= "<td align='right' valign='top' width='*'>$row->memo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";								
			$body .= "</tr>";			
		}
	}
	$body .= "</table>";

	return $body;}
?>