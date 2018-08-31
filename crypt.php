<?php
print "\n\n\033[1;33m        -==- Simple Cryptography -==-        \n\n";
print "       1) ENC0DE                      \n";
print "       2) DEC0DE        						   \n";
print "       ------------FADHELMURPHY       \033[0m\n\n";
function text()
{
	// digit 5 for str_split by 5 char
	$j = 5;
	$i = $j + 9995;
	// AA-ZZ combinations
	foreach(range("\n", '~') as $letter1) {
		$data[$i] = $letter1;
		$i = $i + $j;
		$i++;

			foreach(range("\n", '~') as $letter2) {
					$data[$i] = $letter1 . $letter2;
					$i = $i + $j;
					$i++;
			}
	}
	return $data;
}
	function enc0de($text, $data)
	{
		$raykey = [];
		$raytext = str_split($text,2);
		foreach ($raytext as $tx) {
			if(in_array($tx, $data)) {
				$raykey[] 	= array_search($tx, $data);
			}
		}
		$i = 0;
		$data="";
				foreach (str_split(join($raykey),6) as $z) {
								if($i < count(str_split(join($raykey),6))-1){
										$data.=$z."-";
								}else {
										$data.= $z;
								}
								$i++;
				}
					    return $data;

	}
	function dec0de($encode, $data)
	{
		$result = [];
		$n = explode("-",$encode);
		$raykey = str_split(join($n), 5);
		foreach ($raykey as $key) {
			$result[] = $data[$key];
		}
		return join($result);
	}
echo "       =========================================\n";
while (true) {
	$data = text();
	echo '	Choose = ';
	$choose = trim(fgets(STDIN, 1024));
	if($choose == '1'){
		echo '	Text = ';
		$text = trim(fgets(STDIN, 1024));
	$encode = enc0de($text, $data);
	echo "\n";
echo '	ENC0DE = '."\033[1;33m".$encode."\033[0m\n";
echo "       =========================================\n";
}elseif ($choose == '2') {
	echo '	Text = ';
	$text = trim(fgets(STDIN, 1024));
	$decode = dec0de($text, $data);
	echo "\n";
	echo '	DEC0DE = '."\033[1;33m".$decode."\033[0m\n";
	echo "       =========================================\n";
}


	}
	// $data = text();
	// $text = "Something";
	// $encode = enc0de($text, $data);
	// $decode = dec0de($encode, $data);
	// echo '<pre>';
	// echo "Base array";
	// //print_r($data);
	// echo '</pre>';
	// echo "text => '$text' <br>";


	// echo 'encode => '.$encode;
	// echo "<br>";
	// echo 'decode => '.$decode;

?>
