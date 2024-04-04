<?php
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);



class database
{
        function connection($dbhost, $dbuser, $dbpassword, $dbname)
        {
                return $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        }
}

class admin
{

        function ifvalidlogin($username, $password, $conn)
        {

                $mysqli = $conn;

                $username = $username;
                $password = $password;

                // Prepare the SQL statement with placeholders
                $sql = "SELECT `user_id` FROM usermaster WHERE username = ? AND password = PASSWORD(?) AND User_Del != 1";

                // Prepare the statement
                $stmt = $mysqli->prepare($sql);

                if ($stmt) {
                        // Bind the parameters and execute the statement
                        $stmt->bind_param("ss", $username, $password);
                        $stmt->execute();

                        // echo $stmt->bind_param("ss", $username, $password); exit;
                        // Bind the result
                        $stmt->bind_result($user_id);



                        if ($stmt->fetch()) {
                                // User found

                                $this->user_id = $user_id;
                                $stmt->close();
                                return true;
                        }

                        $stmt->close();
                }

                return false;
        }


        function iscorrectpassword($adminid, $password)
        {
                //validate password
                $sql = "SELECT * FROM " . tbl_usermaster . "  WHERE " . fld_user_id . " = $adminid AND " . fld_password . " = '$password'";
                $res = mysql_query($sql);
                if (mysql_num_rows($res) > 0) return true;
                return false;
        }


        function updatememberpassword($adminid, $newpassword)
        {
                //update new password
                $sql = "UPDATE " . tbl_usermaster . " SET " . fld_admin_password . " = '$newpassword' WHERE " . fld_admin_id . " = $adminid";
                mysql_query($sql);
        }

        /*----------------------------------------------------------------
                Description   :- function to update the subscriptionrate  of an admin id
                Programmer    :- SDYA
                Last Modified :- 21/MAY/2006
                -------------------------------------------------------------------*/
        function  update_subscriptionrate($adminid, $price1, $price6)
        {
                $sql = "UPDATE " . tbl_usermaster . " SET ";
                $sql .= fld_admin_subscription_rate1 . "   = '" . addslashes($price1) . "' , ";
                $sql .= fld_admin_subscription_rate6 . "   = '" . addslashes($price6) . "' ";
                $sql .= " WHERE " . fld_admin_id . " = '$adminid' ";
                mysql_query($sql);
                return true;
        }

        /*----------------------------------------------------------------
                Description   :- function to update the username of an admin id
                Programmer    :- SDYA
                Last Modified :- 21/MAY/2006
                -------------------------------------------------------------------*/
        function updateusername($adminid, $username)
        {
                //update admin user name
                $sql = "UPDATE " . tbl_usermaster . " SET " . fld_admin_username . " = '" . addslashes($username) . "' WHERE " . fld_admin_id . " = " . $adminid;
                mysql_query($sql);
        }

        /*----------------------------------------------------------------
                Description   :- function to update the emailid of an admin id
                Programmer    :- SDYA
                Last Modified :- 24/MAY/2006
                -------------------------------------------------------------------*/
        function updateemailid($adminid, $emailid)
        {
                //update admin email id
                $sql = "UPDATE " . tbl_usermaster . " SET " . fld_admin_emailid . " = '" . $emailid . "' WHERE " . fld_admin_id . " = " . $adminid;
                mysql_query($sql);
        }
}
//-------------**********end of class admin**********-----------

