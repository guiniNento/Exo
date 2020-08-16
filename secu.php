<?php include('include/header.php');?>
<?php  

function premier($a,$b)
{
		for($i=$a;$i<$b;$i++) //on retient le nom$bre en soit $q on veut teste
		{
			$f=0;
			$d=0;
			for($c=1;$c<=$i/2;$c++)// les diviseurs
			{
				
				if($i%$c==0)
				{
					$d=$i;
					$f++;
				   
				}
			}
			if($f<=1 && $d>=$a)
			{
				$tab[]=$d;
				//echo $d.' ceci est un nom$bre premier <$br>';
			}
	}
	return $tab;
}

function AffichePremier($a){
//$bb=print_r(count($a=premieur($b,$c)));
foreach($a as $element){
	echo $element.'||';
}
}

function modInverse2($a,$b){
	for($i=0;$i<$b;$i++){
		if((($a*$i)-1)%$b==0){
			return $i;
		}
	}

	if($i==$b){
		return 0;
	}
}

function pgcd($a,$b)
{
	$d=1;
	while ($d!=0) {
		$d=$a%$b;
		$a=$b;
		$b=$d;
		 
	}
	return $a;
}
function rsa($p,$q,$e)
{
	$n=$p*$q;
	$Fx=($p-1)*($q-1);

	try {
		//code...
		if(pgcd($e,$Fx)==1 && $e<$Fx){
			//p,q < d <  \(\varphi n\), e*d mod n = 1
			$d=modInverse2($e,$Fx);
			if($d*$e%$n==1){
			$cles['publique']=$e;
			$cles['exposant']=$n;
			$cles['prive']=$d;}
			return $cles;
			//d=PowerMod[e,-1,(p-1)(q-1)] de Wolfram Alpha
		}
	} catch (Exception $th) {
		echo "eeeeeeeeeeeeeeeeee";
		die ('erreur'.$th->getMessage());
	}
	
}

function exposant($a,$b){
	$c=1;
	for($i=0;$i<$b;$i++){
		$c=$c*$a;
	}
	return $c;
}

function chiffer($message,$n,$e)
{
	$b=exposant($message,$e)%$n;

	return $b;
}

function dechiffer($message_crypter,$n,$d){
	$f=exposant($message_crypter,$d)%$n;

	return $f;
}

if(isset($_GET['gene']))
{
	$p=$_GET['p'];
	$q=$_GET['q'];
	$e=$_GET['e'];

	  $cle=rsa($p,$q,$e);
	  echo "<table><tr><td>Public</td><td>Prive</td><td>exposant</td></tr><tr><td>".$cle['publique']."</td><td>".$cle['prive']."</td><td>".$cle['exposant']."</td></tr><table>";

}


if(isset($_GET['cri']))
{
	$p=$_GET['p'];
	$q=$_GET['q'];
	$e=$_GET['e'];
	$message=$_GET['message'];

	  $cle=rsa($p,$q,$e);
	  echo "<table><tr><td>Public</td><td>Prive</td><td>exposant</td></tr><tr><td>".$cle['publique']."</td><td>".$cle['prive']."</td><td>".$cle['exposant']."</td></tr><table>";
	 $ee=$cle['exposant'];
	 $eee=$cle['publique'];
	  $b=chiffer($message, $ee,$eee);
	echo '<textarea name="message" id="" cols="100" rows="10">'.$b.'</textarea>';

}

if(isset($_GET['decri']))
{
	$p=$_GET['p'];
	$q=$_GET['q'];
	$e=$_GET['e'];
	$message=$_GET['message'];

	  $cle=rsa($p,$q,$e);
	  echo "<table><tr><td>Public</td><td>Prive</td><td>exposant</td></tr><tr><td>".$cle['publique']."</td><td>".$cle['prive']."</td><td>".$cle['exposant']."</td></tr><table>";
	 $ee=$cle['exposant'];
	 $eee=$cle['prive'];
	  $b=dechiffer($message, $ee,$eee);
	echo '<textarea name="message" id="" cols="100" rows="10">'.$b.'</textarea>';

}


	?>