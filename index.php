<?php

require 'vendor/autoload.php';

use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

function colorPalette($img) 
{ 
    $palette = Palette::fromFilename($img);
    $colors = $palette->getMostUsedColors(1);
    foreach($colors as $key => $value) {
        return Color::fromIntToHex($key);
    }
} 
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Project Rembrandt
  </h1>
  <div class="prose">

    </div>
</body>
</html>



<?php
$images = 289;
$rows = 18;
$count = 0;
echo "<table cellpadding='0'>";
echo "<tr>";

for ($i=1; $i < $images; $i++) { 
    $count++;
    $y = $i;

    if($i<=10) {
        $y = "00" . $i;
    }

    if($i>=10 && $i < 100) {
        $y = "0" . $i;
    }

    echo "<td style=\"background-image:url('/zwaan/image_part_".$y.".jpg');background-size:cover;width:33px;height:33px\"></td>";
    
    if($count == 18) {
        echo "</tr>";
        echo "<tr>";
        $count = 0;
    }

}

echo "</tr>";
echo "</table>";


$images = 289;
$rows = 18;
$count = 0;
echo "<table cellpadding='0'>";
echo "<tr>";

for ($i=1; $i < $images; $i++) { 
    $count++;
    $y = $i;

    if($i<=10) {
        $y = "00" . $i;
    }

    if($i>=10 && $i < 100) {
        $y = "0" . $i;
    }
    $color = colorPalette('image_part_'.$y.'.jpg');
    echo "<td style='background-color:$color;width:33px;height:33px;'></td>";
    
    if($count == 18) {
        echo "</tr>";
        echo "<tr>";
        $count = 0;
    }

}

echo "</tr>";
echo "</table>";

?>

Op basis van het televisieprogramma Project Rembrandt heb ik deze website gemaakt met als voorbeeld hoe de computer zou uitrekenen welke kleuren in het schilderij exact gebruikt zouden moeten worden.
https://projectrembrandt.ntr.nl/seizoen-3-aflevering-5/  uitzending van 20 februari van 