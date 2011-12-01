<?php
class basketmerge_oxbasket extends basketmerge_oxbasket_parent
{
	
	/**
	 * overwrite default 
	 * - dont load saved basket by default
	 * - move save basket
	 */
	public function load(){
		// get the User
		/* @var $oUser oxUser */
		$oUser = $this->getBasketUser();
		// check if user exist
        if ( !$oUser ) {
            return;
        }
        // load DB Class
        $oDB = oxDb::getDb();
		// get the current userid
		$USERID = $oDB->quote($oUser->getId());
		// rename the save basket to display a dialog 
		$sSQL = "UPDATE oxuserbaskets SET OXTITLE = 'old_savedbasket' WHERE OXTITLE = 'savedbasket' AND OXUSERID = {$USERID}";
        $oDB->Execute($sSQL);
		
		return;
	}
	
}