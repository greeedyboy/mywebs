---
title: 更新生成sitemap和百度sitemap
urlname: index
tags:
  - sitemap
  - hexo
categories:
  - daybreak
date: 2018-05-14 21:37:28
---
>创建生成网站地图,生成百度专用的地图。

<!-- more -->
### 安装插件
```
npm install hexo-generator-sitemap --save
npm install hexo-generator-baidu-sitemap --save
```

### 配置_config.yml
```
# 自动生成sitemap
sitemap:
  path: sitemap.xml
baidusitemap:
  path: baidusitemap.xml
```
### 生成预览
```
hexo g
hexo s
```
- <http://localhost:4000/sitemap.xml>
- <http://localhost:4000/baidusitemap.xml>

### 创建robots.txt
- 在 source/uploads/中创建robots.txt
```
User-agent: * 
Allow: /
```

### 参考
- <https://www.npmjs.com/package/hexo-generator-sitemap>
- <https://ziyuan.baidu.com/college/courseinfo?id=267&page=12#h2_article_title29>

