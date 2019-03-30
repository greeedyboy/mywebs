---
title: python利用ffmpeg对音频文件进行合并转码等操作
urlname: python-ffmpeg-index
tags:
  - python
  - ffmpeg
categories:
  - python
  - 软件列表
date: 2018-11-28 10:13:29
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 解决问题：python利用ffmpeg对音频文件进行转码、单声道合并立体声、连接音频文件等操作。

<!-- more -->

### 问题提出
- 应用中出现对音频文件转码等操作
- 结合python和ffmpeg进行实现

### 解决思路
- 主要是运用ffmpeg强大的功能来实现
- 运用python来调用ffmpeg命令

### 软件准备
- 安装python
- 安装ffmpeg<https://wqian.net/blog/2018/1107-split-sound-index.html>

### 重要代码
- 头部引用
```
import subprocess
from subprocess import call
```
- 连接音频文件

```
                cmd='ffmpeg -i ' + outmp3_hc + ' -i ' + outtemp+ ' -filter_complex "[0:0] [1:0] concat=n=2:v=0:a=1 [a]" -map [a] ' + outmp3_tem + ''
                #p=call(cmd)
                p = subprocess.call(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)

```
    -函数版本
    ```
import os,shutil
import subprocess
def hcsound(soundlist,outfile):
    print('len(soudlist)='+ str(len(soundlist)))
    print(soundlist)
    #合成音频
    i=0
    if len(soundlist) == 1:
        shutil.copy(soundlist[0], outfile)
    else:
        for sound in soundlist:
            i+=1
            if i==1:
                delfile(outfile)
                shutil.copy(sound, outfile)
            else:
                tempfile=outfile+"_t.mp3"
                call('ffmpeg -i ' + sound + ' -i ' + outfile + ' -filter_complex "[0:0] [1:0] concat=n=2:v=0:a=1 [a]" -map [a] ' + tempfile + '')
                #这种方式运行时候会产生调试信息，不想产生调试信息，可以用以上替代。
                #p = subprocess.call(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
                shutil.move(tempfile, outfile)
    ```

- 音频文件转码（本例子是转为16000单声道pcm格式，其他格式自己定参数）
```
    soundpcm = sound + ".pcm"
    cmd='ffmpeg -y  -i ' + sound + '  -acodec pcm_s16le -f s16le -ac 1 -ar 16000 ' + soundpcm + ' '
    #p=call(cmd)
    p = subprocess.call(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
```

- 转为立体声（实现原因是ae导入音频没有声音，发现好像音频是单通道音频的原因，经转换为双通道立体声41KHZ之后，问题解决）
```
            #将百度合成语音转换为立体声，并41000hz，可以ae编辑
            cmd= 'ffmpeg -i ' + outtemp + ' -i ' + outtemp + ' -filter_complex "amovie=' + outtemp + ' [l]; amovie=' + outtemp + ' [r]; [l] [r] amerge" -ar 44100 ' + outfile + ' '

            # p=call(cmd)
            p = subprocess.call(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
            
```
    - 函数版本
    ```
import subprocess
import os,shutil
def mp3_2ch2(outtemp):

    #变成双声道
    outfile=outtemp + '.mp3'

    cmd = 'ffmpeg -i ' + outtemp + ' -i ' + outtemp + ' -filter_complex "amovie=' + outtemp + ' [l]; amovie=' + outtemp + ' [r]; [l] [r] amerge" -ar 44100 ' + outfile + ' '

    # p=call(cmd)
    p = subprocess.call(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
    delfile(outtemp)
    shutil.move(outfile,outtemp)
    ```

- 音频文件截取（应用中需要在两段音频中间插入一段空白，空白时间根据设定来取，本文做法是提取一段含有噪点的空白音频的片段）
```
cmd='ffmpeg -i 2xh.mp3 -vn -acodec copy -ss 00:00:00 -t ' + hmsms + ' ' + outfile2 +''
p = subprocess.call(cmd, shell=True, stdout=subprocess.PIPE, stderr=subprocess.PIPE)
```
