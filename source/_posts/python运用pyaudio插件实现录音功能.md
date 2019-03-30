---
title: python运用pyaudio插件实现录音功能
urlname: python-pyaudio-index
tags:
  - python
  - pyaudio
categories:
  - pyaudio
  - 软件列表
date: 2018-11-28 11:20:05
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 问题解决：解决windows7系统安装编译pyaudio插件，解决pyaudio安装出错问题，运用python结合pyaudio实现录音问题。

<!-- more -->

### 安装pyaudio
- 这是一个头痛的问题，可能有简单的方法，但是可能确不知道
- 我是在windows系统下安装的
- 一开始使用pip install pyaudio并没有解决问题，而是出现了一系列的问题，比如缺少.h文件等等.`fatal error: portaudio.h: No such file or directory`
- 后来使用visual studio2013进行pyaudio插件编译
- 编译后还是没有解决
- 最后通过安装下载wheel文件后，系统能使用pyaudio插件了，有可能是最后好用了。
- 一开始我可能尝试错误了，可能根本就不需要自己手动编译portadudio的插件，不过我傻呵呵的研究了好一段时间，最后竟然编译成功了。
#### windows下安装
- 本人系统windows 7
- 重要网站<http://people.csail.mit.edu/hubert/pyaudio/>
- 方案1
    - 安装wheel
    - 打开cmd,输入`pip install wheel`
    - 下载wheel文件<http://people.csail.mit.edu/hubert/pyaudio/packages/>
    - 文件下载依据是根据python版本，和自己系统的版本。
        - 查看python版本`python -version` 
    - 安装。`pip install xxxxxx.whl`
- 方案2
    - 使用命令`python -m pip install pyaudio`
    - 如果可行请留言
#### Debian/Ubuntu安装方案
- 我是在腾讯codign cloud studio上进行尝试安装的
- 使用命令`sudo apt-get install python-pyaudio python3-pyaudio`
- 如果出现错误`Unable to locate package`，请运行以下脚本尝试
    - 修正错误命令，更新sudo插件`sudo apt-get update` 
    - 然后再执行`sudo apt-get install python-pyaudio python3-pyaudio`
- 完成安装，由于虚拟环境没有声卡，最后出现程序问题，但是安装显示成功。

### 录音函数
- 可以录制设定时长的录音
```
import pyaudio
import wave
def main():
    luyin_pit(10,'18.wav')
    
def luyin_pit(ms,filename):

    chunk = 1024
    formats = pyaudio.paInt16
    channal = 1
    rate = 16000
    p = pyaudio.PyAudio()
    stream = p.open(format=formats,
                    channels=channal,
                    rate=rate,
                    input=True,
                    frames_per_buffer=chunk)

    #print("开始录音,请说话......")

    frames = []

    for i in range(0, math.ceil(rate / chunk * ms)):
        data = stream.read(chunk)
        frames.append(data)
    #print("录音结束,请闭嘴!")
    stream.stop_stream()
    stream.close()
    p.terminate()
    wf = wave.open(filename,'wb')
    wf.setnchannels(channal)
    wf.setsampwidth(p.get_sample_size(formats))
    wf.setframerate(rate)
    wf.writeframes(b''.join(frames))
    wf.close()
if __name__ == '__main__':

    main()
```

### 运用多线程实现录音功能
- 开启多线程录音，可以更灵活的控制录音时间
```
# coding=utf-8
import threading
import pyaudio
import wave


class RecordThread(threading.Thread):
    def __init__(self, audiofile='record.wav'):
        threading.Thread.__init__(self)
        self.bRecord = True
        self.audiofile = audiofile
        self.chunk = 1024
        self.format = pyaudio.paInt16
        self.channels = 1
        self.rate = 16000

    def run(self):
        audio = pyaudio.PyAudio()
        wavfile = wave.open(self.audiofile, 'wb')
        wavfile.setnchannels(self.channels)
        wavfile.setsampwidth(audio.get_sample_size(self.format))
        wavfile.setframerate(self.rate)
        wavstream = audio.open(format=self.format,
                               channels=self.channels,
                               rate=self.rate,
                               input=True,
                               frames_per_buffer=self.chunk)
        while self.bRecord:
            wavfile.writeframes(wavstream.read(self.chunk))
        wavstream.stop_stream()
        wavstream.close()
        audio.terminate()

    def stoprecord(self):
        self.bRecord = False

# 使用方法
# audio_record = pythreadaudio.RecordThread(audio_fn)
# audio_record.start()
# sleep(2)
# audio_record.stoprecord()
```


### 参考
- 官网<http://people.csail.mit.edu/hubert/pyaudio/>
- 坑参考<https://www.cnblogs.com/zjutlitao/p/8411414.html>
- 播放<https://blog.csdn.net/qq_41185868/article/details/80500847>
- 录音播放等<https://blog.csdn.net/Marksinoberg/article/details/71577704>
- portaudio<http://www.portaudio.com/>
