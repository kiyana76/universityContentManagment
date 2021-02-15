(function (NanoScroller) {
    var $default_nano_generate = NanoScroller.generate;
    NanoScroller.generate = function() {
        // call default generate function
        $default_nano_generate.apply(this);
        // fix for rtl
        if (this.$content.css('direction') === 'rtl') {
            var right = this.$content.css('right');
            var paddingRight = this.$content.css('padding-right');
            this.$content.css({
                left: right,
                paddingLeft: paddingRight,
                right: '',
                paddingRight: ''
            });
        }
        return this;
    };
    var $default_nano_destroy = NanoScroller.destroy;
    NanoScroller.destroy = function() {
        // fix for rtl
        if (this.$content.css('direction') === 'rtl') {
            this.$content.css({
                left: '',
                paddingLeft: ''
            });
        }
        // call default destroy function
        $default_nano_destroy.apply(this);
        return this;
    };
}($.fn.nanoScroller.Constructor.prototype));