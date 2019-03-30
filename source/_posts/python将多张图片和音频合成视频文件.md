---
title: python将多张图片和音频合成视频文件
urlname: index
tags:
  - python
  - ffmpeg
categories:
  - python
date: 2018-12-19 22:35:06
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 解决问题：将多张图片，和一个音频，合成一个视频文件。期间解决了手机端不能查看的问题。

<!-- more -->

### 环境介绍
- python3.7
- ffmpeg

### 代码
```
import subprocess
import time
imglist='1812190119_47_xh_img.txt'
mp3='1812190119_47_xh.mp3'
mp4='1812190119_47_xh_q1.mp4'

start = time.perf_counter()
cmd = 'ffmpeg -threads 5 -y -f concat -safe 0 -i ' + imglist + ' -i ' + mp3 \
       + '  -vcodec libx264 -pix_fmt yuv420p ' + mp4

# p = subprocess.call(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
# p=subprocess.call(cmd,shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
p = subprocess.Popen(cmd, shell=True, universal_newlines=True, stdin=subprocess.PIPE, stdout=subprocess.PIPE,stderr=subprocess.STDOUT)
# p = subprocess.call(cmd)

end = time.perf_counter()

print(end-start)

```
- imglist内容格式(时间，以及最后一张图片形式)
```
file ./1812192159_49_xh/1812192159_49_xh_1.png
duration 0.56
file ./1812192159_49_xh/1812192159_49_xh_10_1.png
duration 1.2
file ./1812192159_49_xh/1812192159_49_xh_10_1.png
```
