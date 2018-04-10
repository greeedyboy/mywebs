---
title: 将hexo和next的配置文件独立起来
urlname: hexo-next-config-set
tags:
  - hexo
  - next
  - config.yml
  - 博客配置
categories:
  - daybreak
date: 2018-04-10 17:52:21
---
> 更新hexo版本和next主题时候，又担心配置丢失。通过官方提供功能，将配置文件`_config.yml`独立出来，即使通过更更新版本，也不会把配置丢失，只需要把新功能相关的配置，重新复制一下进行配置就好。功能很赞。

<!-- more -->
### 更新步骤
- 确保Hexo 版本为 3.0 或更高
- 在你站点的`hexo/source/_data`目录创建一个`next.yml`文件（如果`_data`目录不存在，请创建之）。
- 选择 `override: false`
- 检查默认 NexT 配置中的`override`选项，必须设置为`false`。在 `next.yml`文件中，也要设置为 `false`，或者不定义此选项。
- 从站点的`_config.yml`与主题的`_config.yml`中复制你需要的选项到`hexo/source/_data/next.yml`中。
- 然后，在站点的`hexo/_config.yml`中需要定义`theme: next`选项（如果需要的话，`source_dir: source`）。
- 使用标准参数来启动服务器，生成或部署（`hexo clean && hexo g -d && hexo s`）。

### 可能存在问题
- 更新生成后站点出现语言错误，我的解决方法是：不仅仅是要在站点配置中设置语言，还要在新的资源文件中配置语言。其他选项正常。如果你遇到这样问题，可以依法解决。
- 其他暂时正常。
- **悲催发现，竟然`hexo d`不起作用，并且三方插件也好像有问题，因此决定以上不复制站点配置，只复制主题配置**

### 后续出现hexo更新和next主题升级操作
#### 直接升级Hexo主程序
- 建议还是从新安装吧，<https://hexo.io/zh-cn/docs/setup.html>
- 或者
```
npm install hexo -g #安装  
npm update hexo -g #升级  
hexo init #初始化
```
- 更多命令官方，或者[朋友总结](https://segmentfault.com/a/1190000002632530)
	
#### 直接升级NexT主题
```
$ cd your-hexo-site
$ git clone https://github.com/theme-next/hexo-theme-next themes/next
```

#### 后续**重点配置**
- 升级完成首先`hexo server -g`，查看`http://localhost:4000`是不是正常，如果正常则万事大吉，如果不正常则进行如下步骤
- 不正常故障排除
	- 在站点`_config.yml`至少要进行模板`theme`配置，或者可能还要`language`配置
	- 复制站点设置`_config.yml`中需要更改的项目到`hexo/source/_data/next.yml`文件
	- 复制主题设置中`_config.yml`中新相关设置到`hexo/source/_data/next.yml`文件
	- 命令`hexo server -g`，查看是否正常。
	- 在不正常，就洗洗睡吧
- **只复制主题配置，站点配置老老实实的升级之前备份一份吧**
### 资源参考
- <https://github.com/theme-next/hexo-theme-next/blob/master/docs/zh-CN/DATA-FILES.md>





