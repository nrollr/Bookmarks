(function( $ ) {
  $.fn.dd_select = function( options ) {
    var opts = $.extend({}, $.fn.dd_select.defaults, options);

    var dd_li = this.find("li");
    
    var current_a_node = this.find("> a");
    var icon_node = null;
    var caret_node = null;
    var selected_item_html = null;

    var current_text = null;
    var current_href = null;

    var updated_href = null;
    var updated_text = null;

    var icon = null;
    var selected_str = null;

    if ($( current_a_node, " i").length > 0 )
    {
    	var icon_class = $(current_a_node).find("> i").attr("class");
    }

    var set_hidden_field = function(hiddenFieldName, formID) {
        val = updated_href.replace("#","");
        $("input[name=" + hiddenFieldName + "]").val( val );
    }

    return dd_li.on("click", "a", function(){
    	var that = this;
    	var o = opts;
        var default_option = o.default;
    	var caret_node = "&nbsp;<span class='caret'></span>";
    	var prefix = (o.prefix) ? o.prefix : null;
        var hiddenFieldName = (o.hiddenFieldName) ? o.hiddenFieldName : null;
        var formID = (o.formID) ? o.formID : null;
        var submitOnChange = (o.submitOnChange) ? o.submitOnChange : null;
        var ajax_call = (o.ajax_call) ? o.ajax_call : null;

	    if ( icon_class ) {
	    	icon_node = "<i class='" + icon_class + "'></i> ";
	    }

    	tmp_current_text = $(current_a_node).text();
    	current_text = tmp_current_text.replace(prefix,'');
    	current_href = $(current_a_node).attr("href");
    	updated_href = $(this).attr("href");
    	updated_text = $(this).text();

        if (current_href == "#") {
            console.log("empty")
        }

        if ( hiddenFieldName && formID) {
            set_hidden_field( hiddenFieldName, formID );
        }

        if (submitOnChange && formID) {
            ajax_call.call();
        }

    	if (icon_class)
    	{
    		selected_str = icon_node;
    	}
    	
    	if (prefix)
    	{
    		selected_str += prefix;
    	}

    	selected_str += updated_text + caret_node;

    	$(current_a_node).html(selected_str);

    	$(current_a_node).attr("href", updated_href);

    	if (current_href != "#") 
    	{
    		$(this).attr("href", current_href);
	 		$(this).text(current_text);
	 	} else {
	 		$(this).attr("href", "#");
	 		$(this).html("&nbsp;");
	 	}

    });      
  };

  $.fn.dd_select.defaults = {
  		formID: null,
  		prefix: null,
  		submitOnChange: false,
  		hiddenFieldName: null
  };
})( jQuery );