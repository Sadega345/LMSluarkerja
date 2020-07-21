var _superModal = $.fn.modal;

// add locked as a new option
$.extend( _superModal.defaults, {
    locked: false
});

// create a new constructor
var Modal = function(element, options) {
    _superModal.Constructor.apply( this, arguments )
}

// extend prototype and add a super function
Modal.prototype = $.extend({}, _superModal.Constructor.prototype, {
    constructor: Modal

    , _super: function() {
        var args = $.makeArray(arguments)
        // call bootstrap core
        _superModal.Constructor.prototype[args.shift()].apply(this, args)
    }

});

// override the old initialization with the new constructor
$.fn.modal = $.extend(function(option) {
    var args = $.makeArray(arguments),
    option = args.shift()

    // this is executed everytime element.modal() is called
    return this.each(function() {
        var $this = $(this)
        var data = $this.data('modal'),
            options = $.extend({}, _superModal.defaults, $this.data(), typeof option == 'object' && option)

        if (!data) {
            $this.data('modal', (data = new Modal(this, options)))
        }
        if (typeof option == 'string') {
            data[option].apply( data, args )
        }
    });
}, $.fn.modal);