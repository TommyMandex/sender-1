<?php
/*
▄▄▌  ▄▄▄ . ▄▄▄· ▄ •▄  ▄▄·       ·▄▄▄▄  ▄▄▄ .
██•  ▀▄.▀·▐█ ▀█ █▌▄▌▪▐█ ▌▪▪     ██▪ ██ ▀▄.▀·
██▪  ▐▀▀▪▄▄█▀▀█ ▐▀▀▄·██ ▄▄ ▄█▀▄ ▐█· ▐█▌▐▀▀▪▄
▐█▌▐▌▐█▄▄▌▐█ ▪▐▌▐█.█▌▐███▌▐█▌.▐▌██. ██ ▐█▄▄▌
.▀▀▀  ▀▀▀  ▀  ▀ ·▀  ▀·▀▀▀  ▀█▄▀▪▀▀▀▀▀•  ▀▀▀ 
Coded By [!]DNThirTeen
https://www.facebook.com/groups/L34K.C0de/
*/
error_reporting(0);
require('setting.php');
require 'function/generate.php';
include 'function/random.php';
require('mailer/swift-mailer.php');
use SwiftMailer\Smtp\Email;

echo shell_exec("sh function/screen.sh");

/////////////////////////////////////////////////////////////////////////////////////
$kintil = "\033[1;31m           ❱❱ Chỉ nhập đc số thôi =) sai r \n";
$kintl = "\033[1;31m           ❱❱ vui lòng nhập\n";
/////////////////////////////////////////////////////////////////////////////////////////////
$maxs = readline("           [+] mỗi thằng gửi bao nhiêu mails?  : ");
if (empty($maxs)) { echo $kintil; die(); }
if (filter_var($maxs, FILTER_VALIDATE_INT)) {} else { echo $kintl; die(); }
$gens = readline("           [+] Tự động tạo user? [y/n] : ");
if ($gens == 'y') {
    $doms = readline("           [+] Tên domain (SMTP_) : ");
    if (empty($doms)) { echo $kintil; die(); }
    $ujml = readline("           [+] Mau Generate Berapa User : ");
    if (empty($ujml)) { echo $kintil; die(); } else {
        $fp     = fopen("users.csv", "w");
        $fp1    = fopen("temp/user_list.txt", "w");
        fputs($fp, "First Name [Required],Last Name [Required],Email Address [Required],Password [Required]\n");
        for ($x=0; $x < $ujml; $x++ ) {
            $user   = $SENDER["fm_generate"];
            $user1  = array('[randstring]', '[randstring-]', '[randstring=]', '[number]', '[default]');
            $user2  = array(''.RandString(8).'', ''.RandString2(8).'', ''.RandString1(6).'', ''.RandNumber(7).'', ''.RandString4(11).'');
            $user = str_replace($user1, $user2, $user);
            fputs($fp, "".Randstring2(4).",".Randstring2(6).",$user@$doms,".$SMTP['pass']."\n");
            fputs($fp1, "$user@$doms\n");
        }
    }
    $udah = readline("           [+] Upload user lên xong chưa? CSV ? hmm... hmm... [y/n]  : ");
    if ($udah == 'n') { echo '>< ngu ngốk'."\n"; die(); }
}
////////////////////////////////////////////////////////////////////////////////////////////////

