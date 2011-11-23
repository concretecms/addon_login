<?php defined('C5_EXECUTE') or die(_("Access Denied.")); 

$c = Page::getCurrentPage();
$u = new User();
$loginURL= $this->url('/login', 'do_login' );

if ($u->isRegistered() && $hideFormUponLogin) { ?>
	<?php  
	if (Config::get("ENABLE_USER_PROFILES")) {
		$userName = '<a href="' . $this->url('/profile') . '">' . $u->getUserName() . '</a>';
	} else {
		$userName = $u->getUserName();
	}
	?>
	<span class="sign-in"><?php echo t('Currently logged in as <b>%s</b>.', $userName)?> <a href="<?php echo $this->url('/login', 'logout')?>"><?php echo t('Sign Out')?></a></span>
<?php  } else { ?>	
	<form class="login_block_form" method="post" action="<?php  echo $loginURL?>">
		<?php   
			if($returnToSamePage ){ 
				echo $form->hidden('rcID',$c->getCollectionID());
			} ?>
		<div class="loginTxt"><?php  echo t('Login')?></div>
	
		<div class="uNameWrap">
			<label for="uName"><?php   if (USER_REGISTRATION_WITH_EMAIL_ADDRESS == true) { ?>
				<?php  echo t('Email Address')?>
			<?php   } else { ?>
				<?php  echo t('Username')?>
			<?php   } ?></label><br/>
			<?php echo $form->text('uName',$uName); ?>
		</div>
		<div class="passwordWrap">
			<label for="uPassword"><?php  echo t('Password')?></label><br/>
			<?php echo $form->password('uPassword'); ?>
		</div>
		
		<div class="loginButton">
		<?php  echo $form->submit('submit', t('Sign In') . ' &gt;')?>
		</div>	
	
		<?php   if($showRegisterLink && ENABLE_REGISTRATION){ ?>
			<div class="login_block_register_link"><a href="<?php  echo View::url('/register')?>"><?php  echo $registerText?></a></div>
		<?php   } ?>
	
	</form>
<? } // end if not logged in  ?>