//----------**********common/general functions*********-----------
class common
{
        function imageresize($filename, $rewidth, $dest, $flag = 0, $convert = 0)
        //flag = 1 => resized image gets displayed as png
        //convert = 1 => saves as Jpeg
        {
                list($imwidth, $imheight, $imtype, $imstring)  = getimagesize($filename);
                switch ($imtype) {
                        case 1:
                                $im = imagecreatefromgif($filename);
                                break;
                        case 2:
                                $im = imagecreatefromjpeg($filename);
                                break;
                        case 3:
                                $im = imagecreatefrompng($filename);
                                break;
                        default:
                                $im = imagecreate($rewidth, $rewidth);
                                $bg = imagecolorallocate($im, 255, 255, 255);
                                $fr = imagecolorallocate($im, 200, 200, 200);
                                imagefilledrectangle($im, 0, 0, $rewidth - 1, $rewidth - 1, $bg);
                                imagerectangle($im, 0, 0, $rewidth - 1, $rewidth - 1, $fr);
                                header("Content-type: image/png");
                                imagepng($im);
                                imagedestroy($im);
                                return;
                                break;
                }
                if ($imwidth > $rewidth) {
                        $refact = $imwidth / $rewidth;
                        $reheight = intval(ceil($imheight / $refact));
                        //$im1 = imagecreate ($rewidth, $reheight);
                        $im1 = imagecreatetruecolor($rewidth, $reheight);
                        $bg  = imagecolorallocate($im1, 255, 255, 255);
                        imagefilledrectangle($im1, 0, 0, $rewidth, $reheight, $bg);
                        //imagecopyresized ( $im1, $im, 0, 0, 0, 0, $rewidth, $reheight, $imwidth, $imheight );
                        imagecopyresampled($im1, $im, 0, 0, 0, 0, $rewidth, $reheight, $imwidth, $imheight);

                        if (!$flag) {
                                if ($convert) {
                                        imagejpeg($im1, $dest, 100);
                                } else {
                                        switch ($imtype) {
                                                case 1:
                                                        imagegif($im1, $dest);
                                                        break;
                                                case 2:
                                                        imagejpeg($im1, $dest, 100);
                                                        break;
                                                case 3:
                                                        imagepng($im1, $dest);
                                                        break;
                                        }
                                }
                        } else {
                                header("Content-type: image/png");
                                imagepng($im1);
                                imagedestroy($im1);
                        }
                } else {
                        if (!$flag) {
                                if ($convert) {
                                        imagejpeg($im, $dest, 100);
                                } else {
                                        switch ($imtype) {
                                                case 1:
                                                        imagegif($im, $dest);
                                                        break;
                                                case 2:
                                                        imagejpeg($im, $dest, 100);
                                                        break;
                                                case 3:
                                                        imagepng($im, $dest);
                                                        break;
                                        }
                                }
                        } else {
                                header("Content-type: image/png");
                                imagepng($im);
                        }
                }
                imagedestroy($im);
        }
        /*----------------------------------------------------------------
                Description   :- function to validate mandatory fields in a form
                Programmer    :- SDYA
                Last Modified :- 24/MAY/2006
                -------------------------------------------------------------------*/
        function nullvalidation($validationstring)
        {
                //separate the fields from the string which contains all the fields separated by '~*'
                $fieldarray         = explode("~*", trim($validationstring));
                //validate each field for null values
                for ($i = 0; $i < count($fieldarray); $i++) {
                        //return true if any field is empty
                        if (empty($fieldarray[$i]) and ($fieldarray[$i] != "0"))  return true;
                }
                //return false if no null field
                return false;
        }

        /*----------------------------------------------------------------
                Description   :- function to validate an email id
                Programmer    :- SDYA
                Last Modified :- 24/MAY/2006
                -------------------------------------------------------------------*/
        function isvalidemailid($emailid)
        {
                if (!ereg("^[_a-z0-9A-Z-]+(\.[_a-z0-9A-Z-]+)*@[a-z0-9A-Z-]+(\.[a-z0-9A-Z-]+)+$", $emailid)) return 0;
                else return 1;
        }

