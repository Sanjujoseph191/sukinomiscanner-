<?php
class IFSadmin{
var $bodyBgCol			= "#FFFFCC";
var $bodyBgImg			= "conf/defaultImg/transparent_1x1.gif";
var $bodyCol			= "#000000";
var $bodyFontFace		= "Verdana,Arial,Helvetica,sans-serif;";
var $bodyFontSize		= "12px";
var $bodyFontWeight 	= "bold";

var $wrapperWidth 		= "778px"; //100%
var $wrapperBorderCol	= "#FF0000";
var $wrapperBorderWidth	= "1px";
var $wrapperBorderStyle	= "solid";
var $wrapperBgCol		= "#FFEAAB";
var $wrapperBgImg		= "conf/defaultImg/transparent_1x1.gif";
var $wrapperCol			= "#00FF88";
var $wrapperFontFace	= "Verdana,Arial,Helvetica,sans-serif;";
var $wrapperFontSize	= "10px";
var $wrapperFontWeight 	= "normal";

var $headerHeight 		= "120px"; //100%
var $headerBorderCol	= "#FF0000";
var $headerBorderWidth	= "0px";
var $headerBorderStyle	= "solid";
var $headerBgCol		= "#FFEAAB";
var $headerBgImg		= "conf/defaultImg/transparent_1x1.gif";
var $headerCol			= "#FF8800";
var $headerFontFace		= "Verdana,Arial,Helvetica,sans-serif;";
var $headerFontSize		= "20px";
var $headerFontWeight 	= "normal";

var $footerHeight 		= "40px"; //100%
var $footerBorderCol	= "#FF0000";
var $footerBorderWidth	= "0px";
var $footerBorderStyle	= "solid";
var $footerBgCol		= "#FFEAAB";
var $footerBgImg		= "conf/defaultImg/transparent_1x1.gif";
var $footerCol			= "#FF8800";
var $footerFontFace		= "Verdana,Arial,Helvetica,sans-serif;";
var $footerFontSize		= "9px";
var $footerFontWeight 	= "normal";

var $menubarHeight 		= "40px"; //100%
var $menubarBorderCol	= "#FF0000";
var $menubarBorderWidth	= "1px";
var $menubarBorderStyle	= "solid";
var $menubarBgCol		= "#BECB98";
var $menubarBgImg		= "conf/defaultImg/transparent_1x1.gif";
var $menubarCol			= "#FF8800";
var $menubarFontFace	= "Verdana,Arial,Helvetica,sans-serif;";
var $menubarFontSize	= "9px";
var $menubarFontWeight 	= "normal";

var $containerBorderCol	= "#FF0000";
var $containerBorderWidth	= "0px";
var $containerBorderStyle	= "dotted";
var $containerBgCol		= "#ccccff";
var $containerBgImg		= "conf/defaultImg/transparent_1x1.gif";
var $containerCol		= "#ffffff";
var $containerFontFace	= "Verdana,Arial,Helvetica,sans-serif;";
var $containerFontSize	= "10px";
var $containerFontWeight= "normal";
var $containerHeight	= "300px";

var $dataBorderCol		= "#FF0000";
var $dataBorderWidth	= "1px";
var $dataBorderStyle	= "solid";
var $dataBgCol			= "#FFFFFF";
var $dataBgImg			= "conf/defaultImg/transparent_1x1.gif";
var $dataCol			= "#ffffff";
var $dataFontFace		= "Verdana,Arial,Helvetica,sans-serif;";
var $dataFontSize		= "10px";
var $dataFontWeight 	= "normal";
var $dataHeight			= "200px";

var $dataheadBorderCol	= "#FF0000";
var $dataheadBorderWidth= "1px";
var $dataheadBorderStyle= "solid";
var $dataheadBgCol		= "#998888";
var $dataheadBgImg		= "conf/defaultImg/transparent_1x1.gif";
var $dataheadCol		= "#ffffff";
var $dataheadFontFace	= "Verdana,Arial,Helvetica,sans-serif;";
var $dataheadFontSize	= "10px";
var $dataheadFontWeight = "bold";
var $dataheadHeight			= "30px";

var $dataR0BorderCol	= "#FF0000";
var $dataR0BorderWidth	= "1px";
var $dataR0BorderStyle	= "dotted";
var $dataR0BgCol		= "#aaaaaa";
var $dataR0BgImg		= "conf/defaultImg/transparent_1x1.gif";
var $dataR0Col			= "#FFFF00";
var $dataR0FontFace		= "Verdana,Arial,Helvetica,sans-serif;";
var $dataR0FontSize		= "10px";
var $dataR0FontWeight 	= "normal";
var $dataR0Height		= "25px";

var $dataR1BorderCol	= "#FF0000";
var $dataR1BorderWidth	= "1px";
var $dataR1BorderStyle	= "dotted";
var $dataR1BgCol		= "#999999";
var $dataR1BgImg		= "conf/defaultImg/transparent_1x1.gif";
var $dataR1Col			= "#00FFFF";
var $dataR1FontFace		= "Verdana,Arial,Helvetica,sans-serif;";
var $dataR1FontSize		= "10px";
var $dataR1FontWeight 	= "normal";
var $dataR1Height		= "25px";

var $datafooterBorderCol		= "#FF0000";
var $datafooterBorderWidth	= "0px";
var $datafooterBorderStyle	= "dotted";
var $datafooterBgCol			= "#cccccc";
var $datafooterBgImg			= "conf/defaultImg/transparent_1x1.gif";
var $datafooterCol			= "#000000";
var $datafooterFontFace		= "Verdana,Arial,Helvetica,sans-serif;";
var $datafooterFontSize		= "10px";
var $datafooterFontWeight 	= "normal";
var $datafooterHeight		= "15px";

var $anchorLinkCol				="#FF0000";
var $anchorHoverCol				="#FFFF00";
var $anchorActiveCol			="#FF0000";
var $anchorVisitedCol			="#FF0000";

var $menuThumbBgCol			= "#eeeeee";
var $menuThumbBorderCol		= "#aaaaaa";
var $menuThumbBorderWidth	= "1px";
var $menuThumbBorderStyle   = "solid";
var $menuThumbOverBgCol			= "#FFFFFF";
var $menuThumbOverBorderCol		= "#FF0000";
var $menuThumbOverBorderWidth	= "1px";
var $menuThumbOverBorderStyle   = "solid";


var $menuItemCol 		= "#A4AA41"; //100%
var $menuItemOverCol 		= "#FFFF00"; //100%
var $menuItemOverBorderCol ="#999999";
var $menuItemIconBgCol		="#EEEEEE";
var $menuItemSubOverBorderCol ="#999999";


var $siteTitle		= "iFactor Cpanel";

var $styles = array();
var $menus = array();




//methods

