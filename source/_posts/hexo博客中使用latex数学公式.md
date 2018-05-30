---
title: hexo博客中使用latex数学公式
urlname: index
tags:
  - latex
  - hexo
categories:
  - daybreak
date: 2018-04-24 20:59:37
mathjax: true
---
> 博客中使用数学公式，来书写相关的科技论文以及平常学习记录。有必要进行相关的学习，本文将不定期更新来展开学习。内容包括latex中公式的语法学习，将循序渐进的展开。

<!-- more -->

### 博客中展示公式设置
- 插件安装
```
npm un hexo-renderer-marked --save
npm i hexo-renderer-kramed --save # 或者 hexo-renderer-pandoc
```
- 在博客主题配置`_config.yml`中保证是默认设置就可以了，可以查看下是否如下配置：
```
engine: mathjax
  mathjax:
    # Use 2.7.1 as default, jsdelivr as default CDN, works everywhere even in China
    cdn: //cdn.jsdelivr.net/npm/mathjax@2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML
```
- 在文章中如果想展现公式，请在文章头部添加`mathjax: true`

### latex语法公式学习

The *Gamma function* satisfying $\Gamma(n) = (n-1)!\quad\forall n\in\mathbb N$ is via the Euler integral

$$
\Gamma(z) = \int_0^\infty t^{z-1}e^{-t}dt\,.
$$

```
$$
\Gamma(z) = \int_0^\infty t^{z-1}e^{-t}dt\,.
$$
```

$$\begin{equation}
e=mc^2
\end{equation}\label{eq1}$$
```
$$\begin{equation}
e=mc^2
\end{equation}\label{eq1}$$
```
$$\begin{equation}
\begin{aligned}
a &= b + c \\
  &= d + e + f + g \\
  &= h + i
\end{aligned}
\end{equation}\label{eq2}$$
```
$$\begin{equation}
\begin{aligned}
a &= b + c \\
  &= d + e + f + g \\
  &= h + i
\end{aligned}
\end{equation}\label{eq2}$$
```

$$\begin{align}
a &= b + c \label{eq3} \\
x &= yz \label{eq4}\\
l &= m - n \label{eq5}
\end{align}$$
```
$$\begin{align}
a &= b + c \label{eq3} \\
x &= yz \label{eq4}\\
l &= m - n \label{eq5}
\end{align}$$
```
$$\begin{align}
-4 + 5x &= 2+y \nonumber  \\
 w+2 &= -1+w \\
 ab &= cb
\end{align}$$
```
$$\begin{align}
-4 + 5x &= 2+y \nonumber  \\
 w+2 &= -1+w \\
 ab &= cb
\end{align}$$
```
$$x+1\over\sqrt{1-x^2} \tag{i}\label{eq_tag}$$
```
$$x+1\over\sqrt{1-x^2} \tag{i}\label{eq_tag}$$
```
### 学习参考文献
- <https://www.cnblogs.com/linxd/p/4955530.html>
- <https://blog.csdn.net/ethmery/article/details/50670297>
- [Markdow在线书写](https://stackedit.io/app#)
- <https://github.com/jdhao/hexo-theme-next/blob/df1063c46b48c7bb1cc563abc358e544933415a0/docs/MATH.md>

## **如果文章对你有一丁点的触动，赏一分钱鼓励一下作者吧**