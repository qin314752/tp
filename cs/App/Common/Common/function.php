<?php 
function is_mobile(){ 
      $user_agent = $_SERVER['HTTP_USER_AGENT']; 
      $mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte"); 
      $is_mobile = false; 
      foreach ($mobile_agents as $device) {
         if (stristr($user_agent, $device)) {
              $is_mobile = true; 
              break; 
          } 
      } 
      return $is_mobile; 
  }
/**
 * 管理员权限数据重新排版
 *@param array $node
 *@param array $access
 *@param int pid 
 *@return array $arr 
 */
function node_merge($node,$access=null,$pid=0)
{
    $arr= array();
    foreach ($node as $k => $v) {
        if(is_array($access) ){
            $v['access'] = in_array($v['id'],$access)? 1 : 2;
        }
        if($v['pid']==$pid){
            $v['child'] = node_merge($node,$access,$v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}


/**
 * 格式化文件大小显示
 *
 * @param int $size
 * @return string
 */
function format_size($size)
{
    $prec = 3;
    $size = round(abs($size));
    $units = array(
        0 => " B ",
        1 => " KB",
        2 => " MB",
        3 => " GB",
        4 => " TB"
    );
    if ($size == 0)
    {
        return str_repeat(" ", $prec) . "0$units[0]";
    }
    $unit = min(4, floor(log($size) / log(2) / 10));
    $size = $size * pow(2, -10 * $unit);
    $digi = $prec - 1 - floor(log($size) / log(10));
    $size = round($size * pow(10, $digi)) * pow(10, -$digi);
 
    return $size . $units[$unit];
}

/**
 * 格式化容量大小
 */
function byteFormat($bytes, $unit = "", $decimals = 2) {
$units = array('B' => 0, 'KB' => 1, 'MB' => 2, 'GB' => 3, 'TB' => 4, 'PB' => 5, 'EB' => 6, 'ZB' => 7, 'YB' => 8);

$value = 0;
if ($bytes > 0) {
// 按字节生成自动前缀
// 如果错误的前缀
if (!array_key_exists($unit, $units)) {
$pow = floor(log($bytes)/log(1024));
$unit = array_search($pow, $units);
}

// 通过前缀计算字节值
$value = ($bytes/pow(1024,floor($units[$unit])));
}

// 如果小数不是数字或小数，则小于0
//然后设置默认值
if (!is_numeric($decimals) || $decimals < 0) {
$decimals = 2;
}

// 格式输出
return sprintf('%.' . $decimals . 'f '.$unit, $value);
} 

function dir_del($dirname){
  $files = array_diff(scandir($dirname), array('.','..'));
    foreach ($files as $dir) {
      if(is_dir($dirname.'/'.$dir)){
        dir_del($dirname.'/'.$dir);
      }else{
        unlink($dirname.'/'.$dir);
        rmdir($dirname);    

      }
      is_dir($dirname.'/'.$dir)?dir_del($dirname.'/'.$dir):unlink($dirname.'/'.$dir);
    }
    return $files;
}

//删除文件夹及文件夹下所有内容
function Rmall($dirname) {
    if (!file_exists($dirname)) {
        return false;
    }
    if (is_file($dirname) || is_link($dirname)) {
        return unlink($dirname);
    }

    $dir = dir($dirname);//如果对像是目录

    while (false !== $file = $dir->read()) {

        if ($file == '.' || $file == '..') {
            continue;
        }
        if(!is_dir($dirname."/".$file)){
            unlink($dirname."/".$file);
        }else{
            Rmall($dirname."/".$file);
        }
        
        rmdir($dirname."/".$file);
    }

    $dir->close();
    
    rmdir($dirname);

    return true;
}


//发起项目中项目金额为100倍数 验证
function project_money($project_money)
{
    if($project_money % 100 == 0){
        return true;
    }else{
        return false;
    }
}


// 创建文件夹写入内容.txt
function txt($path,$content,$name,$file_append='')
{
    if (!is_dir($path)){
        mkdir($path,0777);  // 创建文件夹,并给777的权限（所有权限）
    }
    $file = $path.$name;    // 写入的文件
    return file_put_contents($file,$content,$file_append);  // 最简单的快速的以追加的方式写入写入方法， 
}
//多文件上传
function upload($dir)
{
$num = 1;
//4.随机生成文件名称
$updir= "Upload/".$dir.'/';

    if(!file_exists($updir)){
        mkdir($updir,0777,true);
    }
    do{
        $newname = time().rand(1000,9999).'.'.pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    }while(file_exists($newname));

    $path = rtrim($updir,'/').'/'.$newname;
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
            $info = '上传成功路径是：'.$path;
             if(session('num')){
                  $img[$num]=$path;
                  session('img',$img);
                  session('num',$num);
              }else{
                $num = session('num');
                  $num = ++$num;
                  $img = session('img');
                  $img[$num]=$path;
                  session('img',$img);
                  session('num',$num);
              }

        }else{
            $info = '上传失败原因：移动失败';
        }
    }else{
        $info = '不是通过http post方式上传的文件';
    }
    return $info;

}
//单个文件上传
function upload_img($file_name,$path){
    if(is_uploaded_file($_FILES[$file_name]['tmp_name'])){
      $upfile=$_FILES[$file_name];
      $name=$upfile["name"];//上传文件的文件名
      $type=$upfile["type"];//上传文件的类型
      $size=$upfile["size"];//上传文件的大小
      $tmp_name=$upfile["tmp_name"];//上传文件的临时存放路径
      switch ($type){
      case 'image/pjpeg':$okType=true;
      break;
      case 'image/jpg':$okType=true;
      break;
      case 'image/jpeg':$okType=true;
      break;
      case 'image/gif':$okType=true;
      break;
      case 'image/png':$okType=true;
      break;
      default:
          $okType=false;
      break;
      }
    if($okType){
        $error=$upfile["error"];//上传后系统返回的值
        if($error==0){
           $updir=C('WEB_ROOT').'Upload/'.$path.'/';
           if(!file_exists($updir))mkdir($updir,0777,true);
           $newname = md5(time().rand(1000,9999)).'.'.explode('/', $type)[1];
           move_uploaded_file($tmp_name,$updir.$newname);
           return $array =array($updir.$newname);
        }elseif ($error==1){
        return "文件大小超出了服务器的空间大小，在php.ini文件中设置";
        }elseif ($error==2){
        return "要上传的文件大小超出浏览器限制 MAX_FILE_SIZE选项指定的值";
        }elseif ($error==3){
        return "文件只有部分被上传";
        }elseif ($error==4){
        return "没有文件被上传";
        }elseif ($error==5){
        return "服务器临时文件夹丢失";
        }elseif ($error==6){
        return "文件写入到临时文件夹出错";
        }
      }else{
      return "请上传pjpeg,jpg,gif,png等格式的图片！";
      }
    }else{
      return "请上传pjpeg,jpg,gif,png等格式的图片！";

    }
  }
  function img_errors($file_name){
      $error=$_FILES[$file_name]["error"];
    if($error==0){
           return true;
        }elseif ($error==1){
        return "文件大小超出了服务器的空间大小，在php.ini文件中设置";
        }elseif ($error==2){
        return "要上传的文件大小超出浏览器限制 MAX_FILE_SIZE选项指定的值";
        }elseif ($error==3){
        return "文件只有部分被上传";
        }elseif ($error==4){
        return "没有文件被上传";
        }elseif ($error==5){
        return "服务器临时文件夹丢失";
        }elseif ($error==6){
        return "文件写入到临时文件夹出错";
        }else{
          return '错误';
        }
  }

 function img_type($file_name){
      $type=$_FILES[$file_name]["type"];
      switch ($type){
      case 'image/pjpeg':$okType=true;
      break;
      case 'image/jpeg':$okType=true;
      break;
      case 'image/gif':$okType=true;
      break;
      case 'image/png':$okType=true;
      break;
      case 'image/jpg':$okType=true;
      break;
      default:
          $okType=false;
      break;
      }
      return $okType;
}
/*
* $type         控制器/方法
* $tid          等级分类
* $deal_info    操作信息
* $deal_user    操作用户
*/
// 上传图片删除
function upload_del($img)
{
    if(is_string($img)){
        if(strstr($img,'@')){
            $img = explode('@',$img);
             foreach ($img as $value) {
               return unlink($value);
             }
        }else{
            return  unlink($img);
        }
    }
   
}
// @Upload/product_img/15017393743482.jpg
//后台管理员登录日志
function alogs($type,$tid,$deal_info='',$deal_user='',$table="auser_dologs"){
    $arr = array();
    $arr['type'] = $type;
    $arr['tid'] = $tid;
    $arr['deal_info'] = $deal_info;
    $arr['deal_user'] = $deal_user?$deal_user:session('adminname');
    $arr['deal_ip'] = get_client_ip();
    $arr['deal_time'] = time();
    $newid = M($table)->add($arr);
    return $newid;
}

//发起项目金钱格式验证
function prod_money($prod_money){
    $pattern = "/^[0-9]+$/";
    $patterns = "/^[0-9]+\.[0-9]{1,2}$/";
    if(preg_match($pattern,$prod_money)||preg_match($patterns,$prod_money)){
        $float=floatval($prod_money);
        $number = number_format($float, 2, '.', '');
        $pattern = "/^[0-9]+\.[0-9]{2}$/";
       if(preg_match($pattern,$number)){
        return true;
       }else{
        return false;
       }
    }else{
        return false;
    }
}
function figure($prod_money){
    $pattern = "/^[0-9]+$/";
    $patterns = "/^[0-9]+\.[0-9]{1,2}$/";
    if(preg_match($pattern,$prod_money)||preg_match($patterns,$prod_money)){
        return true;
    }else{
        return false;
    }
}


function prod_item_time($prod_item_time){
    $prod_item = "/^[0-9]+$/";
    if(preg_match($prod_item,$prod_item_time)){
        return true;
    }else{
        return false;
    }
}

/**
 * -------------邮件发送函数-----------------------
 * $email_recipients  收件人邮箱
 * $emial_content     邮件内容
 * ------------------------------------------------
 **/
 
 function sendMail($email_recipients,$emial_content,$code = "utf-8"){
   $note = FS('Dynamic/note');
       if(!$note){
        $add = M('system')->select()[0];
        $note = FS('note',$add,'Dynamic/');
       }
  $mail= new Org\Util\PHPMailer();
  $mail->CharSet = $code;           // 编码格式
  $mail->IsSMTP();
  $mail->SMTPAuth   = true;                    // 必填，SMTP服务器是否需要验证，true为需要，false为不需要
  $mail->Host       = $note['smtp_server'];    // 必填，设置SMTP服务器 
  $mail->Port       = $note['smtp_port'];      //$smtp_port;       // 设置端口
  $mail->Username   = $note['smtp_user'];     // 必填，开通SMTP服务的邮箱；任意一个163邮箱均可
  $mail->Password   = $note['smtp_pw'];       // 必填， 以上邮箱对应的密码
  $mail->From       = $note['smtp_user'];       // 必填，发件人Email
  $mail->FromName   = $note['smtp_name'];             // 必填，发件人昵称或姓名
  $mail->Subject    = $note['smtp_title'] ;           // 必填，邮件标题（主题）
  
  //可选，纯文本形势下用户看到的内容
  //$mail->AltBody    = "This is the body when user views in plain text format"; 
  $mail->WordWrap   = 50;             // 自动换行的字数
  
  $mail->MsgHTML($emial_content );//邮件内容
  // $mail->AddReplyTo($result_mail);     // 收件人回复的邮箱地址
  $mail->AddAddress($email_recipients);   // 收件人邮箱
  $mail->IsHTML(true);            // 是否以HTML形式发送，如果不是，请删除此行
  $mail->Send();
}


 /**
 * 短信亿美软通短信
 * 非加密接口demo 
 */
$note = FS('Dynamic/note');
date_default_timezone_set('PRC');
define("YM_SMS_ADDR",               "100.100.11.68:8999");/*接口地址,请联系销售获取*/
define("YM_SMS_SEND_URI",           "/simpleinter/sendSMS");/*发送短信接口*/
define("YM_SMS_SEND_PER_URI",         "/simpleinter/sendPersonalitySMS");/*发送个性短信接口*/
define("YM_SMS_GETREPORT_URI",      "/simpleinter/getReport");/*获取状态报告接口*/
define("YM_SMS_GETMO_URI",          "/simpleinter/getMo");/*获取上行接口*/
define("YM_SMS_GETBALANCE_URI",     "/simpleinter/getBalance");  /*获取余额接口*/
define("YM_SMS_APPID",              $note['cdkey']);/*APPID,请联系销售或者在页面获取*/
define("YM_SMS_AESPWD",             $note['cdkey_pw']);/*密钥，请联系销售或者在页面获取*/


// define("END",               "\n");
/**
 * 短信亿美软通短信方法
 * 非加密接口demo 
 */

function http_request($url, $data)
{
    print_r($url);
    print_r(END);
    print_r($data);
    print_r(END);
    $data = http_build_query($data);  
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $output = curl_exec($curl);
    curl_close($curl);
    print_r($output);
    return $output;
}

function signmd5($appId,$secretKey,$timestamp){
  return md5($appId.$secretKey.$timestamp);
}
/**
 * 短信亿美软通短信END
 * 非加密接口demo 
 */



 /**
 * 短信查余额
 */
function residue()
{
$note = FS('Dynamic/note');

  /**
 * 短信漫道短信
 */
$flag = 0; 
        //要post的数据 
$argv = array( 
         'sn'=>$note['sn'], //替换成您自己的序列号
         'pwd'=>$note['pwd'],//替换成您自己的密码
    
     ); 
//构造要post的字符串 
foreach ($argv as $key=>$value) { 
          if ($flag!=0) { 
                         $params .= "&"; 
                         $flag = 1; 
          } 
         $params.= $key."="; $params.= urlencode($value); 
         $flag = 1; 
          } 
         $length = strlen($params); 
                 //创建socket连接 
        $fp = fsockopen("sdk2.entinfo.cn",8060,$errno,$errstr,10) or exit($errstr."--->".$errno); 
         //构造post请求的头 
         $header = "POST /webservice.asmx/GetBalance HTTP/1.1\r\n"; 
         $header .= "Host:sdk2.entinfo.cn\r\n"; 
         $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
         $header .= "Content-Length: ".$length."\r\n"; 
         $header .= "Connection: Close\r\n\r\n"; 
         //添加post的字符串 
         $header .= $params."\r\n"; 
         //发送post的数据 
         fputs($fp,$header); 
         $inheader = 1; 
          while (!feof($fp)) { 
                         $line = fgets($fp,1024); //去除请求包的头只显示页面的返回数据 
                         if ($inheader && ($line == "\n" || $line == "\r\n")) { 
                                 $inheader = 0; 
                          } 
                          if ($inheader == 0) { 
                                // echo $line; 
                          } 
          } 
      //<string xmlns="http://tempuri.org/">-5</string>
         $line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
         $line=str_replace("</string>","",$line);
       $result=explode("-",$line);
        if(count($result)>1)
      return '发送失败返回值为:'.$line;
      else
      return $line;
}
 /* 
  *亿美软通短信提供商   
  */ 
function getBalance()
{   
  $timestamp = date("YmdHis");
  $sign = signmd5(YM_SMS_APPID,YM_SMS_AESPWD,$timestamp);
    $data = array(
        "appId" => YM_SMS_APPID,
        "timestamp" => $timestamp,
        "sign" => $sign
    );
    $url = YM_SMS_ADDR.YM_SMS_GETBALANCE_URI;
    $resobj = http_request($url,$data);
    return $resobj;
}  
 /**
 * 短信给不同的手机号发不同的内容,短信的内容里有英文的逗号
 *@param int phone  手机号码
 *@param string $content  发送内容
 */
function message($phone,$content)
{
$note = FS('Dynamic/note');
$provider = $note['provider'];
if($provider==1){
	//该demo的功能是给不同的手机号发不同的内容,短信的内容里有英文的逗号，参考此demo
$flag = 0; 
        //要post的数据 
 if(is_array($content)){
        foreach ($content as $key => $value) {
            $content .= urlencode($value).',';
        }
     }else{
            $content = iconv( "UTF-8", "gb2312//IGNORE" ,$content);//多个内容分别urlencode编码然后逗号隔开
     }
$argv = array( 
    'sn'=>$note['sn'], //提供的账号
    'pwd'=>strtoupper(md5($note['sn'].$note['pwd'])), //此处密码需要加密 加密方式为 md5(sn+password) 32位大写
     'mobile'=>$phone,//手机号 多个用英文的逗号隔开 一次小于1000个手机号
     // 'mobile'=>'153****5051,153****8585,137****1021',//手机号 多个用英文的逗号隔开 一次小于1000个手机号
    'content'=>$content,
      // 'content'=>urlencode('测试1').','.urlencode('策划i').','.urlencode('测试2'),//多个内容分别urlencode编码然后逗号隔开
     'ext'=>'',//子号(可以空 ,可以是1个 可以是多个,多个的需要和内容和手机号一一对应)
     'stime'=>'',//定时时间 格式为2011-6-29 11:09:21
     'rrid'=>''
     ); 
//构造要post的字符串 
foreach ($argv as $key=>$value) { 
          if ($flag!=0) { 
                         $params .= "&"; 
                         $flag = 1; 
          } 
         $params.= $key."="; $params.=urlencode($value); 
         $flag = 1; 
          } 
         $length = strlen($params); 
                 //创建socket连接 
         $fp = fsockopen("sdk2.entinfo.cn",8060,$errno,$errstr,10) or exit($errstr."--->".$errno); 
         //构造post请求的头 
         $header = "POST /webservice.asmx/gxmt HTTP/1.1\r\n"; 
         $header .= "Host:sdk2.entinfo.cn\r\n"; 
         $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
         $header .= "Content-Length: ".$length."\r\n"; 
         $header .= "Connection: Close\r\n\r\n"; 
         //添加post的字符串 
         $header .= $params."\r\n"; 
         //发送post的数据 
         fputs($fp,$header); 
         $inheader = 1; 
          while (!feof($fp)) { 
                         $line = fgets($fp,1024); //去除请求包的头只显示页面的返回数据 
                         if ($inheader && ($line == "\n" || $line == "\r\n")) { 
                                 $inheader = 0; 
                          } 
                          if ($inheader == 0) { 
                                // echo $line; 
                          } 
          } 
      //<string xmlns="http://tempuri.org/">-5</string>
         $line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
         $line=str_replace("</string>","",$line);
       $result=explode("-",$line);
        if(count($result)>1)
      // return  $str = '发送失败返回值为:'.$line.'。请查看webservice返回值对照表';
      return false; //$str = '发送失败返回值为:'.$line.'。请查看webservice返回值对照表';
      else
      // return  $str = '发送成功 返回值为:'.$line; 
      return true;// $str = '发送成功 返回值为:'.$line; 
	}else if($provider==2){
    /* 
     *亿美软通短信提供商   
     */  
    $content = "今天天气不错啊&st=xxx";
    $timestamp = date("YmdHis");
    $sign = signmd5(YM_SMS_APPID,YM_SMS_AESPWD,$timestamp);
    // 如果您的系统环境不是UTF-8，需要转码到UTF-8。如下：从gb2312转到了UTF-8
    // $content = mb_convert_encoding( $content,"UTF-8","gb2312");
    // 另外，如果包含特殊字符，需要对内容进行urlencode
    $data = array(
        "appId" => YM_SMS_APPID,
        "timestamp" => $timestamp,
        "sign" => $sign,
        "mobiles" => "18001000000,18001000001",
        "content" =>  $content,
        "customSmsId" => "10001",
        "timerTime" => "20170910110200",
        "extendedCode" => "1234"
    );
    $url = YM_SMS_ADDR.YM_SMS_SEND_URI;
    $resobj = http_request($url, $data);
    return $resobj;
  }
}

 /**
 * 群发短信和发单条短信。（传一个手机号就是发单条，多个手机号既是群发）
 *@param int phone  手机号码
 *@param string $content  发送内容
 */
function texting($phone,$content)
{
$note = FS('Dynamic/note');
$provider = $note['provider'];
if($provider==1){
//您把序列号和密码还有手机号，填上，直接运行就可以了
$flag = 0; 
        //要post的数据 
$argv = array( 
         'sn'=>$note['sn'], ////替换成您自己的序列号
		 'pwd'=>strtoupper(md5($note['sn'].$note['pwd'])), //此处密码需要加密 加密方式为 md5(sn+password) 32位大写
		 'mobile'=>$phone,//手机号 多个用英文的逗号隔开 post理论没有长度限制.推荐群发一次小于等于10000个手机号
		 // 'content'=>urlencode( $content),//短信内容
     	 'content'=>iconv( "UTF-8", "gb2312//IGNORE" ,$content),//短信内容

		 'ext'=>'',
		 'rrid'=>'',//默认空 如果空返回系统生成的标识串 如果传值保证值唯一 成功则返回传入的值
		 'stime'=>''//定时时间 格式为2011-6-29 11:09:21
		 ); 
//构造要post的字符串 
foreach ($argv as $key=>$value) { 
          if ($flag!=0) { 
                         $params .= "&"; 
                         $flag = 1; 
          } 
         $params.= $key."="; $params.= urlencode($value); 
         $flag = 1; 
          } 
         $length = strlen($params); 
                 //创建socket连接 
        $fp = fsockopen("sdk2.entinfo.cn",8060,$errno,$errstr,10) or exit($errstr."--->".$errno); 
         //构造post请求的头 
         $header = "POST /webservice.asmx/mdSmsSend_u HTTP/1.1\r\n"; 
         $header .= "Host:sdk2.entinfo.cn\r\n"; 
         $header .= "Content-Type: application/x-www-form-urlencoded\r\n"; 
         $header .= "Content-Length: ".$length."\r\n"; 
         $header .= "Connection: Close\r\n\r\n"; 
         //添加post的字符串 
         $header .= $params."\r\n"; 
         //发送post的数据 
         fputs($fp,$header); 
         $inheader = 1; 
          while (!feof($fp)) { 
                         $line = fgets($fp,1024); //去除请求包的头只显示页面的返回数据 
                         if ($inheader && ($line == "\n" || $line == "\r\n")) { 
                                 $inheader = 0; 
                          } 
                          if ($inheader == 0) { 
                                // echo $line; 
                          } 
          } 

		  //第一种，简单的字符串删除
		  //<string xmlns="http://tempuri.org/">-5</string>
	       //$line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
	       //$line=str_replace("</string>","",$line);

		   //第二种，xml转数组
		   /*
		   $xml = simplexml_load_string($line);
$mixArray = (array)$xml;
$result=explode("-",$mixArray[0]);
*/

//第三种，正则取

preg_match('/<string xmlns=\"http:\/\/tempuri.org\/\">(.*)<\/string>/',$line,$str);
	$result=explode("-",$str[1]);


		   
		    if(count($result)>1)
			return '发送失败返回值为:'.$line."请查看webservice返回值";
			else
			return '发送成功 返回值为:'.$line;  
	}else if($provider==2){

  }
  
}

function wap_domain($path){
    
      $wap_domain = C('WAP_DOMAIN');
      $str = "'WAP_DOMAIN'=>'$wap_domain'";
      $data = FS('web_set/web')['wap_domain'];
      $data = "'WAP_DOMAIN'=>'$data'";
      $content = file_get_contents($path.'config.php'); 
      $content = str_replace($str,$data,$content); 
     if(!file_put_contents($path.'config.php',$content)){
      return false;
     }else{
      return true;
     }


  }
//模板映射
function mapping($path,$wap_domain,$index=''){
  $url_map = C('URL_MODULE_MAP');
    $arr = array_flip($url_map)['admin'];
    if($wap_domain){
        $wap_domain = C('WAP_DOMAIN');
      $str = "'WAP_DOMAIN'=>'$wap_domain'";
      $data = FS('web_set/web')['wap_domain'];
      $data = "'WAP_DOMAIN'=>'$data'";
      $content = file_get_contents($path.'config.php'); 
      $content = str_replace($str,$data,$content); 
     file_put_contents($path.'config.php',$content);
    }
    if($index){return $arr;}
    $str ="'URL_MODULE_MAP'=>array('$arr'=>'admin')" ;
    FS('text',$str,$path);
    if($contents = FS($path.'text')){
      $data = FS('web_set/web')['wap_admin'];
      $str ="'URL_MODULE_MAP'=>array('$data'=>'admin')" ;
      if($content = file_get_contents($path.'config.php')){
        $content = str_replace($contents,$str,$content);
        if(file_put_contents($path.'config.php',$content)){
          return true;
        }else{
          return false;
        }
      }else{
          return false;
      }
    }else{
          return false;
    }
}


 //快速缓存调用和储存
function FS($filename,$data="",$path=""){
    $path = C("WEB_ROOT").$path;
    if($data==""){
        $f = explode("/",$filename);
        $num = count($f);
        if($num>2){
            $fx = $f;
            array_pop($f);
            $pathe = implode("/",$f);
            $re = F($fx[$num-1],'',$pathe."/");
        }else{
            isset($f[1])?$re = F($f[1],'',C("WEB_ROOT").$f[0]."/"):$re = F($f[0]);
        }
        return $re;
    }else{
        if(!empty($path)) $re = F($filename,$data,$path);
        else $re = F($filename,$data);
    }
}
//判断产品种类
function prod_kind($int){
  $array = array(1=>'汗蒸',2=>'足浴',3=>'推拿',4=>'spa养生',5=>'中医调理',6=>'最新优惠',7=>'团购');
   return $array[$int];
}
//判断产品等级
function prod_grade($int){
  $array = array(1=>'推荐',2=>'新款',3=>'普通');
   return $array[$int];
}
function prod_part($string,$int){
  $str = explode("@",$string);
  $arr = array('全身'=>'1','颈肩'=>'2','腿部'=>'3','足部'=>'4','背部'=>'5','脏腑'=>'6','经络'=>'7');
  $img = array('prod_part1.png'=>1,'prod_part2.png'=>2,'prod_part3.png'=>3,'prod_part4.png'=>4,'prod_part5.png'=>5,'prod_part6.png'=>6,'/prod_part7.png'=>7);
    $imgs = '';
  if($int){

    foreach ($str as $key => $value) {
        if(in_array($value, $img)){
          $array = array_flip($img);
          $imgs .= '<img src="/Public/Home/img/'.$array[$value].'">';
        }
    }
  }else{
    foreach ($str as $key => $value) {
        // if(in_array($value, $arr)){
          $array = array_flip($arr);
          $imgs .= $array[$value].'/';
        // }
    }
  }
    return $imgs;

}
//数据分页整合
function  pagings($table,$where,$order,$url,$pag=1){
    $count = M($table)->where($where)->count(); 
    if($count>0&&ceil($count/10)<=1&&ceil($count/10)>0){
      $pags = 1;
    }else{
      $pags = ceil($count/10);
    }
    if($pags){
      //数据获取
      if($pags>=$pag){
        $n = $pag*10-10;
        $m = 10;
        $data['data'] = M($table)->where($where)->order($order)->limit($n,$m)->select();
      
      //分页获取
       $pag_m = 1;
    if($pag-1>0){$pagy = $pag-1;}else{$pagy =1;}
      $str = "<a href='$url$pag_m'>首页&nbsp;</a><a href='$url$pagy'> 上一页&nbsp; </a>&nbsp;";
      $num = $pag+4;
      if($pags>=$num){
          if($pag>1)$str .="...";
          for ($i=$pag; $i <= $num; $i++) { 
          $str .="<a  href=$url$i>$i</a>&nbsp;&nbsp;";
          }
          $str .="...";
      }elseif($pags<$num &&$pags>4){
        $num=$pags; 
        $str .="...";
        for ($i=$num-4;$i <= $pags; $i++) { 
        $str .="<a href=$url$i>$i</a>&nbsp;&nbsp;";
        }
        $str .="...";
      }elseif ($pags<4&&$pags>0) {
          for ($i=1; $i <= $pags; $i++) { 
           $str .="<a href=$url$i>$i</a>&nbsp;&nbsp;";
          }
      }
      if($pag+1<=$pags){$pagx = $pag+1;}else{$pagx = $pags;}
      $str .= "<a href='$url$pagx'>&nbsp;下一页 </a><a href='$url$pags'>&nbsp;尾页 </a>";
      $data['num'] = $str;
      return $data;

    }else{
      return false;
    }
    }else{
        return false;
    }
  }
    









//分页数据
function paging($table,$where,$order,$pag){
  $count = M($table)->where($where)->count(); 
  if($count>0&&ceil($count/10)<=1&&ceil($count/10)>0){
    $pags = 1;
  }else{
    $pags = ceil($count/10);
  }
  if($pag){
    if($pags>=$pag){
      $n = $pag*10-10;
      $m = 10;
      return M($table)->where($where)->order($order)->limit($n,$m)->select();
    }else{
      return false;
    }
  }else{
    // if($pags>=$list){
    //   return M($table)->where($where)->order($order)->select();
    // }else{
      return false;
      
    // }

  }
}
//分页上下个数
function pags($table,$where,$url,$pag){
 $count = M($table)->where($where)->count(); 
  if($count>0&&ceil($count/10)<=1&&ceil($count/10)>0){
    $pags = 1;
  }else{
    $pags = ceil($count/10);
  }
  if($pags){
    $m = 1;
    if($pag-1>0){$pagy = $pag-1;}else{$pagy =1;}
      $str = "<a href='$url$m'>首页&nbsp;</a><a href='$url$pagy'> 上一页&nbsp; </a>&nbsp;";
      $num = $pag+4;
      if($pags>=$num){
          if($pag>1)$str .="...";
          for ($i=$pag; $i <= $num; $i++) { 
          $str .="<a  href=$url$i>$i</a>&nbsp;&nbsp;";
          }
          $str .="...";
      }elseif($pags<$num &&$pags>4){
        $num=$pags; 
        $str .="...";
        for ($i=$num-4;$i <= $pags; $i++) { 
        $str .="<a href=$url$i>$i</a>&nbsp;&nbsp;";
        }
        $str .="...";
      }elseif ($pags<4&&$pags>0) {
          for ($i=1; $i <= $pags; $i++) { 
           $str .="<a href=$url$i>$i</a>&nbsp;&nbsp;";
          }
      }
  if($pag+1<=$pags){$pagx = $pag+1;}else{$pagx = $pags;}
      $str .= "<a href='$url$pagx'>&nbsp;下一页 </a><a href='$url$pags'>&nbsp;尾页 </a>";
      return $str;
    }
}


/**
 * IP转换成地区
 */
function ip2area($ip="") {
  if(strlen($ip)<6) return;
  $Ip = new\Org\Net\IpLocation("CoralWry.dat"); 
  $area = $Ip->getlocation($ip);
  $area = auto_charset($area);
  if($area['country']) $res = $area['country'];
  if($area['area']) $res = $res."(".$area['area'].")";
  if(empty($res)) $res = "未知";
  return $res;
}
// 自动转换字符集 支持数组转换
function auto_charset($fContents, $from='gbk', $to='utf-8') {
    $from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
    $to = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
    // if ( ($to=='utf-8'&&is_utf8($fContents)) || strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents))) {
    //     //如果编码相同或者非字符串标量则不转换
    //     return $fContents;
    // }
    if (is_string($fContents)) {
        if (function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($fContents, $to, $from);
        } elseif (function_exists('iconv')) {
            return iconv($from, $to, $fContents);
        } else {
            return $fContents;
        }
    } elseif (is_array($fContents)) {
        foreach ($fContents as $key => $val) {
            $_key = auto_charset($key, $from, $to);
            $fContents[$_key] = auto_charset($val, $from, $to);
            if ($key != $_key)
                unset($fContents[$key]);
        }
        return $fContents;
    }
    else {
        return $fContents;
    }
}
//把秒换成小时或者天数
function second2string($second,$type=0){
  $day = floor($second/(3600*24));
  $second = $second%(3600*24);//除去整天之后剩余的时间
  $hour = floor($second/3600);
  $second = $second%3600;//除去整小时之后剩余的时间 
  $minute = floor($second/60);
  $second = $second%60;//除去整分钟之后剩余的时间 
  
  switch($type){
    case 0:
      if($day>=1) $res = $day."天";
      elseif($hour>=1) $res = $hour."小时";
      else  $res = $minute."分钟";
    break;
    case 1:
      if($day>=5) $res = date("Y-m-d H:i",time()+$second);
      elseif($day>=1&&$day<5) $res = $day."天前";
      elseif($hour>=1) $res = $hour."小时前";
      else  $res = $minute."分钟前";
    break;
  }
  //返回字符串
  return $res;
}
//将秒数转换为时间（年、天、小时、分、秒）
function Sec2Time($time){
    if(is_numeric($time)){
    $value = array(
      "years" => 0, "days" => 0, "hours" => 0,
      "minutes" => 0, "seconds" => 0,
    );
    if($time >= 31556926){
      $value["years"] = floor($time/31556926);
      $time = ($time%31556926);
    }
    if($time >= 86400){
      $value["days"] = floor($time/86400);
      $time = ($time%86400);
    }
    if($time >= 3600){
      $value["hours"] = floor($time/3600);
      $time = ($time%3600);
    }
    if($time >= 60){
      $value["minutes"] = floor($time/60);
      $time = ($time%60);
    }
    $value["seconds"] = floor($time);
    //return (array) $value;
    // var_dump($value);
    if($value["years"]){
      $t = $value["years"] ."年";
    }
    if($value["days"]){
      $t.=$value["days"] ."天";
    }
    if($value["hours"]){
      $t.=$value["hours"] ."小时";
    }
    if($value["minutes"]){
      $t.=$value["minutes"] ."分";
    }
    if($value["seconds"]){
      $t.=$value["seconds"]."秒";
    }
    // $t=$value["years"] ."年". $value["days"] ."天"." ". $value["hours"] ."小时". $value["minutes"] ."分".$value["seconds"]."秒";
    return $t;
    
     }else{
    return (bool) FALSE;
    }
 }

//输出纯文本
function text($text,$parseBr=false,$nr=false){
    $text = htmlspecialchars_decode($text);
    $text = safe($text,'text');
    if(!$parseBr&&$nr){
        $text = str_ireplace(array("\r","\n","\t","&nbsp;"),'',$text);
        $text = htmlspecialchars($text,ENT_QUOTES);
    }elseif(!$nr){
        $text = htmlspecialchars($text,ENT_QUOTES);
  }else{
        $text = htmlspecialchars($text,ENT_QUOTES);
        $text = nl2br($text);
    }
    $text = trim($text);
    return $text;
}
function safe($text,$type='html',$tagsMethod=true,$attrMethod=true,$xssAuto = 1,$tags=array(),$attr=array(),$tagsBlack=array(),$attrBlack=array()){

    //无标签格式
    $text_tags  = '';

    //只存在字体样式
    $font_tags  = '<i><b><u><s><em><strong><font><big><small><sup><sub><bdo><h1><h2><h3><h4><h5><h6>';

    //标题摘要基本格式
    $base_tags  = $font_tags.'<p><br><hr><a><img><map><area><pre><code><q><blockquote><acronym><cite><ins><del><center><strike>';

    //兼容Form格式
    $form_tags  = $base_tags.'<form><input><textarea><button><select><optgroup><option><label><fieldset><legend>';

    //内容等允许HTML的格式
    $html_tags  = $base_tags.'<ul><ol><li><dl><dd><dt><table><caption><td><th><tr><thead><tbody><tfoot><col><colgroup><div><span><object><embed>';

    //专题等全HTML格式
    $all_tags = $form_tags.$html_tags.'<!DOCTYPE><html><head><title><body><base><basefont><script><noscript><applet><object><param><style><frame><frameset><noframes><iframe>';

    //过滤标签
    $text = strip_tags($text, ${$type.'_tags'} );

        //过滤攻击代码
        if($type!='all'){
            //过滤危险的属性，如：过滤on事件lang js
            while(preg_match('/(<[^><]+) (onclick|onload|unload|onmouseover|onmouseup|onmouseout|onmousedown|onkeydown|onkeypress|onkeyup|onblur|onchange|onfocus|action|background|codebase|dynsrc|lowsrc)([^><]*)/i',$text,$mat)){
                $text = str_ireplace($mat[0],$mat[1].$mat[3],$text);
            }
            while(preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i',$text,$mat)){
                $text = str_ireplace($mat[0],$mat[1].$mat[3],$text);
            }
        }
        return $text;
}
/*
* 中文截取，支持gb2312,gbk,utf-8,big5 
*
* @param string $str 要截取的字串
* @param int $start 截取起始位置
* @param int $length 截取长度
* @param string $charset utf-8|gb2312|gbk|big5 编码
* @param $suffix 是否加尾缀
*/
function cnsubstr($str, $length, $start=0, $charset="utf-8", $suffix=true)
{
     $str = strip_tags($str);
     if(function_exists("mb_substr"))
     {
         if(mb_strlen($str, $charset) <= $length) return $str;
         $slice = mb_substr($str, $start, $length, $charset);
     }
     else
     {
         $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
         $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
         $re['gbk']          = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
         $re['big5']          = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
         preg_match_all($re[$charset], $str, $match);
         if(count($match[0]) <= $length) return $str;
         $slice = join("",array_slice($match[0], $start, $length));
     }
     if($suffix) return $slice."…";
     return $slice;
}

/*
  格式化显示时间
*/
function getLastTimeFormt($time,$type=0){
  if($type==0) $f="m-d H:i"; 
  else if($type==1) $f="Y-m-d H:i";
  $agoTime = time() - $time;
    if ( $agoTime <= 60&&$agoTime >=0 ) {
        return $agoTime.'秒前';
    }elseif( $agoTime <= 3600 && $agoTime > 60 ){
        return intval($agoTime/60) .'分钟前';
    }elseif ( date('d',$time) == date('d',time()) && $agoTime > 3600){
    return '今天 '.date('H:i',$time);
    }elseif( date('d',$time+86400) == date('d',time()) && $agoTime < 172800){
    return '昨天 '.date('H:i',$time);
    }else{
        return date($f,$time);
    }

}
//格式化URL，只判断域名，前台后台共用，前台生成供判断的URL，后台生成供储存以便对比的URL
function formtUrl($url){
  if(!stristr($url,"http://")) $url = str_replace("http://","",$url);
  
  $fourl = explode("/",$url);
  $domain = get_domain("http://".$fourl[0]);
  $perfix = str_replace($domain,'',$fourl[0]);
  return $perfix.$domain;
}
function get_domain($url)
{
  $pattern = "/[/w-]+/.(com|net|org|gov|biz|com.tw|com.hk|com.ru|net.tw|net.hk|net.ru|info|cn|com.cn|net.cn|org.cn|gov.cn|mobi|name|sh|ac|la|travel|tm|us|cc|tv|jobs|asia|hn|lc|hk|bz|com.hk|ws|tel|io|tw|ac.cn|bj.cn|sh.cn|tj.cn|cq.cn|he.cn|sx.cn|nm.cn|ln.cn|jl.cn|hl.cn|js.cn|zj.cn|ah.cn|fj.cn|jx.cn|sd.cn|ha.cn|hb.cn|hn.cn|gd.cn|gx.cn|hi.cn|sc.cn|gz.cn|yn.cn|xz.cn|sn.cn|gs.cn|qh.cn|nx.cn|xj.cn|tw.cn|hk.cn|mo.cn|org.hk|is|edu|mil|au|jp|int|kr|de|vc|ag|in|me|edu.cn|co.kr|gd|vg|co.uk|be|sg|it|ro|com.mo)(/.(cn|hk))*/";
  preg_match($pattern, $url, $matches);
  if(count($matches) > 0)
  {
    return $matches[0];
  }else{
    $rs = parse_url($url);
    $main_url = $rs["host"];
    if(!strcmp(long2ip(sprintf("%u",ip2long($main_url))),$main_url))
    {
      return $main_url;
    }else{
      $arr = explode(".",$main_url);
      $count=count($arr);
      $endArr = array("com","net","org");//com.cn net.cn 等情况
      if (in_array($arr[$count-2],$endArr))
      {
        $domain = $arr[$count-3].".".$arr[$count-2].".".$arr[$count-1];
      }else{
        $domain = $arr[$count-2].".".$arr[$count-1];
      }
      return $domain;
    }
  }
} 

//获取远程图片
function get_remote_img($content){
  $rt = C("WEB_ROOT");
  $img_dir = C("REMOTE_IMGDIR")?C("REMOTE_IMGDIR"):"/Static/Remote";//img_dir远程图片的保存目录，带前"/"不带后"/"
  $base_dir = substr($rt,0,strlen($rt)-1);//$base_dir网站根目录物理路径，不带后"/"
  
  $content = stripslashes($content); 
  $img_array = array(); 
  preg_match_all("/(src|SRC)=[\"|'| ]{0,}(http:\/\/(.*)\.(gif|jpg|jpeg|bmp|png|ico))/isU",$content,$img_array); //获取内容中的远程图片
  $img_array = array_unique($img_array[2]); //把重复的图片去掉
  set_time_limit(0); 
  $imgUrl = $img_dir."/".strftime("%Y%m%d",time()); //img_dir远程图片的保存目录，带前"/"不带后"/"
  $imgPath = $base_dir.$imgUrl; //$base_dir网站根目录物理路径，不带后"/"
  $milliSecond = strftime("%H%M%S",time()); 
  if(!is_dir($imgPath)) MakeDir($imgPath,0777);//如果路径不存在则创建
  foreach($img_array as $key =>$value) 
  { 
    $value = trim($value); 
    $get_file = @file_get_contents($value); 
    $rndFileName = $imgPath."/".$milliSecond.$key.".".substr($value,-3,3); 
    $fileurl = $imgUrl."/".$milliSecond.$key.".".substr($value,-3,3); 

    if($get_file) 
    { 
      $fp = @fopen($rndFileName,"w"); 
      @fwrite($fp,$get_file); 
      @fclose($fp); 
    } 
    $content = ereg_replace($value,$fileurl,$content); 
  } 
  //$content = addslashes($content); 
  return $content;
}

/**
* 格式化资金数据保持两位小数
* @desc intval $num  // 接受资金数据
*/
function MFormt($num)
{
    return number_format($num,2);
}

//将XML转为array
function xmlToArray($xml)
{    
    //禁止引用外部xml实体
    libxml_disable_entity_loader(true);
    $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);        
    return $values;
}


