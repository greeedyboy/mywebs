---
title: python针对selenium谷歌chromedriver的元素点击函数
urlname: index
tags:
  - python
  - selenium
  - chromedriver
  - 点击
categories:
  - python
date: 2019-04-17 15:49:08
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> python运用selenium制作网页相关程序中，多地方用到元素点击的事件，点击页面涉及到延时，脚本timeout时间，点击print提醒等。

<!-- more -->

### 元素点击事件函数封装
```
from selenium import webdriver
from selenium.webdriver.remote.webelement import WebElement
from selenium.webdriver.chrome.webdriver import WebDriver
from time import sleep


def elem_click(elem: WebElement, msg='',driver:WebDriver=None,b_s=1,e_s=1,scr_s=20,pag_s=20):
    '''
    点击页面元素
    :param elem:页面元素
    :param msg: 输出信息
    :param driver: 窗口驱动
    :param b_s: 点击之前延时
    :param e_s: 点击之后延时
    :param scr_s: 脚本超时控制
    :param pag_s: 文本超时控制
    :return:true or false
    '''
    try:
        # 点击之前输出信息
        if msg:
            print(msg)
        #如果传入driver，设置页面超时
        if not driver is None:
            if scr_s > 0:
                driver.set_script_timeout(scr_s)
            if pag_s > 0:
                driver.set_page_load_timeout(pag_s)
        #点击之前延时
        if b_s > 0:
            sleep(b_s)
        #点击执行
        elem.click()
        #点击之后延时
        if e_s > 0:
            sleep(e_s)
        return True
    except:
        print('click err :' + msg)
        return False

url="http://news.baidu.com/"
driver= webdriver.Chrome()

driver.get(url)
#界面缩放
# driver.execute_script("document.body.style.zoom='0.5'")  # 缩小
element = driver.find_element_by_css_selector("[class='home-banner-cell left']")
elem_click(elem=element,msg='点击')

```
