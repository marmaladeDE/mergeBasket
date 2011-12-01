<?php
class basketmerge_oxcmp_basket extends basketmerge_oxcmp_basket_parent{

  /**
   * merge the old_savedbasket to the current one
   */  
  public function mergeBasket(){

  	$oParentView = $this->getParent();
  	/* @var $oUser oxUser  */
  	$oUser = $this->getUser();
    // if we have a user
  	if( $oUser ){
  		/* @var $oBasket oxUserBasket  */
	    $oBasket = $oUser->getBasket( 'old_savedbasket' );
        // get amount of merge items
  		$merge_amount = oxConfig::getParameter( 'merge_amount' );
  		// check if only will be removed
  		$remove = oxConfig::getParameter('remove');

  		if($remove === null){
	  		$aSavedItems = $oBasket->getItems();
	  		// check all items in basket
	        foreach ( $aSavedItems as $sKey => $oItem ) {
	            try {
	                // load selList
	                $oSelList = $oItem->getSelList();
	                // add the chossen amount with the right parameters
	                if(array_key_exists($sKey, $merge_amount) && $merge_amount[$sKey] > 0){
	                	$this->tobasket( $oItem->oxuserbasketitems__oxartid->value, $merge_amount[$sKey], $oSelList, $oItem->getPersParams(), false );
	                }
	                
	            } catch( oxArticleException $oEx ) {
	                // caught and ignored
	            }
	        }
  		}
  		// clear the old basket
  		$oBasket->delete();
  		// Oxid dont want to remove the object
  		$oBasket->setIsNewBasket();
  		// remove from cache
  		unset($oBasket);
  	}
  }
	
}