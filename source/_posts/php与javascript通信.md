---
title: php与javascript通信
urlname: php-javascript-communication
tags:
  - php
  - javascript
categories:
  - daybreak
date: 2018-05-13 01:34:08
---
>本文实现php与javascript简单通信。

<!-- more -->

### 方法一
- 不需要调用jqury
- 使用产生script的方式
- 服务器端：
```
<?php
header('Content-type: application/json');
//获取回调函数名
$jsoncallback = htmlspecialchars($_REQUEST ['jsoncallback']);
//json数据
$json_data = '["customername1","customername2"]';
//输出jsonp格式的数据
echo $jsoncallback . "(" . $json_data . ")";
?>
```
- 客户端:
```
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>JSONP 实例</title>
</head>
<body>
    <div id="divCustomers"></div>
    <script type="text/javascript">
function callbackFunction(result, methodName)
        {
            var html = '<ul>';
            for(var i = 0; i < result.length; i++)
            {
                html += '<li>' + result[i] + '</li>';
            }
            html += '</ul>';
            document.getElementById('divCustomers').innerHTML = html;
        }
</script>
<script type="text/javascript" src="https://bd72008b-fa6a-4092-b369-2437dec66486.coding.io/jsonp.php?jsoncallback=callbackFunction"></script>
</body>
</html>
```
### 方法二
- 需要调用jqury,跨域，不能进行同步处理
- 服务器端
```
<?php  
    $data = array(  
        "name"=>$_GET['name'],  
        "age"=>25,  
    );  
    echo $_GET['callback']."(".json_encode($data).")"; //相当于：echo 'getName({"name":"小妹子","age":25})';// 必须加前缀哦,是从客户端传过来的方法名  
?>
```
- 客户端
```
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>JSONP 实例</title>
<script src="http://cdn.static.runoob.com/libs/jquery/1.8.3/jquery.js"></script>
</head>
<body>

<div id="divCustomers"></div>

<script type="text/javascript">
$.ajax({  
       url:'https://bd72008b-fa6a-4092-b369-2437dec66486.coding.io/jsonp.php',    //跨域到http://www.xiaoqiang2.com，另，http://xiaoqiang.com也算跨域  
       type:'GET',  //jsonp 类型下只能使用GET,不能用POST,使用post提交会造成有些浏览器获取不到返回   例如firebug  
       dataType:'jsonp', //指定为jsonp类型  
       data:{"name":"小美人"},//数据参数  
       jsonp:'callback',//服务器端获取回调函数名的key，对应后台有$_GET['callback']='getName';callback是默认值  
       jsonpCallback:'getName', //回调函数名  
       success:function(result){  //成功执行处理，对应后台返回的getName(data)方法。  
           $("#divCustomers").html('你妹子： '+result.name+'的年龄：'+result.age+''); 
           //myData是一个div自己加就好了  
         },  
       error:function(msg){  
            //执行错误  

       }  
   });   
</script>

</body>
</html>
```