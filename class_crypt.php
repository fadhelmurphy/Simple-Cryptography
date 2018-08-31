<?php
class class_crypt{
	function text()
	{
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
		$n = explode("-",$encode);
		$raykey = str_split(join($n), 5);
		foreach ($raykey as $key) {
			$result[] = $data[$key];
		}
		return join($result);
	}
}

$crypt = new class_crypt();
$text = $crypt->text();
if(isset($_POST['text'])){
$text1 = $_POST['text'];
echo $crypt->enc0de($text1,$text);
}
if(isset($_POST['cipher'])){
	$cipher = $_POST['cipher'];
	echo $crypt->dec0de($cipher,$text);
}

?>
