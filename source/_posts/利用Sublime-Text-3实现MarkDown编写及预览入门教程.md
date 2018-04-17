---
title: 利用Sublime Text 3实现MarkDown编写和预览后进行Steemit博客发布入门教程
urlname: sublime-text3-markdown-editing-preview
tags:
  - sublime Text3
  - markdown
categories:
  - 软件列表
date: 2018-04-15 02:33:26
---
![图自网络](https://cdn.pixabay.com/photo/2016/04/13/19/20/binary-1327493_1280.jpg)
> 你是否如我一样，一直在寻找一款舒服的编辑器来完成Markdown文档的编辑工作？  
> 比如用于撰写博客，用于发布steemit文档等。  
> 当然，会有朋友推荐编辑器之神的Vim，或神之编辑的Emacs，两阵相争的厮杀声在互联网上更是此起彼伏。定然，血流成河的阵地上演绎着一幕幕悲喜，硝烟弥漫的战场上造就了一个个战神。  
> 我也坚信，三十年河东河西的传说定会在网络上不时实现。可能，输赢在理想主义者眼里或许可以用生命衡量，而对于实用主义来讲输赢可能还不及一碗牛肉面令人惊喜。  
> 作为一个普普通通的作者我真的没有那么多的时间成本用于学习Vim和Emacs，尤其是那么多的快捷键，作为一个只记流水账的的我来讲，真的好难记。  
> 恰有网友推荐说sublime text不错，想想，用一下也不会怀孕，所以今天就下载下来安装试了试，感觉还不错。于是也拿来推荐给朋友试用，也希望和我`不论高下，适用最好`的心态一样的朋友，来尝试本软件，我相信你定会有收获。  
> 本文仅仅是作为一个使用的初级介绍，为有同样需求的朋友提供一份入门参考。  
> 文中主要介绍了sublime text的下载安装，markdown editing插件安装及配置，markdown priview插件安装配置及应用，还有可有可无随时失效的注册码。本文方法仅对Windows系统适用，其他系统作者没做测试。  
<!-- more -->

### Sublime Text3 下载
- 根据你windows系统下载相软件版本。
- [官方网站](https://www.sublimetext.com/3)<https://www.sublimetext.com/>
- 注意：` portable version` 版本指的是绿色运行包，我建议还是下载安装版本进行安装使用。
- 软件下载后点击安装，一直`下一步`就好了。

### Markdown Editing安装及配置
- 打开安装完毕的sublime text3
- 同时按住`ctrl + shift + P`，弹出的输入框 
- 输入框中输入`package control install`然后按`回车`
- 等待出现一个会话框，在会话框里面输入`markdown editing`，然后按`回车`
- 等待在软件底部`状态栏`里面会有信息显示，稍等后就会成功。
- 重启软件，可以进行相关配置
- 配置方法：点击顶部菜单`Preferences`->`Package Seting`->`Markdown Editing`->你可以任性的选择设置项目了。反正我使用的默认，高阶教程，自行摸索吧，都是文本配置。
- 这样就实现了Markdown Editing安装和配置了。

### Markdown Preview安装及配置
- 打开安装完毕的sublime text3
- 同时按住`ctrl + shift + P`，弹出的输入框 
- 输入框中输入`package control install`然后按`回车`
- 等待出现一个会话框，在会话框里面输入`markdown preview`，然后按`回车`
- 等待在软件底部`状态栏`里面会有信息显示，稍等后就会成功。
- 重启软件，可以进行相关配置
- 配置方法：点击顶部菜单`Preferences`->`Package Setting`->`Markdown Preview`->`Setting Default`
- 赋值打开的文本的内容
- 点击顶部菜单`Preferences`->`Package Seting`->`Markdown Preview`->`Setting Default user`
- 粘贴刚才复制的内容
- 找到`"enable_autoreload": false,`更改为`"enable_autoreload": false,`,然后`Ctrl+S`
- 这样就实现了Markdown Preview安装和配置了。

### 配置一键预览
- 重启Sublime Text3
- 点击顶部菜单`preference`-> `key bindings` 中输入
```
[
    {"keys": ["alt+m"], "command": "markdown_preview", "args": { "target": "browser"}}
]
```
- 然后`Ctrl+S`，完成配置。
- 重启Sublime，打开一个Md文档，并按下`Alt+m`键试试效果吧。
- 然后复制Markdown文本，粘贴到内容页面，可以发布到Steemit上了。

### 配置Sublime实时保存 
- 点击顶部菜单`Preferences`->`Settings`
- 输入以下下代码
```
{
    "font_size": 14,
    "ignored_packages":
    [
        "Markdown",
        "Vintage"
    ],
    "theme": "Adaptive.sublime-theme",
    "save_on_focus_lost": true
}
```
- 代码中含有了字体和主题设置，重点是`"save_on_focus_lost": true`。

### 配置Sublime中文菜单
- 打开安装完毕的sublime text3
- 同时按住`ctrl + shift + P`，弹出的输入框 
- 输入框中输入`install package`然后按`回车`
- 等待出现一个会话框，在会话框里面输入`Chinese Localization`，然后按`回车`
- 查看菜单，我相信，你已完成。

### Sublime Text 3注册码
- 仅供学习，请支持购
```
—– BEGIN LICENSE —– 
TwitterInc 
200 User License 
EA7E-890007 
1D77F72E 390CDD93 4DCBA022 FAF60790 
61AA12C0 A37081C5 D0316412 4584D136 
94D7F7D4 95BC8C1C 527DA828 560BB037 
D1EDDD8C AE7B379F 50C9D69D B35179EF 
2FE898C4 8E4277A8 555CE714 E1FB0E43 
D5D52613 C3D12E98 BC49967F 7652EED2 
9D2D2E61 67610860 6D338B72 5CF95C69 
E36B85CC 84991F19 7575D828 470A92AB 
—— END LICENSE ——
```

### 文献参考
- <https://www.cnblogs.com/itbull/p/6182460.html>
- <https://blog.csdn.net/marksinoberg/article/details/50993456>
- sublime插件<https://packagecontrol.io/>

## **如果文章对你有一丁点的触动，捐一分钱也是对作者的鼓励**
