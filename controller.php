<?php
namespace Concrete\Package\Mautic;
use Package;
use BlockType;
use SinglePage;
use Loader;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {
    protected $pkgHandle = "mautic";
    protected $appVersionRequired = "5.7.0.4";
    protected $pkgVersion = "0.9.1";
    
    public function getPackageName() {
        return t('Mautic');
    }

    public function getPackageDescription() {
        $desc = t('Mautic Integration Plugin - tracking and forms.');
        $desc .= '<br>';
        $desc .= t('Find more information in the ');
        $desc .= '<a href="https://github.com/mautic/mautic-concrete5" target="_blank">';
        $desc .= t('documentation');
        $desc .= '</a>.';
        return $desc;
    }

	public function install() {
		$pkg = parent::install();
		// install list block
		BlockType::installBlockTypeFromPackage('mautictracker', $pkg);
        BlockType::installBlockTypeFromPackage('mauticform', $pkg);
	}
}