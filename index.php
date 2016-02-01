<?
global $plg, $page;

require_once('session.php');
require_once('db.php');
//------------------------------------------------
$ffind = "";
switch (@$plg) {
	case 'home':		
		$funct = "<table>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/default.htm"));
		break;
	case 'about':
		$funct = "<table><tr><td>";
		$funct .= "<img src='images/about_title.gif' border='0'></td>";
		$funct .= "</tr>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/about.htm"));
		break;	
	case 'services':
		$funct = "<table><tr><td>";
		$funct .= "</td>";
		$funct .= "</tr>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/services.htm"));
		break;	
	case 'rasp':		
		require_once('f_rasp_list.php');
		$funct = "<table><tr><td>";
		$funct .= "<img src='images/rasp_title.gif' border='0'></td>";
		$funct .= "</tr>";
                $funct .= "<tr collspan='2'><td></td></tr></table>";			
		$funct .= GetRasp();
		break;
	case 'persones':
		require_once('f_person_list.php');	
		$funct = "<table><tr><td>";
		$funct .= "<img src='images/person_title.gif' border='0'></td><td align='right'></td>";
		$funct .= "</tr>"; 
		$funct .= "<tr collspan='2' width='100%'><td></td></tr></table>";	
		$funct .= GetPersonList(@$page);
		break;			
	case 'qa':
		require_once('f_board_list.php');
		$funct = "<table><tr><td>";
		$funct .= "<img src='images/otz_title.gif' border='0'></td>";
		$funct .= "</tr>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";		
		$funct .= GetBoard(@$page,'');
		break;
	case 'contactes':
		$funct = "<table><tr><td>";
		$funct .= "<img src='images/contactes_title.gif' border='0'></td></tr>";
		#
		# Changed with v 1.04 05.05.07 Add link on the mail box
		#		
		$funct .= "<tr><td><a href='mailto:info@autosar.ru'>Отправить сообщение на электронный почтовый ящик</a></td></tr>";

		$funct .= "<tr collspan='2'><td></td></tr></table>";	
		$funct .= implode('', file("stat/contactes.htm"));
		break;
	case 'pdd':		
		$funct = "<table>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/pdd.htm"));
		break;
	case 'main_info':
		$funct = "<table><tr><td>";
		$funct .= "<h2>Основные сведения</h2></td>";
		$funct .= "</tr>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/main_info.htm"));
		break;
	case 'structure':
		$funct = "<table><tr><td>";
		$funct .= "<h2>Структура и органы управления образовательной организации</h2></td>";
		$funct .= "</tr>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/structure.htm"));
		break;
	case 'documents':
		$funct = "<table><tr><td>";
		$funct .= "<h2>Документы</h2></td>";
		$funct .= "</tr>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/documents.htm"));
		break;
	case 'education':
		$funct = "<table><tr><td>";
		$funct .= "<h2>Образование</h2></td>";
		$funct .= "</tr>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/education.htm"));
		break;
	case 'manage':
		$funct = "<table><tr><td>";
		$funct .= "<h2>Руководство. Педагогический (научно-педагогический) персонал</h2></td>";
		$funct .= "</tr>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/manage.htm"));
		break;
  case 'material':
  	$funct = "<table><tr><td>";
  	$funct .= "<h2>Материально-техническое обеспечение и оснащенность образовательного процесса</h2></td>";
  	$funct .= "</tr>";
  	$funct .= "<tr collspan='2'><td></td></tr></table>";
  	$funct .= implode('', file("stat/material.htm"));
		break;
  case 'payment':
  	$funct = "<table><tr><td>";
  	$funct .= "<h2>Платные образовательные услуги</h2></td>";
  	$funct .= "</tr>";
  	$funct .= "<tr collspan='2'><td></td></tr></table>";
  	$funct .= implode('', file("stat/payment.htm"));
		break;
  case 'finance':
  	$funct = "<table><tr><td>";
  	$funct .= "<h2>Финансово-хозяйственная деятельность</h2></td>";
  	$funct .= "</tr>";
  	$funct .= "<tr collspan='2'><td></td></tr></table>";
  	$funct .= implode('', file("stat/finance.htm"));
		break;
  case 'standarts':
  	$funct = "<table><tr><td>";
  	$funct .= "<h2>Образовательные стандарты</h2></td>";
  	$funct .= "</tr>";
  	$funct .= "<tr collspan='2'><td></td></tr></table>";
  	$funct .= implode('', file("stat/standarts.htm"));
		break;
	default:
?>
<!-- Update block begin. Insert counter v 1.03  03.05.07-->
<!--begin of Top100-->
<a href="http://top100.rambler.ru/top100/"><img src="http://counter.rambler.ru/top100.cnt?1124232" alt="Rambler's Top100" width=1 height=1 border=0></a> <!--end of Top100 code-->
<!-- Update block finish. Insert counter v 1.03  03.05.07-->
<?	
		$plg = 'home';
		$funct = "<table>";
		$funct .= "<tr collspan='2'><td></td></tr></table>";
		$funct .= implode('', file("stat/default.htm"));
		break;
}

require_once('header.php');

echo $funct;

require_once('footer.php');

?>