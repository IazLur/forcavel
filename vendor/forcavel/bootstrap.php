<?php

$ignored = [
    '.',
    '..',
    'bootstrap.php',
    'web'
];

function scanAllDir($dir)
{
    $result = [];
    foreach (scandir($dir) as $filename) {
        if ($filename[0] === '.') {
            continue;
        }
        $filePath = $dir . '/' . $filename;
        if (is_dir($filePath)) {
            foreach (scanAllDir($filePath) as $childFilename) {
                $result[] = $filename . '/' . $childFilename;
            }
        } else {
            $result[] = $filename;
        }
    }
    return $result;
}

$dir = scanAllDir(__DIR__);
$files = array_diff($dir, $ignored);

foreach ($files as $file) {
    require_once($file);
}
