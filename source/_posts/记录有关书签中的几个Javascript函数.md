---
title: 记录有关书签中的几个Javascript函数
urlname: javascript-function-index
tags:
  - javascript
  - mfsq
categories:
  - 魔法书签
date: 2018-05-17 14:52:00
---
> 制作魔法书签过程中废弃的几个函数。可能用到其他地方，暂且作为备份。

<!-- more -->
### 自建get,post函数
- 特点不需要加载javascript.

```
//var Resget=doFormRequest(url,"get","{'user':'value2', 'pwd':'value'}")
//alert(Resget);
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
```

### 得到传递的参数
- 只能得到user=pwd，形式的。局限性
```
    //获取书签传递过来的参数，用户和密码
    //var UserPwd=GetUserPwd();
    //var user=UserPwd[0];
    //var pwd=UserPwd[1];
    //get user and pwd from the src.js?user=pwd

    function GetUserPwd(){
        var js = document.getElementsByTagName("script");  
        for (var i = 0; i < js.length; i++) {  
            if (js[i].src.indexOf("myt.js") >= 0) {  
                 var arraytemp = new Array();  
                 arraytemp = js[i].src.split('?');  
                 arraytemp = arraytemp[1].split('=');  
                // alert(arraytemp[0] + "=" + arraytemp[1]);  
                 var user=arraytemp[0];
                 var pwd=arraytemp[1];
                 //alert(user + pwd);     
                 return [user,pwd];     
                 //return {user:arraytemp[0] pwd:arraytemp[1]};
                 break;
            }  
        } 
    }
```

### 根据是否需要加载jquery
```
    //var jqueryjs='https://cdn.bootcss.com/jquery/3.3.1/jquery.js';
    //如果已经加载了jqury则不再重新加载
    //NeedLoadJs(jqueryjs);
    // Juge Load Jqury

    function NeedLoadJs(url){
        if(typeof(jQuery)=="undefined"){
            alert("jQuery is not imported");
       // document.write("<script type='text/javascript' src='https://cdn.bootcss.com/jquery/3.3.1/jquery.js'></script>");  
       
            //var newscript = document.createElement('script');  
            //newscript.setAttribute('type','text/javascript');  
            //newscript.setAttribute('src','https://cdn.bootcss.com/jquery/3.3.1/jquery.js');  
            //var head = document.getElementsByTagName('head')[0];  
            //head.appendChild(newscript); 
             LoadJs(url);

        }else{
       //alert("jQuery is imported");
        }
    }
  //Load js
        function LoadJs(url){
            var newscript = document.createElement('script');  
            newscript.setAttribute('type','text/javascript');  
            newscript.setAttribute('src',url);  
            var head = document.getElementsByTagName('head')[0];  
            head.appendChild(newscript);  
        }
```

### javascript获取网址打开网址
```
    //alert(window.location.href);
    //window.open("tencent://www.jb51.net");   
```

### javascript获取同域下iframe中网页源代码
```
<script type="text/javascript">
onerror=handleErr

var txt=""

function handleErr(msg,url,l)
{
txt="There was an error on this page.\n\n"
txt+="Error: " + msg + "\n"
txt+="URL: " + url + "\n"
txt+="Line: " + l + "\n\n"
txt+="Click OK to continue.\n\n"
alert(txt)
return true
}

 function getIframeContent(frameId){ 
 var frameObj = document.getElementById(frameId); 

 alert ("x1");

 var frameContent = frameObj.contentWindow.document.urlset.innerHTML; 
 alert("frame content : "+frameContent); 
 } 
 ```

### 远程代码读取
- 需要在目标网站设置头部
```
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html> 
<head> 
<meta http-equiv="Content-type" content="text/html; charset=utf-8"> 
<title>远程网页源代码读取</title> 
<style type="text/css"> 
/* 页面字体样式 */ 
body, td, input, textarea { 
font-family:Arial; 
font-size:12px; 
} 
</style> 
<script type="text/javascript"> 
//用于创建XMLHttpRequest对象 
function createXmlHttp() { 
//根据window.XMLHttpRequest对象是否存在使用不同的创建方式 
if (window.XMLHttpRequest) { 
xmlHttp = new XMLHttpRequest(); //FireFox、Opera等浏览器支持的创建方式 
} else { 
xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");//IE浏览器支持的创建方式 
} 
} 
//直接通过XMLHttpRequest对象获取远程网页源代码 
function getSource() { 
var url = document.getElementById("url").value; //获取目标地址信息 
//地址为空时提示用户输入 
if (url == "") { 
alert("请输入网页地址。"); 
return; 
} 
document.getElementById("source").value = "正在加载……"; //提示正在加载 
createXmlHttp(); //创建XMLHttpRequest对象 
xmlHttp.onreadystatechange = writeSource; //设置回调函数 
xmlHttp.open("GET", url, true); 
xmlHttp.send(null); 
} 
//www.mp4ku.com将远程网页源代码写入页面文字区域 
function writeSource() { 
if (xmlHttp.readyState == 4) { 
document.getElementById("source").value = xmlHttp.responseText; 
} 
} 
</script> 
</head> 
<body> 
<h1>远程网页源代码读取</h1> 
<div> 
地址：<input type="text" id="url"> 
<input type="button" onclick="getSource()" value="获取源码"> 
</div> 
<textarea rows="10" cols="80" id="source"></textarea> 
</body> 
</html>                        
```

### php获取源代码
- 成功
```
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_TIMEOUT,5);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

 $html = curl_exec($ch);
 if($html !== false){
     echo $html;
 }
```
- 对SSL证书挑剔(成功率低)
```
<?php
//$content = file_get_contents('https://wqian.net/baidusitemap.xml');
$url = ('https://wqian.net/baidusitemap.xml'); 


function getHTTPS($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_SSLVERSION, 1); 
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_REFERER, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
curl_setopt($ch, CURLOPT_POST, 0);  
curl_setopt($ch, CURLOPT_TIMEOUT, 5); 

 


  $result = curl_exec($ch);
   
   var_dump(curl_error($ch));  //查看报错信息 

  curl_close($ch);



  return "reslt<br>". $result;
}
$data=getHTTPS("https://wqian.net/baidusitemap.xml");

echo $data; 



//echo $content;

//preg_match_all('/<loc>(.*?)<\/loc>/', $content, $out, PREG_PATTERN_ORDER);
//var_dump($out);

  
?>
```
### 循环检测条件满足后停止
```
          //定时检测加载完毕后调用
           var InterId=setInterval(function(){
                  // alert("每秒钟都会执行");
                  //按需停止
                  clearInterval(InterId);
                
            },20);
```

### 得到地址中的文件名称/ss/xetn/jxs.js可得到jxs
```
  //得到地址中文件名称    
      function getUrlFileName(url) {
          var str = url;
          str = str.substring(str.lastIndexOf("/") + 1);
          str = str.substring(0, str.lastIndexOf("."));
          return str;
      }
```
### 根据xpath获取dom元素
```
function _x(STR_XPATH) {
    var xresult = document.evaluate(STR_XPATH, document, null, XPathResult.ANY_TYPE, null);
    var xnodes = [];
    var xres;
    while (xres = xresult.iterateNext()) {
        xnodes.push(xres);
    }

    return xnodes;
};

var xs=_x('//*[@id="root"]/div/div[2]/div[1]/div/div/div/div[1]/span');
alert(xs[0].innerHTML);
```
### 参考文献
- <http://www.cnblogs.com/fishtreeyu/archive/2011/02/27/1966178.html>