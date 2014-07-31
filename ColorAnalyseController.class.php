<?php
/**
 * 颜色分析器
 * 
 * @author Reage Yao
 */
class ColorAnalyseController {
	
	/* 定义计算过滤标准，在图片中颜色超过此值才会被记录 */
	public static $filter = 5;
	
	/* 定义色板颜色 */
	public static $swatches = array (
			"AliceBlue" => "F0F8FF",
			"AntiqueWhite" => "FAEBD7",
			"Aqua" => "00FFFF",
			"Aquamarine" => "7FFFD4",
			"Azure" => "F0FFFF",
			"Beige" => "F5F5DC",
			"Bisque" => "FFE4C4",
			"Black" => "000000",
			"BlanchedAlmond" => "FFEBCD",
			"Blue" => "0000FF",
			"BlueViolet" => "8A2BE2",
			"Brown" => "A52A2A",
			"BurlyWood" => "DEB887",
			"CadetBlue" => "5F9EA0",
			"Chartreuse" => "7FFF00",
			"Chocolate" => "D2691E",
			"Coral" => "FF7F50",
			"CornflowerBlue" => "6495ED",
			"Cornsilk" => "FFF8DC",
			"Crimson" => "DC143C",
			"Cyan" => "00FFFF",
			"DarkBlue" => "00008B",
			"DarkCyan" => "008B8B",
			"DarkGoldenRod" => "B8860B",
			"DarkGray" => "A9A9A9",
			"DarkGreen" => "006400",
			"DarkKhaki" => "BDB76B",
			"DarkMagenta" => "8B008B",
			"DarkOliveGreen" => "556B2F",
			"Darkorange" => "FF8C00",
			"DarkOrchid" => "9932CC",
			"DarkRed" => "8B0000",
			"DarkSalmon" => "E9967A",
			"DarkSeaGreen" => "8FBC8F",
			"DarkSlateBlue" => "483D8B",
			"DarkSlateGray" => "2F4F4F",
			"DarkTurquoise" => "00CED1",
			"DarkViolet" => "9400D3",
			"DeepPink" => "FF1493",
			"DeepSkyBlue" => "00BFFF",
			"DimGray" => "696969",
			"DodgerBlue" => "1E90FF",
			"Feldspar" => "D19275",
			"FireBrick" => "B22222",
			"FloralWhite" => "FFFAF0",
			"ForestGreen" => "228B22",
			"Fuchsia" => "FF00FF",
			"Gainsboro" => "DCDCDC",
			"GhostWhite" => "F8F8FF",
			"Gold" => "FFD700",
			"GoldenRod" => "DAA520",
			"Gray" => "808080",
			"Green" => "008000",
			"GreenYellow" => "ADFF2F",
			"HoneyDew" => "F0FFF0",
			"HotPink" => "FF69B4",
			"IndianRed" => "CD5C5C",
			"Indigo" => "4B0082",
			"Ivory" => "FFFFF0",
			"Khaki" => "F0E68C",
			"Lavender" => "E6E6FA",
			"LavenderBlush" => "FFF0F5",
			"LawnGreen" => "7CFC00",
			"LemonChiffon" => "FFFACD",
			"LightBlue" => "ADD8E6",
			"LightCoral" => "F08080",
			"LightCyan" => "E0FFFF",
			"LightGoldenRodYellow" => "FAFAD2",
			"LightGrey" => "D3D3D3",
			"LightGreen" => "90EE90",
			"LightPink" => "FFB6C1",
			"LightSalmon" => "FFA07A",
			"LightSeaGreen" => "20B2AA",
			"LightSkyBlue" => "87CEFA",
			"LightSlateBlue" => "8470FF",
			"LightSlateGray" => "778899",
			"LightSteelBlue" => "B0C4DE",
			"LightYellow" => "FFFFE0",
			"Lime" => "00FF00",
			"LimeGreen" => "32CD32",
			"Linen" => "FAF0E6",
			"Magenta" => "FF00FF",
			"Maroon" => "800000",
			"MediumAquaMarine" => "66CDAA",
			"MediumBlue" => "0000CD",
			"MediumOrchid" => "BA55D3",
			"MediumPurple" => "9370D8",
			"MediumSeaGreen" => "3CB371",
			"MediumSlateBlue" => "7B68EE",
			"MediumSpringGreen" => "00FA9A",
			"MediumTurquoise" => "48D1CC",
			"MediumVioletRed" => "C71585",
			"MidnightBlue" => "191970",
			"MintCream" => "F5FFFA",
			"MistyRose" => "FFE4E1", 
			"Moccasin" => "FFE4B5",
			"NavajoWhite" => "FFDEAD",
			"Navy" => "000080",
			"OldLace" => "FDF5E6",
			"Olive" => "808000",
			"OliveDrab" => "6B8E23",
			"Orange" => "FFA500",
			"OrangeRed" => "FF4500",
			"Orchid" => "DA70D6",
			"PaleGoldenRod" => "EEE8AA",
			"PaleGreen" => "98FB98",
			"PaleTurquoise" => "AFEEEE",
			"PaleVioletRed" => "D87093",
			"PapayaWhip" => "FFEFD5",
			"PeachPuff" => "FFDAB9",
			"Peru" => "CD853F",
			"Pink" => "FFC0CB",
			"Plum" => "DDA0DD",
			"PowderBlue" => "B0E0E6",
			"Purple" => "800080",
			"Red" => "FF0000",
			"RosyBrown" => "BC8F8F",
			"RoyalBlue" => "4169E1",
			"SaddleBrown" => "8B4513",
			"Salmon" => "FA8072",
			"SandyBrown" => "F4A460",
			"SeaGreen" => "2E8B57",
			"SeaShell" => "FFF5EE",
			"Sienna" => "A0522D",
			"Silver" => "C0C0C0",
			"SkyBlue" => "87CEEB",
			"SlateBlue" => "6A5ACD",
			"SlateGray" => "708090",
			"Snow" => "FFFAFA",
			"SpringGreen" => "00FF7F",
			"SteelBlue" => "4682B4",
			"Tan" => "D2B48C",
			"Teal" => "008080",
			"Thistle" => "D8BFD8",
			"Tomato" => "FF6347",
			"Turquoise" => "40E0D0",
			"Violet" => "EE82EE",
			"VioletRed" => "D02090",
			"Wheat" => "F5DEB3",
			"White" => "FFFFFF",
			"WhiteSmoke" => "F5F5F5",
			"Yellow" => "FFFF00",
			"YellowGreen" => "9ACD32"
	);
	
