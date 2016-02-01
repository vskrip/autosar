<?
# Вывод отзывов о преподавателях
function GetBoard($page_cur = 1) {
	global $plg;

	$pcount = 5; # Количество записей на одной странице

	$body = "<table widht='100%'><tr><td></td>";	
	# Формирование запросов на выборку
	
	$sql = "
		SELECT 
		as_board.id,
		as_persones.id as pers_id,		
		as_persones.fullname as fullname,
		date_format(as_board.pdate, '%d.%m.%Y')as p_date,		
		as_board.name,
		as_board.email,
		as_board.memo,
		as_board.visibled
		FROM
			as_board, as_persones
		WHERE as_board.person_id=as_persones.id
		ORDER BY fullname, p_date";

	$result = mysql_query($sql);
	
	# Вывод на экран

	$body .= "<table width='100%' border='0' class='news_text'>";
	
	$pers='';
	
	if ($result){
		while ($row = mysql_fetch_object($result)) {
		#Подготовим параметр на выборку
			if($pers!=$row->pers_id) {
				$body .= "<tr align='left' height='30'><td colspan='11'><h3><b>О преподавателе $row->fullname</b></h3></td></tr>";
				$pers=$row->pers_id;
			}
			$body .= "<tr>";
			$body .= "<td align='left' valign='top' width='150'><b>$row->p_date</b></td></tr>";
			$body .= "<tr><td height='10'></td></tr>";
			$body .= "<tr><td align='left' valign='top'><b><i>$row->name</i></b></td></tr>";
			$body .= "<tr><td align='left' valign='top'>$row->email</td></tr>";
			$body .= "<tr><td height='10'></td></tr>";
			$body .= "<td align='left' valign='top' width='100%'>$row->memo</td>";
			$st = ($row->visibled == 'N') ? 'Не отображается' : 'Отображается';
			$body .= "<td valign='top'>$st</td>";
			$body .= "<td valign='top' align='right'>";
			$body .= "<a href='#'><img src='../images/edit.gif' onClick='board_edit($row->id)' border='0' class='btn' title='Редактировать отзыв'></a>&nbsp;";
			$body .= "<a href='#'><img src='../images/delete.gif' onClick='delete_item($row->id)' border='0' class='btn' title='Удалить отзыв'></a>";
			$body .= "</td>";			
			$body .= "<tr><td height='10'></td></tr>";			
			$body .= "</tr>";
		}
	}
	$body .= "</table>";

	return $body;}
?>