<?
# Вывод расписания занятий
function GetPersonList($page_cur = 1) {
	global $plg;

	$pcount = 5; # Количество записей на одной странице

	$body = "<table><tr><td></td>";	
	# Формирование запросов на выборку
	
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
	
	# Вывод на экран

	$body .= "<table width='100%' border='0' valign='top' class='news_text'>";
	
	if ($result){
		while ($row = mysql_fetch_object($result)) {
			$body .= "<tr>";
			$body .= "<td align='center' rowspan='5'>";
			$file = 'images/photos/' . urlencode($row->code) . '.gif';
			$im = (file_exists('images/photos/' . $row->code . '.gif')) ? $file : "images/no_image.gif";	
			$body .= "<a href='index.php?plg=qa&cur_person=$row->id'>";		
			$body .= "<img src='$im' border='0'";
			$body .= " title='Показать отзывы о содруднике'></a>";
			$body .= "</td>";
			$body .= "<td></td></tr>";
			$body .= "<tr><td align='left' valign='top' width='400'><font size='5'>$row->fullname</font></td></tr>";
			$body .= "<td></td><tr>";
			$body .= "<td align='center' valign='top' width='200'>$row->memo</td>";
			$body .= "<tr><td align='left' valign='top'>";
			$body .= "<a href='javascript:board_new($row->id)'>";		
			$body .= "Отправить отзыв</a>";			
			$body .= "</td></tr>";							
			$body .= "</tr>";
		}
	}
	$body .= "</table>";

	return $body;}
?>