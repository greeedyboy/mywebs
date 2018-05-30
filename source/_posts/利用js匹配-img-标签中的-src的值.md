---
title: 利用js匹配img标签中的src的值
urlname: img-src-regex-index
tags:
  - js
  - 正则
categories:
  - 网络日志
date: 2018-05-22 22:13:07
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 太牛的方法了，震撼。

<!-- more -->
### 利用js匹配img标签中的 src的值

#### 方法1
- 机智大牛
```
var frag = document.createElement('div');
frag.innerHTML = '<div>\
    <img src="http://www.baidu.com/pic/a.jpg" alt="" />\
    <p>this is a pic</p>\
    <img src="http://www.baidu.com/pic/b.jpg" />\
    <p>this is pic b</p>\
</div>';
var result = [].map.call(frag.querySelectorAll('img'), function(img){ return img.src });

console.log(result);

```

#### 方法2
```
另外，match 的话 g 模式不支持输出匹配结果的，你只能使用 while + exec 才行。

var str = '<div>\
    <img src="http://www.baidu.com/pic/a.jpg" alt="" />\
    <p>this is a pic</p>\
    <img src="http://www.baidu.com/pic/b.jpg" />\
    <p>this is pic b</p>\
</div>';
var patt = /<img[^>]+src=['"]([^'"]+)['"]+/g;
var result = [], temp;

while( (temp= patt.exec(str)) != null ) {
    result.push(temp[1]);
}

console.log(result);
```
#### 方法3
- 实现很难
```
<script type="text/javascript">
var str = "this is test string 
<img src=\"http:yourweb.com/test.jpg\"width='50' >123 and the end 
<img src=\"所有地址也能匹配.jpg\" /> 
<img src=\"/uploads/attached/image/20120426/20120426225658_92565.png\" alt=\"\" />"
//匹配图片（g表示匹配所有结果i表示区分大小写）
var imgReg = /<img.*?(?:>|\/>)/gi;
//匹配src属性 
var srcReg = /src=[\'\"]?([^\'\"]*)[\'\"]?/i;
var arr = str.match(imgReg);
alert('所有已成功匹配图片的数组：'+arr);
for (var i = 0; i < arr.length; i++) {
  var src = arr[i].match(srcReg);
  //获取图片地址
  if(src[1]){
    alert('已匹配的图片地址'+(i+1)+'：'+src[1]);
  }
  //当然你也可以替换src属性
 if (src[0]) {
    var t = src[0].replace(/src/i, "href");
 }
}
</script>
```
### js根据xpath获取网页元素
#### 方法1
```
//获取节点
function _x(STR_XPATH) {
    var xresult = document.evaluate(STR_XPATH, document, null, XPathResult.ANY_TYPE, null);
    var xnodes = [];
    var xres;

    while (xres == xresult.iterateNext()) {
        xnodes.push(xres);
    }

    return xnodes;
}
```

#### 方法2
```
function _x3(STR_XPATH) {
    var oResult = document.evaluate(STR_XPATH, document, null, XPathResult.ANY_TYPE, null);
    var aNodes = [];
    if (oResult != null) {
        var oElement = oResult.iterateNext();
        while (oElement) {
            aNodes.push(oElement);
            oElement = oResult.iterateNext();
        }
    }
    return aNodes;
}
// 如果只查找单个元素，可以简写成这样
//nodes=document.evaluate("//div[1]", document).iterateNext();
```
### 文献参考
- <https://segmentfault.com/q/1010000004178052>
- <http://www.jb51.net/article/54526.htm>