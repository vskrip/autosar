<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="../css/styles.css" rel="stylesheet" type="text/css">
<title>Автошкола "СТК Электрон-2000" - администрирование</title>
<script type="text/javascript">
<!--

function newImage(arg) {
	if (document.images) {
		rslt = new Image();
		rslt.src = arg;
		return rslt;
	}
}

function changeImages() {
	if (document.images && (preloadFlag == true)) {
		for (var i=0; i<changeImages.arguments.length; i+=2) {
			document[changeImages.arguments[i]].src = changeImages.arguments[i+1];
		}
	}
}

var preloadFlag = false;
function preloadImages() {
	if (document.images) {
		menu_main_over = newImage("../images/menu_main-over.gif");
		menu_edu_over = newImage("../images/menu_edu-over.gif");
		menu_serv_over = newImage("../images/menu_serv-over.gif");
		menu_rasp_over = newImage("../images/menu_rasp-over.gif");
		menu_person_over = newImage("../images/menu_person-over.gif");
		menu_otz_over = newImage("../images/menu_otz-over.gif");
		menu_cont_over = newImage("../images/menu_cont-over.gif");
		preloadFlag = true;
	}
}

function board_edit(id) {
	window.open('board_edit.php?id=' + id,'board_edit','scrollbars=no,resizable=no,width=650,height=350');
}

function delete_item(id) {
	if (confirm('Удалить запись ?')) {
		window.open('delete.php?plg=<?=$plg?>&id=' + id,'del','scrollbars=no,resizable=no,width=700,height=400');
	}
}

function rasp_edit(id) {
	window.open('rasp_row.php?id=' + id,'rasp_row','scrollbars=no,resizable=no,width=600,height=400');
}

function person_edit(id) {
	window.open('person_edit.php?id=' + id,'person','scrollbars=no,resizable=no,width=600,height=400');
}

function price_edit() {
	window.open('price_info.php','price_info','scrollbars=no,resizable=no,width=600,height=400');
}

// -->
</script>
</head>
<body bgcolor="#716b49" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="preloadImages();">
<form name='log' action="index.php" method="POST">
<input name='plg' type='hidden' value="<?=@$plg?>">

