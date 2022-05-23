<?php
/**
 * Add Header Builder Template
 *
 * @package Aarambha_Real_Estate
 */

/*----------------------------------------------------------------------
# Exit if accessed directly
-------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<script type="text/html" id="tmpl-aarambha-real-estate-builder-panel">
    <div class="aarambha-real-estate-customize-builder">
        <div class="aarambha-real-estate-inner">
            <div class="aarambha-real-estate-header">
                <div class="aarambha-real-estate-devices-switcher">
                </div>
                <div class="aarambha-real-estate-actions">
                    <a class="button button-secondary aarambha-real-estate-panel-close" href="#">
                        <span class="close-text"><?php esc_html_e( 'Close', 'aarambha-real-estate' ); ?></span>
                        <span class="panel-name-text">{{ data.title }}</span>
                    </a>
                </div>
            </div>
            <div class="aarambha-real-estate-body"></div>
        </div>
    </div>
</script>

<script type="text/html" id="tmpl-aarambha-real-estate-panel">
    <div class="aarambha-real-estate-rows">
        <# if ( ! _.isUndefined( data.rows.top ) ) { #>
        <div class="aarambha-real-estate-row-top aarambha-real-estate-row" data-row-id ="top" data-cols="{{ data.cols.top }}" data-id="{{ data.id }}_top">
            <div class="aarambha-real-estate-row-inner">
                <# for ( let i = 0; i < data.cols.top; i++ ) { #>
                <div class="col-items-wrapper"><div data-id="col-{{ i }}" class="col-items col-{{ i }} d-flex justify-content-center"></div></div>
                <# } #>
            </div>
            <a class="aarambha-real-estate-row-settings" title="{{ data.rows.top }}" data-id="top" href="#"></a>
        </div>
        <#  } #>

        <# if ( ! _.isUndefined( data.rows.main ) ) { #>
        <div class="aarambha-real-estate-row-main aarambha-real-estate-row" data-row-id ="main" data-cols="{{ data.cols.main }}" data-id="{{ data.id }}_main">
            <div class="aarambha-real-estate-row-inner">
                <# for ( let i = 0; i < data.cols.main; i++ ) { #>
                <div class="col-items-wrapper"><div data-id="col-{{ i }}" class="col-items col-{{ i }} d-flex justify-content-center"></div></div>
                <# } #>
            </div>
            <a class="aarambha-real-estate-row-settings" title="{{ data.rows.main }}" data-id="main" href="#"></a>
        </div>
        <#  } #>

        <# if ( ! _.isUndefined( data.rows.bottom ) ) { #>
        <div class="aarambha-real-estate-row-bottom aarambha-real-estate-row" data-row-id ="bottom" data-cols="{{ data.cols.bottom }}" data-id="{{ data.id }}_bottom">
            <div class="aarambha-real-estate-row-inner">
                <# for ( let i = 0; i < data.cols.bottom; i++ ) { #>
                <div class="col-items-wrapper"><div data-id="col-{{ i }}" class="col-items col-{{ i }} d-flex justify-content-center"></div></div>
                <# } #>
            </div>
            <a class="aarambha-real-estate-row-settings" title="{{ data.rows.bottom }}" data-id="bottom" href="#"></a>
        </div>
        <#  } #>
    </div>
</script>

<script type="text/html" id="tmpl-aarambha-real-estate-item">
    <div class="grid-stack-item item-from-list for-s-{{ data.section }}"
         title="{{ data.name }}"
         data-id="{{ data.id }}"
         data-section="{{ data.section }}"
    >
        <div class="item-tooltip" data-section="{{ data.section }}">{{ data.name }}</div>
        <div class="grid-stack-item-content">
            <div class="aarambha-real-estate-customizer-builder-item-desc">
                <h3 class="aarambha-real-estate-item-name" data-section="{{ data.section }}">{{ data.name }}</h3>
                <# if ( data.desc ) { #>
                <span class="aarambha-real-estate-customizer-builder-item-desc">{{ data.desc }}</span>
                <# } #>
            </div>
            <span class="aarambha-real-estate-item-remove aarambha-real-estate-icon"></span>
            <span class="aarambha-real-estate-item-setting aarambha-real-estate-icon" data-section="{{ data.section }}"></span>
        </div>
    </div>
</script>
