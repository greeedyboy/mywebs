---
title: CreatKey脚本ae
urlname: creatkey-ae-index
tags:
  - ae
categories:
  - 软件列表
date: 2018-12-05 21:41:48
---
<!-- Hexo daybreak git vb.net 健康 博客设置 网络日志 软件列表 魔法书签 -->
<!--![图]() -->
<!--[]() -->

> creatkey的ae脚本。

<!-- more -->

- 判断文件是否存在
```
                //判断初始time文件是否存在，存在则读取
                filex='e://PycharmProjects//untitled2//chunks//df_time.xml';
                var flx=new File(filex);
                if (flx.exists){
                     onLoadButtonClick(filex);
                    }
```
版本20181205
```
{
    // Scale Selected Layers.jsx
    // 
    // This script scales the selected layers within the active comp.
    //
    // First, it prompts the user for a scale_factor.
    // Next, it scales all selected layers, including cameras.
    
    function LoadKeyTimes(thisObj)
    {
        var scriptName = "Load Key Times: BY:AQ20181205";
        
         var KeyTime=new Array();
        
        // This variable stores the scale_factor.
        var scale_factor = 1.0;
        var scale_about_center = true;
        
        var DDtime=false;
        var wind;
        
        //
        // This function is called when the user clicks the "Scale about Upper Left" button
        //
        function onHelpButtonClick()
        {
            //scale_about_center = false;
                             //判断初始time文件是否存在，存在则读取
                filex='e://PycharmProjects//untitled2//chunks//df_time.xml';
                var flx=new File(filex);
                if (flx.exists){
                     onLoadButtonClick(filex);
                    }
        }
        
        
        //
        // This function is called when the user clicks the "Scale about Upper Left" button
        //
        function onLoadButtonClick(fs)
        {
            // 首先打开文件对话框
            // 第一个参数是对话框的标题名
            // 第二个参数是可供选择的文件类型（中括号里面可以写多个）
            // 第三个是设置多选（`true`）还是单选（填`false`或不填）
            // 此函数返回一个`file`类型的对象
            // alert(fs);
          // var file=File.openDialog ("Select an ass/txt file",  ["XML:*.xml", "All files:*.*"], false);  
           
             var file = Object;
             //file=File.openDialog ("Select an ass/txt file",  ["XML:*.xml", "All files:*.*"], false);  
                 if (fs===undefined) {
                 file=File.openDialog ("Select an ass/txt file",  ["XML:*.xml", "All files:*.*"], false);  
                 } else {
                 file =new File (fs);    
              } 
            //alert(file)
            wind.file_input.text =file;
           // alert(file)
            // 设置该文件对象为可读模式（这一步很重要）
            file.open('r'); // `r`为可读模式，`w`为可写模式，这两个是比较常用的（也可以留空）

            // 读取文件内容
            file = file.read(); // 读取全部内容
            //file = file.read(5); // 读取5个字符
            //file = file.readch(); // 读取单个字符
            //file = file.readln(); // 读取一行内容

            //file.open('w'); // 设置为“可写”模式
            //file = file.write('hello world'); // 写入内容（会把原文件内容冲掉）

            // 文本显示到编辑框中
            //alert(file)
               var re = /<start>([\s\S]+?)<\/start>/g;
               var ii=0;
               var timeS='';
               while( tempR = re.exec(file))
                {
                  // alert(tempR[1]);
                  var jx=parseInt(tempR[1])/25;
                    // alert(jx);
                      KeyTime[ii]=jx;
                      
                   if (ii==0){
                       timeS=KeyTime[ii];
                       }else{
                       timeS=timeS + ","  + KeyTime[ii]; 
                   }                      
                      
                      
                      ii=ii+1;
                  }
              
                // alert(timeS);
                 wind.text_input.text = timeS;
                 DDtime=true;
                
        }
        
     
        //
        // This function is called when the user enters text for the scale.
        //
        function on_textInput_changed()
        {
            // Set the scale_factor based on the text.
            //var value = this.text;
            //if (isNaN(value)) {
            //  alert(value + " is not a number. Please enter a number.", scriptName);
            //} else {
            //  scale_factor = value;
        //  }
        }
        
        
        function onScaleClick()
        {
            var activeItem = app.project.activeItem;
            if ((activeItem == null) || !(activeItem instanceof CompItem)) {
                alert("Please select or open a composition first.", scriptName);
            } else {
                var selectedLayers = activeItem.selectedLayers;
                if (activeItem.selectedLayers.length == 0) {
                    alert("Please select at least one layer in the active comp first.", scriptName);
                } else {
                    // Validate the input field, in case the user didn't defocus it first (which often can be the case).
                    this.parent.parent.optsRow.text_input.notify("onChange");
                    var activeComp = activeItem;
                    

                      //alert(activeItem.selectedLayers[0].property("Marker").keyValue().length);
                      
                      var thisLayer=activeItem.selectedLayers[0];
                      var nKey=thisLayer.property("Marker").numKeys;
                      var Keycom= new Array();
                    
                      //获取标记原来注释
                      
                      for (var ii=1; ii<nKey+1; ii++)
                            {
                               Keycom[ii-1]=activeItem.selectedLayers[0].property("Marker").keyValue(ii).comment; 
                               if (DDtime==false){
                               KeyTime[ii-1]=2*(ii-1);
                               }
                            }  
                                             
                      //删除标记
                      for (var ii=1; ii<nKey+1; ii++)
                            {
                                activeItem.selectedLayers[0].property("Marker").removeKey(1);    
                            }
                      
                      //生成标记
                      
                       for (var ii=1; ii<nKey+1; ii++)
                            {
                                 var myMarker = new MarkerValue(Keycom[ii-1]);  
                               //  alert(Keycom[ii-1]);
                                 activeItem.selectedLayers[0].property("Marker").setValueAtTime(KeyTime[ii-1], myMarker); 
                            }
                      
                      
                      
                //  alert(activeItem.selectedLayers[0].property("Marker").numKeys);
                     // alert(activeItem.selectedLayers[0].property("Marker").keyValue(1).comment);
                  //  alert(activeItem.selectedLayers[0].property("Marker").keyValue(1).duration);
                     // var myMarker = new MarkerValue("淡入淡出2");  
                      // thisLayer.property("Marker").setValueAtTime(2.5, myMarker); 
                     // activeItem.selectedLayers[0].property("Marker").removeKey(1);                      
                      
                      // myProperty = myTextLayer.sourceText;
                      // activeItem.selectedLayers[0].property("Marker").keyValue(1).setValueAtKey(1,new TextDocument("key number 1"))


                    //var commentOfFirstMarker =app.project.item(1).layer(1).property("Marker").keyValue(1).comment;
                    //var commentOfMarkerAtTime4 =app.project.item(1).layer(1).property("Marker").valueAtTime(4.0, true).comment
                    //var markerProperty = app.project.item(1).layer(1).property("Marker");
                    //var markerValueAtTimeClosestToTime4 =markerProperty.keyValue(markerProperty.nearestKeyIndex(4.0));
                    //var commentOfMarkerClosestToTime4 = markerValueAtTimeClosestToTime4.comment;

                    //alert(commentOfFirstMarker);
                    //alert(commentOfMarkerAtTime4);
                    //alert(markerProperty);
                    //alert(markerValueAtTimeClosestToTime4);
                    //alert(commentOfMarkerClosestToTime4);



                }
            }
        }
        
        
        // 
        // This function puts up a modal dialog asking for a scale_factor.
        // Once the user enters a value, the dialog closes, and the script scales the comp.
        // 
        function BuildAndShowUI(thisObj)
        {
            // Create and show a floating palette.
            var my_palette = (thisObj instanceof Panel) ? thisObj : new Window("palette", scriptName, undefined, {resizeable:true});
            if (my_palette != null)
            {
                var res = 
                    "group { \
                        orientation:'column', alignment:['fill','top'], alignChildren:['left','top'], spacing:5, margins:[0,0,0,0], \
                        optsRow: Group { \
                            orientation:'column', alignment:['fill','top'], \
                               helpButton: Button { text:'Help', preferredSize:[150,20], alignment:['left','top'] }, \
                               file_input: EditText { text:'', alignment:['left','top'], preferredSize:[300,20],Multiline:true}, \
                               loadButton: Button { text:'Load Time', alignment:['fill','center'] }, \
                            text_input: EditText { text:'', alignment:['left','top'], preferredSize:[300,20], Multiline:true}, \
                        }, \
                        cmds: Group { \
                            alignment:['fill','top'], \
                            okButton: Button { text:'Do It', alignment:['fill','center'] }, \
                        }, \
                    }";
                
                my_palette.margins = [10,10,10,10];
                my_palette.grp = my_palette.add(res);
                
                // Workaround to ensure the edittext text color is black, even at darker UI brightness levels.
                var winGfx = my_palette.graphics;
                var darkColorBrush = winGfx.newPen(winGfx.BrushType.SOLID_COLOR, [0,0,0], 1);
                my_palette.grp.optsRow.text_input.graphics.foregroundColor = darkColorBrush;
                
                my_palette.grp.optsRow.helpButton.onClick  = onHelpButtonClick;
                my_palette.grp.optsRow.loadButton.onClick = onLoadButtonClick;
                 //my_palette.grp.optsRow.loaddfButton.onClick = onLoaddfButtonClick;
                
                
                // Set the callback. When the user enters text, this will be called.
                my_palette.grp.optsRow.text_input.onChange = on_textInput_changed;
                //my_palette.grp.optsRow.text_input.Multiline=true;
                
                my_palette.grp.cmds.okButton.onClick = onScaleClick;
                
                wind=my_palette.grp.optsRow;
                
                my_palette.onResizing = my_palette.onResize = function () {this.layout.resize();}
                 
                 //判断初始time文件是否存在，存在则读取
                 filex='e://PycharmProjects//untitled2//chunks//df_time.xml';
                 var flx=new File(filex);
                 if (flx.exists){
                     onLoadButtonClick(filex);
                    }

               
               
            }
            
            return my_palette;
        }
        
        

        
        // 
        // The main script.
        //
        if (parseFloat(app.version) < 8) {
            alert("This script requires After Effects CS3 or later.", scriptName);
            return;
        }
        
        //对话框打开文件
        
        
        
        
        var my_palette = BuildAndShowUI(thisObj);
        if (my_palette != null) {
            if (my_palette instanceof Window) {
                my_palette.center();
                my_palette.show();
            } else {
                my_palette.layout.layout(true);
                my_palette.layout.resize();
            }
        } else {
            alert("Could not open the user interface.", scriptName);
        }
    }
    
    
    LoadKeyTimes(this);
}
```