//冒泡排序
function bubble_sort($arr){
  for($i=0;$i<count($arr)-1;$i++ ){       
    for($j=0;$j<count($arr)-1-$i;$j++){ 
        if($arr[$j] > $arr[$j+1]){
            $tmp = $arr[$j];
            $arr[$j] = $arr[$j+1];
            $arr[$j+1] = $tmp;
        } 
    }
  }
  return $arr;
}


//
function inquire_name($table,$where,$data='',$type='getField'){
  if($type=='getField'){
     $data = M($table)->where($where)->getField($data);
  }else if($type=='select'){
     $data = M($table)->where($where)->select();
  }else if($type=='add'){
    $data = M($table)->data($data)->add();
  }else if($type=='save'){
    $data = M($table)->where($where)->data($data)->save(); 
  }else if($type=='delect'){
    $data = M($table)->where($where)->delete();
  }else if($type=='find'){
    $data = M($table)->where($where)->find();
  }
  return $data;
}
//活动产品过期自动下线
function prod_activity(){
    $product = M('product');
    $data = $product->where('prod_activity=1')->getField('id,prod_time_end',true);
    if($data){
      foreach ($data as $id => $time) {
        if($time<time()){
          $arr = array('prod_stastic'=>0);
          $product->where('id='.$id)->setField($arr);
        }
      }
    }

  }