        /*----------------------------------------------------------------
                Description   :- function to send an email
                Programmer    :- SDYA
                Last Modified :- 24/MAY/2006
                -------------------------------------------------------------------*/
        function sendmail($subject, $body, $fromaddress = "", $toaddress = "")
        {


                if (empty($toaddress)) return 0;

                //if no from address is specified then take the admin email id
                if (empty($fromaddress)) {
                        $sql = "SELECT " . fld_admin_emailid . " FROM " . tbl_admin;
                        $res = mysql_query($sql);
                        if ($row = mysql_fetch_object($res)) $fromaddress = $row->{fld_admin_emailid};
                }

                //define header
                $headers  = "Content-Type: text/html; charset=iso-8859-1\n";
                $headers .= "From: <$fromaddress>\n";
                $headers .= "Return-Path: <$fromaddress>\n";


                //send mail
                mail($toaddress, $subject, $body, $headers);
                return 1;
        }
        /*----------------------------------------------------------------
                Description   :- function to convert a mysql date to "Jan 04" format
                Programmer    :- SDYA
                Last Modified :- 24/MAY/2006
                -------------------------------------------------------------------*/
        function getdate_mondd($date)
        {
                //separate using -
                $datearr = explode("-", $date);
                //get month
                switch ($datearr[1]) {
                        case "01":
                                $mon  = "Jan";
                                break;
                        case "02":
                                $mon  = "Feb";
                                break;
                        case "03":
                                $mon  = "Mar";
                                break;
                        case "04":
                                $mon  = "Apr";
                                break;
                        case "05":
                                $mon  = "May";
                                break;
                        case "06":
                                $mon  = "Jun";
                                break;
                        case "07":
                                $mon  = "Jul";
                                break;
                        case "08":
                                $mon  = "Aug";
                                break;
                        case "09":
                                $mon  = "Sep";
                                break;
                        case "10":
                                $mon  = "Oct";
                                break;
                        case "11":
                                $mon  = "Nov";
                                break;
                        case "12":
                                $mon  = "Dec";
                                break;
                }
                return $mon . " " . $datearr[2];
        }

        /*----------------------------------------------------------------
                Description   :- function to convert a mysql date to "January 27, 2004" format
                Programmer    :- SDYA
                Last Modified :- 25/MAY/2006
                -------------------------------------------------------------------*/
        function getdate_monthddyyyy($date)
        {
                //separate using -
                $datearr = explode("-", $date);

                //get month
                switch ($datearr[1]) {
                        case "01":
                                $mon  = "January";
                                break;
                        case "02":
                                $mon  = "February";
                                break;
                        case "03":
                                $mon  = "March";
                                break;
                        case "04":
                                $mon  = "April";
                                break;
                        case "05":
                                $mon  = "May";
                                break;
                        case "06":
                                $mon  = "June";
                                break;
                        case "07":
                                $mon  = "July";
                                break;
                        case "08":
                                $mon  = "August";
                                break;
                        case "09":
                                $mon  = "September";
                                break;
                        case "10":
                                $mon  = "October";
                                break;
                        case "11":
                                $mon  = "November";
                                break;
                        case "12":
                                $mon  = "December";
                                break;
                }
                return $mon . " " . $datearr[2] . ", " . $datearr[0];
        }

        /*----------------------------------------------------------------
                Description   :- function to convert a mysql date to "mm/dd/yyyy" format
                Programmer    :- SDYA
                Last Modified :- 25/MAY/2006
                -------------------------------------------------------------------*/
        function getdate_mmddyyyy($date)
        {
                if (!empty($date)) {
                        //separate using -
                        $datearr = explode("-", $date);
                        return $datearr[1] . "-" . $datearr[2] . "-" . $datearr[0];
                }
        }

        /*----------------------------------------------------------------
                Description   :- function to convert a mysql date to "dd/mm/yyyy" format
                Programmer    :- SDYA
                Last Modified :- 25/MAY/2006
                -------------------------------------------------------------------*/
        function getdate_ddmmyyyy($date)
        {
                if (!empty($date)) {
                        //separate using -
                        $datearr = explode("-", $date);
                        return $datearr[2] . "/" . $datearr[1] . "/" . $datearr[0];
                }
        }

