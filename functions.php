<?php	
	
	function loadExcelTemplate($filename, $tpl, $data) {
		include 'lib/excel/Worksheet.php';
		include 'lib/excel/Workbook.php';
		extract ( (array) $data );
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=$filename".".xls");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Pragma: public");
		
		// Creating a workbook
		$workbook = new Workbook("-");
		
		$header =& $workbook->add_format();
		$header->set_size(10);
		$header->set_bold(true);
		$header->set_align('left');
		$header->set_color('white');
		$header->set_pattern();
		$header->set_fg_color('black');
		
		@include 'templates/excel/' . $tpl ;		
		
		$workbook->close();
		die();
	}
	
	function loadTemplate($tpl, $data=array(), $filename="") {
		global $templateData;
		global $format;
		
		global $module;
		global $action;
		
		if ( $format == 'excel' and file_exists('views/excel/'.$tpl) ) {
			if ( empty($filename) ) $filename = 'excel_output';
			$filename .= '_' . date('dMy');
			loadExcelTemplate($filename,$tpl,$data);
			} else {
			
			if ( ! empty($data) ) {
				$data = array_merge((array)$data, (array)$templateData);
				$templateData = $data;
			}
			extract ( (array) $data );
			
			
			ob_start();
			@include 'views/' . $tpl ;
			
			// Remove when deploying on Client PC!
			if ( $format == 'excel' ) echo '<script>alert("Excel File Not Available for Download")</script>';
			
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		}
	}
	
	function cleanInput($str) {
		return trim($str);
	}
	
	function loadDir($dir) {
		global $config;
		if ( is_dir($dir) ) {
			$d = opendir($dir);
			while ($file = readdir($d)) {
				if ( substr($file,-4)=='.php' ) include $dir . $file;
			}
		}
	}
	
	function url($module, $action, $params="") {
		if ( is_array($params) ) {
			$str_params = '';
			foreach($params as $k=>$v) $str_params .= $k .'=' . urlencode($v) . '&';
			$params = $str_params;
			} else {
			if (!empty($params)) $params.='&';
		}
		return '?' . $params . 'module=' . $module . '&action=' . $action;
	}
	
	function base_url() {
		return '';
	}
	
	function getSession($key) {
		$keyParts = explode('.',$key);
		$output = '';
		foreach($keyParts as $keyPart) {
			if ( empty($output) )  $output = $_SESSION[$keyPart];
			else{
				if ( is_array($output) ) {
					$output = $output[$keyPart];
				}	
				if ( is_object($output) ) {
					$output = $output->$keyPart;
				}
			}
		}
		return $output;
	}
	
	function redirect($module, $action, $params="") {
		$url = url($module,$action,$params);
		header('Location: ' . $url);
		die();
	}
	
	function redirectBack() {
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		die();
	}
	
	function getAction() {
		global $action;
		return $action;
	}
	
	function formatN($no, $decimals=2) {
		return number_format($no, $decimals);
	}
	
	function getModule() {
		global $module;
		return $module;
	}
	
	function selected($a,$b,$val1='selected',$val2='') {
		return $a==$b?$val1:$val2;
	}
	
	function fDate($dt, $format='d F Y') {
		return date($format,strtotime($dt));
	}
	
	function resizeUploadImage($img,$refwidth=200,$refheight=0,$uploadloc,$format='jpg') {
		$size = getimagesize($img["tmp_name"]);
		
		if ($size) {
			$extension = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
			
			$imgpath['name'] = strtolower($imgpath['name']);
			
			if($extension == "gif")	{ $imgconv = imagecreatefromgif($img["tmp_name"]);	}
			elseif($extension == "jpg" || $extension == "jpeg")	{ $imgconv = imagecreatefromjpeg($img["tmp_name"]);	}
			else if($extension=="png") { $imgconv = imagecreatefrompng($img["tmp_name"]); }
			
			list($imgwidth,$imgheight) = getimagesize($img["tmp_name"]); //current image dimensions
			
			$ctrl_imgwidth = $refwidth;
			
			if ($refheight == 0) { //new size
				$new_imgheight = ($imgheight/$imgwidth)*$ctrl_imgwidth;
				} else {
				$new_imgheight = $refheight;
			}
			
			$tmp_img = imagecreatetruecolor($ctrl_imgwidth,$new_imgheight);
			if ($format == 'png') { //transparency
				imagealphablending( $tmp_img, false );
				imagesavealpha( $tmp_img, true );
			}
			
			//Resize the image file
			imagecopyresampled($tmp_img,$imgconv,0,0,0,0,$ctrl_imgwidth,$new_imgheight,$imgwidth,$imgheight);
			
			//Upload the image
			$time = time();
			$imgname = $time.'-'.$img['name'];
			$uploadloc .= $imgname;
			if ($format == 'jpg') {
				imagejpeg($tmp_img,$uploadloc,100);
				} else if ($format == 'png') {
				imagepng($tmp_img,$uploadloc,9);
			}
			
			imagedestroy($imgconv);
			imagedestroy($tmp_img);	
			
			return $imgname;
		}
		
	}

	function uploadfile($file){

		if(!empty($file)){

			$fileName=$file["file"]["name"];
			$fileSize=$file["file"]["size"]/1024;
			$fileType=$file["file"]["type"];
			$fileTmpName=$file["file"]["tmp_name"];  
		  
			// if($fileType=="application/msword"){
			if($fileSize<=5000){
		
			//New file name
			$time=time();
			$newFileName=$time."-".$fileName;
		
			//File upload path
			$uploadPath="assets/uploads/".$newFileName;
		
			//function for upload file
			move_uploaded_file($fileTmpName,$uploadPath);
			
			}else{
			echo "Maximum upload file size limit is 200 kb";
			}
			
			return $newFileName; 
		}
	}
	
	
	function tumaMail($host,$port,$authenticate,$username,$password,$sendername,$to,$toname,$subject,$message,$attachment){
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		
		//Set the hostname of the mail server
		$mail->Host = $host;
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = $port;
		
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		
		//Whether to use SMTP authentication
		$mail->SMTPAuth = $authenticate;
		
		//Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = $username;
		
		//Password to use for SMTP authentication
		$mail->Password = $password;
		
		//Set who the message is to be sent from
		$mail->setFrom($username, $sendername);
		
		//Set an alternative reply-to address
		// $mail->addReplyTo('replyto@example.com', 'First Last');
		
		//Set who the message is to be sent to
		$mail->addAddress($to, $toname);
		
		//Set the subject line
		$mail->Subject = $subject;
		
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML($message, dirname(__FILE__));
		
		//Replace the plain text body with one created manually
		// $mail->AltBody = 'This is a plain-text message body';
		
		//Attach an image file
		// $mail->addAttachment('images/phpmailer_mini.png');
		if ($attachment) $mail->addAttachment($attachment);
		
		//send the message, check for errors
		if (!$mail->send()) {
			return "Mailer Error: " . $mail->ErrorInfo;
			} else {
			return "ok";
		}
		
	}
	
	
	
	function stripSpecial($string){
		
		$string = str_replace(",",'',$string);
		$string = str_replace("/",'',$string);
		$string = str_replace("(",'',$string);
		$string = str_replace(")",'',$string);
		$string = str_replace("'",'',$string);
		$string = str_replace('"','',$string);
		$string = str_replace('.','',$string);
		$string = str_replace('-','',$string);
		$string = str_replace(' ','',$string);
		$string = strtolower($string);
		
		return $string;
		
	}
	
	
	
	function sendSms($messageContent,$to){
		
		
		require_once 'lib/sms_api.php';

		$sender = "PCTLSUPPORT";
		$infobip = new Infobip_sms_api();
		$infobip->setUsername("PCTLSUPPORT");
		$infobip->setPassword("Pctl@Support786");

		
		// $sender = CS_SMSNAME;
		// $infobip = new Infobip_sms_api();
		// $infobip->setUsername(CS_SMSUSER);
		// $infobip->setPassword(CS_SMSPASS);
		
		// Send 1 SMS to 1 --------------------------------------------------------
		
		$infobip->setMethod(Infobip_sms_api::OUTPUT_XML); // With xml method
		$infobip->setMethod(Infobip_sms_api::OUTPUT_JSON); // OR With json method
		$infobip->setMethod(Infobip_sms_api::OUTPUT_PLAIN); // OR With plain method
		
		$message = new Infobip_sms_message();
		
		$message->setSender($sender); // Sender name
		$message->setText($messageContent); // Message
		$message->setRecipients($to);
		//$message->setRecipients('phone1', 'messageID'); // With custom message id
		
		$infobip->addMessages(array(
		$message
		));
		
		$results = $infobip->sendSMS();
		return $results[0]->messageid;
		
		// echo '<pre>';
		// print_r($results);
		// echo '</pre>';
		// die();
		
		
	}
	
	
	function getSmsBalance(){
		
		
		// Begin script
		require_once 'lib/sms_api.php';
		$infobip = new Infobip_sms_api();
		$infobip->setUsername(CS_SMSUSER);
		$infobip->setPassword(CS_SMSPASS);
		
		// Get balance -------------------------------------------------
		$balance = $infobip->getBalance();
		// echo '<pre>';
		// print_r($balance);
		// echo '</pre>';
		// echo $balance->value;
		// echo $balance->currency;
		// die();
		return $balance->value;
	}
	
	
	
	function is_connected($ipadd){
	
		$connected = @fsockopen($ipadd, 80); 
		//website, port  (try 80 or 443)
		if ($connected){
			$is_conn = true; //action when connected
			fclose($connected);
			}else{
			$is_conn = false; //action in connection failure
		}
		return $is_conn;
		
	}
	
	
