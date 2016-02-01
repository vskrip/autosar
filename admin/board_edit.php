<?
require_once('../session.php');
require_once('../db.php');

function setValue($val) {
	return ($val == 'Y') ? ' checked' : '';
}

function date_mysql($sdate) {
	list($day,$month,$year) = explode(".", $sdate);
	return "$year-$month-$day";
}
?>
<html>
<head>
<title>Редактирование отзыва о преподавателе</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>
<script language="JavaScript" type="text/JavaScript">

function validName(obj, len) {
	if (obj.value == "") {
		alert('Значение поля [' + obj.id + '] не может быть пустым !')
		obj.focus();
		return false;
	} else if (obj.value.length < len) {
		alert('Размер поля [' + obj.id + '] должен быть не менее ' + len + ' символов !')
		obj.focus();
		return false;
	}
	return true;
}

function validEmail(obj) {
	if (obj.value == "") {
		alert('Значение поля [' + obj.id + '] не может быть пустым !')
		obj.focus();
		return false;
	}
	return true;
}

function BeforePost() {
	if ((validName(document.formEdit.name, 5)) &&
	(validEmail(document.formEdit.email)) &&
	(validName(document.formEdit.memo, 10))	)
	{
		document.formEdit.post.value=1;
		document.formEdit.submit();
	}
}

function mclose() {
	if (opener)	{
		opener.window.document.location.reload();
		opener.window.focus();
	}
	window.close();
}

</script>
<body onLoad="window.focus()"  bgcolor="#716b49">
<?
$visibled = (isset($visibled)) ? 'Y' : 'N';	

if (@$post == 1) {
	require_once('../f_msg.php');
	
	$pdate = date_mysql($pdate);
	
	$sql = "update as_board set person_id = '$person_id', name = '$name', email = '$email', pdate = '$pdate', memo = '$memo', visibled = '$visibled' where id = $id";
	$result = @mysql_query($sql);
	if ($result) {
		msg('Информация', "<a href='#' onClick='mclose()'>Информация успешно сохранена</a>", 'info');
		die();
	} else {
		msg('Ошибка', "!!! Ошибка сохранения запроса !!!", 'error');
		die();
	}
} else {

	# Запрос информации
	$sql = "select id, person_id, name, email, date_format(pdate, '%d.%m.%Y') as pdate, memo, visibled from as_board where id = $id";
	$result = mysql_query($sql);
	$row = mysql_fetch_object($result);		
?>
<br><center>
<form name="formEdit" id="formEdit" method="post" action="">
	<input type="hidden" name="post" value="0">
	<input type="hidden" name="id" value="<?=$row->id?>">
	<input type="hidden" name="person_id" value="<?=$row->person_id?>">	
  <table width="93%" height="90%"  border="0" class="simple_blok">
    <tr>
      <td width="60" style="padding-left:7px;padding-top:7px;">
      	Дата
      </td>
      <td align="left" width="100%" colspan="3" style="padding-left:7px;padding-top:7px;">
      	<input name="pdate" type="text" class="news_text" id="Дата" size="25" value="<?=$row->pdate?>" />
      </td>
   </tr> 
    <tr>
      <td width="60" style="padding-left:7px;padding-top:7px;">
      	Имя
      </td>
      <td align="left" width="100%" colspan="3" style="padding-left:7px;padding-top:7px;">
      	<input name="name" type="text" class="news_text" id="Ваше имя" size="25" value="<?=$row->name?>" />
      </td>
   </tr>
   <tr>
      <td width="60" style="padding-left:7px;">
      	Email
      </td>
      <td align="left" colspan="3" style="padding-left:7px;">
      	<input name="email" type="text" class="news_text" id="Email" size="25" value="<?=$row->email?>" />
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" style="padding-left:7px;">
      	Содержание отзыва
      </td>
	</tr>
	<tr>
	 	<td colspan="3" style="padding-left:7px;">
		<textarea name="memo" cols="70" rows="10" class="news_text" id="Сообщение"><?=$row->memo?></textarea>
      </td>
    </tr>
	<tr>
		<td style="margin:0;padding-left:7px;">
			<input type="checkbox" style="height:12px;width:12px;" name="visibled" value="Y" id="visibled" <?=setValue($row->visibled)?>>
								<label for="visibled">Отображать</label>
		</td>	
	</tr>
	<tr>
		<td style="padding-left:7px;" colspan="3">
		<table>
			<tr>
				<td>
					<input type="button" name="Button" class="news_text" value="Сохранить изменения" id="Submit" onClick="BeforePost()"/>		
				</td>	
				<td align="left">
		  			<input type="button" name="Submit3" class="news_text" value="Закрыть" onClick="mclose()" />				
				</td>
			</tr>
		</table>
	</tr>
	<tr>
		<td colspan="6">&nbsp;
			
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
