<?
global $plg, $page;

require_once('../session.php');
require_once('../db.php');
//------------------------------------------------

$funct = "";
switch (@$plg) {
	case 'rasp':
		require_once('f_rasp_list.php');
		$funct .= GetRasp();		
		break;
	case 'person':
		require_once('f_person_list.php');
		$funct .= GetPersonList();
		break;
	case 'qa':
		require_once('f_board_list.php');
		$funct .= GetBoard(@$page);		
		break;
	default:
		$plg = 'info';
		require_once('f_info.php');
		$funct .= GetInfo();
		break;
}

require_once('header.php');

echo $funct;

require_once('footer.php');

?>