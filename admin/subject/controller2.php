<?php
require_once ("../../include/initialize.php");
if (!isset($_SESSION['ACCOUNT_ID'])) {
    redirect(web_root."admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        doInsert();
        break;
    
    case 'edit':
        doEdit();
        break;
    
    case 'delete':
        doDelete();
        break;

    case 'photos':
        doupdateimage();
        break;

    case 'files':
        doUploadFile();
        break;
}

function doInsert()
{
    // Your doInsert function code here
}

function doEdit()
{
    // Your doEdit function code here
}

function doDelete()
{
    // Your doDelete function code here
}

function doupdateimage()
{
    // Your doupdateimage function code here
}

function doUploadFile()
{
    if (isset($_POST['save'])) {
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            $fileContent = file_get_contents($_FILES['file']['tmp_name']);

            // Save the file content to the database
            // Make sure to replace 'your_table' and 'file_column' with the appropriate table and column names
            $query = "UPDATE subject SET module = ? WHERE SUBJ_ID = ?"; // Replace id_column with your primary key column name
            $params = array($fileContent, $_POST['SUBJ_ID']); // Replace SUBJ_ID with your appropriate ID value

            // Execute your database update logic with the $query and $params variables

            message("File uploaded and saved to the database successfully!", "success");
            redirect("index.php");
        } else {
            message("Error uploading file.", "error");
            redirect("index.php");
        }
    }
}
?>


