<?php
/*
 * @Author: 一品网络技术有限公司
 * @Date: 2022-06-21 09:57:50
 * @LastEditTime: 2023-12-05 19:19:20
 * @FilePath: \web\app\index\controller\Index.php
 * @Description:
 * 联系QQ:58055648
 * Copyright (c) 2022 by 东海县一品网络技术有限公司, All Rights Reserved.
 */

namespace app\index\controller;

use think\facade\View;

use TCPDF;

class Index extends Base
{
    public function index()
    {
        View::assign("cols", '2.0进行中');
        return view();
    }
    public function test()
    {

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetFont("stsongstdlight","",12);
        $pdf->AddPage();
        $html='<h1 align="center">我的PDF</h1><div style="color:red">我是内容部分</div>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('D:\qiye\web\public/example.pdf', 'F');
    }
}
