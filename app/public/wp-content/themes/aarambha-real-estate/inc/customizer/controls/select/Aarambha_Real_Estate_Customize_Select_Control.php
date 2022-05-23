<?php
/**
 * Customizer Control: aarambha_real_estate_select
 *
 * @package Aarambha_Real_Estate
 */

/**
 * Aarambha_Real_Estate_Customize_Select_Control class
 */
class Aarambha_Real_Estate_Customize_Select_Control extends Aarambha_Real_Estate_Customize_Base_Control {

    /**
     * The type of customize control being rendered.
     *
     * @access public
     * @var    string
     */
    public $type = 'aarambha_real_estate_select';

    /**
     * Set up our control.
     *
     * @access public
     * @param  object  $manager
     * @param  string  $id
     * @param  array   $args
     * @return void
     */
    public function __construct( $manager, $id, $args = array() ) {

        // Let the parent class do its thing.
        parent::__construct( $manager, $id, $args );

        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_script' ) );
    }

    /**
     * Enqueue control related scripts/styles.
     *
     * @access public
     * @return void
     */
    public function enqueue_script() {

        // Enqueue style.
        wp_enqueue_style( 'select2', AARAMBHA_REAL_ESTATE_URI .'assets/css/select2.css', array(), '4.1.0' );

        // Enqueue script
        wp_enqueue_script( 'select2', AARAMBHA_REAL_ESTATE_URI . 'assets/js/select2.js', [ 'jquery' ], '4.1.0', true );

    }

    /**
     * Underscore JS template to handle the control's output.
     *
     * @access public
     * @return void
     */
    public function content_template() { ?>

        <# const resetData = data.default; #>

        <div class="d-flex justify-content-between align-items-center">
            <span class="customize-control-title position-relative">
                {{{ data.label }}}
            </span>

        </div>

        <# if ( data.description ) { #>
        <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <div class="control-wrap d-flex flex-wrap align-items-start select-control">
            <# let reset = ( resetData!== undefined ) ? resetData: ''; #>
            <select class="select select2" data-reset="{{ reset }}">
                <# _.each( data.choices, function( choiceLabel, choiceID ) {  #>
                <option value="{{ choiceID }}">{{ choiceLabel }}</option>
                <# }); #>
            </select>
        </div>

        <?php
    }
}

// Register JS-rendered control types.
$wp_customize->register_control_type( 'Aarambha_Real_Estate_Customize_Select_Control' );