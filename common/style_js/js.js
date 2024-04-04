/***************************************************************************/
/*     PROGRAMMER     :  SDYA                                              */
/*     SCRIPT NAME    :  js.js			                                   */
/*     CREATED ON     :  08/MAY/2006                                       */
/*     LAST MODIFIED  :  12/MAY/2006                                       */
/*                                                                         */
/*     Java Script Functions For the Front End                             */
/***************************************************************************/

    /*----------------------------------------------------------------
    Description   :- function to validate an email id
    Programmer    :- SDYA
    Last Modified :- 08/MAY/2006
    -------------------------------------------------------------------*/
	function isBadEmail(strg) {
		email_array = strg.split('@');
		if (email_array.length != 2) return true;
		if (email_array[1].split(".").length < 2) return true;
		if (email_array[1].split(".")[1].length < 1) return true;
		if (strg.indexOf('@') < 1) return true;
		if (strg.indexOf(' ') != -1) return true;
		if (email_array[1].indexOf('.') < 1) return true;
		if (strg.length < 5) return true;
		return false;
	}

    /*----------------------------------------------------------------
    Description   :- function to select category
    Programmer    :- SDYA
    Last Modified :- 12/MAY/2006
    -------------------------------------------------------------------*/
	function category_select()
	{
		document.frm_index.category.value	= document.frm_index.cbo_category.value;
		document.frm_index.company.value	= "";
		//document.frm_index.action 			= "index.php?act=cards_by_category&catid="+document.frm_index.category.value;
		document.frm_index.action 			= "cards_by_category-1-"+document.frm_index.category.value+".html";
		document.frm_index.submit();
	}

    /*----------------------------------------------------------------
    Description   :- function to select company
    Programmer    :- SDYA
    Last Modified :- 12/MAY/2006
    -------------------------------------------------------------------*/
	function companyy_select()
	{
		document.frm_index.company.value	= document.frm_index.cbo_company.value;
		document.frm_index.category.value	= "";
		//document.frm_index.action 			= "index.php?act=cards_by_company&cid="+document.frm_index.company.value;
		document.frm_index.action 			= "cards_by_company-1-"+document.frm_index.company.value+".html";
		document.frm_index.submit();
	}