	function IFSadmin(){
		$this->styles["body"] = array (
								"background" => "#FFFFFF"	,
								"background-image"	=> "conf/defaultImg/transparent_1x1.gif",
								"color" => "#000000",
								"font-family" => "Verdana,Arial,Helvetica,sans-serif",
								"font-size" => "10px",
								"font-weight" => "normal",
								"margin" => "0px",
								"padding" => "0px 0px 0px 0px"
								);

		$this->styles["a:link"] = array(
								"color" => "#000066",
								"text-decoration" => "none"
								);

		$this->styles["a:hover"] = array(
								"color" => "#0000CC",
								"text-decoration" => "none"
								);

		$this->styles["a:active"] = array(
								"color" => "#000066",
								"text-decoration" => "none"
								);
		$this->styles["a:visited"] = array(
								"color" => "#000066",
								"text-decoration" => "none"
								);
		$this->styles[".menuThumb"]	= array (
				"background" => "#f6f6f6",
				"padding" => "1px 1px 1px 1px",
				"border-color" => "#aaaaaa",
				"border-width" => "1px",
				"border-style" => "solid",
				"padding-top"	=> "3px",
				"CURSOR"	=> "pointer"
				);
		$this->styles[".menuThumb:hover"]	= array (
				"background" => "#FFFFFF",
				"padding" => "1px 1px 1px 1px",
				"border-color" => "#990000",
				"border-width" => "1px",
				"border-style" => "solid",
				"padding-top"	=> "3px"
				);

	}

	function IFS_Title(){
	//Get the page title
		return $this->siteTitle;
	}

	function ISF_SetStyle($class,$attribute,$value){
		if (!empty($class) and !empty ($attribute) and !empty ($value)){
			$this->styles["$class"]["$attribute"] = $value;
		}
	}

