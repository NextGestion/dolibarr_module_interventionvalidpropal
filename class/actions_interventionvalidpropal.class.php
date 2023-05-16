<?php

/**
 * Class Actionsinterventionvalidpropal
 */
class Actionsinterventionvalidpropal
{
	/**
	 * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
	 */
	public $results = array();

	/**
	 * @var string String displayed by executeHook() immediately after return
	 */
	public $resprints;

	/**
	 * @var array Errors
	 */
	public $errors = array();

	/**
	 * Constructor
	 */

	function __construct($db){
		
		$this->db = $db;
	}

	function doActions($parameters, &$object, &$action, $hookmanager){
		global $conf, $langs, $user, $confirm, $db;
	}

	
	public function addMoreActionsButtons($parameters, &$object, &$action, $hookmanager)
	{
		global $conf, $langs, $user;

		/// Entity
		$context = $parameters['currentcontext'];
		if($context == 'propalcard' && $object->table_element == 'propal' && $object->id > 0){
			if ($conf->service->enabled && $conf->ficheinter->enabled && $object->statut == Propal::STATUS_VALIDATED) {
				if ($user->rights->ficheinter->creer) {
					$langs->load("interventions");
					print '<a class="butAction" href="'.DOL_URL_ROOT.'/fichinter/card.php?action=create&origin='.$object->element.'&originid='.$object->id.'&socid='.$object->socid.'">'.$langs->trans("AddIntervention").'</a>';
				}
			}
		}

		return 0;
	}
}
