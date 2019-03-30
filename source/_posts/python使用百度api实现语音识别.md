---
title: python使用百度api实现语音识别
urlname: python-stt-index
tags:
  - python
  - 百度语音识别
categories:
  - python
date: 2018-11-28 23:19:16
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 问题解决：运用百度api实现语音识别，把结果存入txt,将语音转换成pcm格式。

<!-- more -->

### 实现步骤
- 安装python3.6
- 安装ffmpeg插件
- 申请百度api
- 安装百度语音识别sdk

### 实现代码
```
# 语音上传百度转为文字。要小与60s。。20181110。写入result文本
import os
import datetime
def main():
    outfile = 'result.txt'
    print('输入需要转换的文件全名，没有后缀默认后缀为mp3,回车默认为1.mp3')
    filemp3=input('=')

    if filemp3=='':
        filemp3='1.mp3'
    else:
        if len(filemp3.split("."))==1:
           filemp3=filemp3 + '.mp3'


    print(filemp3)
    mp32txt(outfile,filemp3)
    x=input('回车结束')

def mp32txt(outfile,filemp3):
    print('开始转化')
    filepcm='16ktemp.pcm'
    mp32pcm(filemp3, filepcm)
    if os.path.exists(filepcm):  # 如果文件存在
        write_txt(outfile, filemp3, baidu_sound2txt(filepcm))

        # os.remove(filepcm)  # 则删除
        # os.unlink(my_file)
        print('删除临时文件')
    else:
        print('查无源文件，转换失败')

    print('结束转化')

#删除文件
def delfile(filepcm):
    if os.path.exists(filepcm):  # 如果文件存在
       os.remove(filepcm)  # 则删除
        # os.unlink(my_file)
       print('删除文件'+ filepcm)

def mp32pcm(filemp3,filepcm):
    from subprocess import call
    # wav 文件转 16k 16bits 位深的单声道pcm文件
    print('转换文件格式')
    call('ffmpeg -y  -i ' + filemp3 + '  -acodec pcm_s16le -f s16le -ac 1 -ar 16000 ' + filepcm + '')

def baidu_sound2txt(sound):
    #百度识别语音
    print('语音识别中')

    #语音转换为pcm格式

    from aip import AipSpeech
    APP_ID = '11111'
    API_KEY = '4CjTVzlg9RPsBjkvzN46AE'
    SECRET_KEY = 'yrQ63kzm7jbjOuMTgp4oqCIOhY9z'

    client = AipSpeech(APP_ID, API_KEY, SECRET_KEY)

    d = client.asr(get_file_content(sound), 'pcm', 16000, {'dev_pid': '1536', })

    print(d)
    err_no = d['err_no']
    #print(err_no)
    if err_no==0:
        result = d['result'][0]
    else:
        result = 'Err:'+ str(err_no) + '   http://ai.baidu.com/docs#/ASR-Online-Python-SDK/top'


    # 删除临时文件
    #print(result)

    return result


def get_file_content(sound):
    # 读取文件
    with open(sound, 'rb') as fp:
        return fp.read()

def write_txt(filename,sound,txt):
    #写入文件
    print('写入文件')
    with open(filename, 'a', encoding='utf-8') as f:
         time1_str = datetime.datetime.strftime( datetime.datetime.now(), '%Y-%m-%d %H:%M:%S')
         f.write('\n')
         f.write('\n' + time1_str)
         f.write('\n' + sound)
         f.write('\n'+ txt)

if __name__ == '__main__':
    main()
```