<?php
require_once __DIR__."/Export.php";

$export = new LaraExport\Export();

echo $export->excel();
