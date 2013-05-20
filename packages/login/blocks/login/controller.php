<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));

class LoginBlockController extends BlockController {

	protected $btTable = 'btLogin';
	protected $btInterfaceWidth = "400";
	protected $btInterfaceHeight = "160";

	/**
	 * Used for localization. If we want to localize the name/description we have to include this
	 */
	public function getBlockTypeDescription() {
		return t("Lets you add a login box as a block.");
	}

	public function getBlockTypeName() {
		return t("Login Box");
	}

	public function view() {
		$this->set('form', Loader::helper('form'));
		if (!$this->registerText) {
			$this->registerText=t('Click here to register %s', '&raquo;');
		}
		$this->set('registerText', $this->registerText);
		$this->set('showRegisterLink', $this->showRegisterLink);
		$this->set('returnToSamePage', $this->returnToSamePage);

		$c = $this->getCollectionObject();
		if ($c->isEditMode()) {
			$this->set('hideFormUponLogin', false);
		} else {
			$this->set('hideFormUponLogin', $this->hideFormUponLogin);
		}
	}

	public function save($args) {
		$args['registerText'] = isset($args['registerText']) ? trim($args['registerText']) : '';
		$args['showRegisterLink'] = intval($args['showRegisterLink']);
		$args['returnToSamePage'] = intval($args['returnToSamePage']);
		$args['hideFormUponLogin'] = intval($args['hideFormUponLogin']);
		parent::save($args);
	}

}
