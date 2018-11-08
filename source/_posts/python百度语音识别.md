---
title: python百度语音识别
urlname: python-sound-index
tags:
  - python
  - ffmpeg
  - pcm
categories:
  - 网络日志
date: 2018-11-07 20:03:43
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 运用百度语音识别api将语音进行识别。

<!-- more -->

### 软件准备

- 安装python3.7
- 安装pip
- 安装ffmpeg
- 申请百度key
- 安装baidu-api`pip install baidu-aip`

### 步骤及功能
- 导入mp3文件
- 利用ffmpeg转换为pcm
- 利用百度api进行识别
- 将识别的文字追写到文件

### 代码实现
- 参考百度api
```
# 写操作
import os
import datetime
def main():
    outfile = 'result.txt'
    print('输入需要转换的文件全名，默认后缀为mp3,回车默认为1.mp3')
    filemp3=input('=')
    if filemp3=='':
        filemp3='1.mp3'
    else:
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

        os.remove(filepcm)  # 则删除
        # os.unlink(my_file)
        print('删除临时文件')
    else:
        print('查无源文件，转换失败')

    print('结束转化')

def mp32pcm(filemp3,filepcm):
    from subprocess import call
    # wav 文件转 16k 16bits 位深的单声道pcm文件
    print('转换文件格式')
    call('ffmpeg -y  -i ' + filemp3 + '  -acodec pcm_s16le -f s16le -ac 1 -ar 16000 ' + filepcm + '')

def baidu_sound2txt(sound):
    #百度识别语音
    print('语音识别中')
    from aip import AipSpeech
    APP_ID = '28076301'
    API_KEY = '4CjTVzlg9RPsBFFjkvzN46AEb'
    SECRET_KEY = 'yrQ63kzm7jbA8IljOuMTgp4oqCIOhY9zc'
    client = AipSpeech(APP_ID, API_KEY, SECRET_KEY)

    from aip import AipSpeech
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




### 参考资料
- http://ai.baidu.com/docs#/ASR-Tool-convert/top
- http://ai.baidu.com/docs#/ASR-Online-Python-SDK/top
