<?
# Функция вывода на экран сообщения
/**
 * Формирование окна сообщения для вывода ошибок и сообщений
 *
 * @param string $title
 * @param string $body
 * @param string $img
 */
function msg($title, $body, $img) { ?>
<br><center>
<table width="90%" height="90%" border="0" cellpadding="0" cellspacing="0" class="simple_blok">
	<tr>
		<th colspan="2" height="40">
			<font class="news_text_big"><?=$title?></font><br>
		</th>
	</tr>
	<tr>
		<td width="150" height="240"></td>
		<td width="100%"><font class="news_text_big">&nbsp;&nbsp;&nbsp;&nbsp;<?=$body?></font></td>
	</tr>
	<tr>
		<td colspan="2" valign="bottom" align="center">
		<div align="right">
		<a href='javascript:mclose()'>Закрыть</a></div>
		</td>
	</tr>
</table>
</center>
<?	
}
?>