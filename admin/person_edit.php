<?
require_once('../db.php');

$err_n = 0;
?>
<html>
<head>
<title>Редактирование персоналий</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
</head>
<script language="JavaScript" type="text/JavaScript">

function mclose() {
	if (opener)	{
		opener.window.document.location.reload();
		opener.window.focus();
	}
	window.close();
}

function loadPhoto() {
	document.formEdit.isphoto.value = 1;
	document.formEdit.submit();
}

function delphoto() {
		if (confirm('Удалить изображение ' + document.Image1.src + ' ?')) {		
			document.formEdit.isdelete.value = document.Image1.src;
			document.formEdit.submit();
	}
}

function beforePost() {
		document.formEdit.post.value=1;
		document.formEdit.submit();
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

</script>
<body onLoad="window.focus()" bgcolor="#716b49">
<?

if (@$isphoto == 1) {
	
	$upfile = $_FILES['filename']['tmp_name'];
	require_once('fp.php');
	$file_save = $FILE_SAVE_PAGE .'images/photos/' . $_FILES['filename']['name'];
	
	if (@$upfile <> "") {
		if (move_uploaded_file($upfile, $file_save)) {
                        chmod ($file_save, 0644);
			$fileinfo = "<BR>Произведенна загрузка файла с именем: <b>$filename_name</b> и размером <b>$filename_size</b> байт.<br>";		
		} else {
			$fileinfo = "<br><img src='../art/error.gif' align='absmiddle'>Ошибка загрузки файла<br>";
		}
	}
} else if (@$isdelete != "") {
	$isdelete = basename(urldecode($isdelete));	
	@unlink('../images/photos/' . $isdelete);	
} else if (isset($btnPost)) {
	require_once('../f_msg.php');
	
	if ($id == 0) {	
		$sql ="insert into as_persones (code, fullname, memo) values ('$code', '$fullname', '$memo')";
	} else {
		$sql = "update as_persones set code = '$code', fullname = '$fullname', memo = '$memo' where as_persones.id = $id";	
	}
	$result = @mysql_query($sql);
	if ($result) {
		$err_n = 1;
	} else {
		$error = 2;	
	}
}

switch ($err_n) {
	case 1:
		msg('Информация', "Информация успешно сохранена", 'info');
		break;
	case 2:
		msg('Ошибка', "!!! Ошибка сохранения запроса !!!" . mysql_error(), 'error');
		break;
	default:
		if($id == 0){
			$row->id = '';
			$row->code = '';
			$row->fullname = '';
			$row->memo = '';
		} else {
			# Запрос информации
			$sql = "select * from as_persones where id = $id";
			$result = mysql_query($sql);
			$row = mysql_fetch_object($result);		
		}		
?>		

		<center>
		<form name="formEdit" action="" method="POST" enctype="multipart/form-data">
		<input name="post" type="hidden" value="0">		
		<input name="id" type="hidden" value="<?=$row->id?>">
		<input name="isphoto" type="hidden" value="0">
		<input name="isdelete" type="hidden" value="">
		
		<table width="100%" height="96%" border="0" class="simple_blok">
			<tr>
					<td height="25" colspan="3" valign="bottom" class="toppanel">&nbsp;</td>
			</tr>
				<tr>
				<td width="204" height="170" bgcolor="#FFFFFF" align="center" valign="top">								
				<?
				$file = urlencode($row->code);
				?>
					<br><img src="../images/photos/<?=(file_exists("../images/photos/" . $row->code . ".gif")) ? $file . ".gif" : "no_image.gif"?>" border="0" name="Image1" id="Image1">
				</td>
				<td width="20" rowspan="3">&nbsp;</td>
				<td rowspan="2" valign="top" class="mbody" width="350">
				Код&nbsp;&nbsp;
				<input type="text" name="code" class="news_text" size="20" value="<?=$row->code?>"><br>
				Фамилия Имя Отчество<br>
				<input type="text" name="fullname" class="news_text"  size="50" value="<?=$row->fullname?>"><br>
				Звание/должность<br>
				<textarea name="memo" class="news_text"  cols="33" rows="5"><?=$row->memo?></textarea><br>		
				</td>
			</tr>
			<tr>
				<td align="left" valign="middle">
				
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td align="right"><a href='javascript:delphoto()' title="Удалить изображение">Удалить</a></td>
						</tr>
					</table>		
				
				</td>
				</tr>
			<tr>
				<td align="left" valign="middle" colspan="3">			
					<input type="file" class="news_text" name="filename" size="45"></td></tr><tr><td>
					<input type="button" class="news_text" name="fileload" value="Загрузить" onClick="loadPhoto()"><input type="submit" class="news_text" name="btnPost" size="5" value="Сохранить"  onClick="beforePost()"><br>
				</td>
				<td valign="middle" class="mbody">					
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								
							</td>
							<td align="right">
								<a href='javascript:mclose()' alt='Закрыть' title="Закрыть окно">
								Закрыть&nbsp;<img src="../images/close.gif" border="0" align="middle"></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
			  <td align="left" valign="top" class="scanlines" colspan="3">&nbsp;</td>
			</tr>			
		</table>
		</form>
		</center>
<?
	break;
}
?>
</body>
</html>