	function IFS_MenuStyle(){
	//return the style sheet classes for the JS menu
	$menuStyle="
.ThemeOfficeMenu,.ThemeOfficeSubMenuTable{
	font-family:	verdana, arial, sans-serif;
	font-size:	10px;
	padding:	0;
	white-space:	nowrap;
	cursor:		default;
}
.ThemeOfficeSubMenu{
	position:	absolute;
	visibility:	hidden;
	z-index:	100;
	border:		0;
	padding:	1px;
	background-color:	$this->menuItemOverBorderCol;
	overflow:	visible;
	border:		1px solid ;
	filter:progid:DXImageTransform.Microsoft.Shadow(color=#BDC3BD, Direction=135, Strength=4);
}

.ThemeOfficeSubMenuTable{
	overflow:	visible;
}
.ThemeOfficeMainItem,.ThemeOfficeMainItemHover,.ThemeOfficeMainItemActive,
.ThemeOfficeMenuItem,.ThemeOfficeMenuItemHover,.ThemeOfficeMenuItemActive{
	border:		0;
	cursor:		default;
	white-space:	nowrap;
}
.ThemeOfficeMainItem{
	background-color:	$this->menuItemCol;
}

.ThemeOfficeMainItemHover,.ThemeOfficeMainItemActive{
	background-color:	$this->menuItemOverCol;
}

.ThemeOfficeMenuItem{
	background-color:	$this->menuItemCol;
}

.ThemeOfficeMenuItemHover,.ThemeOfficeMenuItemActive{
	background-color:	$this->menuItemOverCol;
}

.ThemeOfficeMainItem{
	padding:	1px;
	border:		0;
}

td.ThemeOfficeMainItemHover,td.ThemeOfficeMainItemActive{
	padding:	0px;
	border:		1px solid $this->menuItemOverBorderCol;
}

.ThemeOfficeMainFolderLeft,.ThemeOfficeMainItemLeft,
.ThemeOfficeMainFolderText,.ThemeOfficeMainItemText,
.ThemeOfficeMainFolderRight,.ThemeOfficeMainItemRight{
	background-color:	inherit;
}

td.ThemeOfficeMainFolderLeft,td.ThemeOfficeMainItemLeft{
	padding-top:	2px;
	padding-bottom:	2px;
	padding-left:	0px;
	padding-right:	2px;
	border-top:	1px solid $this->menuItemSubOverBorderCol;
	border-bottom:	1px solid $this->menuItemSubOverBorderCol;
	border-left:	1px solid $this->menuItemSubOverBorderCol;
	background-color:	inherit;
}

td.ThemeOfficeMainFolderText,td.ThemeOfficeMainItemText{
	padding-top:	2px;
	padding-bottom:	2px;
	padding-left:	5px;
	padding-right:	5px;
	border-top:	1px solid $this->menuItemSubOverBorderCol;
	border-bottom:	1px solid $this->menuItemSubOverBorderCol;
	background-color:	inherit;
	white-space:	nowrap;
}

td.ThemeOfficeMainFolderRight,td.ThemeOfficeMainItemRight{
	padding-top:	2px;
	padding-bottom:	2px;
	padding-left:	0px;
	padding-right:	0px;
	border-top:	1px solid $this->menuItemSubOverBorderCol;
	border-bottom:	1px solid $this->menuItemSubOverBorderCol;
	border-right:	1px solid $this->menuItemSubOverBorderCol;
	background-color:	inherit;
}

tr.ThemeOfficeMainItem td.ThemeOfficeMainFolderLeft,
tr.ThemeOfficeMainItem td.ThemeOfficeMainItemLeft{
	padding-top:	3px;
	padding-bottom:	3px;
	padding-left:	1px;
	padding-right:	2px;
	white-space:	nowrap;
	border:		0;
	background-color:	inherit;
}

tr.ThemeOfficeMainItem td.ThemeOfficeMainFolderText,
tr.ThemeOfficeMainItem td.ThemeOfficeMainItemText{
	padding-top:	3px;
	padding-bottom:	3px;
	padding-left:	5px;
	padding-right:	5px;
	border:		0;
	background-color:	inherit;
}

tr.ThemeOfficeMainItem td.ThemeOfficeMainItemRight,
tr.ThemeOfficeMainItem td.ThemeOfficeMainFolderRight{
	padding-top:	3px;
	padding-bottom:	3px;
	padding-left:	0px;
	padding-right:	1px;
	border:		0;
	background-color:	inherit;
}

.ThemeOfficeMenuFolderLeft,.ThemeOfficeMenuItemLeft{
	padding-top:	2px;
	padding-bottom:	2px;
	padding-left:	1px;
	padding-right:	3px;
	border-top:	1px solid $this->menuItemSubOverBorderCol;
	border-bottom:	1px solid $this->menuItemSubOverBorderCol;
	border-left:	1px solid $this->menuItemSubOverBorderCol;
	background-color:	inherit;
	white-space:	nowrap;
}

.ThemeOfficeMenuFolderText,.ThemeOfficeMenuItemText{
	padding-top:	2px;
	padding-bottom:	2px;
	padding-left:	5px;
	padding-right:	5px;
	border-top:	1px solid $this->menuItemSubOverBorderCol;
	border-bottom:	1px solid $this->menuItemSubOverBorderCol;
	background-color:	inherit;
	white-space:	nowrap;
}

.ThemeOfficeMenuFolderRight,.ThemeOfficeMenuItemRight{
	padding-top:	2px;
	padding-bottom:	2px;
	padding-left:	0px;
	padding-right:	0px;
	border-top:	1px solid $this->menuItemSubOverBorderCol;
	border-bottom:	1px solid $this->menuItemSubOverBorderCol;
	border-right:	1px solid $this->menuItemSubOverBorderCol;
	background-color:	inherit;
	white-space:	nowrap;
}

.ThemeOfficeMenuItem .ThemeOfficeMenuFolderLeft,
.ThemeOfficeMenuItem .ThemeOfficeMenuItemLeft{
	padding-top:	3px;
	padding-bottom:	3px;
	padding-left:	2px;
	padding-right:	3px;
	white-space:	nowrap;
	border:		0;
	background-color:	$this->menuItemIconBgCol;
}

.ThemeOfficeMenuItem .ThemeOfficeMenuFolderText,
.ThemeOfficeMenuItem .ThemeOfficeMenuItemText{
	padding-top:	3px;
	padding-bottom:	3px;
	padding-left:	5px;
	padding-right:	5px;

	border:		0;
	background-color:	inherit;
}

.ThemeOfficeMenuItem .ThemeOfficeMenuFolderRight,
.ThemeOfficeMenuItem .ThemeOfficeMenuItemRight{
	padding-top:	3px;
	padding-bottom:	3px;
	padding-left:	0px;
	padding-right:	1px;
	border:		0;
	background-color:	inherit;
}

.ThemeOfficeMenuSplit{
	margin:		2px;
	height:		1px;
	overflow:	hidden;
	background-color:	inherit;
	border-top:	1px solid $this->menuItemIconBgCol;
}
.ThemeOfficeMenuItem img.seq1{
	display:	inline;
}
.ThemeOfficeMenuItemHover seq2,
.ThemeOfficeMenuItemActive seq2{
	display:	inline;
}

.ThemeOfficeMenuItem .seq2,
.ThemeOfficeMenuItemHover .seq1,
.ThemeOfficeMenuItemActive .seq1{
	display:	none;
}

"	;
	return $menuStyle;
	}


	function IFS_Styles(){
	//Returns the Style Sheets for the page
	$style="<style>
";

	foreach($this->styles as $class => $class1 ){
		$style .=" $class{
";
		foreach ($class1 as $v=>$k) {
			if ($v=='background-image') {
				$style .= "	$v:url($k);
";
			}
			else { $style .= "	$v:$k;
" ;
			}
		}
		$style .="}
";
	}
	$style .= $this->IFS_MenuStyle();
	$style .="
	</style>
	";
	return $style;
	}


	function IFS_SetThumbMenu	(	$menuThumbBgCol,
									$menuThumbBorderCol,
									$menuThumbBorderWidth,
									$menuThumbBorderStyle,
									$menuThumbOverBgCol,
									$menuThumbOverBorderCol,
									$menuThumbOverBorderWidth,
									$menuThumbOverBorderStyle)
	{
		//Set the class atributes for the Thumbs menu
		if (!empty($menuThumbBgCol)) $this->menuThumbBgCol = $menuThumbBgCol;
		if (!empty($menuThumbBorderCol)) $this->menuThumbBorderCol = $menuThumbBorderCol;
		if (!empty($menuThumbBorderWidth)) $this->menuThumbBorderWidth = $menuThumbBorderWidth;
		if (!empty($menuThumbBorderStyle)) $this->menuThumbBorderStyle = $menuThumbBorderStyle;
		if (!empty($menuThumbOverBgCol)) $this->menuThumbOverBgCol = $menuThumbOverBgCol;
		if (!empty($menuThumbOverBorderCol)) $this->menuThumbOverBorderCol = $menuThumbOverBorderCol;
		if (!empty($menuThumbOverBorderWidth)) $this->menuThumbOverBorderWidth = $menuThumbOverBorderWidth;
		if (!empty($menuThumbOverBorderStyle)) $this->menuThumbOverBorderStyle = $menuThumbOverBorderStyle;
	}

	function IFS_SetJsMenu(
							$menuItemCol,
							$menuItemOverCol,
							$menuItemOverBorderCol,
							$menuItemIconBgCol,
							$menuItemSubOverBorderCol)
	{
		//Set the class atributes for the JS menu
		if (!empty($menuItemCol)) $this->menuItemCol = $menuItemCol;
		if (!empty($menuItemOverCol)) $this->menuItemOverCol = $menuItemOverCol;
		if (!empty($menuItemOverBorderCol)) $this->menuItemOverBorderCol = $menuItemOverBorderCol;
		if (!empty($menuItemIconBgCol)) $this->menuItemIconBgCol = $menuItemIconBgCol;
		if (!empty($menuItemSubOverBorderCol)) $this->menuItemSubOverBorderCol = $menuItemSubOverBorderCol;

	}

	function IFS_SetTitle ($siteTitle){
		if (!empty($siteTitle)) $this->siteTitle = $siteTitle;
	}

	function IFS_ShowThumbmenu($id){

		$width = 110;
		$dvWidth = $width-10;
		$dvHeight = intval($dvWidth*.7);

		$perRow = floor (778 / $width );
		$menu = $this->menus[$id];
		$menuCount =  count($menu);

		if($menuCount>=$perRow){
			$sqrt = ceil(sqrt($menuCount));
			$perRow = ($sqrt>$perRow)?$perRow:$sqrt;
			$rowCount = ($menuCount%$perRow)?(intval($menuCount/$perRow)+1):intval($menuCount/$perRow);
		} else $rowCount = 1;

		$OP = "<table border=0>";
		$k=0;
		for ($i=0;$i<$rowCount; $i++){
			$OP .= "<tr>";
			for ($j=0;$j<$perRow; $j++){
				$OP .= "<td align='center' valign='middle'>";
				if (isset($menu[$k])){
					$text = $menu[$k][0];
					$url = $menu[$k][1];
					$target = $menu[$k][4];
					$descr = $menu[$k][5];
					$img = (!empty($menu[$k][3]))?"<img src='".$menu[$k][3]."' border='0'  alt='$descr'><br>":"";
					$target = $menu[$k][4];
					$descr = $menu[$k][5];

					$OP .= "<a href='$url' target='$target' alt='$descr' title='$descr'>
					<div id='menu$k' $JSCode style='width:".$dvWidth."px; height:".$dvHeight."px;' class='menuThumb'>
						<a href='$url' target='$target' alt='$descr' title='$descr'>$img</a>
						<a href='$url' target='$target' alt='$descr' title='$descr'>$text</a>
					</div></a>";
				}

				$OP .= "</td>";
				$k++;
			}
			$OP .= "</tr>";
		}
		$OP .= "</table>";
	return $OP;
	}



function addItem(
				$id,
				$text,
				$url,
				$icon,
				$iconB,
				$target,
				$descr,
				$child=""
				)
	{
		if (empty($id)) {  return; }
		if (empty($child)) $this->menus["$id"][] = array ($text,$url,$icon,$iconB,$target,$descr);
		else $this->menus["$id"][] = array ($text,$url,$icon,$iconB,$target,$descr,$child);
	}

function getItem($id) {
	$c = count($this->menus[$id]);
	$i=0;
	foreach($this->menus[$id] as $item){
		$i++;
		$text = $item[0];
		$url = $item[1];
		$img = (empty($item[2]))?"&nbsp;&nbsp;":"<img src=".$item[2].">";
		$target = $item[4];
		$descrp	=$item[5];
		$chld = $item[6];
		echo "['$img', '$text', '$url', '$target', '$descrp'
		";

		//echo $item[0]." => ".$item[1]."<br>";
		if (!empty($chld) and is_array($this->menus[$chld])){
			 echo ",
			 ";
			 $this->getItem($chld);
		}
		echo "]".(($c!=$i)?",":"")."
		";
	}

}
function showMenu($id){
	echo "
		<div id='myMenuID'></div>
		<script language='JavaScript' type='text/javascript'>
		<!--
		var myMenu =
		[
	";
	$this->getItem($id) ;
	echo"
		];
		cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
		</script>
	";
}

}
?>
