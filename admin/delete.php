<html>
<head>
<title>Удаление информации</title>
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

</script>
<body onLoad="window.focus()" bgcolor="#716b49">
<?
require_once('../db.php');

switch ($plg) {
	case 'rasp':
		$table = 'as_rasp';
		break;
	case 'person':
		$table = 'as_persones';
		break;
	case 'qa':
		$table = 'as_board';
		break;
	default:
		$table = 'as_' . $plg;
		break;
}

$sql = "delete from $table where id = $id";
$result = @mysql_query($sql);
if ($result) {
	$st = "Информация удалена";
} else {
	$st = "Ошибка удаления: " . mysql_error();
}

echo "<table width='100%' height='340' border='0' class='simple_blok'>";
echo "<tr height='330'>";
echo "<td align='center' valign='middle'><h3><a href='javascript:mclose()'>$st</a></h3></td>";
echo "</tr>";
echo "<tr>";
echo "<td align='right' valign='middle'><a href='javascript:mclose()'>Закрыть</a></td>";
echo "</tr>";
echo "</table>";

?>

</body>
</html>