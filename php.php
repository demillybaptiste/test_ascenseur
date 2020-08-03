<?php
	$file    = fopen( "stockage_array.txt", "r" );
	$content = fgets($file, 4096);

	fclose($file);
	$lstetage=explode(";",$content);


	if  (isset($_POST['etage'])){ 
		echo(" je suis listeetage".$lstetage);
		$etage=$_POST['etage'];
		global $lstetage;
		if(!in_array($etage,$lstetage)){
			array_push($lstetage,$etage);
			$stringlst_etage="";
			for ($i=0;$i<count($lstetage);$i++){
				$stringlst_etage.=$lstetage[$i].";";
			}
			$file = fopen("stockage_array.txt", "w");
			if(substr($stringlst_etage, 0,1)==";"){
				$stringlst_etage=substr($stringlst_etage, 1,);
			}
			fwrite($file,substr($stringlst_etage,0,strlen($stringlst_etage)-1));
			fclose($file);
		}
		//file_put_contents('json.json', '{"etage":"'.$etage.'"}');
		
	}

	if  (isset($_POST['intialisation'])){ 

		echo(" je suis listeetage");
		print_r($lstetage);
		$file = fopen("stockage_array.txt", "w");
		file_put_contents('json.json', '{"etage":"4","ouvert":"false"}');
		fwrite($file,"");
		fclose($file);
	}

	function choix_de_l_etage(){
		global $lstetage;
		if ($lstetage[0]!=""){
			
			$objectif=$lstetage[0];
			$json = file_get_contents("json.json");
			$json=json_decode($json);
			$etage_actuel=$json->etage;
			$etat="false";
			//on arrive au bon étage

			//choix de la prochaine direction
			$new_etage=$etage_actuel;
			if ($objectif>$etage_actuel){
				$new_etage=$etage_actuel+1;
			}
			if ($objectif<$etage_actuel){
				$new_etage=$etage_actuel-1;
			}
			if (in_array($new_etage,$lstetage)){
				//ouvrir la porte
				$etat="true";
				$key=array_search($new_etage, $lstetage);
				$fin=-count($lstetage)+$key+1;
				if(!$fin==0){
					array_splice($lstetage,$key,$fin);
				}
				else{
					array_splice($lstetage,$key);
				}
				echo ("je suis al fin qui m'emerde".$fin);
				
			    //sort($lstetage);
			}

			file_put_contents('json.json', '{"etage":"'.$new_etage.'","ouvert":"'.$etat.'"}');
		}
	}
	if (isset($_POST['choix_de_letage'])){ 
		global $lstetage;
		choix_de_l_etage();		
		$stringlst_etage="";
		for ($i=0;$i<count($lstetage);$i++){
			$stringlst_etage.=$lstetage[$i].";";
		}
		$file = fopen("stockage_array.txt", "w");
		if(substr($stringlst_etage, 0,1)==";"){
			$stringlst_etage=substr($stringlst_etage, 1,);
		}
		fwrite($file,substr($stringlst_etage,0,strlen($stringlst_etage)-1));
		fclose($file);
	}
	

?>

