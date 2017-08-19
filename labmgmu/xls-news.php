<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
global $wpdb;
include 'Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$active_sheet = $objPHPExcel->getActiveSheet();
$active_sheet->setTitle("Новости");
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
$active_sheet->getColumnDimension('A')->setWidth(8);
$active_sheet->getColumnDimension('B')->setWidth(40);
$active_sheet->getColumnDimension('C')->setWidth(600);
$active_sheet->getColumnDimension('D')->setWidth(100);
$active_sheet->getColumnDimension('E')->setWidth(40);

$active_sheet->setCellValue('A1', 'Дата');
$active_sheet->setCellValue('B1', 'Заголовок');
$active_sheet->setCellValue('C1', 'Краткое описание');
$active_sheet->setCellValue('D1', 'Содержимое');
$active_sheet->setCellValue('E1', 'Картинка');
$active_sheet->setCellValue('F1', 'Источник');

$news = get_posts(
    array(
        'numberposts' => -1,
        'offset' => 0,
        'category' => '',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'news',
        'post_parent' => '',
        'post_status' => 'publish'
    )
);

foreach ($news as $index => $obj) {
    if ($obj->post_title != 'Архив новостей') {
        $active_sheet->setCellValue('A' . ($index + 2), $obj->post_date);
        $active_sheet->setCellValue('B' . ($index + 2), $obj->post_title);
        $active_sheet->setCellValue('C' . ($index + 2), get_field('description', $obj->ID));
        $active_sheet->setCellValue('D' . ($index + 2), get_field('content', $obj->ID));
        $img = get_field('big_picture', $obj->ID);
        if (isset($img['url']) && $img['url'] != "") {
            $active_sheet->setCellValue('E' . ($index + 2), $img['url']);
        }
        $active_sheet->setCellValue('F' . ($index + 2), get_field('author', $obj->ID));
    }
}

header("Content-Type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename='news.xls'");

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

exit();
