/***************************************************************************/
/*     PROGRAMMER     :  SDYA                                              */
/*     SCRIPT NAME    :  admin.js			                               */
/*     CREATED ON     :  08/MAY/2006                                       */
/*     LAST MODIFIED  :  16/MAY/2006                                       */
/*                                                                         */
/*     Java Script Functions For the Admin Panel                           */
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
    Description   :- function to change the style on mouse over
    Programmer    :- SDYA
    Last Modified :- 08/MAY/2006
    -------------------------------------------------------------------*/
    function pviiClassNew(obj, new_style)
    {
  		obj.className=new_style;
	}

    /*----------------------------------------------------------------
    Description   :- function to validate the login form
    Programmer    :- SDYA
    Last Modified :- 08/MAY/2006
    -------------------------------------------------------------------*/
    function login_validate()
    {
        //user name
        if(document.frm_login.txt_username.value=='')
        {
            alert("Please enter your user name");
            document.frm_login.txt_username.focus();
            return false;
        }
        //password
        if(document.frm_login.txt_password.value=='')
        {
            alert("Please enter your password");
            document.frm_login.txt_password.focus();
            return false;
        }
        return true;
    }

    /*----------------------------------------------------------------
    Description   :- function to confirm the deletion of a record
    Programmer    :- SDYA
    Last Modified :- 08/MAY/2006
    -------------------------------------------------------------------*/
    function deleteconfirm(page,name,id)
    {
    	if(confirm("Are you sure you want to delete this " + name + "?\nIf 'OK' all the information associated with this " + name + " will be removed from the system."))
           window.location = page + "?id=" + id + "&name=" + name ;
    }

    /*----------------------------------------------------------------
    Description   :- function to confirm the status updating of a record
    Programmer    :- SDYA
    Last Modified :- 08/MAY/2006
    -------------------------------------------------------------------*/
    function updatestatusconfirm(page,name,id,status,topicid,userid)
    {
		if(topicid==undefined) topicid = 0;
    	if(confirm("Are you sure you want to update the status of this " + name + "?"))
        	window.location = page + "?id=" + id + "&status=" + status + "&name=" + name + "&topicid=" + topicid + "&userid=" +userid;
    }

	 /*----------------------------------------------------------------
    Description   :- function to confirm the approval status updating of a record
    Programmer    :- SDYA
    Last Modified :- 28/JAN/2005
    -------------------------------------------------------------------*/
    function updateapprovestatusconfirm(page,name,id,approvestatus)
    {
			if(confirm("Are you sure you want to update the status of this " + name + "?"))
        	window.location = page + "?id=" + id + "&approvestatus=" + approvestatus + "&name=" + name;
    }
	/*----------------------------------------------------------------
    Description   :- function to confirm the archieval of an announcement
    Programmer    :- SREEN
    Last Modified :- 13/JUN/2006
    -------------------------------------------------------------------*/
    function archieveconfirm(page,name,id)
    {
    	if(confirm("Are you sure you want to archive this " + name + "?\nIf 'OK' all the information associated with this " + name + " will be archived from the system."))
           window.location = page + "?id=" + id + "&name=" + name + "$archieved=0";
    }
	/*----------------------------------------------------------------
    Description   :- function to confirm the activation of an announcement
    Programmer    :- SREEN
    Last Modified :- 13/JUN/2006
    -------------------------------------------------------------------*/
    function activateconfirm(page,name,id)
    {
    	if(confirm("Are you sure you want to activate this " + name + "?\nIf 'OK' all the information associated with this " + name + " will be activated."))
           window.location = page + "?id=" + id + "&name=" + name + "$archieved=1" ;
    }
    /*----------------------------------------------------------------
    Description   :- function to validate change password form
    Programmer    :- SDYA
    Last Modified :- 08/MAY/2006
    -------------------------------------------------------------------*/
    function changepassword_validate()
    {
		//old password
    	if(document.frm_password.txt_oldpassword.value=='')
        {
        	alert("Please enter your old password");
            document.frm_password.txt_oldpassword.focus();
            return false;
        }

		//new password
    	if(document.frm_password.txt_password.value=='')
        {
        	alert("Please enter your new password");
            document.frm_password.txt_password.focus();
            return false;
        }

		//retype password
    	if(document.frm_password.txt_repassword.value=='')
        {
        	alert("Please re-type your password");
            document.frm_password.txt_repassword.focus();
            return false;
        }

        //confirm password
        if(document.frm_password.txt_password.value!=document.frm_password.txt_repassword.value)
        {
			alert("Please confirm your password");
            document.frm_password.txt_repassword.focus();
            return false;
        }
    }
	/*----------------------------------------------------------------
    Description   :- function to validate the change user info form
    Programmer    :- SDYA
    Last Modified :- 08/MAY/2006
    -------------------------------------------------------------------*/
    function changeuserinfo_validate()
    {
        //user name
        if(document.frm_userinfo.txt_username.value=='')
        {
            alert("Please enter your user name");
            document.frm_userinfo.txt_username.focus();
            return false;
        }
        //check for max characters
        if(document.frm_userinfo.txt_username.value.length>15)
        {
        	alert("User name can have maximum 15 characters");
            document.frm_userinfo.txt_username.focus();
            return false;
        }
        return true;
    }
	/*----------------------------------------------------------------
    Description   :- function to validate the change email id form
    Programmer    :- SDYA
    Last Modified :- 08/MAY/2006
    -------------------------------------------------------------------*/
    function changeemailid_validate()
    {
        //emailid
        if(document.frm_emailid.txt_emailid.value=='')
        {
            alert("Please enter your email id");
            document.frm_emailid.txt_emailid.focus();
            return false;
        }
        //validate email id
        if(isBadEmail(document.frm_emailid.txt_emailid.value))
        {
        	alert("Invalid Email Id");
            document.frm_emailid.txt_emailid.focus();
            return false;
        }
        return true;
    }

    /*----------------------------------------------------------------
    Description   :- function to validate the attachment in edit page content form
    Programmer    :- Krn
    Last Modified :- 9/May/2006
    -------------------------------------------------------------------*/
    function attachment_validate()
    {
    	if(document.frm_content.txt_image.value=='')
        {
        	alert("Please choose the image file");
            document.frm_content.txt_image.focus();
            return false;
        }
        document.frm_content.mode.value  = "images";
        document.frm_content.submit();
    }

     /*----------------------------------------------------------------
    Description   :- function to remove an attachment from edit page content form
    Programmer    :- Krn
    Last Modified :- 19/May/2006
    -------------------------------------------------------------------*/
    function removeattachment(attachment)
    {
    	if(confirm("Are you sure you want to remove this image?"))
        {
        	document.frm_content.mode.value = "remove";
            document.frm_content.attachmentname.value = attachment;
            document.frm_content.submit();
        }
        return false;
    }

    /*----------------------------------------------------------------
    Description   :- function to validate contentedit
    Programmer    :- SDYA
    Last Modified :- 10/MAY/2006
    -------------------------------------------------------------------*/
    function validate_frm_content()
    {
		if(document.frm_content.txt_title.value=="")
		{
			alert("Please enter Page Title");
			document.frm_content.txt_title.focus();
			return false;
		}
		return true;
    }

    /*----------------------------------------------------------------
    Description   :- function to validate categories form
    Programmer    :- SDYA
    Last Modified :- 11/MAY/2006
    -------------------------------------------------------------------*/
	function managecategories_validate()
	{
		//category name
		if(document.frm_categories.txt_name.value=="")
		{
			alert("Please enter the category name");
			document.frm_categories.txt_name.focus();
			return false;
		}
		//description
		if(document.frm_categories.txta_desc.value=="")
		{
			alert("Please enter the category description");
			document.frm_categories.txta_desc.focus();
			return false;
		}
		return true;
	}

    /*----------------------------------------------------------------
    Description   :- function to validate companies form
    Programmer    :- SDYA
    Last Modified :- 10/MAY/2006
    -------------------------------------------------------------------*/
	function managecompanies_validate()
	{
		//name
		if(document.frm_companies.txt_name.value=="")
		{
			alert("Please enter the company name");
			document.frm_companies.txt_name.focus();
			return false;
		}
		//description
		if(document.frm_companies.txta_desc.value=="")
		{
			alert("Please enter the company description");
			document.frm_companies.txta_desc.focus();
			return false;
		}
		return true;
	}

    /*----------------------------------------------------------------
    Description   :- function to validate cards form
    Programmer    :- SDYA
    Last Modified :- 12/MAY/2006
    -------------------------------------------------------------------*/
	function managecards_validate(id)
	{
		//card name
		if(document.frm_cards.txt_name.value=="")
		{
			alert("Please enter the card name");
			document.frm_cards.txt_name.focus();
			return false;
		}
		//company name
		if(document.frm_cards.cbo_company.value=="")
		{
			alert("Please select the company name");
			document.frm_cards.cbo_company.focus();
			return false;
		}
		//category name
		if(document.frm_cards.cbo_category.value=="")
		{
			alert("Please select the category name");
			document.frm_cards.cbo_category.focus();
			return false;
		}
		if(id) ;
		else
		{
			//image
			if(document.frm_cards.txt_image.value=="")
			{
				alert("Please select an image");
				document.frm_cards.txt_image.focus();
				return false;
			}
		}
		//offers
		if(document.frm_cards.txta_offers.value=="")
		{
			alert("Please enter the card offers");
			document.frm_cards.txta_offers.focus();
			return false;
		}
		//weightage
		if(document.frm_cards.cbo_weightage.value=="")
		{
			alert("Please select the card weightage");
			document.frm_cards.cbo_weightage.focus();
			return false;
		}
		//description
		if(document.frm_cards.txta_desc.value=="")
		{
			alert("Please enter the card description");
			document.frm_cards.txta_desc.focus();
			return false;
		}
		//card type
		if(document.frm_cards.cbo_type.value=="")
		{
			alert("Please select the card type");
			document.frm_cards.cbo_type.focus();
			return false;
		}
		//card url
		if(document.frm_cards.txt_url.value=="")
		{
			alert("Please enter the card url");
			document.frm_cards.txt_url.focus();
			return false;
		}
		return true;
	}

    /*----------------------------------------------------------------
    Description   :- function to confirm the reset click
    Programmer    :- SDYA
    Last Modified :- 16/MAY/2006
    -------------------------------------------------------------------*/
    function resetclickconfirm(page,name,id)
    {
    	if(confirm("Are you sure you want to reset the click of these cards?"))
        	window.location = page + "?id=" + id;
    }

    //content management  by Krn on 19 may
	function submitForm() {
   		updateRTEs();
		//return true;
	}

     /*----------------------------------------------------------------
    Description   :- function to validate the content Edit page
    Programmer    :- Krn
    Last Modified :- 19/May/2006
    -------------------------------------------------------------------*/
    function content_validate()
    {
    	if(document.frm_content.mode.value!="images" && document.frm_content.mode.value!="remove")
        {
	        // name
	        if(document.frm_content.txt_pagetitle.value=='')
	        {
	            alert("Please enter the page title");
	            document.frm_content.txt_pagetitle.focus();
	            return false;
	        }
	        //amount
	        if(document.frm_content.txta_content.value=='')
	        {
	            alert("Please enter the page content");
	            document.frm_content.txta_content.focus();
	            return false;
	        }
        }
    }

     /*----------------------------------------------------------------
    Description   :- function to validate the content add page
    Programmer    :- Krn
    Last Modified :- 19/May/2006
    -------------------------------------------------------------------*/
    function content_add_validate()
    {
        if(document.frm_content.mode.value!="images" && document.frm_content.mode.value!="remove")
        {
            // title
            if(document.frm_content.txt_pagetitle.value=='')
            {
                alert("Please enter the page title");
                document.frm_content.txt_pagetitle.focus();
                return false;
            }
            // name
            if(document.frm_content.txt_pagename.value=='')
            {
                alert("Please enter the page name");
                document.frm_content.txt_pagename.focus();
                return false;
            }
            //content
            if(document.frm_content.txta_content.value=='')
            {
                alert("Please enter the page content");
                document.frm_content.txta_content.focus();
                return false;
            }
        }
    }
	 function confirmdeletion(page,name,id,pageno)
    {

    	if(confirm("Are you sure you want to cancel this " + name + "?"))
        	window.location = page + "?id=" + id + "&page=" + pageno ;
    }
	 function confirmuserremove(page,name,id,pageno)
    {

    	if(confirm("Are you sure you want to remove this " + name + "?"))
        	window.location = page + "?id=" + id + "&page=" + pageno ;
    }
	
	function  validateid(cnt)
	{
	var chkflag;
	chkflag="0";
	 for (i = 0; i < cnt; i++)
     {
	   id = "chkid"+i;
	   if (document.getElementById(id).checked)
	    {
		  chkflag="1" ;
	    }
	 }
	 if (chkflag=="0")
	  {
		  alert("Select the data");
		 return false;
	  }
	  else
	 return true;

}

function validaterepvalues()
{
	if((document.rep.txtto.value=="") && (document.rep.txtfrom.value==""))
	{
		alert("Please select the time frame");
        document.rep.txtto.focus();
         return false;
	}
	else 
	  return true ;
}

