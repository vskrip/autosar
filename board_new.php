<?
require_once('session.php');
require_once('db.php');
?>
<html>
<head>
<title>Отправка отзыва о преподавателе</title>
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
	if (opener)	opener.window.focus();
	window.close();
}

</script>
<body onLoad="window.focus()"  bgcolor="#716b49">
<?

if (@$post == 1) {
	require_once('f_msg.php');
	$sql = "insert into as_board (person_id, name, email, memo) values ('$id', '$name', '$email', '$memo')";
	$result = @mysql_query($sql);
	if ($result) {
		msg('Информация', "<a href='#' onClick='mclose()'>Информация успешно сохранена</a>", 'info');
		die();
	} else {
		msg('Ошибка', "!!! Ошибка сохранения запроса !!!", 'error');
		die();
	}
} else {

?>
<br><center>
<form name="formEdit" id="formEdit" method="post" action="">
	<input type="hidden" name="post" value="0">
  <table width="93%" height="90%"  border="0" class="simple_blok">
    <tr>
      <td width="60" style="padding-left:7px;padding-top:7px;">
      	Ваше имя
      </td>
      <td align="left" width="100%" colspan="1" style="padding-left:7px;padding-top:7px;">
      	<input name="name" type="text" class="news_text" id="Ваше имя" size="40" />
      </td>
   </tr>
   <tr>
      <td width="60" style="padding-left:7px;">
      	Email
      </td>
      <td align="left" colspan="1" style="padding-left:7px;">
      	<input name="email" type="text" class="news_text" id="Email" size="40" />
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" style="padding-left:7px;">
      	Ваше сообщение
      </td>
	</tr>
	<tr>
	 	<td colspan="3" style="padding-left:7px;">
		<textarea name="memo" cols="70" rows="10" class="news_text" id="Сообщение"></textarea>
      </td>
    </tr>
	<tr>
		<td style="padding-left:7px;" colspan="3">
		<table>
			<tr>
				<td>
					<input type="button" name="Button" class="news_text" value="Отправить отзыв" id="Submit" onClick="BeforePost()"/>		
				</td>	
				<td>
				  	<input type="reset" name="Submit2" class="news_text" value="Очистить данные" />			
				</td>
				<td align="left">
		  			<input type="button" name="Submit3" class="news_text" value="Закрыть" onClick="mclose()" />				
				</td>
			</tr>
		</table>
	</tr>
	<tr>
		<td colspan="6">
			&nbsp;
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
