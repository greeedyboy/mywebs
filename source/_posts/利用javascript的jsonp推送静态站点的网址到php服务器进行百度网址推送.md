---
title: 利用javascript的jsonp推送静态站点的网址到php服务器进行百度网址推送
urlname: javascript-jsonp-php-baidu
tags:
  - javascript
  - baidumap
categories:
  - daybreak
date: 2018-05-15 23:48:51
---
> 实现将静态网站的网址采集后推送到php服务器，进行百度站长网址推送。

<!-- more -->
### 功能导航文件
- bdp.html
```
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>duo</title>
<script>
    function Dobdp(){

        var getc=document.getElementById("getc").value;
        var getn=document.getElementById("getn").value;
        var tj=document.getElementById("tj").value;
        //alert(getn);
        window.open('https://wqian.net/jsgetxml2.html?c='+getc+'&n='+ getn+'&tj='+ tj +'','iframe_a');
    }

</script>
</head>
<body>
模式：<input id=getc value=xct width="200"> 范围：<input id=getn value=-1 width="200"> 是否提交：<input id=tj value=0 width="200">

<p><button onclick="Dobdp()">点击即可进行查看</button></p>


<iframe src="https://wqian.net" name="iframe_a" width=100% height="500"></iframe>

</body>
</html>
```

### 静态网站内部文件
- jsgetxmls代码
```
---
layout: false
---
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.js"></script>
<script>
function getdate(url){
   htmlobj=$.ajax({url:url,async:false});
   return htmlobj.responseText;
}
// 自建get,post函数
    /*
    * @url: url link
    * @action: "get", "post"
    * @json: {'key1':'value2', 'key2':'value2'} 
    */
    function doFormRequest(url, action, json)
    {
        var form = document.createElement("form");
        form.action = url;
        form.method = action;

        // append input attribute and valus
        for (var key in json)
        {
            if (json.hasOwnProperty(key))
            {
                var val = json[key];
                input = document.createElement("input");
                input.type = "hidden";
                input.name = key;
                input.value = val;

                // append key-value to form
                form.appendChild(input)
            }
        }

        // send post request
        document.body.appendChild(form);
        form.submit();

        var res=form;
        // remove form from document
        document.body.removeChild(form);

        return res;
    }

     //get user and pwd from the src.js?user=pwd

    function getQueryString(name) { 
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
        //alert(window.location.search.substr(1));
        var r = window.location.search.substr(1).match(reg); 
        if (r != null) return unescape(r[2]); return null; 
    } 

   
</script>
</head>
<body>
<textarea id=xml></textarea>
<textarea id=cat></textarea>
<textarea id=tag></textarea>

<script>
var datxml=getdate('baidusitemap.xml');
var datcat=getdate('../categories/index.html');
var dattag=getdate('../tags/index.html');

document.getElementById("xml").value=datxml;
document.getElementById("cat").value=datcat;
document.getElementById("tag").value=dattag;


var getn=getQueryString('n');
var getc=getQueryString('c');
var tj=getQueryString('tj');

var posturl='http://u26.site/dbp2.php?c='+ getc + '&n=' + getn + '&tj=' + tj +'&x='+ Math.random();
json={'datxml':datxml,'datcat':datcat,'dattag':dattag};

var res=doFormRequest(posturl, 'post', json)


</script>


</body>
</html>
```
### php服务器端文件
- dbp2.php
```
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>php</title>
</head>
<body>

<?php

$getc= $_GET["c"];
$getn= 10*intval($_GET["n"]);
$tj= intval($_GET["tj"]);

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

  $mat2[1][$i]="https://wqian.net" . $mat2[1][$i] . "index.html";
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
print_r("<textarea style='width:1000px;height:300px'>");
print_r($matt);
print_r("</textarea>");

//echo "<script>alert(". $tj .");</script>";
//echo "<script>alert(". count($matt) .");</script>";

if ($tj>0 && count($matt)<11 && count($mat)>0){

echo("<br>百度熊掌提交结果：<br>");
echo(bdXZpost($matt));
echo("<br>百度站长提交结果：<br>");
echo(bdZZpost($matt));
}else{
    echo("<p>没有提交<p>");
}

//熊掌提交
function bdXZpost($urls) {
$api = 'http://data.zz.baidu.com/urls?appid=1598180106327679&token=jy3FBOUkbY8fLr14&type=batch';
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
```