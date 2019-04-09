---
title: 深更半夜实现python百度api人脸识别
urlname: python-api-index
tags:
  - python
  - 人脸识别
categories:
  - python
date: 2019-04-05 04:46:15
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 利用百度api实现人脸对比和人脸搜索。官方sdk基于python2，本程序只适用于python3.x。

<!-- more -->

### 前期准备及步骤
- 1、去百度注册账号
- 2、去百度云注册人脸检测应用，根据创建应用提示进行创建
- https://console.bce.baidu.com/ai/?fromai=1
- 3、应用创建完毕后，打开应用列表，然后进入查看人脸库
- https://console.bce.baidu.com/ai/?fromai=1#/ai/face/app/list
- 4、在人脸库页面点击创建组，输入id进行确认，然后在人脸库中上传人脸照片，完成人脸库设置。
- 5、python项目中完成相关功能编写，一定注意参考官方教程技术文档
- https://ai.baidu.com/docs#/Face-Detect-V3/top
- 注意：文档是基于python2编写，本文档已经基于python3进行了修正，亲测可用
- 以下为代码。

### 代码及帮助
- 拿去，不谢。
```
#!/usr/bin/env python 
# -*- coding:utf-8 -*-
"""info
By:wqian
Date:2019.4.5
Info:利用百度api实现人脸对比和人脸搜索。官方sdk基于python2，本程序只适用于python3.x。
"""

import urllib.request,json
import base64
import urllib.parse

def get_alitoken(client_id,client_secret):
    # client_id 为官网获取的AK， client_secret 为官网获取的SK
    #帮助文档
    #https://ai.baidu.com/docs#/Auth/top
    #帮助文档中python代码基于python2,本文已经转换为python3x调试通过。
    host = 'https://aip.baidubce.com/oauth/2.0/token?grant_type=client_credentials&client_id='+ client_id +'&client_secret='+ client_secret +''
    request = urllib.request.Request(host)
    request.add_header('Content-Type', 'application/json; charset=UTF-8')
    response = urllib.request.urlopen(request)
    content = response.read()
    access_token='err'

    if (content):
        #print(content)
        access_token=json.loads(content.decode('utf-8'))['access_token']
        #print(access_token)

    return access_token

def open_pic2base64(image):
    # 打开本地图片，并转化为base64
    f = open(image, 'rb')
    img = base64.b64encode(f.read()).decode('utf-8')

    return img

def bd_check2pic(client_id,client_secret,image1,image2):
    # 比较两个图片，给出得分
    # bd_check2pic(client_id,client_secret,image1,image2)
    #人脸对比帮助api
    #https://ai.baidu.com/docs#/Face-Match-V3/top
    # 帮助文档中python代码基于python2,本文已经转换为python3x调试通过。

    request_url = "https://aip.baidubce.com/rest/2.0/face/v3/match"

    params = json.dumps(
        [{"image": open_pic2base64(image1), "image_type": "BASE64", "face_type": "LIVE", "quality_control": "LOW"}, {"image": open_pic2base64(image2), "image_type": "BASE64", "face_type": "LIVE", "quality_control": "LOW"}])

    access_token = get_alitoken(client_id,client_secret)#'[调用鉴权接口获取的token]'
    request_url = request_url + "?access_token=" + access_token

    params = params.encode("utf-8")

    req = urllib.request.Request(url=request_url, data=params)
    req.add_header('Content-Type', 'application/json')

    res = urllib.request.urlopen(req)
    content = res.read()

    score=0
    if content:
        score = json.loads(content.decode('utf-8'))['result']['score']
        print(score)

    return score

def bd_search(image,client_id,client_secret,groups):
    #bd_search(image1,client_id,client_secret,'class1')
    #在库中进行图片对比搜索
    #需要个人的sk,ak,本地图片地址,个人账户下的人脸库
    #人脸库手动设置
    #https://console.bce.baidu.com/ai/?fromai=1#/ai/face/facelib/appList
    #人脸搜索官方帮助
    #https://ai.baidu.com/docs#/Face-Search-V3/top
    #帮助文档中python代码基于python2,本文已经转换为python3x调试通过。


    request_url = "https://aip.baidubce.com/rest/2.0/face/v3/search"

    params =json.dumps({"image":open_pic2base64(image),"image_type":"BASE64","group_id_list":groups,"quality_control":"NONE","liveness_control":"NONE"})

    access_token = get_alitoken(client_id,client_secret)#'[调用鉴权接口获取的token]'

    request_url = request_url + "?access_token=" + access_token

    params = params.encode("utf-8")

    request = urllib.request.Request(url=request_url, data=params)

    request.add_header('Content-Type', 'application/json')
    response = urllib.request.urlopen(request)
    content = response.read()
    user='not find'
    if content:
        #print(content)
        result = json.loads(content.decode('utf-8'))

        if result['error_code']==0:
            user=result['result']['user_list'][0]
            score=user['score']
            user_id=user['user_id']
            user_info=user['user_info']

    print(user)
    return(user)


if __name__ == '__main__':
    #前期准备
    #1、去百度注册账号
    #2、去百度云注册人脸检测应用，根据创建应用提示进行创建
    #https: // console.bce.baidu.com / ai /?fromai = 1  # /ai/face/overview/index
    #3、应用创建完毕后，打开应用列表，然后进入查看人脸库
    #https://console.bce.baidu.com/ai/?fromai=1#/ai/face/app/list
    #4、在人脸库页面点击创建组，输入id进行确认，然后在人脸库中上传人脸照片，完成人脸库设置。
    #5、python项目中完成相关功能编写，一定注意参考官方教程技术文档
    #https://ai.baidu.com/docs#/Face-Detect-V3/top
    #注意：文档是基于python2编写，本文档已经基于python3进行了修正，亲测可用
    #以下为代码功能测试：


    # 账户id，client_id 为官网获取的AK， client_secret 为官网获取的SK。
    # https://console.bce.baidu.com/ai/?fromai=1#/ai/face/app/list
    client_id = 'ak'  # ak
    client_secret = 'sk'  # sk

    # 本地图片地址，根据自己的图片进行修改
    image1 = 'E:/PycharmProjects/untitled2/sysfile/yy/wq1.jpg'
    image2 = 'E:/PycharmProjects/untitled2/sysfile/yy/wq2.jpg'
    image3 = 'E:/PycharmProjects/untitled2/sysfile/yy/wq3.jpg'


    #实例1：两张图片进行对比，得出相似得分
    #bd_check2pic(client_id,client_secret,image1,image2)

    #实例2：将图片与对比库进行对比，查找相似得分最高的图片，'class1'为设置的人脸库组名称
    bd_search(image1,client_id,client_secret,'class1')
```

### 帮助
- [https://console.bce.baidu.com/ai/?fromai=1]
- [https://console.bce.baidu.com/ai/?fromai=1#/ai/face/app/list]
- [https://ai.baidu.com/docs#/Face-Detect-V3/top]