        /*----------------------------------------------------------------
                Description   :- function to convert the date from mm-dd-yy to yyyy-mm-dd
                Programmer    :- SDYA
                Last Modified :- 25/MAY/2006
                -------------------------------------------------------------------*/
        function date2mysql($date)
        {
                $tmp        = explode('/', $date);
                if (count($tmp) != 3) {
                        $tmp        = explode('-', $date);
                        if (count($tmp) != 3) return "0000-00-00";
                }
                $date        = "$tmp[2]-$tmp[0]-$tmp[1]";
                return $date;
        }

        /*----------------------------------------------------------------
                Description   :- function to get the admin emailid
                Programmer    :- SDYA
                Last Modified :- 25/MAY/2006
                -------------------------------------------------------------------*/
        function getadminid()
        {
                $sql = "SELECT " . fld_admin_emailid . " FROM " . tbl_admin;
                $res = mysql_query($sql);
                if ($row = mysql_fetch_object($res)) return $toaddress = $row->{fld_admin_emailid};
        }

        /*----------------------------------------------------------------
                Description   :- function to find the difference between 2 dates
                Programmer    :- SDYA
                Last Modified :- 25/MAY/2006
                -------------------------------------------------------------------*/
        function date_diff($date1, $date2, $mode = "Full")
        {
                $s = strtotime($date2) - strtotime($date1);
                $d = intval($s / 86400);
                $s -= $d * 86400;
                $h = intval($s / 3600);
                $s -= $h * 3600;
                $m = intval($s / 60);
                $s -= $m * 60;
                if ($mode == "m") {
                        $x = $d * 24 * 60 + $h * 60 + $m;
                        return $x;
                }
                return array("d" => $d, "h" => $h, "m" => $m, "s" => $s);
        }

        /*----------------------------------------------------------------
                        Description   :- function to convert the date into rich text safe format
                Programmer    :- VCN
                        Last Modified :- 25/MAY/2006
                        -------------------------------------------------------------------*/
        function RTESafe($strText)
        {
                //returns safe code for preloading in the RTE
                $tmpString = trim($strText);

                //convert all types of single quotes
                $tmpString = str_replace(chr(145), chr(39), $tmpString);
                $tmpString = str_replace(chr(146), chr(39), $tmpString);
                $tmpString = str_replace("'", "&#39;", $tmpString);

                //convert all types of double quotes
                $tmpString = str_replace(chr(147), chr(34), $tmpString);
                $tmpString = str_replace(chr(148), chr(34), $tmpString);

                //replace carriage returns & line feeds
                $tmpString = str_replace(chr(10), " ", $tmpString);
                $tmpString = str_replace(chr(13), " ", $tmpString);

                return $tmpString;
        }
        /*----------------------------------------------------------------
                Description   :- function to get the end time for the given start time and duration
                Programmer    :- SDYA
                Last Modified :- 22/MAY/2006
                -------------------------------------------------------------------*/
        function get_endtime($startdate, $eventtime, $duration)
        {
                $sql = "SELECT DATE_ADD('" . $startdate . " " . $eventtime . "', INTERVAL '" . $duration . "' HOUR_SECOND)";
                $res = mysql_query($sql);
                $row = mysql_fetch_array($res);
                return $row["DATE_ADD('" . $startdate . " " . $eventtime . "', INTERVAL '" . $duration . "' HOUR_SECOND)"];
        }
        /*----------------------------------------------------------------
                Description   :- function to generate Hours and minutes to show in
                total time hours drop down
                Programmer    :- SDYA
                Last Modified :- 08/MAY/2006
                ----------------------------------------------------------------*/
        function generatehourvalues($start, $end)
        {
                for ($i = $start; $i <= $end; $i++) {
                        $mytime[] = ($i < 10) ? '0' . $i : $i;
                }
                return $mytime;
        }

