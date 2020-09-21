<?php

define('PAGINATION_COUNT', 10);

function getFolder()
{
    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}

// Save Images
function uploadImage($folder , $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    return $filename;
}
