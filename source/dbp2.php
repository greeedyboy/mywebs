<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>php</title>
</head>
<body>

<?php

$getc= $_GET["c"];
$getn= $_GET["n"];
$tj= $_GET["tj"];

//设置默认值
if($tj=='null' && $getc=='null' &&  $getn=='null'){
   $tj=1;
}
if($getc=='null'){
   $getc="x";
}
if($getn=='null'){
   $getn=0;
}



$getn=10*intval($getn);
$tj=intval($tj);

$datxml="";
$datcat="";
$dattag="";

if(strpos($getc,'x') !==false){
 $datxml= $_POST["datxml"];
}

if(strpos($getc,'c') !==false){
 $datcat= $_POST["datcat"];
}
if(strpos($getc,'t') !==false){
 $dattag= $_POST["dattag"];
}

if ($datxml=="" && $datcat=="" && $dattag==""){
	$datxml= $_POST["datxml"];
	$datcat= $_POST["datcat"];
	$dattag= $_POST["dattag"];
}



$reg1='/<loc>(.*?)<\/loc>/';
preg_match_all($reg1,$datxml,$mat1); 
//print_r($mat1[1]);

//print_r("<textarea>" . $datxml . "</textarea>");
//print_r("<textarea>" . $datcat . "</textarea>");
//print_r("<textarea>" . $dattag . "</textarea>");

$reg2='/href\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^"\'>\s]+))/is';

preg_match_all($reg2,$datcat . $dattag,$mat2); 


for($i=0;$i<count($mat2[1]);$i++)//逐个输出超链接地址
{
  
      $mystring=$mat2[1][$i];

    //判断首字符不是http则加入http
      $pos = strpos($mystring, "http");
// echo $pos;
//echo $mystring;

     if (substr($mystring, 0,1)!=="/" && substr($mystring, 0,4)!=="http"){
        
       // echo substr($mystring, 0,1)!=="/";
       // echo substr($mystring, 0,4);

        $mystring="/". $mystring;
     }


      if ($pos !== false) {
        //存在
            if ($pos != 0) {
            $mystring="https://wqian.net" . $mystring;
                }
       }else{

            $mystring="https://wqian.net" . $mystring;
       }

       //echo $pos;
       //break;
    //判断末尾字符如果是/则加入index.html

     if (substr($mystring, -1)=="/"){

        $mystring=$mystring . "index.html";
     }

      //$mat2[1][$i]="https://wqian.net" . $mat2[1][$i] . "index.html";

      $mat2[1][$i]=$mystring;
}

//print_r($mat2[1]);

$mat=array_merge($mat1[1],$mat2[1]);
$matt=array();
$j=0;

//如果为0则取全部
$getnT=0;

if ($getn>=0)
{
    for($i=$getn;$i<count($mat);$i++)//逐个输出超链接地址
	{
	  $matt[$j]=$mat[$i];	
	  $j++;
	  $getnT=$i;

      if($j>9){
        break;
      }
	}
}else{
    $matt=$mat;
    $getnT=count($mat);
}

print('模式：' . $getc . ' 范围：'. count($mat) . ':(' . $getn .'-' . $getnT . ')<br>');
print_r("<textarea style='width:1000px;height:160px'>");
print_r($matt);
print_r("</textarea>");

print "<p>";
print "<a target='_blank' href=https://ziyuan.baidu.com/xzh/commit/method?appid=1598180106327679>提交熊掌</a>------<a target='_blank' href=https://ziyuan.baidu.com/linksubmit/index>提交百度站长</a>";

print "------<a target='_blank' href=https://www.bing.com/webmaster/home/dashboard/?url=https://wqian.net/>提交bing</a>";

print "------<a target='_blank' href=http://zhanzhang.so.com/?m=Site&a=index>360站长平台</a>";

print "------<a target='_blank' href=http://zhanzhang.sogou.com/index.php/sitelink/index>搜狗站长平台</a>";


print "</p>";
//框
print_r("<textarea style='width:1000px;height:160px'>");
for($i=0;$i<count($matt);$i++)//逐个输出超链接地址
{
print $matt[$i]."\r\n";
}
print_r("</textarea>");



//echo "<script>alert(". $tj .");</script>";
//echo "<script>alert(". count($matt) .");</script>";

if ($tj>0 && count($matt)<11 && count($mat)>0){

//echo("<br>百度熊掌提交结果：<br>");
//echo(bdXZpost($matt));
echo("<br>百度站长提交结果：<br>");
echo(bdZZpost($matt));
}else{
	echo("<p>没有提交<p>");
}

//熊掌提交
function bdXZpost($urls) {
$api = 'http://data.zz.baidu.com/urls?appid=1598180106327679&token=jy3FBOUkbY8fLr14&type=realtime';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
return $result;
}
//站长提交
function bdZZpost($urls) {
$api = 'http://data.zz.baidu.com/urls?site=https://wqian.net&token=s0qosKUimcSz3p38';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
return $result;
}
?>
</body>
</html>