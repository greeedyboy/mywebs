---
title: python改造pydub对语音分割方式
urlname: python-pydub-split-mp3-index
tags:
  - python
  - pydub
categories:
  - python
  - 软件列表
date: 2018-11-28 10:46:52
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 问题提出：可以运用pydub插件对音频进行分割，分割方式是运用静音方式进行。但是分割出来的语音是把中间的空白去掉的。项目应用中，需要使用不截取的方式对语音进行分割，使得分割后的片段时间总和和原语音片段一直。下面改造便是无缩音频分割方法。

<!-- more -->

### 环境准备
- 安装ffmpeg操作系统组件
- 安装pydub插件
- 具体以上安装可以参考<https://wqian.net/blog/2018/1107-split-sound-index.html>

### 实现思路
- 找到pydub分割函数
- 对分割方式进行查看
- 根据自己的方案改造
- 本文实现了两种方案
    - 从空白中间分割
    - 从语音开始前留白一定时间开始分割
- 关于函数中参数的含义，可以参考<https://wqian.net/blog/2018/1107-split-sound-index.html>

### 从空白中间分割
- 代码函数
```
from pydub.silence import detect_nonsilent

def split_on_silence_tp2(audio_segment, min_silence_len=1000, silence_thresh=-16, keep_silence=100,
                     seek_step=1):
   #从空白中间分

    not_silence_ranges = detect_nonsilent(audio_segment, min_silence_len, silence_thresh, seek_step)
    #print(not_silence_ranges)
   # print(len(not_silence_ranges))
    chunks = []
    #个数
    num=len(not_silence_ranges)
    num_i=0
    if num==1:
        chunks.append(audio_segment)
    else:

        for  index in range(len(not_silence_ranges)):
            if index==0:
                start_i=0
            else:
                start_i=round((not_silence_ranges[index][0]+not_silence_ranges[index-1][1])/2)

            if index==len(not_silence_ranges)-1:
                end_i=len(audio_segment)
            else:
                end_i=round((not_silence_ranges[index + 1][0] + not_silence_ranges[index][1]) / 2)

            #print(index)
            #print([start_i,end_i])
            #print(range(len(not_silence_ranges)-1))

            chunks.append(audio_segment[start_i:end_i])

        #print([end_i,not_silence_ranges[num-1][1]])

        #chunks.append(audio_segment[end_i:len(audio_segment)])

    return chunks
```

### 语音开始留白特定时间分割
- 代码实现
```
def split_on_silence_nocut(audio_segment, min_silence_len=1000, silence_thresh=-16, keep_silence=100,
                     seek_step=1):

   #从说话提前100ms分
   # print('min_silence_len=' + str(min_silence_len))
   # print('silence_thresh=' + str(silence_thresh))
    not_silence_ranges = detect_nonsilent(audio_segment, min_silence_len, silence_thresh, seek_step)
    #print(not_silence_ranges)
   # print(len(not_silence_ranges))
    chunks = []
    #个数
    num=len(not_silence_ranges)
    num_i=0
    if num==1:
        chunks.append(audio_segment)
    else:

        for  index in range(len(not_silence_ranges)):
            start_i = max(0, not_silence_ranges[index][0]-keep_silence)

            if index==len(not_silence_ranges)-1:
                end_i=len(audio_segment)
            else:
                end_i=not_silence_ranges[index + 1][0]-keep_silence


            #print(index)
            #print([start_i,end_i])
            #print(range(len(not_silence_ranges)-1))

            chunks.append(audio_segment[start_i:end_i])

        #print([end_i,not_silence_ranges[num-1][1]])

        #chunks.append(audio_segment[end_i:len(audio_segment)])

    return chunks

```


