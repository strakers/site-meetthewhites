/**
 * Created by strakez on 2015-05-24.
 */

// factory
function BuildCountDown( element, deadline, settings ) {

    // setup
    var $ = jQuery,
        _format,
        _template,
        options,
        clock = $( element ),
        currDate = '00:00:00:00:00';

    // config
    options = $.extend(BuildCountDown._config,settings);
    _format = options.format;
    _template = options.template;

    // create countdown
    BuildCountDown.currTimer = clock.countdown( deadline, function( event ) {
        var newDate = event.strftime( _format );
        if( newDate !== currDate ){
            currDate = newDate;
            $( this ).html( event.strftime( _template ) );
        }
    });

}

// defaults
BuildCountDown._config = {};

// form template, html is recreated every second :(
BuildCountDown._config.defaultTemplate = '<div class="timer"><div data-type="week%!w" class="time weeks t%w%d%H%M%S">%w</div><div data-type="day%!D" class="time days t%D%H%M%S">%d</div><div data-type="hour%!H" class="time hours t%H%M%S">%H</div><div data-type="minute%!M" class="time minutes t%M%S">%M</div><div data-type="second%!S" class="time seconds t%S">%S</div></div>';
BuildCountDown._config.template = BuildCountDown._config.defaultTemplate;
BuildCountDown._config.defaultFormat = '%w:%d:%H:%M:%S';
BuildCountDown._config.format = BuildCountDown._config.defaultFormat;

// init
//BuildCountDown('#clock', '2015/06/19 17:00:00');