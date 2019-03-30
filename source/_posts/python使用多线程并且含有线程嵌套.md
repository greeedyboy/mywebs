---
title: python使用多线程并且含有线程嵌套
urlname: python-multi-threading-index
tags:
  - python
  - 多线程
categories:
  - python
date: 2018-11-28 22:19:10
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> 解决问题：实现python多线程开启，并循环嵌套。开启多线程，并实现线程嵌套。代码可能比较粗糙，也可能有更好的方法，但是这个方法可以实现我要去完成的工作。貌似可以使用线程池的概念去完成，我还没尝试。

<!-- more -->

直接给出代码吧，希望有所帮助。

```
from time import sleep
import threading

def main():
    ins=0
    while 1==1:
        sleep(2)
        txf=threading.Thread(target=fyy,args=(ins,))
        txf.start()
        ins=ins+1
        print('ins=' + str(ins))

def ooo(p):
    ff=[]
    dict={'b':'sss'}

    ff.append(p)
    ff.append('b')
    ff[1]=('k')
    print(tuple(ff))
    print(dict)


    dict0={}
    dict0=dict0.fromkeys(tuple(ff), 'xs')
    dict.update(dict0)

    #dict['c']='21'

    #dict = dict.fromkeys(tuple(ff), 10)

    print(dict)

    #print(ff[1])
    #print(len(ff))
def fyy(ins):
    tt = []
    for i in range(2):
        ii=i
        print(len(tt))
        tt.append(threading.Thread(target=ooo, args=('p',)))
        tt[ii].start()



if __name__ == "__main__":
    main()
```

