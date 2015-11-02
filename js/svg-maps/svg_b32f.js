function show_b32f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b32f");
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
		displayMap("csb3",1,"");
    	ion.sound.play(CLICK_SOUND);
	});
	// update text
	$("#floor_no").text("2F");

		// var rsr = Raphael('rsr', '920', '617');

var Layer_2 = rsr.set();
var rect_f = rsr.rect(0, 0, 920, 617).attr({fill: '#DBD3C4',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_f');
Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
var group_a = rsr.set();
var rect_g = rsr.rect(559.766, 293.183, 34.116, 34.445).attr({x: '559.766',y: '293.183',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_g');
group_a.attr({'parent': 'Layer_2','name': 'group_a'});
var base = rsr.set();
var path_h = rsr.path("M625.476,210.179v-93.623H292.917v93.623h-45.584v187.247h45.584   v91.141h332.558v-91.141l47.061,0.057l0.131-187.295L625.476,210.179z M544.707,351.855H376.746v-93.314h167.961V351.855z").attr({fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_h');
base.attr({'id': 'base','name': 'base'});
var rooms = rsr.set();
var csb3_203 = rsr.rect(400.15, 117.302, 105.823, 92.884).attr({x: '400.15',y: '117.302',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_203');
var csb3_201 = rsr.rect(580.333, 211.353, 91.333, 138.667).attr({x: '580.333',y: '211.353',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_201');
var csb3_202 = rsr.rect(505.974, 117.302, 118.484, 92.884).attr({x: '505.974',y: '117.302',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_202');
var csb3_207 = rsr.path("M 624.474,350.02 580.333,350.02 580.333,396.375    580.333,397.103 525.666,397.103 525.666,487.615 624.474,487.615 624.474,407.885 624.474,397.103 624.474,396.375    671.666,396.375 671.666,350.02   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_207');
var csb3_206 = rsr.rect(394.333, 396.353, 92, 91.157).attr({x: '394.333',y: '396.353',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_206');
var csb3_205 = rsr.rect(294.083, 396.353, 100.25, 91.157).attr({x: '294.083',y: '396.353',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_205');
var csb3_204 = rsr.rect(248.333, 255.561, 90, 140.792).attr({x: '248.333',y: '255.561',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_204');
var cr_321 = rsr.path("M 324.609,117.458 294.459,117.458 294.459,210.228    311.357,210.228 311.357,193.947 324.609,193.947   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_321');
var cr_322 = rsr.path("M 324.609,117.458 324.609,193.947 337.205,193.947    337.205,210.228 355.511,210.228 355.511,117.458   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_322');
rooms.attr({'id': 'rooms','name': 'rooms'});
var TEXT = rsr.set();
var csb3_206_label = rsr.text(0, 0, '206').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 442.4258 435.019").data('id', 'csb3_206_label');
var csb3_205_label = rsr.text(0, 0, '205').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 348.7593 437.687").data('id', 'csb3_205_label');
var csb3_201_label = rsr.text(0, 0, '201').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 627.5332 288.3237").data('id', 'csb3_201_label');
var csb3_202_label = rsr.text(0, 0, '202').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 562.1992 155.8237").data('id', 'csb3_202_label');
var csb3_203_label = rsr.text(0, 0, '203').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 454.0469 156.0288").data('id', 'csb3_203_label');
var csb3_204_label = rsr.text(0, 0, '204').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 295 311.7417").data('id', 'csb3_204_label');
var csb3_207_label = rsr.text(0, 0, 'INSTRUMENTATION\nROOM').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m0.8 0 0 1 575 435.4341").data('id', 'csb3_207_label');
TEXT.attr({'id': 'TEXT','name': 'TEXT'});
var group_b = rsr.set();
var rect_y = rsr.rect(356.854, 118.292, 41.949, 51.202).attr({x: '356.854',y: '118.292',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_y');
var rect_z = rsr.rect(356.854, 133.489, 41.949, 30.393).attr({x: '356.854',y: '133.489',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_z');
var rect_aa = rsr.rect(356.854, 139.208, 41.952, 19.011).attr({x: '356.854',y: '139.208',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_aa');
var rect_ab = rsr.rect(356.854, 145.667, 41.952, 6.472).attr({x: '356.854',y: '145.667',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ab');
var rect_ac = rsr.rect(376.654, 133.489, 2.355, 36.004).attr({x: '376.654',y: '133.489',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ac');
group_b.attr({'parent': 'TEXT','name': 'group_b'});
var group_c = rsr.set();
var rect_ad = rsr.rect(487.101, 435.434, 37.69, 51.201).attr({x: '487.101',y: '435.434',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ad');
var rect_ae = rsr.rect(487.101, 441.045, 37.69, 30.393).attr({x: '487.101',y: '441.045',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ae');
var rect_af = rsr.rect(487.098, 446.708, 37.693, 19.011).attr({x: '487.098',y: '446.708',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_af');
var rect_ag = rsr.rect(487.098, 452.788, 37.693, 6.472).attr({x: '487.098',y: '452.788',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ag');
var rect_ah = rsr.rect(504.885, 435.434, 2.116, 36.004).attr({x: '504.885',y: '435.434',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ah');
group_c.attr({'parent': 'TEXT','name': 'group_c'});
var icons = rsr.set();
var path_ai = rsr.path("M 508.937,444.683 516.345,452.017 523.677,444.683 518.854,444.683 518.854,418.021    513.854,418.021 513.854,444.683   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ai');
var path_aj = rsr.path("M 488.437,444.683 495.845,452.017 503.177,444.683 498.354,444.683 498.354,418.021    493.354,418.021 493.354,444.683   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_aj');
var path_ak = rsr.path("M 373.813,159.829 366.404,152.495 359.072,159.829 363.896,159.829 363.896,186.492    368.896,186.492 368.896,159.829   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ak');
var path_al = rsr.path("M 396.146,159.829 388.738,152.495 381.406,159.829 386.229,159.829 386.229,186.492    391.229,186.492 391.229,159.829   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_al');
var text_am = rsr.text(8, -5, '1F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 359.2588 204.1011").data('id', 'text_am');
var text_an = rsr.text(8, -5, '3F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 381.5928 204.1011").data('id', 'text_an');
var text_ao = rsr.text(8, -5, '1F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 488.6504 411.605").data('id', 'text_ao');
var text_ap = rsr.text(8, -5, '3F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 510.9844 411.605").data('id', 'text_ap');
icons.attr({'id': 'icons','name': 'icons'});
var group_d = rsr.set();
var path_aq = rsr.path("M348.041,161.925c-0.05-0.049-0.106-0.092-0.163-0.133l0.016-0.014l-5.746-5.745v-0.005h-7.642v0.016    l-5.733,5.734l0.016,0.014c-0.057,0.041-0.112,0.082-0.162,0.133c-0.551,0.551-0.551,1.441,0,1.992    c0.549,0.549,1.441,0.549,1.992,0c0.049-0.049,0.091-0.106,0.132-0.162l0.015,0.015l3.741-3.742v7.72v9.242h0.024    c-0.012,0.078-0.024,0.156-0.024,0.236c0,0.885,0.718,1.602,1.601,1.602c0.885,0,1.602-0.717,1.602-1.602    c0-0.08-0.012-0.158-0.023-0.236h0.023v-9.242h1.237v9.242h0.024c-0.013,0.078-0.024,0.156-0.024,0.236    c0,0.885,0.718,1.602,1.601,1.602c0.885,0,1.602-0.717,1.602-1.602c0-0.08-0.012-0.158-0.023-0.236h0.023v-9.242v-7.73    l3.754,3.754l0.016-0.016c0.039,0.056,0.082,0.111,0.132,0.162c0.55,0.551,1.441,0.551,1.992,0    C348.591,163.368,348.591,162.476,348.041,161.925z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_aq');
var circle_ar = rsr.circle(338, 151, 3).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_ar');
group_d.attr({'parent': 'icons','name': 'group_d'});
var group_e = rsr.set();
var path_as = rsr.path("M316.93,161.925c-0.05-0.049-0.107-0.092-0.164-0.133l0.016-0.014l-5.749-5.748l-0.042,0.042l-0.01-0.042    h-6.222l-0.007,0.031l-0.033-0.033l-5.748,5.75l0.016,0.014c-0.057,0.041-0.112,0.082-0.163,0.133c-0.55,0.551-0.55,1.441,0,1.992    c0.55,0.549,1.442,0.549,1.993,0c0.049-0.049,0.091-0.106,0.131-0.162l0.016,0.015l2.742-2.743l-2.421,11.486h2.946v4.477h0.021    c-0.01,0.078-0.021,0.156-0.021,0.236c0,0.885,0.643,1.602,1.434,1.602c0.792,0,1.434-0.717,1.434-1.602    c0-0.08-0.011-0.158-0.021-0.236h0.021v-4.477h1.472v4.477h0.021c-0.01,0.078-0.021,0.156-0.021,0.236    c0,0.885,0.642,1.602,1.434,1.602s1.434-0.717,1.434-1.602c0-0.08-0.011-0.158-0.021-0.236h0.021v-4.477h2.948l-2.381-11.528    l2.786,2.786l0.015-0.016c0.04,0.056,0.082,0.111,0.133,0.162c0.549,0.551,1.441,0.551,1.992,0    C317.479,163.368,317.479,162.476,316.93,161.925z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_as');
var circle_at = rsr.circle(307, 151, 3).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_at');
group_e.attr({'parent': 'icons','name': 'group_e'});


var rsrGroups = [Layer_2,group_a,base,rooms,TEXT,group_b,group_c,icons,group_d,group_e];
Layer_2.push(
	rect_f 
);
group_a.push(
	rect_g 
);
base.push(
	path_h 
);
rooms.push(
	csb3_207 ,
	csb3_201 ,
	csb3_202 ,
	csb3_203 ,
	csb3_204 ,
	csb3_205 ,
	csb3_206 ,
	cr_321 ,
	cr_322 
);
TEXT.push(
	csb3_207_label ,
	csb3_201_label ,
	csb3_202_label ,
	csb3_203_label ,
	csb3_204_label ,
	csb3_205_label ,
	csb3_206_label 
);
group_b.push(
	rect_y ,
	rect_z ,
	rect_aa ,
	rect_ab ,
	rect_ac 
);
group_c.push(
	rect_ad ,
	rect_ae ,
	rect_af ,
	rect_ag ,
	rect_ah 
);
icons.push(
	path_ai ,
	path_aj ,
	path_ak ,
	path_al ,
	text_am ,
	text_an ,
	text_ao ,
	text_ap 
);
group_d.push(
	path_aq ,
	circle_ar 
);
group_e.push(
	path_as ,
	circle_at 
);

	TEXT.attr({
		cursor:"pointer"
	});

	csb3_207_label.data({"val":csb3_207});
	csb3_201_label.data({"val":csb3_201});
	csb3_202_label.data({"val":csb3_202});
	csb3_203_label.data({"val":csb3_203});
	csb3_204_label.data({"val":csb3_204});
	csb3_205_label.data({"val":csb3_205});
	csb3_206_label.data({"val":csb3_206});

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
		showBuildingInfo("csb3");
	}
}