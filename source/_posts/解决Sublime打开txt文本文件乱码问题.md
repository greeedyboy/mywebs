---
title: 解决Sublime打开txt文本文件乱码问题
urlname: index
tags:
  - sublime
  - txt乱码
categories:
  - 软件列表
date: 2018-04-19 16:35:39
---
>由于windows系统的txt记事本的默认保存编码格式是GBK，而Sublime text不支持GB2312和GBK编码，因此需要进行转换。本文在sublime text 3的基础上进行测试应用，希望对于有共同遭遇的朋友提供一些指导。

<!-- more -->

### 解决步骤
- 安装sublime text3。本博客相关[安装教程](0415-sublime-text3-markdown-editing-preview.html)。
- 打开安装完毕的sublime text3
- 同时按住`ctrl + shift + P`，弹出的输入框 
- 输入框中输入`install package`然后按`回车`
- 等待出现一个会话框，在会话框里面输入`ConvertToUTF8`，然后按`回车`
- 查看菜单，我相信，你已完成。

### **如果文章对你有一丁点的触动，赏一分钱鼓励一下作者吧**