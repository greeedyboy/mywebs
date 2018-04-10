---
title: 将hexo静态博客next主题安装rss插件功能
urlname: hexo-next-rss
tags:
  - hexo
  - next
  - rss
categories:
  - 博客设置
date: 2018-04-10 22:18:49
---
> hexo静态博客，实现rss功能方法，本站亲测可用。

<!-- more -->

### 安装插件
- 进入本地hexo目录
- 打开gitbash。输入以下命令
```
npm install hexo-generator-feed
```

### 修改站点配置
-在本地hexo根目录下的_config.yml文件中，添加以下配置。
```
# Extensions
## Plugins: http://hexo.io/plugins/
#RSS订阅
plugin:
- hexo-generator-feed
#Feed Atom
feed:
type: atom
path: atom.xml
limit: 20
```

### 修改主题配置，添加如下配置
```
rss: /atom.xml
```

### 参考文献
- <https://blog.csdn.net/u011303443/article/details/52333695>
- 

