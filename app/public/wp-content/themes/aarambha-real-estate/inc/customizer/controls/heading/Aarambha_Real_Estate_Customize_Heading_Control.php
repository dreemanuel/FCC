<?php
/**
 * Customizer Control: aarambha_real_estate_heading
 *
 * @package Aarambha_Real_Estate
 */

/**
 * Aarambha_Real_Estate_Customize_Heading_Control class
 */
class Aarambha_Real_Estate_Customize_Heading_Control extends Aarambha_Real_Estate_Customize_Base_Control {

    /**
     * The type of customize control being rendered.
     *
     * @access public
     * @var    string
     */
    public $type = 'aarambha_real_estate_heading';

    /**
     * Underscore JS template to handle the control's output.
     *
     * @access public
     * @return void
     */
    public function content_template() { ?>

        <div class="control-wrap heading-control">

            <# if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>

            <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

        </div>

        <?php
    }
}

// Register JS-rendered control types.
$wp_customize->register_control_type( 'Aarambha_Real_Estate_Customize_Heading_Control' );