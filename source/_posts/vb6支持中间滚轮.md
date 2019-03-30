---
title: vb6支持中间滚轮
urlname: index
tags:
  - vb6
categories:
  - vb6
date: 2019-03-29 09:38:57
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> vb6中不支持鼠标滚动，安装插件支持`VB6IDEMouseWheelAddin.dll`。

<!-- more -->

### 下载插件
- 下载vb6mousewheel.dll
- http://www.pudn.com/Download/item/id/3864385.html

### 安装
    - 32位操作系统
        - 复制到C:/WINDOWS/system32目录下
        - 打开cmd.exe
        - 运行`regsvr32 C:\Windows\System32\VB6IDEMouseWheelAddin.dll`
    - 64位操作系统
        - 复制到C:/WINDOWS/SysWOW64目录下
        - 打开cmd.exe
        - 运行`regsvr32 C:\Windows\SysWOW64\VB6IDEMouseWheelAddin.dll`

### 设置
- 打开vb程序
- 菜单`外接程序`-`外接程序管理器`-`MOuseWheel Fix`加载行为为启动加载。
- https://wqian.net

### 测试
- 打开程序滚动测试。