//过期订单数据处理
function update_shopping()
{
  if(session('user_list')){
    $user_list='AND user_id='.session('user_list');
  }else{
    $user_list='';
  }
  $indent = M('indent');
  $data = $indent->where('indent_static=1 '.$user_list)->getField('id,reserve_time,indent_static,user_id');
  foreach ($data as $key => $value) {
    if($value['reserve_time']<time()){
      $arr = array('indent_static'=>3,'past_time'=>$value['reserve_time']);
      if(!$indent->where('id='.$value['id'])->setField($arr)){
        alogs('Common',4,'用户产品过期数据更改失败',session('user_phone'),'indent_dologs');
      }
      
    }
  }
}


  //微信充值 、购买支付数据处理
function orderquery(){
    Vendor(session('WeChat_pay').'.WxPayApi');
    if(session('Out_trade_no')&& session('Out_trade_no') != ""){
      
      $out_trade_no = session('Out_trade_no');
      $input = new \WxPayOrderQuery();
      $input->SetOut_trade_no($out_trade_no);
      $data = \WxPayApi::orderQuery($input);
    }
    $consumer= M('consumer');
    if($data['result_code']=='SUCCESS'&&$data['trade_state']=='SUCCESS'){
      $arr = explode('@', $data['attach']);
      foreach ($arr as $value){
        if($value){
          $data[explode('=', $value)[0]] = explode('=', $value)[1];
        }
      }
      unset($data['appid']);
      unset($data['bank_type']);
      unset($data['fee_type']);
      unset($data['is_subscribe']);
      unset($data['sign']);
      unset($data['total_fee']);
      unset($data['attach']);
      if($data['code'])unset($data['code']);
      if($data['state'])unset($data['state']);
      if($data['return_msg'])unset($data['return_msg']);
      $data['time_end'] = strtotime($data['time_end']);
      $data['cash_fee'] = $data['cash_fee']/100;
      $data['nonce_str']=substr(strtolower($data['nonce_str']),-8);
      session('W_time',date('Y-m-d H:i:s',$data['time_end']));
      $time = session('W_time');
      $user_phone = $consumer->where('id='.$data['user_id'])->getField('user_phone');
      if($data['payment_id']==1&&$data['trade_state']=='SUCCESS'){
             $consumer->startTrans();
        unset($data['payment_id']);
        unset($data['trade_state']);
        $moneys = $consumer->where('id='.$data['user_id'])->getField('user_money')+$data['cash_fee'];
        //短息内容拼接
          $contenr = str_replace('#MONEYS#',$moneys,str_replace('#MONEY#',$data['cash_fee'],str_replace('#DATE#',$time,str_replace('#USERANEM#',$user_phone,FS('Dynamic/smstxt')['payonline']))));
        //会员等级判断 id获取
        $members_money =  M('members')->getField('members_money',true);
        $members_money[end(array_keys($members_money))+1] = $data['cash_fee']+0.01;
        $members_money = bubble_sort($members_money);
        $members_id = $members_money[array_search($data['cash_fee']+0.01, $members_money)-1];
        $members_id =  M('members')->where('members_money='.$members_id)->getField('id');
        //用户数据读取
        $consumer_data = $consumer->where('id='.$data['user_id'])->find();
        //充值写入
        $user_data = array();
        $user_data['user_money']=$consumer_data['user_money']+$data['cash_fee'];
        $user_data['money_amount']=$consumer_data['money_amount']+$data['cash_fee'];
        //会员等级判断
        if($consumer_data['members_id']<$members_id){
          $user_data['members_id']=$members_id;
        }else{
          $user_data['members_id']=$consumer_data['members_id'];
        }


      $user_add = $consumer->where('id='.$data['user_id'])->setField($user_data);
      $recharge = M('recharge')->data($data)->filter('strip_tags')->add();
      if($user_add&&$recharge){
              $consumer->commit();
              texting($user_phone,$contenr);
          alogs('WxPayApi',2,$contenr,$user_phone,'indent_dologs');
          session('Out_trade_no',null);
          }else{
          alogs('WxPayApi',2,$time.'微信充值'.$consumer_data['user_money']+$data['cash_fee'].'元失败',$user_phone,'indent_dologs');
              $consumer->rollback();
          }

      }else if($data['payment_id']==2&&$data['trade_state']=='SUCCESS'){
        unset($data['payment_id']);
        unset($data['trade_state']);
        $give = M('prod_give');
        if($data['give_id']){
          $prod_give_money = $give->where('give_static=1 and id='.$data['give_id'])->getField('prod_give_money');
          $give->where('give_static=1 and id='.$data['give_id'])->setField('give_static',0);
          $data['prod_give']=$prod_give_money;
        }
          unset($data['give_id']);

        if($data['reserve_time']){
          $data['reserve_type']=1;
        }else{
          $period = inquire_name('period','','','select')[0];
          $name = session('WeChat_pay');
          $data['reserve_time'] = $data['time_end']+$period[$name]*86400;
        }
        $product  =M('product');
        $product_data = $product->where('id='.$data['product_id'])->find();
        if($product_data['prod_give']>0){
          $give_data = array(
            'user_id'=>session('user_list'),
            'prod_id'=>$data['product_id'],
            'prod_give_money'=>$product_data['prod_give'],
          );
          $give_data = $give->add($give_data);
        }

        $time_end = date('Y-m-d H:i:s',$data['reserve_time']);
        $chars = "0123456789";  
        $str ="";
        for ( $i = 0; $i < 8; $i++ )  {  
          $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
        } 

        $data['nonce_str'] = $str;
        $contenr =str_replace('，可用余额为#MONEYS#元','',str_replace('#CODE#',$data['nonce_str'],str_replace('#TIME#',$time_end,str_replace('#DATE#',$time,str_replace('#MONEY#',$product_data['prod_money'],str_replace('#CROWDID#',$product_data['prod_name'],str_replace('#USERANEM#',$user_phone,FS('Dynamic/smstxt')['withdraw'])))))));
        if(!$arr['prod_give'])unset($arr['prod_give']);
        if(M('indent')->data($data)->add()){
            session('Out_trade_no',null);
          texting(session('user_phone'),$contenr);
          alogs('WxPayApi',1,$contenr,session('user_phone'),'indent_dologs');
        }else{
          alogs('WxPayApi',2,$time.'微信订单'.session('Out_trade_no').'数据写入失败',$user_phone,'indent_dologs');
        }

      }

    }
}
