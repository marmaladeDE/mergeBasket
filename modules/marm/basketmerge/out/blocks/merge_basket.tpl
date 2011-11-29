[{capture append="oxidBlock_pagePopup"}]
[{if $hasSaveBasket}]
	<div id="merge_basket" class="FXgradGreyLight corners loginForm" style="width: 500px; position: absolute; top: 30%; left:50%; z-index:2000; margin-left: -250px; padding: 10px;">
	<button onClick="jQuery('#merge_basket').remove();" style="float: right;">X</button>
	<h2>[{ oxmultilang ident="BASKETMERGE_HEAD" }]</h2>
	<p>[{ oxmultilang ident="BASKETMERGE_DESC" }]</p>
	<form action="/index.php?cl=basket&fnc=mergeBasket" method="post">
	<ul style="padding-left: 15px;">
	[{* $this->addToBasket( $oItem->oxuserbasketitems__oxartid->value, $oItem->oxuserbasketitems__oxamount->value, $oSelList, $oItem->getPersParams(), true ); *}]
    		[{*foreach from=$oSaveBasket->getArticles() key="skey" item="oArticle" }]
    			[{assign var="item" value=$oSaveBasket->getItem($skey) }]
    			<li>[{$item->getAmount()}] x [{$oArticle->oxarticles__oxtitle}]</li>
    		[{/foreach*}]
    		[{foreach from=$oSaveBasket->getItems() item="oItem" key="sKey"}]
    			[{assign var="oArticle" value=$oItem->getArticle($sKey) }]
    			<li><input type="text" name="merge_amount[[{$sKey}]]" value="[{$oItem->oxuserbasketitems__oxamount->value }]" style="width: 20px;"/>
    			 x <a href="[{$oArticle->getLink()}]">[{$oArticle->oxarticles__oxtitle}]</a></li>
    		[{/foreach}]
    		</ul>
    		<br />
    		<input class="submitButton" type="submit" name="remove" value="[{ oxmultilang ident="BASKETMERGE_REMOVE" }]" style="color: #fff; border: none; font-size: 1.2em;" />
    		<input class="submitButton" type="submit" name="add" value="[{ oxmultilang ident="BASKETMERGE_ADD" }]" style="color: #fff; border: none; float: right; font-size: 1.2em;" />
    		
    		</form>
    	</div>
[{/if}]
[{/capture}]