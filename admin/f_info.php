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
	$body .= "<font class='news_text'>В таблице \"Расписание\" базы данных содержится <b>" . getcount("select count(id) as sm from as_persones") . "</b> записей.<br /><br />В данную таблицу вносят данные по каждой учебной группе, указывая ее номер (1, 2, ...). Для того, чтобы внести информацию для повторно сдающих учащихся, создают специальную группу, с указанием в поле номера группы - \"Повторники\". Предусмотрена возможность внесения произвольной информации - поле \"Примечание\".</font><br><br>";
	$body .= "</blockquote>";
	
	$body .= "<table><tr><td>";
	$body .= "<img src='../images/person_title.gif' /></td>";
	$body .= "<tr collspan='2'><td></td></tr></table>";	
	
	$body .= "<blockquote>";
	$body .= "<font class='news_text'>В таблице \"Персонал\" базы данных содержится <b>" . getcount("select count(id) as sm from as_persones") . "</b> записей.<br /><br />В данную таблицу вносят данные о преподавателях: фотография, Ф.И.О., звание/должность.</font><br><br>";
	$body .= "</blockquote>";
		
	$body .= "<table><tr><td>";
	$body .= "<img src='../images/otz_title.gif' /></td>";
	$body .= "<tr collspan='2'><td></td></tr></table>";	
	
	$body .= "<blockquote>";
	$body .= "<font class='news_text'>Таблица отзывов содержит <b>" . getcount("select count(id) as sm from as_board") . " </b> записей </font>";
	$body .= "<font class='news_text'>, из них не обработано <b>" . getcount("select count(id) as sm from as_board where visibled = 'N' or visibled is NULL") . "</b> записей.<br /><br />Эта таблица содержит отзывы о преподавателях, сделанные посетителями сайта. Данные из этой таблицы появяться на сайте для обозрения посетителей только после того, как администратор сайта установит соответствующий флаг. При необходимости, содержание отзыва можно отредактировать.</font>";
	$body .= "</blockquote>";
	
	$body .= "<br>";
	
	$body .= "<div align='center'><font class='news_text'>Для управления содержанием разделов выберите необходимую Вам ссылку </font></div>";
	
	return  $body;
}
?>