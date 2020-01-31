<?php 

class Cipele{

	private $idmodela;
	private $model;
	private $tip;
	private $nota;
	private $drzava;
	private $fabrika;
	private $poruka;
	

	
	public function __construct()
	{
		
	}
	
	public function ubaciCipele($data,$db){
		
		echo '<br>test model'.$data['model'];
		echo '<br>test tip '.$data['tip'];
		if($data['model'] === '' || $data['tip'] === '' || $data['nota'] === ''){
			$this -> poruka = 'Polja moraju biti popunjena';
			echo '<br>tet';
		}else{
		
			$save = $db->insert('cipele', $data);
			if($save){
				$this -> poruka = 'Uspesno sacuvan par cipela';
			}else{
				$this -> poruka = 'Neuspesno sacuvan par cipela';
			}
		}
	}
	
	public function getPoruka(){
		
		return $this -> poruka;
	}

}


?>