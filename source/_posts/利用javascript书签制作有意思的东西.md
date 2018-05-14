---
title: 利用javascript书签制作有意思的东西
urlname: javascript-bookmark-funything
tags:
  - javascript
  - bookmark
categories:
  - daybreak
date: 2018-05-11 22:20:58
---
> 今天我们利用JavaScript来制作一个有意思的书签，关键是可以用它实现简单交互。

<!-- more -->

### 本地书签
- 在浏览器创建书签，名称随便起
- 代码简单说明
    - 创建一个script标签a
    - 定义a的各个属性
    - 注意js代码路径，根据自己需要进行修改
    - 定义发生错误时候的脚本
    - 定义错误中的提示代码，中间用到三元运算符
    - 期间获取浏览器属性b，以及根据属性判断输出错误形式
    - 代码中有点击隐藏，和定时隐藏
- 路径如下代码
```
javascript: (function() {
    try {
        var a = document.createElement('SCRIPT');
        a.type = 'text/javascript',
        a.src = 'https://gitee.com/aqtech/appset/raw/master/myt.js',
        a.charset = 'utf-8',
        a.onerror = function() {
            function d(a) {
                return a.indexOf('360ee') > -1 || a.indexOf('360se') > -1 || a.indexOf('se') > -1 || a.indexOf('aoyou') > -1 || a.indexOf('theworld') > -1 || a.indexOf('worldchrome') > -1 || a.indexOf('greenbrowser') > -1 || a.indexOf('qqbrowser') > -1 || a.indexOf('baidu') > -1
            }
           
            var a = document.createElement('div'),
            b = navigator.userAgent.toLowerCase(),
            c = b.match(/chrome\/([\d.]+)/)[1];
            a.style.cssText = 'position: fixed;top: 10px;right: 30px;padding: 5px;border-radius: 5px;box-shadow: rgb(92, 184, 229) 0px 0px 2px; -webkit-box-shadow: rgb(92, 184, 229) 0px 0px 2px;background-color: rgba(92, 184, 229, 0.498039) !important;z-index: 999999;',
            a.innerHTML = c && !d(b) ? '<div style="padding: 20px;border: 1px solid rgb(92, 184, 229);background: white;border-radius: 5px;width: 330px;">一不小心出现点小状况，请速度前去 <a style="color:#1d7fe2" href="https://tgot.net/about/" target="_blank">寻找帮助</a> </div>': '<div style="padding: 20px;border: 1px solid rgb(92, 184, 229);background: white;border-radius: 5px;">该扩展暂不支持该类型网站</div>',
            document.body.appendChild(a),
            a.onclick = function() {
                a.style.display = 'none'
            },
            setTimeout(function() {
                a.click()
            },
            8e4)
        },
        document.getElementsByTagName('head')[0].appendChild(a)
    } catch(b) {
        alert(b)
    }
})();
```

### js远程代码
- 存放位置和上面定义位置一样
- 存放代码
```
try {
    alert(window.location.href);
}
catch(err) {
    alert(err.mssage);
}
```

### 本地书签版本V2
- 添加交互验证功能
```
javascript: (function() {
    try {
        var a = document.createElement('SCRIPT');
        a.type = 'text/javascript',
        a.src = 'https://gitee.com/aqtech/appset/raw/master/myt.js?user0=pwd0',
        a.charset = 'utf-8',
        a.onerror = function() {
            function d(a) {
                return a.indexOf('360ee') > -1 || a.indexOf('360se') > -1 || a.indexOf('se') > -1 || a.indexOf('aoyou') > -1 || a.indexOf('theworld') > -1 || a.indexOf('worldchrome') > -1 || a.indexOf('greenbrowser') > -1 || a.indexOf('qqbrowser') > -1 || a.indexOf('baidu') > -1
            }
            var a = document.createElement('div'),
            b = navigator.userAgent.toLowerCase(),
            c = b.match(/chrome\/([\d.]+)/)[1];
            a.style.cssText = 'position: fixed;top: 10px;right: 30px;padding: 5px;border-radius: 5px;box-shadow: rgb(92, 184, 229) 0px 0px 2px; -webkit-box-shadow: rgb(92, 184, 229) 0px 0px 2px;background-color: rgba(92, 184, 229, 0.498039) !important;z-index: 999999;',
            a.innerHTML = c && !d(b) ? '<div style="padding: 20px;border: 1px solid rgb(92, 184, 229);background: white;border-radius: 5px;width: 330px;">一不小心出现点小状况，请速度前去 <a style="color:#1d7fe2" href="https://tgot.net/about/" target="_blank">%E5%AF%BB%E6%89%BE%E5%B8%AE%E5%8A%A9</a> </div>': '<div style="padding: 20px;border: 1px solid rgb(92, 184, 229);background: white;border-radius: 5px;">%E8%AF%A5%E6%89%A9%E5%B1%95%E6%9A%82%E4%B8%8D%E6%94%AF%E6%8C%81%E8%AF%A5%E7%B1%BB%E5%9E%8B%E7%BD%91%E7%AB%99</div>',
            document.body.appendChild(a),
            a.onclick = function() {
                a.style.display = 'none'
            },
            setTimeout(function() {
                a.click()
            },
            8e4)
        },
        document.getElementsByTagName('head')[0].appendChild(a)
    } catch(b) {
        alert(b)
    }
})();
```

