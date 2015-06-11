<?php

class svgFontReader {

	function listGlyphs($svgFile) {
		$allGlyphs = $this->getGlyphs($svgFile);
		return implode(',', $allGlyphs);
	}

	function getGlyphs($svgFile) {
		$svgCopy = 'font.svg';

		if (file_exists($svgCopy)) {
			unlink($svgCopy);
		}
		copy($svgFile, $svgCopy);

		$svgContent = file_get_contents($svgCopy);

		$xmlInit = simplexml_load_string($svgContent);
		$svgJson = json_encode($xmlInit);
		$svgArray = json_decode($svgJson, true);

		$svgGlyphs = $svgArray['defs']['font']['glyph'];

		if (count($svgGlyphs) > 0) {

			foreach ($svgGlyphs as $glyphId => $glyph) {
				$svgGlyphs[$glyphId] = $glyph['@attributes']['unicode'];
			}

		}

		return $svgGlyphs;
	}

}