do {

if ($i > 0) {
    $i = $i;
    if ($i > 4) {
        $i = 0;
    }
} else { $i = 0; }

$i = $i+1;

$time = date("h:i:s A");

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
shuffle($countries);
$country = array_shift($countries);

$OSystems = array('Windows 10', 'Windows 8.1', 'Windows 8', 'Windows 7', 'Windows Vista', 'Windows Server 2003/XP x64', 'Windows XP', 'Windows XP', 'Mac OS X', 'Mac OS 9', 'Linux', 'Ubuntu', 'iPhone', 'iPod', 'iPad', 'Android', 'BlackBerry', 'Mobile');
shuffle($OSystems);
$OS = array_shift($OSystems);

$ListBrowser = array('Internet Explorer', 'Firefox', 'Safari', 'Chrome', 'Edge', 'Opera', 'Netscape');
shuffle($ListBrowser);
$browser = array_shift($ListBrowser);

$randip       = "" . rand(1, 100) . "." . rand(1, 100) . "." . rand(1, 100) . "." . rand(1, 100) . "";
date_default_timezone_set('America/Los_Angeles');
$datel = date('F, j Y T');

$mailist_src = file_get_contents($SEND['list']);
$mailist = explode("\n", $mailist_src);
$n       = $maxs;

if ($n >= count($mailist)) {
    $n = count($mailist);
}

$email = array_slice($mailist, 0, $n);

if ($SMTP['auto'] == "yes") {
    $user = file_get_contents("temp/user_list.txt");
    $user = explode("\n", $user);
    $user_ke = file_get_contents("temp/rotate_user.txt");
    if ($user_ke >= count($user)-1) {
        $file = "temp/rotate_user.txt";
      $isi = @file_get_contents($file);
            $buka = fopen($file, "w");
            fwrite($buka, 0);
    }
    $user_ke  = file_get_contents("temp/rotate_user.txt");
    $smtp_user = $user[$user_ke];
} else {
    $user_ke = file_get_contents("temp/rotate_user.txt");
     if ($user_ke >= count($USER_MANUAL)) {
         $file = "temp/rotate_user.txt";
             $isi = @file_get_contents($file);
             $buka = fopen($file, "w");
             fwrite($buka, 0);
    }
    $user_ke  = file_get_contents("temp/rotate_user.txt");
    $smtp_user = $USER_MANUAL[$user_ke];
}

if ($MAIL['type'] == "null") {
    $message = "&nbsp;";
} else {
    $message_src = file_get_contents($MAIL['letter']);
    $letter1  = array('[email]', '[short]', '[randstring+]', '[randstring-]', '[randstring=]', '[country]', '[date]', '[OS]', '[browser]', '[number]', '[ip]');
    $letter2  = array(''.$email[0].'', '' . $MAIL["short"] . '', ''.RandString(10).'', ''.RandString2(8).'', ''.RandString1(8).'', ''.$country.'', ''.$datel.'', ''.$OS.'', ''.$browser.'', ''.RandNumber(8).'', ''.$randip.'',);
    $message = str_replace($letter1, $letter2, $message_src);
}

$sub0 = $MAIL["subject"];
$sub1  = array('[short]', '[randstring+]', '[randstring-]', '[randstring=]', '[country]', '[date]', '[OS]', '[browser]', '[number]', '[ip]');
$sub2  = array('' . $BODY["short"] . '', ''.RandString(8).'', ''.RandString2(8).'', ''.RandString1(8).'', ''.$country.'', ''.$datel.'', ''.$OS.'', ''.$browser.'', ''.RandNumber(8).'', ''.$randip.'',);
$subject = str_replace($sub1, $sub2, $sub0);

$users0 = $SMTP['user'];
$users1  = array('[short]', '[randstring+]', '[randstring-]', '[randstring=]', '[country]', '[date]', '[OS]', '[browser]', '[number]', '[ip]');
$users2  = array('' . $BODY["short"] . '', ''.RandString(8).'', ''.RandString2(8).'', ''.RandString1(8).'', ''.$country.'', ''.$datel.'', ''.$OS.'', ''.$browser.'', ''.RandNumber(8).'', ''.$randip.'',);
$users = str_replace($users1, $users2, $users0);


$subject_log = substr($subject, 0, 28);

if (!empty($mailist_src)) {
    $mail = new Email($SMTP['host'], $SMTP['port']);
    if ($SMTP['type'] == 'SSL') {
    $mail->setProtocol(Email::SSL);
    } else {
    $mail->setProtocol(Email::TLS);
    }
    $mail->setLogin($smtp_user, $SMTP['pass']);
} else {
    echo "          \033[1;31m ❱❱ Error Gayn !! Mailist Kosong Taruh mailist terlebih dahulu\n";
    die();
}

if ($SENDER['custom_header'] == 'yes') {
    foreach ($CUST_HEADER as $heaaders) {
        $heaader = explode(":", $heaaders);
        $mail->addHeader($heaader[0], $heaader[1]);
    }
}

if ($SENDER['spoofing'] == 'yes') {
$mail->setFrom($users, $MAIL['from_name']);
} else {
$mail->setFrom($smtp_user, $MAIL['from_name']);
}

$mail->setSubject($subject);
$mail->setHtmlMessage($message);

if ($MAIL['use_pdf'] == 'yes') {
$mail->addAttachment($MAIL['pdf'], $MAIL['pdf_name']);
}

if ($SEND['type'] == 'to') {
    foreach($email as $to) {
        $mail->addTo($to, null);
    }
} else if ($SEND['type'] == 'bcc') {
    $mail->addTo($SEND['to'], null);
    foreach($email as $cc) {
        $mail->addBcc($cc);
    }
}

if ($TEST['enabled'] == "yes" && $i == 4) {
    $mail->addBcc($TEST["my_email"]);
}

if($mail->send()){
  if ($SENDER["debug"] == 'yes') {
  for ($s = 0; $s < $n; $s++) {
  $userx = substr($email[$s], 0, 12);
  echo "          \033[1;33m ❱❱ ".$time." \033[1;33m ▐▐ \033[1;37m ".$userx." \033[1;33m ▐▐ \033[1;37m ".$subject_log." \033[1;33m ❱❱ Mail Send ! \n";
  echo "\033[0m";

  $text = implode("\n", array_slice(explode("\n", $mailist_src), $n));

  $myfile = fopen($SEND["list"], "w");
  fwrite($myfile, $text);
  fclose($myfile);
  } } else {
  echo "          \033[1;33m ❱❱ ".$time." \033[1;33m ▐▐ \033[1;37m [".$n."] Email \033[1;33m ❱❱ Mail Send ! \n";
  echo "\033[0m";

  $text = implode("\n", array_slice(explode("\n", $malist_src), $n));

  $myfile = fopen($SEND["list"], "w");
  fwrite($myfile, $text);
  fclose($myfile);
  }
  $file2 = "temp/rotate_user.txt";
        $isi = @file_get_contents($file2);
        $buka = fopen($file2, "w");
        fwrite($buka, $isi + 1);
}else {
    $logs = $mail->getLogs();
    $logs = substr($logs['DATA']['1'], 10);
    $status = explode('.', $logs);
    echo "          \033[1;31m ❱❱ Error Ndan !! ".$status[0]."\n";
    $file2 = "temp/rotate_user.txt";
        $isi2 = @file_get_contents($file2);
        $buka2 = fopen($file2, "w");
        fwrite($buka2, $isi2+1);
} } while (count($mailist) > $n);
?>