### js远程代码版本V2
- 实现交互后与PHP服务器通信验证
- 有跨域问题，将js作为公共cdn
```
try {
    //如果已经加载了jqury则不再重新加载
    NeedLoadJqery();
    
    //获取书签传递过来的参数，用户和密码
    var UserPwd=GetUserPwd();
    var user=UserPwd[0];
    var pwd=UserPwd[1];
    var phpsrc='https://bd72008b-fa6a-4092-b369-2437dec66486.coding.io/jsonp.php';

    //本地测试使用
    /*
    var user='greedy'//UserPwd[0];
    var pwd='greedy'//UserPwd[1];
   */

    var src=window.location.href;
   // var url='https://bd72008b-fa6a-4092-b369-2437dec66486.coding.io/jsget.php'

  //只能运用异步中成功代码了。 
  $.ajax({
       async:false, 
       url:phpsrc,    //跨域到http://www.xiaoqiang2.com，另，http://xiaoqiang.com也算跨域  
       type:'GET',  //jsonp 类型下只能使用GET,不能用POST,使用post提交会造成有些浏览器获取不到返回   例如firebug  
       dataType:'jsonp', //指定为jsonp类型  
       data:{"user":user,"pwd":pwd,"src":src},//数据参数  
       jsonp:'callback',//服务器端获取回调函数名的key，对应后台有$_GET['callback']='getName';callback是默认值  
       jsonpCallback:'JRgetMessage', //回调函数名  
       success:function(result){  //成功执行处理，对应后台返回的getName(data)方法。  
        // $("#divCustomers").html('你妹子： '+result.name+'的年龄：'+result.age+''); 

         // alert('p1'+result.name+result.age);
         //alert("message0:"+window.Jqres);  
        ress=JSON.stringify(result);
        alert(ress);
       //ress=result;
        // alert('p12'+res);
           //myData是一个div自己加就好了  
         },  
       error:function(msg){  
        alert(msg);   
       }  
   });   

    //var Resget=doFormRequest(url,"get","{'user':'value2', 'pwd':'value'}")
    //alert(Resget);

    //alert(window.location.href);
    //window.open("tencent://www.jb51.net");    



//回调函数
    function JRgetMessage0(jsonp){
       // alert("message1:"+window.Jqres);  
       // window.Jqres=JSON.stringify(jsonp);
       // alert("message:"+window.Jqres);  
       // return res;
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
                 return [user,pwd]     
                 //return {user:arraytemp[0] pwd:arraytemp[1]};
                 break;
            }  
        } 
    }
    // Juge Load Jqury
    function NeedLoadJqery(){
        if(typeof(jQuery)=="undefined"){
       // alert("jQuery is not imported");
       // document.write("<script type='text/javascript' src='https://cdn.bootcss.com/jquery/3.3.1/jquery.js'></script>");  
       
            var newscript = document.createElement('script');  
            newscript.setAttribute('type','text/javascript');  
            newscript.setAttribute('src','https://cdn.bootcss.com/jquery/3.3.1/jquery.js');  
            var head = document.getElementsByTagName('head')[0];  
            head.appendChild(newscript);  
        }else{
       //alert("jQuery is imported");
        }
    }

}
catch(err) {
    alert(err);
}
```

### PHP服务器端代码V2
- 进行数据库验证
```
<?php  
$user=$_GET["user"];
$pwd=$_GET["pwd"];
$src=$_GET["src"];
$msg="";
if ($user==$pwd)
{
    $msg="true";
}
else
{
    $msg="false";
}

    $data = array(
      "msg"=>$msg,
      "user"=>$_GET['user'],
      "pwd"=>$_GET['pwd'],
      "src"=>$_GET['src'],
    );  
    echo $_GET['callback']."(".json_encode($data).")"; //相当于：echo 'getName({"name":"小妹子","age":25})';// 必须加前缀哦,是从客户端传过来的方法名  
?>  
```


### 参考
- 知识<http://www.runoob.com/jsref/jsref-try-catch.html>
- 知识<http://www.w3school.com.cn/js/js_onerror.asp>
- 有道云笔记<http://note.youdao.com/web-clipper-chrome.html>
- 脚本压缩<http://tools.jb51.net/code/jscompress>
- urlcode转换<http://tool.chinaz.com/tools/urlencode.aspx>
- https://blog.csdn.net/hdfqq188816190/article/details/68928732