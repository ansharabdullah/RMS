<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kinerja extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_kinerja_siod');
        $this->load->view('layouts/footer');
    }

    public function manual() {
        $data['lv1'] = 4;
        $data['lv2'] = 1;
        $this->load->view('layouts/header');
        $this->load->view('layouts/menu');
        $this->load->view('layouts/navbar', $data);
        $this->load->view('kinerja/v_kinerja_manual');
        $this->load->view('layouts/footer');
    }

    public function baca() {
        //Belum Validasi Tanggal

        $tanggalSIOD = $this->input->post('tanggalSIOD');
        $fileSIOD = $_FILES['fileSIOD'];

        //echo date("d-m-Y", strtotime($tanggalSIOD));

        $file_target = dirname(dirname(__DIR__)).'\assets\file\\'.$_FILES['fileSIOD']['name'];
        move_uploaded_file($_FILES['fileSIOD']['tmp_name'], $file_target);

        $this->load->library('PHPExcel/Classes/PHPExcel');

        $inputFileName = $file_target;

        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        echo 'File ', pathinfo($inputFileName, PATHINFO_BASENAME), ' has been identified as an ', $inputFileType, ' file<br />';

        echo 'Loading file ', pathinfo($inputFileName, PATHINFO_BASENAME), ' using IOFactory with the identified reader type<br />';
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);

        $worksheetData = $objReader->listWorksheetInfo($inputFileName);

        $worksheetRead = array_column($worksheetData, 'worksheetName');

        $objReader->setLoadSheetsOnly($worksheetRead);

        $objPHPExcel = $objReader->load($inputFileName);


        echo '<hr />';

        $loadedSheetNames = $objPHPExcel->getSheetNames();
        foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
            if ($loadedSheetName == 'Detail MT Report') {
                echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
                $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                $sheetData = $objPHPExcel->getActiveSheet();
                $sheetData->getStyle('B14:B300')
                        ->getNumberFormat()
                        ->setFormatCode('dd-mm-yyyy');

                //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, false, true, true);
                echo "<table border='1'>";

                echo "<tr>";
                echo "<td>Tanggal</td>";
                echo "<td>NOPOL</td>";
                echo "<td>Ritase</td>";
                echo "<td>Total KM</td>";
                echo "<td>Total KL</td>";
                echo "<td>BBM Own Use (Liter)</td>";
                echo "<td>Premium</td>";
                echo "<td>Pertamax</td>";
                echo "<td>Pertamax Plus</td>";
                echo "<td>Bio Solar</td>";
                echo "<td>Pertamina Dex</td>";
                echo "<td>Solar</td>";
                echo "</tr>";
                $row_baca = 14;
                while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                    echo "<tr>";
                    echo "<td>" . $sheetData->getCell('B' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('C' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('E' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('F' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('G' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('I' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('M' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('R' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('S' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('U' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('X' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('AE' . $row_baca)->getFormattedValue() . "</td>";
                    echo "</tr>";
                    $row_baca++;
                }
                echo "</table>";

                echo '<hr />';
            } else if ($loadedSheetName == 'Detail Crew Supir') {
                echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
                $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                $sheetData = $objPHPExcel->getActiveSheet();
                $sheetData->getStyle('B14:B300')
                        ->getNumberFormat()
                        ->setFormatCode('dd-mm-yyyy');

                //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, false, true, true);
                echo "<table border='1'>";

                echo "<tr>";
                echo "<td>Tanggal</td>";
                echo "<td>NIP</td>";
                echo "<td>Nama</td>";
                echo "<td>Jabatan</td>";
                echo "<td>Status Jabatan Tugas</td>";
                echo "<td>Klasifikasi</td>";
                echo "<td>Total KM</td>";
                echo "<td>Total KL</td>";
                echo "<td>Ritase</td>";
                echo "<td>Pendapatan</td>";
                echo "</tr>";
                $row_baca = 14;
                while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                    echo "<tr>";
                    echo "<td>" . $sheetData->getCell('B' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('C' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('D' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('E' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('F' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('G' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('H' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('I' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('J' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('L' . $row_baca)->getFormattedValue() . "</td>";
                    echo "</tr>";
                    $row_baca++;
                }
                echo "</table>";

                echo '<hr />';
            } else if ($loadedSheetName == 'Detail Crew Kernet') {
                echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
                $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                $sheetData = $objPHPExcel->getActiveSheet();
                $sheetData->getStyle('B14:B300')
                        ->getNumberFormat()
                        ->setFormatCode('dd-mm-yyyy');

                //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, false, true, true);
                echo "<table border='1'>";

                echo "<tr>";
                echo "<td>Tanggal</td>";
                echo "<td>NIP</td>";
                echo "<td>Nama</td>";
                echo "<td>Jabatan</td>";
                echo "<td>Status Jabatan Tugas</td>";
                echo "<td>Klasifikasi</td>";
                echo "<td>Total KM</td>";
                echo "<td>Total KL</td>";
                echo "<td>Ritase</td>";
                echo "<td>Pendapatan</td>";
                echo "</tr>";
                $row_baca = 14;
                while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                    echo "<tr>";
                    echo "<td>" . $sheetData->getCell('B' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('C' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('D' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('E' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('F' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('G' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('H' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('I' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('J' . $row_baca)->getFormattedValue() . "</td>";
                    echo "<td>" . $sheetData->getCell('L' . $row_baca)->getFormattedValue() . "</td>";
                    echo "</tr>";
                    $row_baca++;
                }
                echo "</table>";

                echo '<hr />';
            } else if ($loadedSheetName == 'Detail SPBU') {
                echo $sheetIndex, ' -> ', $loadedSheetName, '<br />';
                $objPHPExcel->setActiveSheetIndexByName($loadedSheetName);
                $sheetData = $objPHPExcel->getActiveSheet();
                $sheetData->getStyle('B14:B300')
                        ->getNumberFormat()
                        ->setFormatCode('dd-mm-yyyy');

                //$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, false, true, true);

                $row_baca = 14;
                $jumlah_SPBU = 0;
                while ($sheetData->getCell('B' . $row_baca)->getFormattedValue() != NULL) {
                    $jumlah_SPBU++;
                    $row_baca++;
                }
                echo "Jumlah SPBU : " . $jumlah_SPBU;

                echo '<hr />';
            }
        }

        unlink($file_target);
    }

}
