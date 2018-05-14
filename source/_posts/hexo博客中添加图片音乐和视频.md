---
title: hexo博客中添加图片音乐和视频
urlname: hexo-insert-picture-music-video
tags:
  - hexo
categories:
  - daybreak
date: 2018-04-26 15:02:17
---
> 应用中涉及到往hexo博客中添加图片，音乐和视频。本文简单做个总结，希望对小白同学有所帮助。

<!-- more -->
### 添加图片
- 上传图片到`\blog\source\<新建文件夹>`
- 文章中添加如下代码
```
![图片说明](/<新建文件夹>/picture.JPG)  
```
### 添加音乐
- 代码如下，利用ifram添加
```
<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86   
    src="http://music.163.com/outchain/player?type=2&id=25706282&auto=0&height=66">  
</iframe> 
```
- 例如以下音乐

<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=524148450&auto=1&height=66"></iframe>

### 添加视频
- 同样利用iframe添加，代码如下
```
<iframe   
    height=498 width=510   
    src="http://player.youku.com/embed/XNjcyMDU4Njg0"   
    frameborder=0 allowfullscreen>  
</iframe>  
```
- 应用实例

<iframe   
    height=498 width=510   
    src="http://player.youku.com/embed/XNjcyMDU4Njg0"   
    frameborder=0 allowfullscreen>  
</iframe>  

### 总结
- 希望你能喜欢
- 爱你，能找到这里