<table bgcolor="#f4f5f7"  cellpadding="0" cellspacing="0" border="0" height="100%">
  <tr>
    <td width="30" height="17" bgcolor="#716b49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="bg_top" width="100%">&nbsp;</td>
    <td width="30" height="17" bgcolor="#716b49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td class="bg_left" rowspan="4">&nbsp;</td>
    <td><table align="center" bgcolor="f4f5f7" width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top" align="left" colspan="2"><img src="../images/main_title.gif" /> </td>
          <td valign="top" align="right" rowspan="2" style="border-bottom-style:solid; border-bottom-width:1px; border-bottom-color:#333333; background-color:#e3e5da;"><img src="../images/car.gif" width="312" height="200" /> </td>

        </tr>
        <tr valign="top" style="margin-top:0">
        <td style="padding-left:5px;">&nbsp;</td>
        <td valign="top" height="27" width="100%" class="menu_bar"><table>
              <tr>
                <td><a href="../admin/index.php?plg=info"
				onmouseover="changeImages('menu_main', '../images/menu_main-over.gif'); return true;"
				onmouseout="changeImages('menu_main', '../images/menu_main.gif'); return true;"
				onmousedown="changeImages('menu_main', '../images/menu_main-over.gif'); return true;"
				onmouseup="changeImages('menu_main', '../images/menu_main-over.gif'); return true;"> <img name="menu_main" src="../images/menu_main.gif" width="124" height="15" border="0" alt=""></a></td>
                <td valign="top" rowspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
                <td valign="top" rowspan="7"><table>
                    <tr>
                      <td></td>
                    </tr>
                    <tr>
                      <td><img src="../images/admin_title.gif" alt=""> </td>
                    </tr>
                    <tr>
                      <td><p>Интерфейс администратора и модератора сайта.<br />
                          Управление содержанием динамически наполняемых страниц.</p></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td><a href="index.php?plg=rasp"
				onmouseover="changeImages('menu_rasp', '../images/menu_rasp-over.gif'); return true;"
				onmouseout="changeImages('menu_rasp', '../images/menu_rasp.gif'); return true;"
				onmousedown="changeImages('menu_rasp', '../images/menu_rasp-over.gif'); return true;"
				onmouseup="changeImages('menu_rasp', '../images/menu_rasp-over.gif'); return true;"> <img name="menu_rasp" src="../images/menu_rasp.gif" width="124" height="15" border="0" alt=""></a></td>
              </tr>
              <tr>
                <td><a href="index.php?plg=person"
				onmouseover="changeImages('menu_person', '../images/menu_person-over.gif'); return true;"
				onmouseout="changeImages('menu_person', '../images/menu_person.gif'); return true;"
				onmousedown="changeImages('menu_person', '../images/menu_person-over.gif'); return true;"
				onmouseup="changeImages('menu_person', '../images/menu_person-over.gif'); return true;"> <img name="menu_person" src="../images/menu_person.gif" width="124" height="15" border="0" alt=""></a></td>
              </tr>
              <tr>
                <td><a href="index.php?plg=qa"
				onmouseover="changeImages('menu_otz', '../images/menu_otz-over.gif'); return true;"
				onmouseout="changeImages('menu_otz', '../images/menu_otz.gif'); return true;"
				onmousedown="changeImages('menu_otz', '../images/menu_otz-over.gif'); return true;"
				onmouseup="changeImages('menu_otz', '../images/menu_otz-over.gif'); return true;"> <img name="menu_otz" src="../images/menu_otz.gif" width="124" height="15" border="0" alt=""></a></td>
              </tr>
              <tr>
                <td> </td>
              </tr>
              <tr>
                <td></td>
              </tr>	
              <tr height="50">
                <td></td>
            </table></td>
        </tr>
      </table></td>
    <td class="bg_right" rowspan="4"></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td style="padding:5px;"><table>
        <tr valign="top">
		<? if($plg=='info'): ?>
          <td><table class="simple_blok" width="200">
              <tr>
                <td colspan="2" style="padding-top:7px; padding-bottom:5px; padding-left:5px;"><img src="../images/rem_title.gif" /> </td>
              </tr>
              <tr>
                <td valign="top" class="text_blok"></td>
                <td class="text_blok"><p style="color:#FF0000">При редактировании данных обращайте внимание на информацию, содержащуюся в данном блоке.</p></td>
              </tr>
              <tr >
                <td valign="top" class="text_blok" style="padding-bottom:7px;"></td>
                <td class="text_blok" style="padding-bottom:7px;"><p>Все, что касается процесса администрирования: размер загружаемых изображений, особенности работы в административном разделе сайта, отображается в данном текстовом блоке.</p></td>
              </tr>
            </table></td>
		<? elseif($plg=='rasp'): ?>	
          <td><table class="simple_blok" width="200">
              <tr>
                <td colspan="2" style="padding-top:7px; padding-bottom:5px; padding-left:5px;"><img src="../images/rem_title.gif" /> </td>
              </tr>
              <tr>
                <td valign="top" class="text_blok"></td>
                <td class="text_blok"><p style="color:#FF0000">Редактирование данных таблицы "Расписание".</p></td>
              </tr>
              <tr >
                <td valign="top" class="text_blok" style="padding-bottom:7px;"></td>
                <td class="text_blok" style="padding-bottom:7px;"><p>В данную таблицу вносят данные по каждой учебной группе, указывая ее номер (1, 2, ...). Для того, чтобы внести информацию для повторно сдающих учащихся, создают специальную группу, с указанием в поле номера группы - "Повторники". Предусмотрена возможность внесения произвольной информации - поле "Примечание".</p></td>
              </tr>
            </table></td>		
		<? elseif($plg=='person'): ?>	
          <td><table class="simple_blok" width="200">
              <tr>
                <td colspan="2" style="padding-top:7px; padding-bottom:5px; padding-left:5px;"><img src="../images/rem_title.gif" /> </td>
              </tr>
              <tr>
                <td valign="top" class="text_blok"></td>
                <td class="text_blok"><p style="color:#FF0000">Редактирование таблицы "Персонал".</p></td>
              </tr>
              <tr >
                <td valign="top" class="text_blok" style="padding-bottom:7px;"></td>
                <td class="text_blok" style="padding-bottom:7px;"><p>В данную таблицу вносят данные о преподавателях: фотография, Ф.И.О., звание/должность. Перед загрузкой, фото-изображение сотрудника необходимо подготовить. Размер изображения: 140 х 140 pix, разрешение не менее 96 dpi.</p><p>Для того, чтобы фотоизображение было связано с конкретным элементом таблицы персонала, необходимо следить за тем, чтобы название файла изображения соответствовала полю "Код" элемента таблицы, например если в поле кода указываем ivanov, то файл загружаемого фотоизображения сотрудника должен быть - ivanov.gif. Перед загрузкой файлов изображений на сайт лучше заранее их подготовить.</p></td>
              </tr>
            </table></td>		
		<? elseif($plg=='qa'): ?>	
          <td><table class="simple_blok" width="200">
              <tr>
                <td colspan="2" style="padding-top:7px; padding-bottom:5px; padding-left:5px;"><img src="../images/rem_title.gif" /> </td>
              </tr>
              <tr>
                <td valign="top" class="text_blok"></td>
                <td class="text_blok"><p style="color:#FF0000">Редактирование данных таблицы "Отзывы".</p></td>
              </tr>
              <tr >
                <td valign="top" class="text_blok" style="padding-bottom:7px;"></td>
                <td class="text_blok" style="padding-bottom:7px;"><p>Для того, чтобы отзыв отображался на странице просмотра отзывов, необходимо установить соответствующий флаг "Отображать". В поле содержания отзыва можно добавлять комментарии администратора. Не забывайте выделять и подписывать подобные комментарии.</p></td>
              </tr>
            </table></td>		
		<? endif; ?>
          <td><table class="simple_blok" cellspacing="10">
              <tr>
                <td width="100%" height="100%">