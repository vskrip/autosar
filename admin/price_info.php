<?
require_once('../db.php');
require_once('../session.php');
?>
<html>
<head>
<title>Изменение информации о ценах на обучение</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>
<script language="JavaScript" type="text/JavaScript">

function BeforePost() {
	document.formEdit.post.value=1;
	document.formEdit.submit();
}

function mclose() {
	if (opener)	opener.window.focus();
	window.close();
}

</script>
<body onLoad="window.focus()"  bgcolor="#716b49">
<?
require_once('../f_msg.php');	

if (@$post == 1) {
	
	$sql = "update as_price set as_price.memo = '$memo' where as_price.id = '1'";
	$result = @mysql_query($sql);
	
	if ($result) {
		msg('Информация', "<a href='#' onClick='mclose()'>Информация успешно сохранена</a>", 'info');
		die();
	} else {
		msg('Ошибка', "!!! Ошибка сохранения запроса !!!", 'error');
		die();
	}
} else {

	$sql = "select as_price.id, as_price.memo from as_price where as_price.id = '1'";
	$result = mysql_query($sql);	
	$row = mysql_fetch_object($result);
	

?>
<br><center>
<form name="formEdit" id="formEdit" method="post" action="">
	<input type="hidden" name="post" value="0">
  <table width="93%" height="90%"  border="0" class="simple_blok">
    <tr>
      <td align="left" valign="top" style="padding-left:7px;">
      	Текст сообщения о ценах на обучение
      </td>
    </tr>
    <tr>
	<td colspan="3" style="padding-left:7px;">
		<textarea name="memo" cols="70" rows="10" class="news_text" id="Сообщение"><?=$row->memo?></textarea>
        </td>
    </tr>
    <tr>
	<td style="padding-left:7px;" colspan="3">
		<table>
			<tr>
				<td>
					<input type="button" name="Button" class="news_text" value="Сохранить изменения" id="Submit" onClick="BeforePost()"/>		
				</td>	
				<td>
				  	<input type="reset" name="Submit2" class="news_text" value="Очистить данные" />			
				</td>
				<td align="left">
		  			<input type="button" name="Submit3" class="news_text" value="Закрыть" onClick="mclose()" />				
				</td>
			</tr>
		</table>
	</td>
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
