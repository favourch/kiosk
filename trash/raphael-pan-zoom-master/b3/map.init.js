jQuery(function ($) {
    var inDetails = false;
    var container = $("#map");
    var r = Raphael('map', container.width(), container.height());
    var panZoom = r.panzoom({ initialZoom: 5, initialPosition: { x: 0, y: 0} });
    
    panZoom.enable();
    r.safari();

    var attributes = {
        fill: '#F1F1F1',
        stroke: '#FFFFFF',
        'stroke-width': 2,
        'stroke-linejoin': 'round'
    };


    var arr = [];

    var overlay = r.rect(0, 0, r.width, r.height);
    overlay.attr({ fill: '#909090', 'fill-opacity': 1, "stroke-width": 0, stroke: '#FFFFFF' });
    for (var country in paths) {
        var obj;
	    
        if (paths[country].path.constructor == Array) {
            obj = r.set();
            for (var i = 0; i < paths[country].path.length; i++) {
                var pt = r.path(paths[country].path[i]);
                obj.push(pt);
            }
        }
        else {
            obj = r.path(paths[country].path);
        }
		
        obj.attr(attributes);
		if(paths[country].hoverable=="true"){
		    obj.data("hoverFill", "#4488FF");
            obj.data('fill', "#E1E1E1");
            obj.click(select_building);

            attributes['fill'] = "#E1E1E1";

            
		    obj.hover(animateOver, animateOut);
            
		}
        
        //arr[paths[country].name] = obj;
    }

    $("#mapContainer #up").click(function (e) {
        panZoom.zoomIn(1);
        e.preventDefault();
    });

    $("#mapContainer #down").click(function (e) {
        panZoom.zoomOut(1);
        e.preventDefault();
    });
	
    function animateOver() {
        if (this.data("hoverFill")) {
            this.attr("fill", this.data("hoverFill"));
        }
    }

    function animateOut() {
        if (this.data("fill")) {
            this.attr("fill", this.data("fill"));
        }
    }
    function select_building() {
        console.log("finished");
        alert(this.data("hoverFill"));
        //window.location = "menu.html";
    }

});