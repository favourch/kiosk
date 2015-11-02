function show_b22f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b22f");
	panZoom.enable(0);


	// show floor controls and remove current handlers
	$("#exit_map").removeClass("hidden");
	$("#floor_control").removeClass("hidden");
	$("#floor_up").unbind("click");
	$("#floor_down").unbind("click");
	//enable or disable buttons
	$("#floor_up").prop("disabled",true);
	$("#floor_down").prop("disabled",false);
	// assing actions to click event
	$("#floor_down").click(function(){
		displayMap("csb2",1,"");
    	ion.sound.play(CLICK_SOUND);
	});
	
	// update text
	$("#floor_no").text("2F");


		//var rsr = Raphael('rsr', '920', '617');

var Layer_2 = rsr.set();
var rect_f = rsr.rect(0, 0, 920, 617).attr({fill: '#DBD3C4',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_f');
Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
var group_a = rsr.set();
var rect_g = rsr.rect(559.766, 293.183, 34.116, 34.445).attr({x: '559.766',y: '293.183',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_g');
group_a.attr({'parent': 'Layer_2','name': 'group_a'});
var base = rsr.set();
var path_h = rsr.path("M621.208,259.218l0.359-138.257H256.691l-0.54,368.834h364.876   l0.54-134.67c0,0,47.738,1.033,47.738-47.633C669.306,261.659,621.208,259.218,621.208,259.218z M413.671,359.984h-76.195V255.001   h76.195V359.984z").attr({fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_h');
base.attr({'id': 'base','name': 'base'});
var group_b = rsr.set();
var rect_i = rsr.rect(258.258, 360.914, 50.215, 36.572).attr({x: '258.258',y: '360.914',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_i');
var rect_j = rsr.rect(273.163, 360.914, 29.806, 36.572).attr({x: '273.163',y: '360.914',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_j');
var rect_k = rsr.rect(278.771, 360.913, 18.645, 36.573).attr({x: '278.771',y: '360.913',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_k');
var rect_l = rsr.rect(285.106, 360.913, 6.346, 36.573).attr({x: '285.106',y: '360.913',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_l');
var rect_m = rsr.rect(273.163, 378.172, 35.31, 2.052).attr({x: '273.163',y: '378.172',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_m');
group_b.attr({'parent': 'base','name': 'group_b'});
var group_c = rsr.set();
var rect_n = rsr.rect(571.652, 122.595, 47.821, 65.661).attr({x: '571.652',y: '122.595',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_n');
var rect_o = rsr.rect(571.652, 142.084, 47.821, 38.975).attr({x: '571.652',y: '142.084',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_o');
var rect_p = rsr.rect(571.652, 149.417, 47.824, 24.379).attr({x: '571.652',y: '149.417',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_p');
var rect_q = rsr.rect(571.652, 157.702, 47.824, 8.299).attr({x: '571.652',y: '157.702',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_q');
var rect_r = rsr.rect(594.224, 142.084, 2.685, 46.172).attr({x: '594.224',y: '142.084',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_r');
group_c.attr({'parent': 'base','name': 'group_c'});
var rooms = rsr.set();
var csb2_203 = rsr.rect(257.706, 172.81, 52.062, 43.836).attr({x: '257.706',y: '172.81',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_203');
var cr_222 = rsr.rect(257.706, 121.985, 51.797, 50.825).attr({x: '257.706',y: '121.985',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_222');
var csb2_208 = rsr.rect(309.503, 121.985, 27.736, 50.552).attr({x: '309.503',y: '121.985',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_208');
var csb2_205 = rsr.rect(257.456, 399.518, 156.75, 89.2).attr({x: '257.456',y: '399.518',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_205');
var csb2_206 = rsr.rect(414.206, 399.518, 153.894, 89.2).attr({x: '414.206',y: '399.518',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_206');
var csb2_204 = rsr.rect(257.175, 216.139, 52.592, 91.54).attr({x: '257.175',y: '216.139',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_204');
var cr_221 = rsr.rect(257.175, 307.678, 52.592, 52.306).attr({x: '257.175',y: '307.678',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_221');
var csb2_200 = rsr.rect(414.64, 255.001, 154.392, 104.983).attr({x: '414.64',y: '255.001',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_200');
var csb2_207 = rsr.rect(568.1, 399.518, 51.804, 89.2).attr({x: '568.1',y: '399.518',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_207');
var csb2_202 = rsr.rect(337.239, 121.985, 129.134, 94.154).attr({x: '337.239',y: '121.985',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_202');
var csb2_201 = rsr.rect(465.112, 121.985, 104.999, 94.154).attr({x: '465.112',y: '121.985',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_201');
rooms.attr({'id': 'rooms','name': 'rooms'});
var text = rsr.set();
var csb2_203_label = rsr.text(23, 0, 'SCIENTIA').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '11.6151',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m0.9 0 0 1 262.0684 191.6567").data('id', 'csb2_203_label');
var csb2_208_label = rsr.text(0, -10, 'COMSOC').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '11.6151',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 0.9 311.501 145.2783, r90 0 0").data('id', 'csb2_208_label');
var csb2_201_label = rsr.text(25, -10, '201').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '30.5104',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 492.3613 178.439").data('id', 'csb2_201_label');
var csb2_202_label = rsr.text(25, -10, '202').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '30.5104',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 374.3613 178.439").data('id', 'csb2_202_label');
var csb2_205_label = rsr.text(25, -10, '205').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '30.5104',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 305.0278 453.105").data('id', 'csb2_205_label');
var csb2_206_label = rsr.text(25, -10, '206').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '30.5104',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 467.6748 453.105").data('id', 'csb2_206_label');
var csb2_200_label = rsr.text(0, 0, 'CS/IT\nDEPARTMENT\nFACULTY ROOM').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '16',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 490.9492 300.4263").data('id', 'csb2_200_label');
var csb2_204_label = rsr.text(10, 0, 'CSC').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 271.3613 255.0005").data('id', 'csb2_204_label');
var csb2_207_label = rsr.text(0, -20, 'GUIDANCE\nOFFICE').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '11.6151',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 572.7021 439.0796, r90 0 0").data('id', 'csb2_207_label');
text.attr({'id': 'text','name': 'text'});
var icons = rsr.set();
var path_am = rsr.path("M 300.214,381.439 292.881,388.847 300.214,396.179 300.214,391.356 326.876,391.356    326.876,386.356 300.214,386.356   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_am');
var path_an = rsr.path("M 300.214,361.913 292.881,369.321 300.214,376.653 300.214,371.83 326.876,371.83 326.876,366.83    300.214,366.83   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_an');
var path_ao = rsr.path("M 591.813,173.335 584.404,166.001 577.072,173.335 581.896,173.335 581.896,199.997    586.896,199.997 586.896,173.335   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_ao');
var path_ap = rsr.path("M 615.222,173.335 607.813,166.001 600.481,173.335 605.305,173.335 605.305,199.997    610.305,199.997 610.305,173.335   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_ap');
var text_aq = rsr.text(8, -5, '1F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 332.6074 392.6011").data('id', 'text_aq');
var text_ar = rsr.text(8, -5, '3F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 332.6074 374.2681").data('id', 'text_ar');
var text_as = rsr.text(8, -5, '1F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 576.4248 215.5513").data('id', 'text_as');
var text_at = rsr.text(8, -5, '3F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 601.2588 215.5513").data('id', 'text_at');
icons.attr({'id': 'icons','name': 'icons'});
var group_d = rsr.set();
var path_au = rsr.path("M291.363,143.459c-0.05-0.049-0.106-0.092-0.163-0.133l0.016-0.014l-5.746-5.745v-0.005h-7.642v0.016    l-5.733,5.734l0.016,0.014c-0.057,0.041-0.112,0.082-0.162,0.133c-0.551,0.551-0.551,1.441,0,1.992    c0.549,0.549,1.441,0.549,1.992,0c0.049-0.049,0.091-0.106,0.132-0.162l0.015,0.015l3.741-3.742v7.72v9.242h0.024    c-0.012,0.078-0.024,0.156-0.024,0.236c0,0.885,0.718,1.602,1.601,1.602c0.885,0,1.602-0.717,1.602-1.602    c0-0.08-0.012-0.158-0.023-0.236h0.023v-9.242h1.237v9.242h0.024c-0.013,0.078-0.024,0.156-0.024,0.236    c0,0.885,0.718,1.602,1.601,1.602c0.885,0,1.602-0.717,1.602-1.602c0-0.08-0.012-0.158-0.023-0.236h0.023v-9.242v-7.73    l3.754,3.754l0.016-0.016c0.039,0.056,0.082,0.111,0.132,0.162c0.55,0.551,1.441,0.551,1.992,0    C291.913,144.902,291.913,144.01,291.363,143.459z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_au');
var circle_av = rsr.circle(281, 133, 3).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_av');
group_d.attr({'parent': 'icons','name': 'group_d'});
var group_e = rsr.set();
var path_aw = rsr.path("M292.16,332.012c-0.05-0.049-0.107-0.092-0.164-0.133l0.016-0.014l-5.749-5.748l-0.042,0.042l-0.01-0.042    h-6.222l-0.007,0.031l-0.033-0.033l-5.748,5.75l0.016,0.014c-0.057,0.041-0.112,0.082-0.163,0.133c-0.55,0.551-0.55,1.441,0,1.992    c0.55,0.549,1.442,0.549,1.993,0c0.049-0.049,0.091-0.106,0.131-0.162l0.016,0.015l2.742-2.743l-2.421,11.486h2.946v4.477h0.021    c-0.01,0.078-0.021,0.156-0.021,0.236c0,0.885,0.643,1.602,1.434,1.602c0.792,0,1.434-0.717,1.434-1.602    c0-0.08-0.011-0.158-0.021-0.236h0.021V342.6h1.472v4.477h0.021c-0.01,0.078-0.021,0.156-0.021,0.236    c0,0.885,0.642,1.602,1.434,1.602s1.434-0.717,1.434-1.602c0-0.08-0.011-0.158-0.021-0.236h0.021V342.6h2.948l-2.381-11.528    l2.786,2.786l0.015-0.016c0.04,0.056,0.082,0.111,0.133,0.162c0.549,0.551,1.441,0.551,1.992,0    C292.709,333.455,292.709,332.563,292.16,332.012z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_aw');
var circle_ax = rsr.circle(283, 321, 3).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_ax');
group_e.attr({'parent': 'icons','name': 'group_e'});


var rsrGroups = [Layer_2,group_a,base,group_b,group_c,rooms,text,icons,group_d,group_e];
Layer_2.push(
	rect_f 
);
group_a.push(
	rect_g 
);
base.push(
	path_h 
);
group_b.push(
	rect_i ,
	rect_j ,
	rect_k ,
	rect_l ,
	rect_m 
);
group_c.push(
	rect_n ,
	rect_o ,
	rect_p ,
	rect_q ,
	rect_r 
);
rooms.push(
	csb2_200 ,
	csb2_201 ,
	csb2_202 ,
	csb2_203 ,
	csb2_204 ,
	csb2_205 ,
	csb2_206 ,
	csb2_207 ,
	csb2_208 ,
	cr_222 ,
	cr_221 
);
text.push(
	csb2_200_label ,
	csb2_201_label ,
	csb2_202_label ,
	csb2_203_label ,
	csb2_204_label ,
	csb2_205_label ,
	csb2_206_label ,
	csb2_207_label ,
	csb2_208_label 
);
icons.push(
	path_am ,
	path_an ,
	path_ao ,
	path_ap ,
	text_aq ,
	text_ar ,
	text_as ,
	text_at 
);
group_d.push(
	path_au ,
	circle_av 
);
group_e.push(
	path_aw ,
	circle_ax 
);

	text.attr({
		cursor:"pointer"
	});

	csb2_200_label.data({"val":csb2_200});
	csb2_201_label.data({"val":csb2_201});
	csb2_202_label.data({"val":csb2_202});
	csb2_203_label.data({"val":csb2_203});
	csb2_204_label.data({"val":csb2_204});
	csb2_205_label.data({"val":csb2_205});
	csb2_206_label.data({"val":csb2_206});
	csb2_207_label.data({"val":csb2_207});
	csb2_208_label.data({"val":csb2_208});
	
	var elements = rsrGroups;
	setClickable(rooms);
	setLabelClick(text);
	for (var i = 0, len = elements.length; i < len; i++) {
        var element = elements[i];
        if(element){
            element.click(function(){
                console.log("click function working for \nID : "+this.data('id')+" VALUE : "+this.data('val'));
                //alert("click function working for \nID : "+this.data('id')+" VALUE : "+this.data('val'));
                // showCollegeInfo();
            });
        }
        else{
            console.log("there was an error in element "+i);
        }
    }

    if(highlight!=""){
    	highlightElement(rooms,highlight, "#8E97A5");
    	showRoomInfo(highlight);
	}
	else{
		showBuildingInfo("csb2");
	}
}