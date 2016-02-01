<?
require_once('../session.php');
require_once('../db.php');

/*function date_mysql($sdate) {
	list($day,$month,$tmpyear) = explode(".", $sdate);
	list($year,$ftime) = explode(" ", $tmpyear);
	list($hour,$minute) = explode(":", $ftime);
	
	return "$year-$month-$day $hour:$minute";
}*/

#
# Версия 1.02
# Изменения в функции преобразования даты - удалено преобразование отображения времени
#	

function date_mysql($sdate) {
	list($day,$month,$year) = explode(".", $sdate);
	return "$year-$month-$day";
}

?>
<html>
<head>
<title>Редактирование строки расписания</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>
<script language="JavaScript" type="text/JavaScript">

function BeforePost() {
	document.formEdit.post.value = 1;
	document.formEdit.submit();	
}

function mclose() {
	if (opener)	{
		opener.window.document.location.reload();
		opener.window.focus();
	}
	window.close();
}

</script>
<body onLoad="window.focus()" bgcolor="#716b49">
<?
if (@$post == 1) {
	require_once('../f_msg.php');	
	
	if($d_begin!='')
		$d_begin = date_mysql($d_begin);
/*	if($e_b_time!='')
		$e_b_time = date_mysql($e_b_time);
	if($e_f_time!='')
		$e_f_time = date_mysql($e_f_time);*/
	
	if ($id == 0) {
		$sql = "insert into as_rasp (as_rasp.class, as_rasp.group, as_rasp.dt_begin_edu, as_rasp.dt_exam_class, as_rasp.dt_exam_gibdd, as_rasp.memo) values ('$clas', '$group', '$d_begin', '$e_b_time', '$e_f_time', '$memo')";
	} else {
		$sql = "update as_rasp set as_rasp.class = '$clas', as_rasp.group = '$group', as_rasp.dt_begin_edu = '$d_begin', as_rasp.dt_exam_class = '$e_b_time', as_rasp.dt_exam_gibdd = '$e_f_time', as_rasp.memo = '$memo' where as_rasp.id = $id";
	}			
	$result = @mysql_query($sql);
	if ($result) {
		msg('Информация', "Информация успешно сохранена", 'info');		
	} else {
		msg('Ошибка', "!!! Ошибка сохранения запроса !!!", 'error');		
	}
} else {
	if ($id == 0) {
		$row->clas = 1;
		$row->group = '';
		$row->d_begin = '';
		$row->e_b_time = '';
		$row->e_f_time = '';
		$row->memo = '';
	} else {
/*		$sql = "select as_rasp.id, as_rasp.class as clas, as_rasp.group, date_format(as_rasp.dt_begin_edu, '%d.%m.%Y %H:%i') as d_begin, date_format(as_rasp.dt_exam_class, '%d.%m.%Y %H:%i') as d_exam, date_format(as_rasp.dt_exam_gibdd, '%d.%m.%Y %H:%i') as d_ex_g, as_rasp.memo from as_rasp where as_rasp.id = $id";*/

#
# Версия 1.02
# Изменения в строке запроса - удален запрос на отображение времени
#	

		$sql = "select as_rasp.id, as_rasp.class as clas, as_rasp.group, date_format(as_rasp.dt_begin_edu, '%d.%m.%Y') as d_begin, date_format(as_rasp.dt_exam_class, '%H:%i') as e_b_time, date_format(as_rasp.dt_exam_gibdd, '%H:%i') as e_f_time, as_rasp.memo from as_rasp where as_rasp.id = $id";

		$result = mysql_query($sql);	
		$row = mysql_fetch_object($result);
	}
	# Формирование списка категорий
	
	$sql = "select * from as_class";
	$result = mysql_query($sql);
	$classes = "<select name='clas' class='news_text'>";
	while ($clas = mysql_fetch_object($result)) {
		$st = ($row->clas == $clas->id) ? ' selected' : '';
		$classes .= "<option value='$clas->id' $st>$clas->title</option>";
	}
	$classes .= "</select>";			
?>
<br><center>
<form name="formEdit" id="formEdit" method="post" action="">
	<input type="hidden" name="post" value="0">
	<input type="hidden" name="id" value="<?=$row->id?>">
  <table width="90%"  border="0" class="simple_blok">
    <tr>
      <td colspan="2" align="left" style="padding-left:7px;padding-top:7px;">
		Учебный класс на улице 
		<?=$classes?><br />
		
<!--#
# Версия 1.04
# Изменения в структуре отображаемых данных - количество колонок две
#	
-->
<!--      	Номер группы&nbsp;
		<input name="group" type="text" id="Группа" size="2" maxlength="2" class="news_text" value="<?=#$row->group?>"><br />
      	Начало занятий &nbsp;
      	<input name="d_begin" type="text" id="ДатаНачЗанятий" size="10" class="news_text" value="<?=#$row->d_begin?>"><br />
		Внутренний экзамен &nbsp;
      	<input name="d_exam" type="text" id="ДатаНачЭкзам" size="10" class="news_text" value="<?=#$row->d_exam?>"><br />
		Дата экзаменов ГИБДД&nbsp;
      	<input name="d_ex_g" type="text" id="ДатаНачЭкзам" size="10" class="news_text" value="<?=#$row->d_ex_g?>"><br />-->
		
      	Дата начала занятий новой группы&nbsp;
      	<input name="d_begin" type="text" id="ДатаНачЗанятий" size="10" class="news_text" value="<?=$row->d_begin?>"><br />

      </td>
    </tr>
    <tr>
      <td colspan="2" align="left" style="padding-left:7px;padding-top:7px;">
      	Время начала занятий&nbsp;
      	<input name="e_b_time" type="text" id="ВремяНачЗанятий" size="10" class="news_text" value="<?=$row->e_b_time?>"><br />
      </td>
    </tr>
<!--    <tr>
      <td colspan="2" align="left" style="padding-left:7px;padding-top:7px;">
      	Время окончания занятий&nbsp;
      	<input name="e_f_time" type="text" id="ВремяОкЗанятий" size="10" class="news_text" value="<?=$row->e_f_time?>"><br />
      </td>
    </tr> -->
    <tr>
      <td colspan="2" align="left" style="padding-left:7px;padding-top:7px;">
      	Наличие свободных мест<br />
      	<textarea name="memo" cols="70" rows="10" class="news_text" id="Примечание"><?=$row->memo?></textarea>
      </td>
    </tr>
	<tr>
		<td style="padding-left:7px;padding-top:7px;">
		  <br>
		  <input type="button" name="Button" class='news_text' value="Сохранить" id="Submit" onClick="BeforePost()"/>
		  <input type="reset" name="Submit2" class='news_text' value="Очистить данные" />
		  <input type="button" name="Submit3" class='news_text' value="Закрыть" onClick="mclose()" />				
		</td>
	</tr>
	<tr>
		<td height="10" style="padding-left:7px;padding-top:7px;">
		</td>
	</tr>
  </table>	    	
</form>
</center>
<? 
	}
?>
</body>
</html>