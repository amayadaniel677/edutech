<?php
$host = "localhost";
$root = "edutech";
$pass = "edutechadso2024";
$db_name = "edutech";
$mysqli = new mysqli($host, $root, $pass, $db_name);
$mysqli->select_db($db_name);
$mysqli->query("SET NAMES 'utf8'");

// Array con las tablas en el orden correcto
$correct_order_tables = [
    'areas', 'remaining_units','people', 'subjects', 'sales', 'modalities', 'payments', 'payment_history', 'people_area', 'recovery_tokens', 'subject_sale','balances','balance_detail'
]; 

// get table structure
foreach ($correct_order_tables as $table) {
    $result = $mysqli->query('SELECT * FROM '. $table. '');
    $fields_amount = $result->field_count;
    $rows_num = $mysqli->affected_rows;
    $res = $mysqli->query('SHOW CREATE TABLE '. $table. '');
    $TableMLine = $res->fetch_row();
    $content = (!isset($content)? '' : $content). "\n\n". $TableMLine[1]. ";\n\n";

    for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
        while ($row = $result->fetch_row()) {
            //when started (and every after 100 command cycle):
            if ($st_counter % 100 == 0 || $st_counter == 0) {
                $content.= "\nINSERT INTO ". $table. " VALUES";
            }
            $content.= "\n(";
            for ($j = 0; $j < $fields_amount; $j++) {
                if (isset($row[$j]) && $row[$j]!== null) {
                    $content.= '"'. addslashes($row[$j]). '"';
                }
                if ($j < ($fields_amount - 1)) {
                    $content.= ',';
                }
            }
            $content.= ")";
            //every after 100 command cycle [or at last line]....p.s. but should be inserted 1 cycle earlier
            if ((($st_counter + 1) % 100 == 0 && $st_counter!= 0) || $st_counter + 1 == $rows_num) {
                $content.= ";";
            } else {
                $content.= ",";
            }
            $st_counter = $st_counter + 1;
        }
    }
    $content.= "\n\n\n";
}
// save as.sql file
//give additional description
$content_ = "\n-- Database Backup --\n";
$content_.= "-- Ver. : 1.0.1\n";
$content_.= "-- Host : 127.0.0.1\n";
$content_.= "-- Generating Time : ". date("M d"). ", ". date("Y"). " at ". date("H:i:s:"). date("A"). "\n\n";
$content_.= $content;

//save the file
$backup_file_name = $db_name. " ". date("Y-m-d H-i-s"). ".sql";
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'. $backup_file_name. '"');
echo $content_;
exit;
?>