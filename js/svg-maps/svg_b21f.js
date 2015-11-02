function show_b21f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b21f");
	panZoom.enable(0);


	// show floor controls and remove current handlers
	$("#exit_map").removeClass("hidden");
	$("#floor_control").removeClass("hidden");
	$("#floor_up").unbind("click");
	$("#floor_down").unbind("click");
	//enable or disable buttons
	$("#floor_up").prop("disabled",false);
	$("#floor_down").prop("disabled",true);
	// assing actions to click event
	$("#floor_up").click(function(){
		displayMap("csb2",2,"");
    	ion.sound.play(CLICK_SOUND);

	});
	// update text
	$("#floor_no").text("1F");


		// var rsr = Raphael('rsr', '920', '617');

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
var csb2_104 = rsr.rect(257.456, 399.518, 104.25, 89.2).attr({x: '257.456',y: '399.518',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_104');
var csb2_105 = rsr.rect(399.634, 399.518, 116.797, 89.2).attr({x: '399.634',y: '399.518',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_105');
var cr_211 = rsr.rect(257.175, 255.19, 52.592, 52.488).attr({x: '257.175',y: '255.19',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_211');
var cr_212 = rsr.rect(257.175, 307.678, 52.592, 52.306).attr({x: '257.175',y: '307.678',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_212');
var csb2_100 = rsr.rect(414.64, 255.001, 154.392, 104.983).attr({x: '414.64',y: '255.001',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_100');
var csb2_108 = rsr.rect(568.1, 399.518, 51.804, 89.2).attr({x: '568.1',y: '399.518',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_108');
var rect_y = rsr.rect(515.839, 399.518, 51.804, 89.2).attr({x: '515.839',y: '399.518',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_y');
var csb2_107 = rsr.rect(516.296, 399.518, 51.804, 89.2).attr({x: '516.296',y: '399.518',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_107');
var csb2_101 = rsr.rect(465.112, 121.985, 104.999, 94.154).attr({x: '465.112',y: '121.985',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_101');
var csb2_109 = rsr.path("M 620.64,121.985 593.223,121.985 584.777,121.985    571.652,121.985 571.652,202.468 593.223,202.468 593.223,141.343 620.64,141.343   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_109');
var csb2_102 = rsr.rect(361.706, 121.985, 104.999, 94.154).attr({x: '361.706',y: '121.985',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_102');
var csb2_103 = rsr.rect(257.268, 121.985, 104.999, 94.154).attr({x: '257.268',y: '121.985',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb2_103');
rooms.attr({'id': 'rooms','name': 'rooms'});
var TEXT = rsr.set();
var csb2_101_label = rsr.text(25, -10, '101').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '30.5104',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 492.3613 178.439").data('id', 'csb2_101_label');
var csb2_109_label = rsr.text(25, -5, 'CIRCUITS').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '15',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m0.8721 0 0 1 576.834 135.6602, r90 0 0").data('id', 'csb2_109_label');
var csb2_102_label = rsr.text(25, -10, '102').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '30.5104',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 388.3613 178.439").data('id', 'csb2_102_label');
var csb2_103_label = rsr.text(0, 0, 'EXTENSION\nOFFICE').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '11.6151',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 310.0566 164.2051").data('id', 'csb2_103_label');
var csb2_104_label = rsr.text(25, -10, '104').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '30.5104',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 284.9951 453.105").data('id', 'csb2_104_label');
var csb2_105_label = rsr.text(25, -10, '105').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '30.5104',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 435.3252 453.105").data('id', 'csb2_105_label');
var csb2_100_label = rsr.text(55, -10, 'CANTEEN').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '27.3372',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 437.3125 319.0171").data('id', 'csb2_100_label');
var csb2_108_label = rsr.text(0, -20, 'TECHNICAL\nROOM').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '11.6151',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 571.584 439.0796,r90 0 0").data('id', 'csb2_108_label');
var csb2_107_label = rsr.text(0, -20, 'CS\nOFFICE').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '11.6151',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 528.7422 439.0796,r90 0 0").data('id', 'csb2_107_label');
TEXT.attr({'id': 'TEXT','name': 'TEXT'});
var icons = rsr.set();
var text_an = rsr.text(7, -3, '2F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 600.4824 216.1382").data('id', 'text_an');
var text_ao = rsr.text(7, -3, '2F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 329.9404 374.1011").data('id', 'text_ao');
var text_ap = rsr.text(7, -3, 'CS').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 689.9316 313.3667").data('id', 'text_ap');
var path_aq = rsr.path("M 678.971,315.87 686.303,308.461 678.971,301.129 678.971,305.953 652.309,305.953 652.309,310.953    678.971,310.953   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_aq');
var path_ar = rsr.path("M 298.807,362.105 291.474,369.513 298.807,376.845 298.807,372.022 325.469,372.022    325.469,367.022 298.807,367.022   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ar');
var path_as = rsr.path("M 615.036,173.335 607.628,166.001 600.296,173.335 605.119,173.335 605.119,199.997    610.119,199.997 610.119,173.335   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_as');
icons.attr({'id': 'icons','name': 'icons'});
var group_d = rsr.set();
var path_at = rsr.path("M291.583,332.011c-0.05-0.049-0.106-0.092-0.163-0.133l0.016-0.014l-5.746-5.745v-0.005h-7.642v0.016    l-5.733,5.734l0.016,0.014c-0.057,0.041-0.112,0.082-0.162,0.133c-0.551,0.551-0.551,1.441,0,1.992    c0.549,0.549,1.441,0.549,1.992,0c0.049-0.049,0.091-0.106,0.132-0.162l0.015,0.015l3.741-3.742v7.72v9.242h0.024    c-0.012,0.078-0.024,0.156-0.024,0.236c0,0.885,0.718,1.602,1.601,1.602c0.885,0,1.602-0.717,1.602-1.602    c0-0.08-0.012-0.158-0.023-0.236h0.023v-9.242h1.237v9.242h0.024c-0.013,0.078-0.024,0.156-0.024,0.236    c0,0.885,0.718,1.602,1.601,1.602c0.885,0,1.602-0.717,1.602-1.602c0-0.08-0.012-0.158-0.023-0.236h0.023v-9.242v-7.73    l3.754,3.754l0.016-0.016c0.039,0.056,0.082,0.111,0.132,0.162c0.55,0.551,1.441,0.551,1.992,0    C292.133,333.454,292.133,332.562,291.583,332.011z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_at');
var circle_au = rsr.circle(281, 321, 3).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'circle_au');
group_d.attr({'parent': 'icons','name': 'group_d'});
var group_e = rsr.set();
var path_av = rsr.path("M292.419,279.616c-0.05-0.049-0.107-0.092-0.164-0.133l0.016-0.014l-5.749-5.748l-0.042,0.042l-0.01-0.042    h-6.222l-0.007,0.031l-0.033-0.033l-5.748,5.75l0.016,0.014c-0.057,0.041-0.112,0.082-0.163,0.133c-0.55,0.551-0.55,1.441,0,1.992    c0.55,0.549,1.442,0.549,1.993,0c0.049-0.049,0.091-0.106,0.131-0.162l0.016,0.015l2.742-2.743l-2.421,11.486h2.946v4.477h0.021    c-0.01,0.078-0.021,0.156-0.021,0.236c0,0.885,0.643,1.602,1.434,1.602c0.792,0,1.434-0.717,1.434-1.602    c0-0.08-0.011-0.158-0.021-0.236h0.021v-4.477h1.472v4.477h0.021c-0.01,0.078-0.021,0.156-0.021,0.236    c0,0.885,0.642,1.602,1.434,1.602s1.434-0.717,1.434-1.602c0-0.08-0.011-0.158-0.021-0.236h0.021v-4.477h2.948l-2.381-11.528    l2.786,2.786l0.015-0.016c0.04,0.056,0.082,0.111,0.133,0.162c0.549,0.551,1.441,0.551,1.992,0    C292.968,281.058,292.968,280.167,292.419,279.616z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_av');
var circle_aw = rsr.circle(283, 269, 3).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'circle_aw');
group_e.attr({'parent': 'icons','name': 'group_e'});


var rsrGroups = [Layer_2,group_a,base,group_b,group_c,rooms,TEXT,icons,group_d,group_e];
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
	csb2_100 ,
	csb2_101 ,
	csb2_102 ,
	csb2_103 ,
	csb2_105 ,
	csb2_104 ,
	csb2_107 ,
	csb2_108 ,
	csb2_109 ,
	cr_211 ,
	cr_212 ,
	rect_y 
);
TEXT.push(
	csb2_100_label ,
	csb2_101_label ,
	csb2_102_label ,
	csb2_103_label ,
	csb2_105_label ,
	csb2_104_label ,
	csb2_107_label ,
	csb2_108_label ,
	csb2_109_label 
);
icons.push(
	text_an ,
	text_ao ,
	text_ap ,
	path_aq ,
	path_ar ,
	path_as 
);
group_d.push(
	path_at ,
	circle_au 
);
group_e.push(
	path_av ,
	circle_aw 
);
	csb2_101.data({"val":"yes im here"}); 


	TEXT.attr({
		cursor:"pointer"
	});

	csb2_100_label.data({"val":csb2_100});
	csb2_101_label.data({"val":csb2_101});
	csb2_102_label.data({"val":csb2_102});
	csb2_103_label.data({"val":csb2_103});
	csb2_105_label.data({"val":csb2_105});
	csb2_104_label.data({"val":csb2_104});
	csb2_107_label.data({"val":csb2_107});
	csb2_108_label.data({"val":csb2_108});
	csb2_109_label.data({"val":csb2_109});

	var elements = rsrGroups;
	setClickable(rooms);
	setLabelClick(TEXT);
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
    //TEXT.hide();
}