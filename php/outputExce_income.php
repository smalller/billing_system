<?php
    include "sessionLogin.php";
    require "sql-conn.php";
    require "../PHPExcel/PHPExcel.php";
    $userName = $_SESSION["username"];  //获取当前用户
    $objPHPExcel = new PHPExcel();  //实例化PHPExcel类，相当于创建一个excel表格
    $objSheet = $objPHPExcel->getActiveSheet();   ////获得当前活动sheet的操作对象
    $objSheet->setTitle("收入账单");    //给当前活动sheet设置名称
    $objSheet->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   //设置Excel文件的文本默认为水平垂直居中


    //填充指定单元格
    $objSheet->setCellValue("A1","收入账单");
    $objSheet->mergeCells("A1:F2");

    $objSheet->setCellValue("A3","序号");
    $objSheet->setCellValue("B3","金额（元）");
    $objSheet->setCellValue("C3","分类");
    $objSheet->setCellValue("D3","账户");
    $objSheet->setCellValue("E3","备注");
    $objSheet->setCellValue("F3","时间");


    //填充动态单元格
    $j = 4; //从表格第4行开始填充数据
    $num = 1;   //计数用

    $sql1 = "select income,sort,account,PS,date from income where username = '$userName';";
    $result1 = $mysqli->query($sql1);
    $all1 = $result1->fetch_all(MYSQLI_ASSOC);    //返回关联数组方法

    foreach($all1 as $key=>$val1) {
        $objSheet->setCellValue("A".$j,$num)->setCellValue("B".$j,$val1["income"])->setCellValue("C".$j,$val1["sort"])->setCellValue("D".$j,$val1["account"])->setCellValue("E".$j,$val1["PS"])->setCellValue("F".$j,$val1["date"]);
        $j++;
        $num++;
    }

    $objSheet->getStyle("A1:F2")->getFont()->setSize(20);     //设置字体大小

    $objSheet->getStyle("A1:"."F".($j-1))->applyFromArray(getBorderStyle("000000"));    //调用封装的边框函数，实现改变边框样式

    $objSheet->freezePane('A4');    //固定前3行

    //设置列宽
    $objSheet->getColumnDimension("A")->setWidth(6);
    $objSheet->getColumnDimension("B")->setWidth(14);   
    $objSheet->getColumnDimension("C")->setWidth(16);
    $objSheet->getColumnDimension("D")->setWidth(16);
    $objSheet->getColumnDimension("E")->setWidth(27);
    $objSheet->getColumnDimension("F")->setWidth(19);





    $objWrite = PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007"); //按照指定的格式生成excel，第一个参数为当前建立的实例化表格名，第二个参数为储存时的表格版本

    browser_export("Excel2007","收入账单.xlsx");   //将excel文件输出到浏览器
    $objWrite->save("php://output");


    //将Excel输出到浏览器的封装方法
    function browser_export($type,$filename) {
        if($type == "Excel5") {
            header('Content-Type: application/vnd.ms-excel');   //告诉浏览器输出excel03文件
        } else {
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');  //告诉浏览器输出excel07文件
        }
        header('Content-Disposition: attachment;filename="'.$filename.'"');  //告诉浏览器要输出的名称
        header('Cache-Control: max-age=0');     //禁止浏览器缓存
    }


    //获取不同的边框样式
    function getBorderStyle($color) {
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => $color),
                ),
            ),
        );  
        return $styleArray;
    }
?>