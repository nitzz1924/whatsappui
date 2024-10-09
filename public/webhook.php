<?php
$hubVerifyToken = 'yuvmedia_whatsapp_08';
$accessToken = 'EAAKGjLrP6ccBO0hIdJsj181ycKGCPys6uXU88KPg80seM8Lb7727FTZBtQGqzhnZCccf8x2DwIxFloBZAbQZAxSdZASDOGOoofTCLDUu0ROuuu54D4F8BMkVEiuaF3bNPqfjwOoBNCadgVpZCw2BQkMM3sVFFWQg9NGTdadsKSqgAqXPZChxl1xbMgs0olV0jo06n3iWjKmHXrB09ga1eZAfzCUxRg8ZD';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hub_challenge']) && isset($_GET['hub_verify_token']) && $_GET['hub_verify_token'] === $hubVerifyToken) {
    echo $_GET['hub_challenge'];
    exit;
}

