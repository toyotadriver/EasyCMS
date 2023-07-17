<?php
$paper[] = 'Copier';
$paper[] = 'InkJet';
$paper[] = 'Laser';
$paper[] = 'Photo';

print_r($paper);
//Задание ассоциативного массива
$paper['copier'] = 'Copier & Multipurpose';
$paper['inkjet'] = 'Inkjet printer';
$paper['laser'] = 'Laser printer';
$paper['photo'] = 'Phoro printer';

echo '<br>' . $paper['laser'];

$products = array(
    'paper' => array(
        'copier' => 'Copier & Multiporpose',
        'inkjet' => 'Inkjet Printer',
        'laser' => 'Laser Printer',
        'photo' => 'Photographic Paper'),
    'pens' => array(
        'ball' => 'Ball Point',
        'hilite' => 'Highliters',
        'marker' => 'Markers'),
    'misc' => array(
        'tape' => 'Sticky Tape',
        'glue' => 'Adhesives',
        'clips' => 'Paperclips')
);
echo '<pre>';

foreach ($products as $section => $items)
    foreach ($items as $key => $value)
        echo "$section:\t$key\t($value)<br>";

echo '</pre>';
?>