        /*----------------------------------------------------------------
                Description   :- function to resize an image (gif, jpg, png)
                resizes, writes the image in the specified path
                'originalpath'                - path where the actual image resides
                'image'                                - image name
                'path'                                - the path where the resized image has to be stored
                'newwidth'                        - the new width to which the image has to be resized
                'newheight'                        - the new height to which the image has to be resized
                Programmer    :- SDYA
                Last Modified :- 15/MAY/2006
                -------------------------------------------------------------------*/
        function resizeimage($originalpath, $image, $path, $newwidth, $newheight, $newname = '')
        {
                //image with complete path
                $imgname                 = $originalpath . "/" . $image;

                //get image type
                $imagedetails        = getimagesize($imgname); //die($imagedetails);
                $imagetype                = $imagedetails['mime'];

                //get the actual size of the image
                $thumpsize      = $imagedetails[3];
                $thumpwidth     = explode('"', $thumpsize);
                $actualwidth    = $thumpwidth[1];
                $actualheight   = $thumpwidth[3];

                //Only if the imagesize is more than the required size the image will be resized
                /*  if($actualwidth<$newwidth and $actualheight<$newheight)
                        {
                                $newwidth                 = $actualwidth;
                                $newheight                = $actualheight;
                        }*/

                //If GIF
                if ($imagetype == "image/gif")
                        $im         = imagecreatefromgif($imgname);
                //If JPG
                elseif ($imagetype == "image/jpeg")
                        $im         = imagecreatefromjpeg($imgname);
                else
                        $im         = imagecreatefrompng($imgname);

                //resizing
                $width          = imagesx($im);
                $height         = imagesy($im);
                $im2            = imagecreatetruecolor($newwidth, $newheight);
                imagecopyresampled($im2, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                if ($newname)  $image = $newname;
                //write the resized image to the new path
                imagejpeg($im2, $path . "/" . $image);

                //destroy the images
                imagedestroy($im);
                imagedestroy($im2);
        }

        /*----------------------------------------------------------------
            Description   :- function to get resize the height of an image
            Programmer    :- SRN
            Last Modified :- 25/Jun/2006
            -------------------------------------------------------------------*/
        function resizeHeight($path, $image)
        {
                $name = $path . "/" . $image;
                list($imwidth, $imheight, $imtype, $imstring)  = getimagesize($name);

                if ($imheight > 600) {
                        $reheight = 600;
                        $refact = $imheight / $reheight;
                        $rewidth = intval(ceil($imwidth / $refact));
                        $this->resizeimage($path, $image, $path, $rewidth, $reheight, $image);
                }
        }

        /*----------------------------------------------------------------
            Description   :- function to get resize the height of an image
            Programmer    :- SRN
            Last Modified :- 25/Jun/2006
            -------------------------------------------------------------------*/
        function resizeWidth($path, $image)
        {
                $name = $path . "/" . $image;
                list($imwidth, $imheight, $imtype, $imstring)  = getimagesize($name);

                if ($imwidth > 800) {
                        $rewidth = 800;
                        $refact = $imwidth / $rewidth;
                        $reheight = intval(ceil($imheight / $refact));
                        $this->resizeimage($path, $image, $path, $rewidth, $reheight, $image);
                }
        }
}
//-----------***********End of Class Common*********------------------

function is_uploaded_image($FILE)
{
        if (is_uploaded_file($FILE['tmp_name'])) {
                /*if ( function_exists ('mime_content_type') )
			$type = mime_content_type ($FILE['tmp_name']); 
		else
		{*/
                $type = $FILE['type'];
                /*}*/
                $pos = strpos($type, "image");
                if ($pos === false) {
                        return FALSE;
                } else {
                        return TRUE;
                }
        } else {
                return FALSE;
        }
}

function curPageURL()
{
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") {
                $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
}
