<?php
namespace ElementPack\Modules\AcfSlider;

use ElementPack\Base\Element_Pack_Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Element_Pack_Module_Base {

	public function get_name() {
		return 'acf-slider';
	}

	public function get_widgets() {
		$widgets = [
			'Acf_Slider',
		];

		return $widgets;
	}
}
