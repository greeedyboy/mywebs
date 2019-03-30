---
title: python使用百度api实现文字转语音
urlname: python-baidu-tts-index
tags:
  - python
  - tts
  - 文字转语音
  - 语音合成
categories:
  - python
date: 2018-11-28 22:29:56
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 问题解决：运用百度api实现文字转语音。将生成的单通道文件转换成双通道音频。其中还实现python读取文本文件，python删除文件等操作函数。

<!-- more -->

### 申请百度文字转语音api
- 目前是全面免费开放
- 这一点真的真的很赞，有大科技公司的担当，这一点很赞很赞
- 注册账号<http://yuyin.baidu.com/>
- 找到自己的keys

### 寻找语音合成文档
- 根据开放文档进行操作，一定要看实例
- <http://ai.baidu.com/docs#/TTS-Online-Python-SDK/top>
- 安装baidu-sdk.`pip install baidu-aip`即可
- 封装的代码
```
#百度文字转换为txt并存储为mp3为立体声41000采样频率。20181110
import os
import datetime
def main():

    print('欢迎使用文本转语音程序')
    print('输入文本名称，默认后缀为txt,回车默认为1.txt')
    filetxt=input('=')
    if filetxt=='':
        filetxt='1.txt'
        outfile = 'xh1.mp3'
    else:
        outfile = filetxt+'xh'+  '.mp3'
        filetxt=filetxt + '.txt'

    txt = gettxt(filetxt)

    baidu_txt2sound(txt,outfile,5,5,10,4)

    print('顺利生成' + outfile)
    x=input('回车结束')

def gettxt(txtfile):


    # 得到文件文本
    f = open(txtfile,encoding='utf8')  # 返回一个文件对象
    line = f.readline()  # 调用文件的 readline()方法
    txt=''
    while line:
       # print(line, end = '')     # 在 Python 3 中使用
        txt = txt + line
        line = f.readline()

    f.close()
    #print(txt)
    return txt

def baidu_txt2sound(txt,outfile,spd,pit,vol,per):
    #百度识别语音
    print('语音识别中')
    outtemp='txt2stemp.mp3'
    from aip import AipSpeech
    APP_ID = '2222222'
    API_KEY = 'AAA9RPsBFFjkvzN46AE'
    SECRET_KEY = 'bbxddkzm7jbA8IljOuMTgp4oqCIOhY9z'
    client = AipSpeech(APP_ID, API_KEY, SECRET_KEY)

    from aip import AipSpeech
    client = AipSpeech(APP_ID, API_KEY, SECRET_KEY)

    result = client.synthesis(txt, 'zh', 1, {
        'spd':spd,'pit':pit,'vol': vol,'per':per
    })
    print(result)

    # 识别正确返回语音二进制 错误则返回dict 参照下面错误码
    if not isinstance(result, dict):
        with open(outtemp, 'wb') as f:
            f.write(result)
        from subprocess import call
        delfile(outfile)

        if os.path.exists(outtemp):  # 如果文件存在
            #将百度语音转换为立体声，并41000hz，可以ae编辑
            call( 'ffmpeg -i ' + outtemp + ' -i ' + outtemp + ' -filter_complex "amovie=' + outtemp + ' [l]; amovie=' + outtemp + ' [r]; [l] [r] amerge" -ar 44100 ' + outfile + ' ')
            delfile(outtemp)
def delfile(filepcm):
    #删除文件
    if os.path.exists(filepcm):  # 如果文件存在
       os.remove(filepcm)  # 则删除
        # os.unlink(my_file)
       print('删除文件'+ filepcm)

if __name__ == '__main__':
    main()
```

- 注：如果出错，很正常，因为内部引用了ffmpeg的插件，具体怎么安装，可以搜索本站，寻找方法。

