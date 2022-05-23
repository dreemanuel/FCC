<?php
/**
 * Customizer Control: aarambha_real_estate_sortable
 *
 * @package Aarambha_Real_Estate
 */

/**
 * Aarambha_Real_Estate_Customize_Sortable_Control class
 */
class Aarambha_Real_Estate_Customize_Sortable_Control extends Aarambha_Real_Estate_Customize_Base_Control {

    /**
     * The type of customize control being rendered.
     *
     * @access public
     * @var    string
     */
    public $type = 'aarambha_real_estate_sortable';

    /**
     * Underscore JS template to handle the control's output.
     *
     * @access public
     * @return void
     */
    public function content_template() { ?>

        <#
        const   fields      = data.fields,
                resetData   = data.default; #>

        <# if ( data.label ) { #>
        <div class="d-flex justify-content-between align-items-center">
            <span class="customize-control-title position-relative">
                {{{ data.label }}}
                <span class="reset-value"><i class="dashicons dashicons-image-rotate d-flex justify-content-center align-items-center"></i></span>
            </span>
        </div>
        <# } #>

        <# if ( data.description ) { #>
        <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <ul class="sortable control-wrap sortable-list">
            <# const sortable_reset = ( resetData !== '' ) ? resetData : ''; #>
            <input type="hidden" class="sortable-field" data-reset="{{ sortable_reset }}" />
        </ul>

        <?php
    }
}

// Register JS-rendered control types.
$wp_customize->register_control_type( 'Aarambha_Real_Estate_Customize_Sortable_Control' );