<? 
function isInteger($value) {
	$result = false;
	$matches = [];
	preg_match('/-?\d+/',$value,$matches);
	if($matches[0] == $value)
		$result = true;
	return $result;
}

$x0 = $_GET['x'];
$y0 = $_GET['y'];
$r = $_GET['r'];

$sign = 'O';
$maxVisibleValue = 500;

if(!(isInteger($x0) &&	isInteger($y0) && isInteger($r) && $r > 0))
	die('Неверные параметры');

$visibleY = $r+$y0;
$visibleX = $r+$x0;

if($visibleY + $visibleX >  $maxVisibleValue  )
	die('Слишком большие значения');

echo '
	<style>	
		body { line-height: 0.7; }
		span { color:white;	}
	</style>
';

$powR = $r*$r;
for($y = 0; $y <= $visibleY; $y++) {	
	$powY = pow($y-$y0,2);
	for($x = 0; $x <= $visibleX; $x++) {		
		if(pow($x-$x0,2) + $powY <= $powR )		
			echo $sign;
		else 
			echo "<span>$sign</span>";
	}
	echo '<br>';	
}