(function( $, wp_customize ) {
    var $document = $( document );

    var CustomizeBuilder = function( options, id ){

        var Builder = {
            id: id,
            controlId: '',
            cols: 12,
            cellHeight: 45,
            items: [],
            container: null,
            ready: false,
            devices: { desktop: "Desktop", mobile: "Mobile/Tablet" },
            activePanel: 'desktop',
            panels: {},
            activeRow: 'main',
            draggingItem: null,
            getTemplate: _.memoize(
                function () {
                    var control = this;
                    var compiled,
                        /*
                         * Underscore's default ERB-style templates are incompatible with PHP
                         * when asp_tags is enabled, so WordPress uses Mustache-inspired templating syntax.
                         *
                         * @see trac ticket #22344.
                         */
                        options = {
                            evaluate: /<#([\s\S]+?)#>/g,
                            interpolate: /\{\{\{([\s\S]+?)\}\}\}/g,
                            escape: /\{\{([^\}]+?)\}\}(?!\})/g,
                            variable: 'data'
                        };

                    return function ( data, id, data_variable_name ) {
                        if (_.isUndefined( id )) {
                            id = 'tmpl-customize-control-' + control.type;
                        }
                        if ( ! _.isUndefined( data_variable_name ) && _.isString( data_variable_name ) ) {
                            options.variable = data_variable_name;
                        } else {
                            options.variable = 'data';
                        }
                        compiled = _.template( $( '#' + id ).html(), null, options );
                        return compiled( data );
                    };
                }
            ),

            drag_drop: function(){
                var that = this;

                $( '.aarambha-real-estate-device-panel', that.container ).each(
                    function(){
                        var panel             = $( this );
                        var device            = panel.data( 'device' );
                        var sortable_ids      = [];
                        that.panels[ device ] = {};
                        $( '.col-items', panel ).each(
                            function( index ){
                                var data_name = $( this ).attr( 'data-id' ) || '';
                                var id;
                                if ( ! data_name ) {
                                    id = '_sid_' + device + index;
                                } else {
                                    id = '_sid_' + device + '-' + data_name;
                                }
                                $( this ).attr( 'id', id );
                                sortable_ids[ index ] = '#' + id;
                            }
                        );
                        $(".col-items, .aarambha-real-estate-available-items", panel).each(function() {
                            $(this).droppable().sortable({
                                placeholder: "sortable-placeholder grid-stack-item",
                                connectWith: ".col-items",
                                update: function(){
                                    that.save();
                                }
                            });
                        });
                    }
                );
            },
            addPanel: function( device ){
                var that        = this;
                var template    = that.getTemplate();
                var template_id = 'tmpl-aarambha-real-estate-panel';
                if (  $( '#' + template_id ).length == 0 ) {
                    return;
                }
                if ( ! _.isObject( options.rows ) ) {
                    options.rows = {};
                }
                if ( ! _.isObject( options.cols ) ) {
                    options.cols = {};
                }
                var html = template(
                    {
                        device: device,
                        id: options.id,
                        rows: options.rows,
                        cols: options.cols
                    },
                    template_id
                );
                return '<div class="aarambha-real-estate-device-panel aarambha-real-estate-vertical-panel aarambha-real-estate-panel-' + device + '" data-device="' + device + '">' + html + '</div>';
            },
            addDevicePanels: function(){
                var that = this;
                _.each(
                    that.devices,
                    function( device_name, device ) {
                        var panelHTML = that.addPanel( device );
                        $( '.aarambha-real-estate-devices-switcher', that.container ).append( '<a href="#" class="switch-to switch-to-' + device + '" data-device="' + device + '">' + device_name + '</a>' );
                        $( '.aarambha-real-estate-body', that.container ).append( panelHTML );
                    }
                );
            },
            addItem: function( node ){
                var that        = this;
                var template    = that.getTemplate();
                var template_id = 'tmpl-aarambha-real-estate-item';
                if (  $( '#' + template_id ).length == 0 ) {
                    return;
                }
                var html = template( node, template_id );
                return $( html );
            },
            addAvailableItems: function(){
                var that = this;

                _.each(
                    that.devices,
                    function(device_name, device ){
                        var $itemWrapper = $( '<div class="aarambha-real-estate-available-items" data-device="' + device + '"></div>' );
                        $( '.aarambha-real-estate-panel-' + device, that.container ).append( $itemWrapper );

                        _.each(
                            that.items,
                            function( node ) {
                                var _d = true;
                                if ( ! _.isUndefined( node.devices ) && ! _.isEmpty( node.devices ) ) {
                                    if ( _.isString( node.devices ) ) {
                                        if ( node.devices != device ) {
                                            _d = false;
                                        }
                                    } else {
                                        var _has_d = false;
                                        _.each(
                                            node.devices,
                                            function( _v ){
                                                if ( device == _v ) {
                                                    _has_d = true;
                                                }}
                                        );
                                        if ( ! _has_d ) {
                                            _d = false;
                                        }
                                    }
                                }

                                if ( _d ) {
                                    var item = that.addItem( node );
                                    $itemWrapper.append( item );
                                }

                            }
                        );
                    }
                );

            },
            switchToDevice: function( device, toggle_button ){
                var that          = this;
                var numberDevices = _.size( that.devices );
                if ( numberDevices > 1 ) {
                    $( '.aarambha-real-estate-devices-switcher a', that.container ).removeClass( 'aarambha-real-estate-tab-active' );
                    $( '.aarambha-real-estate-devices-switcher .switch-to-' + device, that.container ).addClass( 'aarambha-real-estate-tab-active' );
                    $( '.aarambha-real-estate-device-panel', that.container ).addClass( 'aarambha-real-estate-panel-hide' );
                    $( '.aarambha-real-estate-device-panel.aarambha-real-estate-panel-' + device, that.container ).removeClass( 'aarambha-real-estate-panel-hide' );
                    that.activePanel = device;
                } else {
                    $( '.aarambha-real-estate-devices-switcher a', that.container ).addClass( 'aarambha-real-estate-tab-active' );
                }

                if ( _.isUndefined( toggle_button ) || toggle_button ) {
                    if ( device == 'desktop' ) {
                        $( '#customize-footer-actions .preview-desktop' ).trigger( 'click' );
                    } else if ( device == 'mobile' ) {
                        $( '#customize-footer-actions .preview-mobile' ).trigger( 'click' );
                    }
                    /*                 else if ( device == 'all' ) {
                        wp_customize.section( 'aarambha-real-estate-menu-icon-sidebar-section' ).focus();
                    }*/
                }

            },
            addNewWidget: function( device, row_id, col_id, node, index) {

                var that = this;
                var panel, row, col;
                panel = that.container.find(
                    ".aarambha-real-estate-device-panel.aarambha-real-estate-panel-" +device
                );

                row = $( '.aarambha-real-estate-row.aarambha-real-estate-row-'+row_id, panel );
                col = $( '.col-items.'+col_id, row );

                var $item = $( '.aarambha-real-estate-available-items .grid-stack-item[data-id="'+node.id+'"]', panel );

                col.append($item);
            },
            addExistingRowsItems: function(){
                var that = this;

                var data = wp_customize.control( that.controlId ).setting._value;
                if ( ! _.isObject( data ) ) {
                    if (data) {
                        data = JSON.parse( data );
                    } else {
                        data = {};
                    }
                }
                _.each(
                    that.panels,
                    function( $rows,  device ) {
                        var device_data = {};
                        if ( _.isObject( data[ device ] ) ) {
                            device_data = data[ device ];
                        }

                        _.each(device_data, function(cols, row_id) {
                            if (!_.isUndefined(cols)) {

                                _.each(cols, function( items, col_id ) {
                                    _.each( items, function(node, index ){
                                        that.addNewWidget( device, row_id, col_id, node, index );
                                    } );

                                });
                            }
                        });
                    }
                );

                that.ready = true;
            },
            focus: function(){
                this.container.on(
                    'click',
                    '.aarambha-real-estate-item-setting, .aarambha-real-estate-item-name, .item-tooltip',
                    function( e ) {
                        e.preventDefault();
                        var section = $( this ).data( 'section' ) || '';
                        var control = $( this ).attr( 'data-control' ) || '';
                        var did     = false;
                        if ( control ) {
                            if ( ! _.isUndefined( wp_customize.control( control ) ) ) {
                                wp_customize.control( control ).focus();
                                did = true;
                            }
                        }
                        if ( ! did ) {
                            if ( section && ! _.isUndefined( wp_customize.section( section ) ) ) {
                                wp_customize.section( section ).focus();
                                did = true;
                            }
                        }
                    }
                );

                // Focus rows
                this.container.on(
                    'click',
                    '.aarambha-real-estate-row-settings',
                    function( e ){
                        e.preventDefault();
                        var id = $( this ).attr( 'data-id' ) || '';

                        var section = options.id + '_' + id;
                        if ( ! _.isUndefined( wp_customize.section( section ) ) ) {
                            wp_customize.section( section ).focus();
                        }
                    }
                );

            },
            remove: function(){
                var that = this;
                $document.on(
                    'click',
                    '.aarambha-real-estate-device-panel .aarambha-real-estate-item-remove',
                    function ( e ) {
                        e.preventDefault();
                        var item  = $( this ).closest( '.grid-stack-item' );
                        var panel = item.closest( '.aarambha-real-estate-device-panel' );
                        item.removeAttr( 'style' );
                        $( '.aarambha-real-estate-available-items', panel ).append( item );
                        that.save();
                    }
                );

            },
            encodeValue: function( value ){
                return encodeURI( JSON.stringify( value ) )
            },
            decodeValue: function( value ){
                return JSON.parse( decodeURI( value ) );
            },

            save: function() {
                var that = this;
                if (!that.ready) {
                    return;
                }

                var data = {};

                _.each( that.devices, function( device_label, device ){
                    data[ device ] = {};
                    var devicePanel = $( '.aarambha-real-estate-panel-'+device, that.container );
                    $( '.aarambha-real-estate-row', devicePanel ).each( function(){
                        var row = $( this );
                        var row_id = row.attr( 'data-row-id' ) || false;
                        var rowData = { };
                        if ( row_id ) {

                            $( '.col-items', row ).each( function(){
                                var col = $( this );
                                var col_id = col.attr( 'data-id' ) || false;
                                if ( col_id ) {
                                    var colData = _.map(
                                        $(" > .grid-stack-item", col ),
                                        function(el) {
                                            el = $(el);
                                            return {
                                                id: el.data("id") || ""
                                            };
                                        }
                                    );
                                    rowData[ col_id ] = colData;
                                }
                            } );

                            data[ device ][ row_id ] = rowData;
                        }
                    } );
                } );

                wp_customize.control( that.controlId ).setting.set( that.encodeValue( data ) );
            },

            showPanel: function(){
                this.container.removeClass( 'aarambha-real-estate-builder--hide' ).addClass( 'aarambha-real-estate-builder-show' );
                setTimeout(
                    function(){
                        $( '#customize-preview' ).addClass( 'cb--preview-panel-show' );
                    },
                    100
                );
            },
            hidePanel: function(){
                this.container.removeClass( 'aarambha-real-estate-builder-show' );
                cwp_hide_item_panel( this.container.find( '.aarambha-real-estate-available-items' ) );
                $( '#customize-preview' ).removeClass( 'cb--preview-panel-show' ).removeAttr( 'style' );
            },
            togglePanel: function(){
                var that = this;
                wp_customize.state( 'expandedPanel' ).bind(
                    function( paneVisible ) {
                        if ( wp_customize.panel( options.panel ).expanded() ) {
                            $document.trigger( 'aarambha_real_estate_panel_builder_open', [ options.panel ] );
                            top._current_builder_panel = id;
                            that.showPanel();
                        } else {
                            that.hidePanel();
                        }
                    }
                );

                that.container.on(
                    'click',
                    '.aarambha-real-estate-panel-close',
                    function(e){
                        e.preventDefault();
                        that.container.toggleClass( 'aarambha-real-estate-builder--hide' );
                        if ( that.container.hasClass( 'aarambha-real-estate-builder--hide' ) ) {
                            $( '#customize-preview' ).removeClass( 'cb--preview-panel-show' );
                        } else {
                            $( '#customize-preview' ).addClass( 'cb--preview-panel-show' );
                        }
                    }
                );

            },
            panelLayoutCSS: function(){
                var sidebarWidth = $( '#customize-controls' ).width();
                if ( ! wp_customize.state( 'paneVisible' ).get() ) {
                    sidebarWidth = 0;
                }
				this.container.find( '.aarambha-real-estate-inner' ).css( {'margin-left': sidebarWidth } );

            },
            init: function( controlId, items, devices ){
                var that = this;

                var template    = that.getTemplate();
                var template_id = 'tmpl-aarambha-real-estate-builder-panel';
                var html        = template( options , template_id );
                that.container  = $( html );
                $( 'body .wp-full-overlay' ).append( that.container );
                that.controlId = controlId;
                that.items     = items;
                that.devices   = devices;

                if ( options.section ) {
                    wp_customize.section( options.section ).container.addClass( 'aarambha-real-estate-hide' );
                }

                that.addDevicePanels();
                that.switchToDevice( that.activePanel );
                that.addAvailableItems();
                that.switchToDevice( that.activePanel );
                that.drag_drop();
                that.focus();
                that.remove();
                that.addExistingRowsItems();

                if ( wp_customize.panel( options.panel ).expanded() ) {
                    that.showPanel();
                } else {
                    that.hidePanel();
                }

                wp_customize.previewedDevice.bind(
                    function( newDevice ) {
                        if ( newDevice === 'desktop' ) {
                            that.switchToDevice( 'desktop', false );
                        } else {
                            that.switchToDevice( 'mobile', false );
                        }
                    }
                );

                that.togglePanel();
                if ( wp_customize.state( 'paneVisible' ).get() ) {
                    that.panelLayoutCSS();
                }
                wp_customize.state( 'paneVisible' ).bind(
                    function(){
                        that.panelLayoutCSS();
                    }
                );

                $( window ).resize(
                    _.throttle(
                        function(){
                            that.panelLayoutCSS();
                        },
                        100
                    )
                );

                // Switch panel
                that.container.on(
                    'click',
                    '.aarambha-real-estate-devices-switcher a.switch-to',
                    function(e){
                        e.preventDefault();
                        var device = $( this ).data( 'device' );
                        that.switchToDevice( device );
                        $( '.aarambha-real-estate-body' ).find( '.aarambha-real-estate-available-items' ).each(
                            function () {
                                cwp_hide_item_panel( $( this ) );
                            }
                        )
                    }
                );
                $document.trigger( 'aarambha_real_estate_builder_panel_loaded', [ id, that ] );
            },
        };

        Builder.init( options.control_id, options.items, options.devices );
        return Builder;
    };

    wp_customize.bind(
        'ready',
        function( e, b ) {
            _.each(
                Aarambha_Real_Estate_Customizer_Builder.builders,
                function( opts, id ){
                    new CustomizeBuilder( opts, id );
                }
            );

            wp_customize.bind(
                'pane-contents-reflowed',
                function(){
                    setTimeout(
                        function(){
                            if ( $( '#sub-accordion-panel-widgets .no-widget-areas-rendered-notice .footer_moved_widgets_text' ).length ) {

                            } else {
                                $( '#sub-accordion-panel-widgets .no-widget-areas-rendered-notice' ).append( '<p class="footer_moved_widgets_text">' + Aarambha_Real_Estate_Customizer_Builder.footer_moved_widgets_text + '</p>' );
                            }

                        },
                        1000
                    );
                }
            );

            // When focus section
            wp_customize.state( 'expandedSection' ).bind(
                function( section ) {
                    $( '.aarambha-real-estate-device-panel .grid-stack-item' ).removeClass( 'item-active' );
                    $( '.aarambha-real-estate-row' ).removeClass( 'row-active' );
                    if ( section ) {
                        $( '.aarambha-real-estate-row[data-id="' + section.id + '"]' ).addClass( 'row-active' );
                        $( '.aarambha-real-estate-device-panel .grid-stack-item.for-s-' + section.id ).addClass( 'item-active' );
                    }
                }
            );
        }
    );

    // Focus
    $document.on(
        'click',
        '.focus-section',
        function( e ) {
            e.preventDefault();
            var id = $( this ).attr( 'data-id' ) || '';
            if ( ! id ) {
                id = $( this ).attr( 'href' ) || '';
                id = id.replace( '#','' );
            }

            if ( id ) {
                if ( wp_customize.section( id ) ) {
                    wp_customize.section( id ).focus();
                }
            }
        }
    );

    $document.on(
        'click',
        '.focus-control',
        function( e ) {
            e.preventDefault();
            var id = $( this ).attr( 'data-id' ) || '';
            if ( ! id ) {
                id = $( this ).attr( 'href' ) || '';
                id = id.replace( '#','' );
            }
            if ( id ) {
                if ( wp_customize.control( id ) ) {
                    wp_customize.control( id ).focus();
                }
            }
        }
    );

    $document.on(
        'click',
        '.focus-panel',
        function( e ) {
            e.preventDefault();
            var id = $( this ).attr( 'data-id' ) || '';
            if ( ! id ) {
                id = $( this ).attr( 'href' ) || '';
                id = id.replace( '#','' );
            }
            if ( id ) {

                if ( wp_customize.panel( id ) ) {
                    wp_customize.panel( id ).focus();
                }
            }
        }
    );

    var encodeValue = function( value ){
        return encodeURI( JSON.stringify( value ) )
    };

    $document.on(
        'mouseover',
        '.aarambha-real-estate-row .grid-stack-item',
        function( e ) {
            e.preventDefault();
            var item  = $( this );
            var nameW = $( '.aarambha-real-estate-item-remove',item ).outerWidth() + $( '.aarambha-real-estate-item-setting',item ).outerWidth();
            var itemW = $( '.grid-stack-item-content', item ).innerWidth();
            if ( nameW > itemW - 50 ) {
                item.addClass( 'show-tooltip' );
            }
        }
    );

    $document.on(
        'mouseleave',
        '.aarambha-real-estate-row .grid-stack-item',
        function( e ) {
            e.preventDefault();
            $( this ).removeClass( 'show-tooltip' );
        }
    );

    /*Add a Item*/
    $document.on(
        'click',
        '.aarambha-real-estate-add-new-item',
        function( e ) {
            e.preventDefault();
            var this_add_new = $( this ),
                this_item_wrap   = this_add_new.next( '.aarambha-real-estate-available-items' );
            if ( ! this_item_wrap.length ) {
                this_item_wrap = this_add_new.closest( '.aarambha-real-estate-sidebar' ).next( '.aarambha-real-estate-available-items' );
            }
            if ( this_item_wrap.length ) {
                this_item_wrap.toggleClass( 'aarambha-real-estate-show-items' );
                $( 'body' ).toggleClass( 'aarambha-real-estate-body-overlay' );
                this_add_new.toggleClass( 'aarambha-real-estate-hide-items' );
            }

        }
    );
    function cwp_hide_item_panel(this_item_wrap){

        var this_add_new = this_item_wrap.prev( '.aarambha-real-estate-add-new-item' );
        if ( ! this_add_new.length ) {
            this_add_new = this_add_new.prev( '.aarambha-real-estate-sidebar' ).find( '.aarambha-real-estate-add-new-item' );
        }
        if ( this_item_wrap.length ) {
            this_item_wrap.removeClass( 'aarambha-real-estate-show-items' );
            $( 'body' ).removeClass( 'aarambha-real-estate-body-overlay' );
            this_add_new.removeClass( 'aarambha-real-estate-hide-items' );
        }

    }
    $document.on(
        'click',
        '.aarambha-real-estate-close-item-panel',
        function( e ) {
            e.preventDefault();
            var this_close_item_panel = $( this ),
                this_item_wrap  = this_close_item_panel.closest( '.aarambha-real-estate-available-items' );

            cwp_hide_item_panel( this_item_wrap );

        }
    );

})( jQuery, wp.customize || null );
