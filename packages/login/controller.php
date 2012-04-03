<?php 

defined('C5_EXECUTE') or die(_("Access Denied."));

class LoginPackage extends Package {

	protected $pkgHandle = 'login';
	protected $appVersionRequired = '5.3.3'; 
	protected $pkgVersion = '1.1.1dev';
	
	public function getPackageDescription() {
		return t("Lets you add a login box as a block.");
	}
	
	public function getPackageName() {
		return t("Login");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('login', $pkg);
		
	}

}
