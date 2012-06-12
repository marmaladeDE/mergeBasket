[{capture append="oxidBlock_pagePopup"}]
[{oxscript include="js/widgets/marmmergebasket.js"}]
[{if $hasSaveBasket}]
	<div id="merge_basket" class="FXgradGreyLight corners loginForm" style="width: 500px; position: absolute; top: 30%; left:50%; z-index:2000; margin-left: -250px; padding: 10px;">
	<button onClick="jQuery('#mbremovebutton').click()" style="float: right;">X</button>
	<h2>[{ oxmultilang ident="BASKETMERGE_HEAD" }]</h2>
	<p>[{ oxmultilang ident="BASKETMERGE_DESC" }]</p>
	<form action="[{ $oViewConf->getSslSelfLink()}]" method="post">
	<input type="hidden" name="cl" value="[{$oView->getClassName()}]" />
	<input type="hidden" name="fnc" value="mergeBasket" />
	<input class="submitButton mbadd" type="submit" name="add" style="color:white;" value="[{ oxmultilang ident="BASKETMERGE_ADD" }]" title="[{ oxmultilang ident="BASKETMERGE_ADD_TITLE" }]"/>
    <input class="submitButton mbrm" type="submit" name="remove" style="color:white;" id="mbremovebutton" value="[{ oxmultilang ident="BASKETMERGE_REMOVE" }]"  title="[{ oxmultilang ident="BASKETMERGE_REMOVE_TITLE" }]"/>  
    <br />
    <br />	
	<table>
        [{if $oSaveBasket->getItemCount() > 1}]
            <tr>
                <th>
                    <input type="checkbox" onClick="jQuery('#merge_basket input:checkbox').attr('checked', this.checked);" class="mergebasketcheck" value="" checked="checked"/>
                </th>
                <th colspan="2">[{ oxmultilang ident="BASKETMERGE_SELECT_ALL" }]</th>
            </tr>
        [{/if}]
        [{foreach from=$oSaveBasket->getItems() item="oItem" key="sKey"}]
            [{assign var="oArticle" value=$oItem->getArticle($sKey) }]
            <tr>
                <td class="mbimg">
					<img src="[{$oArticle->getIconUrl()}]" title="[{$oArticle->oxarticles__oxtitle}]" />
                </td>
                <td class="mbamount" style="vertical-align:top">
                    <input type="checkbox" name="merge_check[[{$sKey}]]" class="mergebasketcheck" value="1" checked="checked"/>
                    <input type="hidden" name="merge_amount[[{$sKey}]]" class="mergebasketamount" value="[{$oItem->oxuserbasketitems__oxamount->value }]"/>
                </td>
                <td class="mbtitle" style="vertical-align:top">
                    <span class="mergebaskettitle">[{$oArticle->oxarticles__oxtitle}]</span>
                </td>
            </tr>
        [{/foreach}]
    </table>
    </form>
    <div class="clear"></div>
</div>
<div id="overlay" onClick="jQuery('#mbremovebutton').click()"></div>
[{/if}]
[{/capture}]
