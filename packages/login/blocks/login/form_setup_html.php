<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 

<script>
function registerTextShown(cb){
	if(cb.checked)
		 $('#registerTextWrap').css('display','block');
	else $('#registerTextWrap').css('display','none');
}
</script>

<div style="margin-bottom:0px;">
<input name="showRegisterLink" type="checkbox" value="1" <?php  echo ($bObj->showRegisterLink)?'checked':''?> onchange="registerTextShown(this)" onclick="registerTextShown(this)" /> 
<?php  echo t('Show Register Link') ?>
</div>

<div id="registerTextWrap" style=" display:<?php  echo ($bObj->showRegisterLink)?'block':'none'?>; margin-top:8px; "> 
<input name="registerText" type="text" value="<?php  echo $bObj->registerText?>" maxlength="255" />
</div>

<div style="margin-top:16px; ">
<input name="returnToSamePage" type="checkbox" value="1" <?php  echo ($bObj->returnToSamePage)?'checked':''?> />  
<?php  echo t('When login is complete, return users to this page.')?>
</div>

<div style="margin-top:16px; ">
<input name="hideFormUponLogin" type="checkbox" value="1" <?php  echo ($bObj->hideFormUponLogin)?'checked':''?> />  
<?php  echo t('Hide login &amp; password fields if user is logged in.')?>
</div>


<div class="ccm-spacer" style="margin-bottom:16px;"></div>