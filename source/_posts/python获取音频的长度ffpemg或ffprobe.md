---
title: python获取音频的长度ffmpeg或ffprobe
urlname: python-ffmpeg-mp3-length-index
tags:
  - python
  - ffmpeg
  - ffprobe
categories:
  - python
  - 软件列表
date: 2018-11-28 09:51:12
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 解决问题：获取音频长度，并生成固定的时间格式。

<!-- more -->

### 遇到问题
- 需要获取将一段音频的长度，按照一定的格式进行输出。
### 解决思路
- 根据ffmpeg或ffrpobe进行音频长度获取
- 根据时间参数进行格式化数据

### 安装插件
- 系统安装相应插件ffpemgh或ffprobe
    - 注意根据windows或其他系统进行选择ffmpeg版本
    - 我的版本时windows 7 64位亲测可用 
    - 安装过程参考<https://wqian.net/blog/2018/1107-split-sound-index.html>

### 组织代码
- 懒虫测试文件下,得到时间格式是`00:00:20.000000`
```
# -*- coding: utf-8 -*-
import subprocess
import json
def main():
    mp3ss=getLenTime("03.wav")
    print(mp3ss)
    mp3ss,mp3ms=mp3ss.split(".")
    m, s = divmod(int(mp3ss), 60)
    h, m = divmod(m, 60)
    hmsms="%02d:%02d:%02d" % (h, m, s) + "." + mp3ms
    print (hmsms)

def getLength(filename):
    command = ["ffprobe.exe","-loglevel","quiet","-print_format","json","-show_format","-show_streams","-i",filename]
    result = subprocess.Popen(command,shell=True,stdout = subprocess.PIPE, stderr = subprocess.STDOUT)
    out = result.stdout.read()
    #print(str(out))
    temp = str(out.decode('utf-8'))
    try:
        data = json.loads(temp)['streams'][1]['width']
    except:
        data = json.loads(temp)['streams'][0]['width']
    return data

def getLenTime(filename):
    command = ["ffprobe.exe","-loglevel","quiet","-print_format","json","-show_format","-show_streams","-i",filename]
    result = subprocess.Popen(command,shell=True,stdout = subprocess.PIPE, stderr = subprocess.STDOUT)
    out = result.stdout.read()
    #print(str(out))
    temp = str(out.decode('utf-8'))
    data = json.loads(temp)["format"]['duration']
    return data
if __name__ == '__main__':
    main()
```

### 运用python获取mp3音频时间长度函数
- 函数如下，可以调用`getMp3Len("03.wav"),得到的是`0.000S`的格式
```
def getMp3Len(filename):
    #mp3时间长度
    #print('获取音频文件长度'+ filename)
    command = ["ffprobe.exe","-loglevel","quiet","-print_format","json","-show_format","-show_streams","-i",filename]
    result = subprocess.Popen(command,shell=True,stdout = subprocess.PIPE, stderr = subprocess.STDOUT)
    out = result.stdout.read()
    #print(str(out))
    temp = str(out.decode('utf-8'))
    data = json.loads(temp)["format"]['duration']
    return float(data)
```