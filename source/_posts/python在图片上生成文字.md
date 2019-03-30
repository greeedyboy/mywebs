---
title: python运用PIL插件在图片上生成文字
urlname: python-text-imges-index
tags:
  - python
  - PIL
categories:
  - python
  - 软件列表
date: 2018-11-28 11:01:00
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 解决问题：运用python在图片上生成文字。

<!-- more -->

### 解决思路
- 运用python强大插件的功能实现
- 运用的插件是PIL

### 软件准备
- 我的python版本时3.7
- 安装PIL插件
    - 打开windows的cmd窗口，输入命令(python版本要注意)
    ```
    pip install Pillow
    ```

### 函数如下
- 本函数实现在目标图片上书写文字后，生成图片保存
```
# -*- coding:utf-8 -*-
from PIL import Image, ImageDraw, ImageFont
import time

def cpic_xyfs(txt,tarpic='./chunks/text.png',srcpic='./sysfile/blank.png'):

    # 安装库：pip install Pillow
    header = '今日幸运粉丝'

    books = ['这个是标题', '小标题', '关键词']
    writes = ['这个是问题', 'python给图片加文字']
    summary = txt
    n =30
    summary_list = [summary[i:i + n] for i in range(0, len(summary), n)]
    title = '感谢你们一路陪伴,真好'

    # 图片名称
    img = srcpic # 图片模板
    #img = './图片背景/blank.png' # 图片模板
    new_img = tarpic # 生成的图片

    #compress_img = './chunks/compress.png' # 压缩后的图片

    # 设置字体样式
    font_type = './sysfile/STHeiti-Light.ttc'
    font_medium_type = './sysfile/STHeiti-Light.ttc'
    header_font = ImageFont.truetype(font_medium_type, 65)
    title_font = ImageFont.truetype(font_medium_type, 55)
    font = ImageFont.truetype(font_type, 55)
    header_color="#ff00ff"
    color = "#000000"
    summary_color="#5C3317"

    # 打开图片
    image = Image.open(img)
    draw = ImageDraw.Draw(image)
    width, height = image.size

    y=200

    # header头
    header_x = 80
    header_y = y
    draw.text((header_x,  header_y), u'%s' % header, header_color, header_font)

    '''
    # 当前时间
    cur_time = time.strftime("%Y-%m-%d %H:%M:%S", time.localtime())
    cur_time_x = 590
    cur_time_y = title_y + 25
    cur_time_font = ImageFont.truetype(font_type, 25)
    draw.text((cur_time_x, height - cur_time_y), u'%s' % cur_time, color, cur_time_font)
    '''
    # 哲思

    summary_x = 80
    summary_y = y +80
    summary_line = 80

    for num, summary in enumerate(summary_list):
      y = summary_y + num * summary_line
      draw.text((summary_x,  y), u'%s' % summary, summary_color, font)


    # 标题
    title_x = header_x
    title_y = y + 80
    draw.text((title_x, title_y), u'%s' % title, summary_color, title_font)


    # 生成图片
    image.save(new_img, 'png')
    '''
    # 压缩图片
    sImg = Image.open(new_img)
    w, h = sImg.size
    width = int(w / 2)
    height = int(h / 2)
    dImg = sImg.resize((width, height), Image.ANTIALIAS)
    dImg.save(compress_img)
    '''

    return tarpic
```

### 致谢
- <https://www.jb51.net/article/145841.htm>
- <https://www.cnblogs.com/watertaro/p/9074453.html>
- <https://github.com/python-pillow/Pillow>