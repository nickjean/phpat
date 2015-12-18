<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= SITE_NAME.'-'.ucfirst($site_data[PAGE_ID]); ?></title>
</head>
<body>
<div id="wrappper"> <!--Ouverture  de wrapper-->
    <?php require_once '_header.php'; ?>
    <?php require_once '_login_out_form.php'; ?>
    <?php require_once '_main_menu.php'; ?>