function make_comparer() {
    // Normalize criteria up front so that the comparer finds everything tidy
    $criteria = func_get_args();
    foreach ($criteria as $index => $criterion) {
        $criteria[$index] = is_array($criterion)
            ? array_pad($criterion, 3, null)
            : array($criterion, SORT_ASC, null);
    }

    return function($first, $second) use (&$criteria) {
        foreach ($criteria as $criterion) {
            // How will we compare this round?
            list($column, $sortOrder, $projection) = $criterion;
            $sortOrder = $sortOrder === SORT_DESC ? -1 : 1;

            // If a projection was defined project the values now
            if ($projection) {
                $lhs = call_user_func($projection, $first[$column]);
                $rhs = call_user_func($projection, $second[$column]);
            }
            else {
                $lhs = $first[$column];
                $rhs = $second[$column];
            }

            // Do the actual comparison; do not return if equal
            if ($lhs < $rhs) {
                return -1 * $sortOrder;
            }
            else if ($lhs > $rhs) {
                return 1 * $sortOrder;
            }
        }

        return 0; // tiebreakers exhausted, so $first == $second
    };
}
	
	
	function convertNumber($number)
{
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{0} == "-")
    {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    }
    else if ($integer{0} == "+")
    {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{0} == "0")
    {
        $output .= "zero";
    }
    else
    {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
        {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++)
        {
            if ($groups2[$z] != "")
            {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " and "
                            : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0)
    {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++)
        {
            $output .= " " . convertDigit($fraction{$i});
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index)
    {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " trillion";
        case 3:
            return " billion";
        case 2:
            return " million";
        case 1:
            return " thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
    {
        return "";
    }

    if ($digit1 != "0")
    {
        $buffer .= convertDigit($digit1) . " hundred";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " and ";
        }
    }

    if ($digit2 != "0")
    {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0")
    {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0")
    {
        switch ($digit1)
        {
            case "1":
                return "ten";
            case "2":
                return "twenty";
            case "3":
                return "thirty";
            case "4":
                return "forty";
            case "5":
                return "fifty";
            case "6":
                return "sixty";
            case "7":
                return "seventy";
            case "8":
                return "eighty";
            case "9":
                return "ninety";
        }
    } else if ($digit1 == "1")
    {
        switch ($digit2)
        {
            case "1":
                return "eleven";
            case "2":
                return "twelve";
            case "3":
                return "thirteen";
            case "4":
                return "fourteen";
            case "5":
                return "fifteen";
            case "6":
                return "sixteen";
            case "7":
                return "seventeen";
            case "8":
                return "eighteen";
            case "9":
                return "nineteen";
        }
    } else
    {
        $temp = convertDigit($digit2);
        switch ($digit1)
        {
            case "2":
                return "twenty-$temp";
            case "3":
                return "thirty-$temp";
            case "4":
                return "forty-$temp";
            case "5":
                return "fifty-$temp";
            case "6":
                return "sixty-$temp";
            case "7":
                return "seventy-$temp";
            case "8":
                return "eighty-$temp";
            case "9":
                return "ninety-$temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}


function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath){
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
	
	if (mysqli_connect_errno())
  {
	return "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	
    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}

// Use this to echo an array on the view
function debug($arrayname){
	echo "<pre>";
	print_r($arrayname);
	die();
}

function get_time_ago( $time ){
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str ){
        $d = $time_difference / $secs;

        if( $d >= 1 ){
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

function numberTowords($num){

	$ones = array(
		0 =>"ZERO",
		1 => "ONE",
		2 => "TWO",
		3 => "THREE",
		4 => "FOUR",
		5 => "FIVE",
		6 => "SIX",
		7 => "SEVEN",
		8 => "EIGHT",
		9 => "NINE",
		10 => "TEN",
		11 => "ELEVEN",
		12 => "TWELVE",
		13 => "THIRTEEN",
		14 => "FOURTEEN",
		15 => "FIFTEEN",
		16 => "SIXTEEN",
		17 => "SEVENTEEN",
		18 => "EIGHTEEN",
		19 => "NINETEEN",
		"014" => "FOURTEEN"
	);

	$tens = array( 
		0 => "ZERO",
		1 => "TEN",
		2 => "TWENTY",
		3 => "THIRTY", 
		4 => "FORTY", 
		5 => "FIFTY", 
		6 => "SIXTY", 
		7 => "SEVENTY", 
		8 => "EIGHTY", 
		9 => "NINETY" 
	); 

	$hundreds = array( 
		"HUNDRED", 
		"THOUSAND", 
		"MILLION", 
		"BILLION", 
		"TRILLION", 
		"QUARDRILLION" 
	); /*limit t quadrillion */

	$num = number_format($num,2,".",","); 
	$num_arr = explode(".",$num); 
	$wholenum = $num_arr[0]; 
	$decnum = $num_arr[1]; 
	$whole_arr = array_reverse(explode(",",$wholenum)); 
	krsort($whole_arr,1); 
	$rettxt = ""; 
	foreach($whole_arr as $key => $i){
		
		while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
		if($i < 20){ 
			/* echo "getting:".$i; */
			$rettxt .= $ones[$i]; 
		}elseif($i < 100){ 
			if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
			if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
		}else{ 
			if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
			if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
			if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
		} 
		if($key > 0){ 
			$rettxt .= " ".$hundreds[$key]." "; 
		}
	} 
	if($decnum > 0){
		$rettxt .= " and ";
		if($decnum < 20){
			$rettxt .= $ones[$decnum];
		}elseif($decnum < 100){
			$rettxt .= $tens[substr($decnum,0,1)];
			$rettxt .= " ".$ones[substr($decnum,1,1)];
		}
	}
	return $rettxt;
}
	// extract($_POST);

	// if(isset($convert)){
	// 	echo "<p align='center' style='color:blue'>".numberTowords("$num")."</p>";
	// }

?>