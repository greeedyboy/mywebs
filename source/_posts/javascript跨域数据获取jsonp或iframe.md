---
title: javascript跨域数据获取jsonp或iframe
urlname: index
tags:
  - javascript
  - jsonp
  - 跨域
categories:
  - daybreak
date: 2018-05-21 16:47:24
---
>javascript数据访问进行跨域数据获取，已知的方法及存在的局限性。

<!-- more -->
### jsonp跨域
- 需要在使用ajax的jsonp访问模式
- 获取形式为异步获取
- 需要在服务器端进行格式设置，只能是jsonp的数据格式
- 通信代码
```
//只能运用异步中,成功代码了。 
  $.ajax({
       async:false, 
       url:phpsrc,    //跨域到http://www.xiaoqiang2.com，另，http://xiaoqiang.com也算跨域  
       type:'GET',  //jsonp 类型下只能使用GET,不能用POST,使用post提交会造成有些浏览器获取不到返回   例如firebug  
       dataType:'jsonp', //指定为jsonp类型  
       data:{"user":user,"pwd":pwd,"src":src,"ver":ver},//数据参数  
       jsonp:'callback',//服务器端获取回调函数名的key，对应后台有$_GET['callback']='getName';callback是默认值  
       jsonpCallback:'JRgetMessage', //回调函数名  
       success:function(result){  //成功执行处理，对应后台返回的getName(data)方法。  
         ress=JSON.stringify(result);
         alert(ress);
         },  
       error:function(msg){  
        alert('ServerErr:'+msg)  
       }  
   });   

}
```
- 可以根据其返回code进行网页通断的检测
```
function UrlOK(url){
   // url="http://www.google.com";
    $.ajax({
        type: 'get',
        cache: false,
        url: url,
        dataType: "jsonp", //跨域采用jsonp方式 
        processData: false,
        timeout:5000, //超时时间，毫秒
        complete: function (data) {
            if (data.status==200) {
                alert('ok');
              } else {
                alert("无效链接");
              }
        }
    });

}
```

### 利用iframe跨域
- 利用windows.name的方式来实现。
- 大致原理是在域A中页面A1中动态创建iframe
- 然后在A1中的iframe中加载域B中的页面B1
- 之后A1中的iframe中再加载A域中任意页面
- 继续在A1中读取windows.name。可得B域数据
- 关键是要求域B中要有相关代码实现windows.name赋值，也就是说明无法进行任意页面的读取，也只能是同时两个网站具有控制权的时候才可以。
- 代码网上自行搜索吧，以下是半成品
```
<script>
function domainData(iframe, url, fn)  
{  
    var isFirst = true;  
    //iframe.style.display = 'none';  
    var loadfn = function(){  
        if(isFirst){  
            //null.html 是同域下的中转代理页面。内容可为空。  
            iframe.contentWindow.location = 't_ifram2.html';  
            isFirst = false;  
        } else {  
            fn(iframe.contentWindow.name);  
            //使用完毕销毁iframe，保证安全，释放内存  
            iframe.contentWindow.document.write('');  
            iframe.contentWindow.close();  
            document.body.removeChild(iframe);  
            iframe.src = '';  
            iframe = null;  
        }  
    };  
    iframe.src = url;  
    //alert(url);  
    //给iframe设置onload事件  
    if(iframe.attachEvent){  
        iframe.attachEvent('onload', loadfn);  
    } else {  
        iframe.addEventListener('load', loadfn, false);  
        //iframe.onload = loadfn;  
    }  
      
    document.body.appendChild(iframe);  
}  
var ifm = document.getElementById("IFeditValue");  
setInterval(function(){  
    var time = (new Date()).getTime();  
    domainData(ifm, 'http://www.w3school.com.cn/jsref/met_select_remove.asp', function(data){  
        alert(data);  
    });  
}, 1000);  
</script>
```

### 失败尝试
- 利用提取iframe的dom读取源代码，失败，因为跨域不能读取iframe
- 希望向iframe的网址插入script，失败，因为暂没找到动态创建的方法


### 参考文献
- https://blog.csdn.net/freshlover/article/details/40827207
- http://www.runoob.com/json/json-jsonp.html
- https://blog.csdn.net/u011897301/article/details/52679486

