<?php
class basketmerge_oxcmp_shop extends basketmerge_oxcmp_shop_parent{
	
	/**
  * Executes parent::render() and returns active shop object.
  *
  * @return  object  $this->oActShop active shop object
  */
  public function render()
  {
  	parent::render();
  	$oParentView = $this->getParent();
    /* @var $oUser oxUser */  	
  	$oUser = $this->getUser();
    // if we have a User
  	if( $oUser ){
  	    /* @var $oBasket oxUserBasket  */
	    $oBasket = $oUser->getBasket( 'old_savedbasket' );
	    // if old basket exist and was not delete
	  	if( $oBasket !== null && $oBasket->getItemCount() && !$oBasket->isNewBasket()){
	  		$oParentView->addTplParam('hasSaveBasket',true);
	  		$oParentView->addTplParam('oSaveBasket',$oBasket);
	  	}
	  	else{
	  		$oParentView->addTplParam('hasSaveBasket',false);
	  	}
  	
  	}
  	else{
  		$oParentView->addTplParam('hasSaveBasket',false);
  	}
  	
  	
  	return $this->oActShop;
  }
	
}