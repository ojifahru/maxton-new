<?php

use App\Models\Admin\LogoModel;
use App\Models\Admin\InformasiModel;
use App\Models\Admin\DocumentsModel;

if (!function_exists('get_logo')) {
    function get_logo()
    {
        $logoModel = new LogoModel();
        $logo = $logoModel->getLogo(1);

        return $logo ? base_url('uploads/logo/' . $logo['path']) : base_url('uploads/logo/default_logo.png');
    }
}

if (!function_exists('get_favicon')) {
    function get_favicon()
    {
        $logoModel = new LogoModel();
        $favicon = $logoModel->getFavicon(2);

        return $favicon ? base_url('uploads/favicon/' . $favicon['path']) : base_url('uploads/logo/default_favicon.png');
    }
}

if (!function_exists('getInformasi')) {
    function getInformasi()
    {
        $informasiModel = new InformasiModel();
        return $informasiModel->first();
    }
}

if (!function_exists('getDocuments')) {
    function getDocuments()
    {
        $documentsModel = new DocumentsModel();
        return $documentsModel->findAll();
    }
}
