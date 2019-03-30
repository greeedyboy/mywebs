---
title: python使用科大讯飞语音合成文字转语音
urlname: python-xunfei-tts-index
tags:
  - python
  - 语音合成
categories:
  - python
date: 2018-11-28 23:39:30
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 问题实现：使用科大讯飞api实现语音合成，合成效果不错，但是收费。不太喜欢，支持百度，百度加油。

<!-- more -->

- 代码如下，不想继续了。
```
#讯飞文字转语音
import base64
import json
import time
import hashlib
import urllib.request
import urllib.parse

# API请求地址、API KEY、APP ID等参数，提前填好备用
api_url = "http://api.xfyun.cn/v1/service/v1/tts"
API_KEY = "f6bcc68a50c5aba12f6ef518ed2b4c14"
APP_ID = "5be58bb3"
OUTPUT_FILE = "outputxxx.mp3"    # 输出音频的保存路径，请根据自己的情况替换
TEXT = "你吃过草么？大一的时候放假，一内蒙古哥们儿回家，我们嚷着让他带特产回来，这货爽快答应了。开学的时候，这哥们儿真给我们带了特产，给我们一人一个袋子，里面是一把绿油油的青草，他告诉我们，这是内蒙古大草原上土生土长的拿着草慢慢嚼，味道还真不错。这哥们看着我们一寝室的人认真的吃着草"

# 构造输出音频配置参数
Param = {
    "auf": "audio/L16;rate=16000",    #音频采样率
    "aue": "lame",    #音频编码，raw(生成wav)或lame(生成mp3)
    "voice_name": "xiaoyan",
    "speed": "50",    #语速[0,100]
    "volume": "77",    #音量[0,100]
    "pitch": "50",    #音高[0,100]
    "engine_type": "aisound"    #引擎类型。aisound（普通效果），intp65（中文），intp65_en（英文）
}
# 配置参数编码为base64字符串，过程：字典→明文字符串→utf8编码→base64(bytes)→base64字符串
Param_str = json.dumps(Param)    #得到明文字符串
Param_utf8 = Param_str.encode('utf8')    #得到utf8编码(bytes类型)
Param_b64 = base64.b64encode(Param_utf8)    #得到base64编码(bytes类型)
Param_b64str = Param_b64.decode('utf8')    #得到base64字符串

# 构造HTTP请求的头部
time_now = str(int(time.time()))
checksum = (API_KEY + time_now + Param_b64str).encode('utf8')
checksum_md5 = hashlib.md5(checksum).hexdigest()
header = {
    "X-Appid": APP_ID,
    "X-CurTime": time_now,
    "X-Param": Param_b64str,
    "X-CheckSum": checksum_md5
}

# 构造HTTP请求Body
body = {
    "text": TEXT
}
body_urlencode = urllib.parse.urlencode(body)
body_utf8 = body_urlencode.encode('utf8')

# 发送HTTP POST请求
req = urllib.request.Request(api_url, data=body_utf8, headers=header)
response = urllib.request.urlopen(req)

# 读取结果
response_head = response.headers['Content-Type']
if(response_head == "audio/mpeg"):
    out_file = open(OUTPUT_FILE, 'wb')
    data = response.read() # a 'bytes' object
    out_file.write(data)
    out_file.close()
    print('输出文件: ' + OUTPUT_FILE)
else:
    print(response.read().decode('utf8'))
```

- <https://doc.xfyun.cn/msc_windows/index.html>