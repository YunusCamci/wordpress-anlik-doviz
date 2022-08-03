<?php 

//https://github.com/YunusCamci

$doviz = json_decode(file_get_contents('https://api.genelpara.com/embed/doviz.json'), true);
$altin = json_decode(file_get_contents('https://api.genelpara.com/embed/altin.json'), true);

$veriler = array(	
	'Kurlar' => array(
		'USD' => array(
			'ISIM'   => "USD",
			'ALIS'   => $doviz['USD']['alis'],
			'SATIS'   => $doviz['USD']['satis'],
			'DEGISIM'   => $doviz['USD']['degisim']			
		),
		'EUR' => array(
			'ISIM'   => "Euro",
			'ALIS'   => $doviz['EUR']['alis'],
			'SATIS'   => $doviz['EUR']['satis'],
			'DEGISIM'   => $doviz['EUR']['degisim']			
		),
		'GBP' => array(
			'ISIM'   => "İngiliz Sterlini",
			'ALIS'   => $doviz['GBP']['alis'],
			'SATIS'   => $doviz['GBP']['satis'],
			'DEGISIM'   => $doviz['GBP']['degisim']			
		),
	),
	'Altın' => array(
		'GRAM' => array(
			'ISIM'   => "Gram Altın",
			'ALIS'   => $altin['GA']['alis'],
			'SATIS'   => $altin['GA']['satis'],
			'DEGISIM'   => $altin['GA']['degisim']				
		),
		'CEYREK' => array(
			'ISIM'   => "Çeyrek Altın",
			'ALIS'   => $altin['C']['alis'],
			'SATIS'   => $altin['C']['satis'],
			'DEGISIM'   => $altin['C']['degisim']				
		),
		'YARIM' => array(
			'ISIM'   => "Yarım Altın",
			'ALIS'   => $altin['Y']['alis'],
			'SATIS'   => $altin['Y']['satis'],
			'DEGISIM'   => $altin['Y']['degisim']				
		),
		'TAM' => array(
			'ISIM'   => "Tam Altın",
			'ALIS'   => $altin['T']['alis'],
			'SATIS'   => $altin['T']['satis'],
			'DEGISIM'   => $altin['T']['degisim']				
		),
		'CUMHURIYET' => array(
			'ISIM'   => "Cumhuriyet Altını",
			'ALIS'   => $altin['CMR']['alis'],
			'SATIS'   => $altin['CMR']['satis'],
			'DEGISIM'   => $altin['CMR']['degisim']				
		)
	)
);

$veri = json_encode($veriler);
echo $veri;

?>