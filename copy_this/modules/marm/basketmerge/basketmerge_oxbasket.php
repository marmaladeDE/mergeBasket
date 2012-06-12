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
		// check if user exists
        if ( !$oUser ) {
            return;
        }
        
        // only do special handling in checkout process
        if($this->getConfig()->getParameter('cl') != 'user')
        {
            return parent::load();
        }
        
        $oSessionBasket = $this->getSession()->getBasket();
        $aSessionItems  = $oSessionBasket->getContents();
        
        // Fucking hell, there must be a more elegant way to do this!
        $aSessionItemsProdNum = array();
        $i = 0;
        foreach ($aSessionItems as $oBasketItem)
        {
            $aSessionItemsProdNum[$i] = $oBasketItem->getProductId();
            $i++;
        }
        
        $oSavedBasket   = $oUser->getBasket( 'savedbasket' );
        $aSavedItems    = $oSavedBasket->getItems();
        
        
        // Add items only, if they are already exist
        foreach ( $aSavedItems as $sKey => $oItem ) {
            if(in_array($oItem->oxuserbasketitems__oxartid->value, $aSessionItemsProdNum))
            {
                try {
                    $this->addToBasket( $oItem->oxuserbasketitems__oxartid->value, $oItem->oxuserbasketitems__oxamount->value, $oSelList, $oItem->getPersParams(), true );
                } catch( oxArticleException $oEx ) {
                    // caught and ignored
                }
            }else{
                $oSelList = $oItem->getSelList();
                $this->_toTempList($oItem->oxuserbasketitems__oxartid->value, $oItem->oxuserbasketitems__oxamount->value, $oSelList);
            }
        }
        
        return;
	}
    protected function _toTempList( $sProductId, $dAmount, $aSel )
    {
        // only if user is logged in
        if ( $oUser = $this->getUser() ) {

            $sProductId = ($sProductId) ? $sProductId : oxConfig::getParameter( 'aid' );
            $sProductId = ($sProductId) ? $sProductId : oxConfig::getParameter( 'itmid' );
            $dAmount = isset( $dAmount ) ? $dAmount : oxConfig::getParameter( 'am' );
            $aSel    = $aSel ? $aSel : oxConfig::getParameter( 'sel' );

            // processing amounts
            $dAmount = str_replace( ',', '.', $dAmount );
            if ( !$this->getConfig()->getConfigParam( 'blAllowUnevenAmounts' ) ) {
                $dAmount = round( ( string ) $dAmount );
            }

            $oTempBasket = $oUser->getBasket( 'old_savedbasket' );
            $oTempBasket->addItemToBasket( $sProductId, abs( $dAmount ), $aSel, ($dAmount == 0) );

            // recalculate basket count
            $oTempBasket->getItemCount( true );
        }
    }
	
}