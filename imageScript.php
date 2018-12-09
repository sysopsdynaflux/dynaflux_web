<?php

$imgs = array('cuajone 1.jpg',
	'equipo en el cip.jpg',
	'Skid Dosificacion Toquepala Acrilico.jpg',
	'gmp1.jpg',
	'gmp4.jpg',
	'vista gmp.jpg',
	'dosificacion proyecto alpamarca.jpg',
	'cuajone 2.jpg',
	'Dosificacion de Reactivos.JPG',
	'Quellaveco 1.jpg',
	'quellaveco 2 con color.jpg',
	'PESQUERA TASA.JPG',
	'chemco 4.jpg',
	'CALETONES1.jpg',
	'SOQUIMICH.JPG',
	'EEC 115 CON ARREGLO GENERAL-1.jpg',
	'responsabilidad ambiental 2.jpg',
	'eec aqp 5.jpg',
	'eec aqp 3.jpg',
	'eec huacho 2.jpg',
	'toquepala 3.jpg',
	'toquepala 2.jpg',
	'el brocal3.jpg',
	'quimpac 1.jpg',
	'sodimate outotec.jpg',
	'sodimate alto cayma.jpg',
	'el brocal4.jpg',
	'Outotec.jpg',
	'Alto Cayma.jpg',
	'vak_kimsa_3.jpg',
	'Votorantim.JPG',
	'huacho.jpg',
	'ING1.jpg',
	'ING2.jpg',
	'TEC1.jpg',
	'TEC2.jpg',
	'WIND.jpg',
	'sp400.jpg',
	'ALH2.gif',
	'ALP2.jpg',
	'ehe_body.jpg',
	'hv_photo.jpg',
	'ek_body.jpg',
	'ew_photo.jpg',
	'ez_photo.jpg',
	'lapi675.jpg',
	'obl_mb.jpg',
	'x9api675.jpg',
	'md.jpg',
	'xlapi675.jpg',
	'ixpump_body.jpg',
	'PW_Body.jpg',
	'PW-F_Body.jpg',
	'cdm.jpg',
	'cgd.jpg',
	'cgo.jpg',
	'cmo.jpg',
	'mspe.jpg',
	'area_ventas.jpg',
	'area_ingenieria.jpg',
	'area_tecnica.jpg',
	'area_investigacion.jpg',
	'chemco.png',
	'sodimate.png',
	'albin_lodos.png',
	'polisol.png',
	'skid.png',
	'wdis410.jpg',
	'wdec410.jpg',
	'wph.jpg',
	'wct410.jpg',
	'Brochure_EEC_portrait.jpg',
	'Brochure_Systems_portrait.jpg',
	'Brochure_Dynaflux_portrait.jpg',
	'Brochure_Chemco_portrait.jpg',
	'aguas_acidas_2.jpg',
	'vakimsa_1.jpg',
	'vakimsa_2.jpg',
	'sp8100sm.jpg',
	'quimpac_1.jpg',
	'alto_cayma_3.jpg',
	'cormitoma.jpg',
	'alto_cayma_1.jpg',
	'alto_cayma_2.jpg',
	'alto_cayma_4.jpg',
	'quimpac_2.jpg',
	'quimpac_3.jpg',
	'quimpac_4.jpg',
	'anglo_american.jpg',
	'minera_antapaccay.jpg',
	'minera_bateas.jpg',
	'corporacion_lindley.jpg',
	'cemento_sur.jpg',
	'aqualife.jpg',
	'walchem_logo.jpeg',
	'obl_logo.png',
	'albin_logo.jpeg',
	'panworld_logo.jpg',
	'affetti_logo.jpeg',
	'standard_pump_logo.jpeg',
	'chemco_logo.jpg',
	'sodimate_logo.jpg',
	'eec_logo.jpg',
	'vak_kimsa_logo.jpg',
	'ING3.jpg');

$imgs2 = array();
foreach($imgs as $key => $img) {
	$imgs2[md5(strtolower($img))] = $key+1;
}

//print_r($imgs2);

$dir = getcwd().'/public/images/';
$files = scandir($dir);

$imgs3 = array();
foreach($files as $file) {
    if(is_file($dir.$file) && $file!='.DS_Store'){
    	$key = md5(strtolower($file));
    	if(isset($imgs2[$key])) {
    		$id = $imgs2[$key];
    		$imgs3[$id] = "('IMG$id','$file'";
    	}
    }
}
ksort($imgs3);
print_r($imgs3);