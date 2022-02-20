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

$images = 289;
$rows = 18;


?>
<!doctype html>
<html class="m-0 p-0">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-600 m-0 p-0">
    <div class="bg-gray m-0 p-0">
        <header class="relative bg-stone-900">
            <div class="absolute inset-0">
                <img class="w-full h-full object-cover" src="header.jpg" alt="" >
                <div class="absolute inset-0 bg-gradient-to-l from-stone-800 to-stone-700 mix-blend-multiply" aria-hidden="true"></div>
            </div>
            <div class="relative z-10">
                <nav class="relative max-w-7xl mx-auto flex items-center justify-between pt-6 pb-2 px-4 sm:px-6 lg:px-8" aria-label="Global">
                    <div class="flex items-center justify-between w-full lg:w-auto">
                        <a href="/zwaan">
                            <img class="h-10 w-auto lg:h-20" src="logorembrandt.png" alt="">
                        </a>
                        <div class="-mr-2 flex items-center lg:hidden">
                        </div>
                    </div>
                </nav>
                <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top lg:hidden">
                    <div class="rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                </div>
            </div>            
            <div class="relative max-w-md mx-auto px-4 mt-12 sm:max-w-3xl sm:mt-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Project Rembrandt</h1>
                <p class="mt-6 text-xl text-stone-100 max-w-3xl">Op zondag 20 februari 2022 was tijdens de <a href="https://projectrembrandt.ntr.nl/seizoen-3-aflevering-5/" target="_blank" class="underline">uitzending van Project Rembrandt</a> het onderwerp kleur. 
                De zeven overgebleven amateurschilders bezoeken het Rijksmuseum waar ze in de Eregalerij een kleurenstudie maken van De bedreigde zwaan van Jan Asselijn. Het mengen van kleuren blijkt een lastige opdracht te zijn. Het is erg lastig om de gemiddelde kleur van een vlak te bepalen en zo het schilderij na te maken in de basis kleuren.
                </p>
                <p class="mt-6 pb-24 text-xl text-stone-100 max-w-3xl">
                    Op deze website geef ik een klein kijkje in mijn digitale atelier om te laten zien hoe een computer deze opdracht zou kunnen oplossen.
                </p>
            </div>
        </header>

        <main>
            <div class="bg-white">
                <div class="max-w-lg mx-auto py-12 px-4 sm:max-w-3xl sm:py-32 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-4">

                    <div class="lg:mr-5 mt-12">
                        <h2 class="text-lg font-bold tracking-tight text-stone-700 sm:text-2xl lg:text-2xl">De schaar in het schilderij</h2>

                        <p class="text-xl text-stone-900">
                            Als eerst moet je het schilderij in de zelfde vlakken opdelen als je eindresultaat. Ik heb een 18 maal 16 verhouding gekozen en dus heb ik 288 afbeeldingen. Deze heb ik hieronder voor het overzicht in een tabel gezet met 18 kolommen en 16 rijden. Tussen elke tabel cel zit een pixel ruimte.
                        </p>
                        <p class="py-3 text-lg text-stone-600">
                        Hulp voor het opknippen heb ik hier gekregen <a href="https://www.imgonline.com.ua/eng/cut-photo-into-pieces.php" class="underline">https://www.imgonline.com.ua/eng/cut-photo-into-pieces.php</a>.
                        </p>

                        <?php
                        $count = 0;
                        echo "<table cellpadding='1px' cellspacing='1px' style='border-spacing: 1px;border-collapse: separate;'>";
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

                            echo "<td style=\"background-image:url('/zwaan/image_part_".$y.".jpg');background-size:cover;width:30px;height:30px\"></td>";
                            
                            if($count == 18) {
                                echo "</tr>";
                                echo "<tr>";
                                $count = 0;
                            }

                        }

                        echo "</tr>";
                        echo "</table>";
                        ?>
                        </div>

                        <div class="lg:ml-5 mt-12">

                        <h2 class="text-lg font-bold tracking-tight text-stone-700 sm:text-2xl lg:text-2xl">De gemiddelde kleur</h2>

                        <p class="text-xl text-stone-900">
                            Nadat de tabel stond en de 288 losse afbeelding erin stonden (maak je geen zorgen, dit heb ik geprogrammeerd) heb ik deze losse afbeeldingen door een script heengehaald dat de gemiddelde kleurwaarde uitrekend en deze als achtergrond in elke cel van nieuwe tabel gezet.
                        </p>
                        <p class="py-3 text-lg text-stone-600">
                        Hulp voor het bepalen van de kleur heb gekregen van <a href="https://github.com/thephpleague/color-extractor" class="underline">https://github.com/thephpleague/color-extractor</a>.
                        </p>

                        <?php
                        $count = 0;
                        echo "<table cellpadding='0' style='border-spacing: 1px;border-collapse: separate;'>";
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
                            echo "<td style='background-color:$color;width:30px;height:30px;'></td>";
                            
                            if($count == 18) {
                                echo "</tr>";
                                echo "<tr>";
                                $count = 0;
                            }

                        }

                        echo "</tr>";
                        echo "</table>";

                        ?>

                    </div>
                </div>
            </div>
            <div class="lg:text-center max-w-sm mx-auto px-4 lg:px-20 sm:max-w-3xl sm:mt-24 sm:px-6 lg:max-w-1xl lg:px-8">
                <h2 class="text-lg font-bold tracking-tight text-stone-700 sm:text-2xl lg:text-2xl">En nu?</h2>
                <p class="text-xl text-stone-900">
                    Ja, niks eigelijk. Althans nu nog niets. Ik was vooral benieuwd of het mogelijk was dit op een avond in elkaar te zetten en om te kijken of ik er nog wat van kon leren.
                    Maar de mogelijkheden zijn natuurlijk wel gaaf als je bedenkt dat dit redelijk eenvoudig met nog wat extra uren volledig te automatiseren valt met elke afbeelding die je upload en met het zelf bepalen van het grid (vlakken) dat je wilt gebruiken. Zou de jury van het programma het een handige tool hebben gevonden? Zou er misschien net een andere winnaar gekozen zijn? 
                </p> 

                <p class="py-3 text-lg text-stone-600">
                    Indien mensen graag willen zien hoe ik deze code heb geschreven om het mogelijk door te ontwikkelen, kijk dan even op <a href="https://github.com/sierag/projectrembrandt" class="underline">GitHub</a>.
                </p>
            </div>
        </main>

        <footer class="bg-white" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-md mx-auto py-12 px-4 sm:max-w-3xl sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="mt-12 pt-8">
                <p class="text-base text-warm-gray-400 xl:text-center">&copy; 2022 door Reinier Sierag, developer at <a href="https://kobaltdigital.nl" class="underline">Kobalt</a>. All rights reserved.</p>
            </div>
            </div>
        </footer>
    </div>
</body>
</html>