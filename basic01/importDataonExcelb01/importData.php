<?php
include_once './dbConfig.php';

require_once "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if (isset($_POST['importSubmit'])) {
    // Allowed mine types
    $excelMines = array(
        'text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel',
        'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    );

    // Validate whether selected file is a Excel file
    if (!empty($_FILES['file']['name'] && in_array($_FILES['file']['type'], $excelMines))) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            # code...
            $reader = new Xlsx();
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
            $worksheet = $spreadsheet->getActiveSheet();

            $worksheet_arr = $worksheet->toArray();

            //Remove header row
            unset($worksheet_arr[0]);

            foreach ($worksheet_arr as $row) {
                $first_name = $row[0];
                $last_name = $row[1];
                $email = $row[2];
                $phone = $row[3];
                $status = $row[4];

                //Check whether member already existed in the database with the same mail
                $prevQuery = "SELECT id FROM members WHERE email = '" . $email . "'";
                $prevResult = $db->query($prevQuery);

                if ($prevResult->num_rows > 0) {
                    // update member data in db
                    $db->query("UPDATE members set first_name = '".$first_name."', last_name = '".$last_name."', email = '".$email."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE email = '".$email."'"); 
                } else {
                    // Insert member data in the database 
                    $db->query("INSERT INTO members (first_name, last_name, email, phone, status, created, modified) VALUES ('".$first_name."', '".$last_name."', '".$email."', '".$phone."', '".$status."', NOW(), NOW())"); 
                }
            }

            $qstring = "?status=succ";
        } else {
            $qstring = '?status=err'; 
        }
    } else {
        $qstring = '?status=invalid_file'; 
    }
}

// Redirect to the listing page 
header("Location: index.php".$qstring);
