<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;
include 'Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$active_sheet = $objPHPExcel->getActiveSheet();
$active_sheet->setTitle("Доклинические исследования");
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
$active_sheet->getColumnDimension('A')->setWidth(5);
$active_sheet->getColumnDimension('B')->setWidth(20);
$active_sheet->getColumnDimension('C')->setWidth(60);
$active_sheet->getColumnDimension('D')->setWidth(5);
$active_sheet->getColumnDimension('E')->setWidth(5);

$active_sheet->setCellValue('A1', 'ID');
$active_sheet->setCellValue('B1', 'Название');
$active_sheet->setCellValue('C1', 'Описание');
$active_sheet->setCellValue('D1', 'Порядок');
$active_sheet->setCellValue('E1', 'Родитель');

$news = get_posts(
    array(
        'numberposts' => -1,
        'offset' => 0,
        'category' => '',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'prrs_order',
        'post_parent' => '',
        'post_status' => 'publish'
    )
);

foreach ($news as $index => $obj) {
    $active_sheet->setCellValue('A' . ($index + 2), $obj->ID);
    $active_sheet->setCellValue('B' . ($index + 2), $obj->post_title);
    $active_sheet->setCellValue('C' . ($index + 2), get_field('description', $obj->ID));
    $active_sheet->setCellValue('D' . ($index + 2), $obj->menu_order);
    $active_sheet->setCellValue('E' . ($index + 2), $obj->post_parent);
}

header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename='d_order.xls'");

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit();
