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
        // get Checkbox of merge items
  		$merge_check = oxConfig::getParameter( 'merge_check' );
  		// check if only will be removed
  		$remove = oxConfig::getParameter('remove');

  		if($remove === null && !empty($merge_check)){
	  		$aSavedItems = $oBasket->getItems();
	  		// check all items in basket
	        foreach ( $aSavedItems as $sKey => $oItem ) {
	            try {
	                // load selList
	                $oSelList = $oItem->getSelList();
	                // add the chossen amount with the right parameters
	                if(array_key_exists($sKey, $merge_check) && $merge_amount[$sKey] > 0){
	                	$this->tobasket( $oItem->oxuserbasketitems__oxartid->value, $merge_amount[$sKey], $oSelList, $oItem->getPersParams(), true );
	                }
	                
	            } catch( oxArticleException $oEx ) {
	                // caught and ignored
	            }
	        }
            // redirect to Basket
            $redirect = true;
  		}
            
  		// clear the old basket
  		$oBasket->delete();
  		// Oxid dont want to remove the object
  		$oBasket->setIsNewBasket();
  		// remove from cache
  		unset($oBasket);
        if($redirect)
        {
            $redirectUrl = $this->getConfig()->getShopUrl().'index.php?cl=basket';
            oxUtils::getInstance()->redirect( $redirectUrl, true, 302 );
        }
  	}
  }
	
}