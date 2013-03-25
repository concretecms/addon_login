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

		public function save($data) {
			$args['registerText'] = isset($data['registerText']) ? trim($data['registerText']) : '';
			$args['showRegisterLink'] = intval($data['showRegisterLink']);	
			$args['returnToSamePage'] = intval($data['returnToSamePage']);
			$args['hideFormUponLogin'] = intval($data['hideFormUponLogin']);
			parent::save($args);
		}

	}
