---
title: XMind 8 pro update 7软件安装手记
urlname: Xmindpro-update7-xmindcrack
tags:
  - xmind
categories:
  - 软件列表
date: 2018-04-16 11:59:18
---
![pic from web](https://cdn.pixabay.com/photo/2017/02/13/08/54/brain-2062057_1280.jpg)

> XMind 8 pro update 7软件的功能作用在此不再赘述，用到的自然知道，想了解具体软件的功能，建议去官方网站或搜索查看。本文只是记录了软件安装过程，以及中间可能遇到的问题，以期下次自己安装时候有迹可循。也为有相同遭遇的朋友提供一些指导。本文插件使用方法来源于网络，仅供测试某些功能，请规范应用。

<!-- more -->

### 下载XMind 8 pro update 7源文件
- 官方下载地址：<http://www.xmind.net/download/win/>
- 网盘预留地址：[备用地址：67zu](https://pan.baidu.com/s/1i5z0vRe7JIh6gsHob4P5Tg)

### 下载Xmind插件
- [下载地址：hgb3](https://pan.baidu.com/s/1YVDJC8xavxDct8ukXSXmjQ)

### 安装Xmind
- 一路`下一步`就可以了，如果有需要可以更改安装地址。

### 插件安装过程
- 将插件放到xmind安装目录下面，我这里是：`E:\Program Files (x86)\XMind`
- 找到安装目录中的`xmind.ini`，安装路径`E:\Program Files (x86)\XMind，xmind.ini`文件
- 在`XMind.ini`最后追加代码，（依实际安装路径进行修改）
```
-javaagent:E:\Program Files (x86)\XMind\XMindCrack.jar
```
- 配置Xmind联网
	- 方法一：修改`hosts`
		- 找到`hosts`文件，`C:\Windows\System32\drivers\etc\`
		- 在`hosts`里面追加代码
```
#设置XMind网络
127.0.0.1 www.xmind.net
```
		- 修改完毕
	- 方法二：设置`防火墙`
		- 打开`windows系统控制面板`的`Windows防火墙`
		- 点击左侧中点击`高级设置`
		- 点击下部`出站设置`
		- 点击右侧`新建规则`
		- 选择`程序`，点击`下一步`
		- 选择此程序`路径`，输入`E:\Program Files (x86)\XMind.exe`（安装实际进行），点击`下一步`。
		- 填写`名称`和`备注`，无关紧要。
		- `保存`，`确定`
		- 设置完毕
- 打开`xmind 8` 输入`任意邮箱`
- 输入`序列号`
```
XAka34A2rVRYJ4XBIU35UZMUEEF64CMMIYZCK2FZZUQNODEKUHGJLFMSLIQMQUCUBXRENLK6NZL37JXP4PZXQFILMQ2RG5R7G4QNDO3PSOEUBOCDRYSSXZGRARV6MGA33TN2AMUBHEL4FXMWYTTJDEINJXUAV4BAYKBDCZQWVF3LWYXSDCXY546U3NBGOI3ZPAP2SO3CSQFNB7VVIY123456789012345
```
- 打开软件进行应用测试。

### 中间可能遇到的问题
- XMind软件版本问题，测试`XMind 8 pro update 7`可用，如果从官网上下载不好用，可以从网络其他地方下载。
- 插件也仅仅是针对本软件。一定要把插件放到指定位置，一定要确认。
- `hosts`配置和`防火墙配置`可以值选择一种，不能忽略。

### 参考文献
- <https://www.52pojie.cn/forum.php?mod=viewthread&tid=700444&page=1#pid18961327>
- <https://www.52pojie.cn/thread-630081-1-1.html>

### **如果文章对你有一丁点的帮助，就点个赞吧，感谢你的认可**
