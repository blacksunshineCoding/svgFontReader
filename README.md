# svgFontReader

## About
with svgFontReader you can easy read out the glyphs of a svgFont. Especially for icon-fonts this showed up to be very useful

## Usage
use of the class as followed

	include 'svgFontReader.class.php';
    $svg = dirname(__FILE__) . '/font-icons.svg'; // define font-file
    $svgFontReader = new svgFontReader; // initiate class
    $glyphsAll = $svgFontReader->getGlyphs($svg); // get glyphs as array
    $glyphsList = $svgFontReader->listGlyphs($svg); //get glyphs as comma separate

some rules you have to follow:

 - charset must be unicode/utf8
 - you have to include the font in css
 - for the relevant area you have to define the font-family
