(function(){
  var spsm = {
    initialize: function() {
      this.$body    = $("body");
      this.$overlay = $("#overlay");
      this.$burger  = $("#burger");
    },

    overlay: {
      toggle: function() {
        if (this.isVisible()) {
          this.hide();
        } else {
          this.show();
        }
      },

      isVisible: function() {
        return spsm.$overlay.hasClass("visible");
      },

      show: function() {
        spsm.$body.addClass("overlay-visible");
        spsm.$overlay.addClass("visible");
      },

      hide: function() {
        spsm.$body.removeClass("overlay-visible");
        spsm.$overlay.removeClass("visible");
      }
    }
  };

  $(function() {
    spsm.initialize();

    // Toggle Overlay when Burger was clicked.
    spsm.$burger.click(function(event) {
      event.preventDefault();
      spsm.overlay.toggle();
    });

    // Close Overlay on ESC key.
    $(document).keyup(function(event) {
      if (event.keyCode == 27) {
        if (spsm.overlay.isVisible()) {
          spsm.overlay.hide();
        }
      }
    });

  });
}());
