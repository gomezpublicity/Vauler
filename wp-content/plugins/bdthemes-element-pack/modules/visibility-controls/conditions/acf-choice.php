<?php
	
	namespace ElementPack\Modules\VisibilityControls\Conditions;
	
	use ElementPack\Base\Condition;
	use Elementor\Controls_Manager;
	use ElementPack\Includes\ACF_Global;
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}
	
	class ACF_Choice extends Condition {
		
		/**
		 * Get the name of condition
		 * @return string as per our condition control name
		 */
		public function get_name() {
			return 'acf_choice';
		}
		
		/**
		 * Get the title of condition
		 * @return string as per condition control title
		 */
		public function get_title() {
			return esc_html__( 'ACF Choice', 'bdthemes-element-pack' );
		}
		
		/**
		 * Get the group of condition
		 * @return string as per our condition control name
		 */
		public function get_group() {
			return 'acf';
		}
		
		/**
		 * Get the control value
		 * @return array as per condition control value
		 */
		public function get_control_value() {
			return [
				'label'       => __( 'Value', 'bdthemes-element-pack' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'red : Red', 'bdthemes-element-pack' ),
				'description' => __( 'Enter accepted choice as like as ACF choice field. Ex- red : Red', 'bdthemes-element-pack' ),
			];
		}

		public function get_name_control() {
			$query = new \WP_Query(
				array(
					'post_type'      => 'acf-field',
					'posts_per_page' => -1,
				)
			);

			$results = ACF_Global::format_acf_query_result( $query->posts, $this->query_options );

			return [
				'label'       => __( 'Choose Key', 'bdthemes-element-pack' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => true,
				'options'     => $results,
			];
		}

		protected $query_options = array(
			'show_type'       => false,
			'show_field_type' => true,
			'include_option'  => true,
			'show_group'      => true,
			'field_type'      => 'choice',
		);
		
		/**
		 * Check the condition
		 * @param string $relation Comparison operator for compare function
		 * @param mixed $val will check the control value as per condition needs
		 */
		public function check( $relation, $val, $custom_page_id = false, $extra = false ) {

			if( ! $extra ){
				return;
			}

			$field = get_field_object( $extra );
			$acf_global = new ACF_Global();
			$extra = $acf_global->get_acf_field_value( $extra, $field['parent'] );		
			$is_radio = 'radio' === $field['type'];
			$single_select = 'select' === $field['type'] && ! $field['multiple'] ? true : false;
			$field_values = ACF_Global::format_acf_values( $extra, $field['return_format'], $is_radio, $single_select );			
			$val = false !== strpos( $val, ' : ' ) ? explode( "\n", ( $val ) ) : array( $val . ' : ' . $val );
			$result = array_intersect(array_map('strtolower', $field_values), array_map('strtolower', $val));

			return $this->compare( $result, true, $relation );
		}
	}
