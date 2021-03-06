<?php

$name = 'squid';
$app_id = $app['app_id'];
$colours = 'mixed';
$unit_text = 'kB/s';
$unitlen = 10;
$bigdescrlen = 15;
$smalldescrlen = 15;
$dostack = 0;
$printtotal = 0;
$addarea = 1;
$transparency = 15;

$rrd_filename = rrd_name($device['hostname'], ['app', $name, $app_id]);

if (rrdtool_check_rrd_exists($rrd_filename)) {
    $rrd_list = [
        [
            'filename' => $rrd_filename,
            'descr'    => 'server in',
            'ds'       => 'serverinkb',
            'colour'   => 'd46a6a',
        ],
        [
            'filename' => $rrd_filename,
            'descr'    => 'server out',
            'ds'       => 'serveroutkb',
            'colour'   => '28774f',
        ],
    ];
} else {
    echo "file missing: $rrd_filename";
}

require 'includes/html/graphs/generic_v3_multiline.inc.php';
