<php

	require 'config.php';
	
	dol_include_once('/societe/class/societe.class.php');
	dol_include_once('/core/lib/company.lib.php');
	
	$fk_soc = GETPOST('id');

	$object = new Societe($db);
	$object->fetch($fk_soc);
	
	$action = GETPOST('action');
	
	switch ($action){
		case 'value':
			break;
		default:
			_card($object);
			break;
	}
	
	function _card(&object){

		global $conf, $db, $user, $langs;
		
		
		$head = societe_prepare_head($object);
		
		llxHeader();
		
		dol_fiche_head($head, 'godichea', $langs->trans("ThirdParty"), 0, company);
		
		dol_fiche_end();
		
		llxFooter();
	}