	/* 色板索引 */
	private static $swatchIndex;
	
	/* 比色板 */
	private static $comparePalette = false;

	/**
	 * 颜失色分析
	 *
	 * @param strign $src
	 *        	图片路径
	 * @return array $ret_array 颜色信息数组（二维）。第二维的索引依次为colorName（颜色的英文名 ）、hex（16进制码）、times（出现次数）
	 */
	public function analyseColor($src) {
		if (self::$comparePalette === false) {
			self::createPalette ();
		}
		
		$totally = array ();
		
		list ( $width, $height, $type ) = getimagesize ( $src );
		switch ($type) {
			case 1 :
				$image = imagecreatefromgif ( $src );
				break;
			case 2 :
				$image = imagecreatefromjpeg ( $src );
				break;
			case 3 :
				$image = imagecreatefrompng ( $src );
				break;
			case 15 :
				$image = imagecreatefromwbmp ( $src );
				break;
			default :
				$this->error ( '不支持的文件类型！' );
				break;
		}
		
		if ($width > 200 || $height > 200) {
			
			if ($width > $height) {
				$dst_w = 200;
				$dst_h = ($dst_w / $width) * $height;
			} else {
				$dst_h = 200;
				$dst_w = ($dst_h / $height) * $width;
			}
			
			$image = $this->resizeImage ( $image, $dst_w, $dst_h, $width, $height );
			$width = $dst_w;
			$height = $dst_h;
		}
		
		for($x = 0; $x < $width; $x ++) {
			for($y = 0; $y < $height; $y ++) {
				list ( $red, $green, $blue ) = $this->getColorAtSomePoint ( $image, $x, $y );
				$index = imagecolorclosest ( self::$comparePalette, $red, $green, $blue ); // 取得当前颜色与比色板中最接近颜色的索引值
				$totally [$index] ++;
			}
		}
		
		arsort ( $totally ); // 降序排列
		
		$thrshold = ($width * $height) * (self::$filter / 100);
		$ret_array = array ();
		
		foreach ( $totally as $key => $times ) {
			if ($times >= $thrshold)
				$ret_array [] = array (
						'colorName' => self::$swatchIndex [$key],
						'hex' => '#' . self::$swatches [self::$swatchIndex [$key]],
						'times' => $times 
				);
			else
				break; // 因为之前已经排过序的缘故，当出现的次数比过滤标准小时可跳出循环
		}
		
		return $ret_array;
	}
	/**
	 * 创建标准调色板
	 */
	static function createPalette() {
		$swatchIndex = array ();
		self::$comparePalette = imagecreate ( 16, 16 );
		
		foreach ( self::$swatches as $name => $hex ) {
			$color = self::hexToRGB ( $hex );
			$index = imagecolorallocate ( self::$comparePalette, $color ['red'], $color ['green'], $color ['blue'] );
			self::$swatchIndex [$index] = $name;
		}
	}
	
	/**
	 * 颜色的hex转化为RGB值
	 *
	 * @param string $hexStr
	 *        	去掉#的颜色十六进制值
	 * @return array $rgbArray RGB数组
	 */
	static private function hexToRGB($hexStr) {
		$colorVal = hexdec ( $hexStr );
		$rgbArray ['red'] = 0xFF & ($colorVal >> 0x10);
		$rgbArray ['green'] = 0xFF & ($colorVal >> 0x8);
		$rgbArray ['blue'] = 0xFF & $colorVal;
		return $rgbArray;
	}
	
	/**
	 * 图片重新采样并调整大小
	 *
	 * @param resource $image
	 *        	目标图像
	 * @param number $dst_w
	 *        	目标宽度
	 * @param number $dst_h
	 *        	目标高度
	 * @param unknown $src_w
	 *        	源宽度
	 * @param unknown $src_h
	 *        	原高度
	 * @return resource $image_p 调整过后的图像
	 */
	private function resizeImage($image, $dst_w = 200, $dst_h = 200, $src_w, $src_h) {
		$new_image = imagecreatetruecolor ( $dst_w, $dst_h );
		if (imagecopyresampled ( $new_image, $image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h ))
			return $new_image;
		else
			echo 'Unkown error';
	}
	
	/**
	 * 获取图片中某点处的RGB值
	 *
	 * @param resource $image        	
	 * @param int $x        	
	 * @param int $y        	
	 * @return multitype:array?boolean (red, green, blue)
	 */
	private function getColorAtSomePoint($image, $x, $y) {
		$rgb = imagecolorat ( $image, $x, $y );
		
		$red = ($rgb >> 16) & 0xFF;
		$green = ($rgb >> 8) & 0xFF;
		$blue = $rgb & 0xFF;
		
		return array (
				$red,
				$green,
				$blue 
		);
	}
}

?>
