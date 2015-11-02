function show_b31f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b31f");
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
		displayMap("csb3",2,"");
    	ion.sound.play(CLICK_SOUND);
	});
	// update text
	$("#floor_no").text("1F");

		//var rsr = Raphael('rsr', '920', '617');

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
var csb3_103 = rsr.rect(400.15, 117.302, 224.308, 92.884).attr({x: '400.15',y: '117.302',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_103');
var csb3_102 = rsr.rect(580.333, 211.353, 91.333, 68).attr({x: '580.333',y: '211.353',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_102');
var csb3_101 = rsr.rect(580.333, 279.353, 91.333, 70.667).attr({x: '580.333',y: '279.353',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_101');
var csb3_107 = rsr.rect(525.666, 397.103, 98.808, 90.512).attr({x: '525.666',y: '397.103',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_107');
var csb3_106 = rsr.rect(394.333, 396.353, 92, 91.157).attr({x: '394.333',y: '396.353',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_106');
var csb3_105 = rsr.rect(294.083, 396.353, 100.25, 91.157).attr({x: '294.083',y: '396.353',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_105');
var csb3_104 = rsr.rect(248.333, 255.561, 90, 140.792).attr({x: '248.333',y: '255.561',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb3_104');
var cr_311 = rsr.path("M 324.609,117.458 294.459,117.458 294.459,210.228    311.357,210.228 311.357,193.947 324.609,193.947   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_311');
var cr_312 = rsr.path("M 324.609,117.458 324.609,193.947 337.205,193.947    337.205,210.228 355.511,210.228 355.511,117.458   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_312');
rooms.attr({'id': 'rooms','name': 'rooms'});
var TEXT = rsr.set();
var csb3_107_label = rsr.text(0, 0, 'RSTC\nOFFICE').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 572.9229 442.4604").data('id', 'csb3_107_label');
var csb3_103_label = rsr.text(40, 0, 'AUDITORIUM').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '25',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 478.8125 168.353").data('id', 'csb3_103_label');
var csb3_102_label = rsr.text(0, 0, 'BIOLOGY\nDEPARTMENT').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 627.5723 239.687").data('id', 'csb3_102_label');
var csb3_101_label = rsr.text(0, 0, 'CHEMISTRY\nDEPARTMENT').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 627.4639 307.687").data('id', 'csb3_101_label');
var csb3_106_label = rsr.text(0, 0, '106').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 442.4258 435.019").data('id', 'csb3_106_label');
var csb3_105_label = rsr.text(0, 0, '105').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 348.7593 437.687").data('id', 'csb3_105_label');
var csb3_104_label = rsr.text(0, 0, '104').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '36',parent: 'TEXT','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 291.6914 318.353").data('id', 'csb3_104_label');
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
var icons_and_guides = rsr.set();
var path_ai = rsr.path("M 396.182,159.828 388.773,152.496 381.441,159.828 386.265,159.828 386.265,186.49 391.265,186.49    391.265,159.828   z").attr({fill: '#BC2833',parent: 'icons_and_guides','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ai');
var path_aj = rsr.path("M 509.015,445.098 516.423,452.431 523.755,445.098 518.932,445.098 518.932,418.436    513.932,418.436 513.932,445.098   z").attr({fill: '#BC2833',parent: 'icons_and_guides','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_aj');
var path_ak = rsr.path("M 681.33,381.758 688.664,374.35 681.33,367.018 681.33,371.841 654.668,371.841 654.668,376.841    681.33,376.841   z").attr({fill: '#BC2833',parent: 'icons_and_guides','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ak');
var text_al = rsr.text(8, -5, '2F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons_and_guides','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 381.6279 201.3843").data('id', 'text_al');
var text_am = rsr.text(8, -5, '2F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons_and_guides','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 509.2012 412.7183").data('id', 'text_am');
var text_an = rsr.text(8, -5, 'CS').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons_and_guides','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 693.2637 379.7183").data('id', 'text_an');
icons_and_guides.attr({'id': 'icons_and_guides','name': 'icons_and_guides'});
var group_d = rsr.set();
var path_ao = rsr.path("M349.769,159.738c-0.049-0.049-0.106-0.091-0.163-0.132l0.016-0.014l-5.746-5.745v-0.004h-7.642v0.016    l-5.734,5.734l0.016,0.014c-0.056,0.041-0.112,0.082-0.163,0.132c-0.55,0.55-0.55,1.441,0,1.992c0.55,0.549,1.442,0.549,1.992,0    c0.049-0.049,0.091-0.106,0.132-0.163l0.014,0.015l3.742-3.742v7.719v9.243h0.024c-0.012,0.078-0.024,0.156-0.024,0.237    c0,0.884,0.717,1.601,1.601,1.601c0.884,0,1.602-0.717,1.602-1.601c0-0.081-0.012-0.159-0.024-0.237h0.024v-9.243h1.237v9.243    h0.024c-0.012,0.078-0.024,0.156-0.024,0.237c0,0.884,0.717,1.601,1.601,1.601c0.885,0,1.602-0.717,1.602-1.601    c0-0.081-0.012-0.159-0.023-0.237h0.023v-9.243v-7.73l3.754,3.754l0.015-0.016c0.04,0.056,0.082,0.112,0.132,0.163    c0.55,0.55,1.441,0.55,1.992,0C350.318,161.18,350.318,160.288,349.769,159.738z").attr({fill: '#FFFFFF',parent: 'icons_and_guides','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_ao');
var circle_ap = rsr.circle(340, 149, 3).attr({fill: '#FFFFFF',parent: 'icons_and_guides','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_ap');
group_d.attr({'parent': 'icons_and_guides','name': 'group_d'});
var group_e = rsr.set();
var path_aq = rsr.path("M318.587,159.738c-0.049-0.049-0.106-0.091-0.163-0.132l0.016-0.014l-5.75-5.749l-0.042,0.042    l-0.009-0.042h-6.222l-0.007,0.032l-0.033-0.033l-5.749,5.75l0.016,0.014c-0.056,0.041-0.112,0.082-0.163,0.132    c-0.55,0.55-0.55,1.441,0,1.992c0.55,0.549,1.442,0.549,1.993,0c0.049-0.049,0.091-0.106,0.132-0.163l0.015,0.015l2.743-2.744    l-2.421,11.487h2.946v4.476h0.021c-0.01,0.078-0.021,0.156-0.021,0.237c0,0.884,0.643,1.601,1.434,1.601s1.434-0.717,1.434-1.601    c0-0.081-0.011-0.159-0.021-0.237h0.021v-4.476h1.471v4.476h0.021c-0.01,0.078-0.021,0.156-0.021,0.237    c0,0.884,0.642,1.601,1.434,1.601s1.434-0.717,1.434-1.601c0-0.081-0.01-0.159-0.021-0.237h0.021v-4.476h2.948l-2.38-11.529    l2.786,2.786l0.015-0.016c0.04,0.056,0.082,0.112,0.132,0.163c0.55,0.55,1.441,0.55,1.992,0    C319.137,161.18,319.137,160.288,318.587,159.738z").attr({fill: '#FFFFFF',parent: 'icons_and_guides','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_aq');
var circle_ar = rsr.circle(309, 149, 3).attr({fill: '#FFFFFF',parent: 'icons_and_guides','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_ar');
group_e.attr({'parent': 'icons_and_guides','name': 'group_e'});


var rsrGroups = [Layer_2,group_a,base,rooms,TEXT,group_b,group_c,icons_and_guides,group_d,group_e];
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
	csb3_101 ,
	csb3_102 ,
	csb3_103 ,
	csb3_104 ,
	csb3_105 ,
	csb3_106 ,
	csb3_107 ,
	cr_311 ,
	cr_312 
);
TEXT.push(
	csb3_101_label ,
	csb3_102_label ,
	csb3_103_label ,
	csb3_104_label ,
	csb3_105_label ,
	csb3_106_label ,
	csb3_107_label 
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
icons_and_guides.push(
	path_ai ,
	path_aj ,
	path_ak ,
	text_al ,
	text_am ,
	text_an 
);
group_d.push(
	path_ao ,
	circle_ap 
);
group_e.push(
	path_aq ,
	circle_ar 
);

	TEXT.attr({
		cursor:"pointer"
	});

	csb3_101_label.data({"val":csb3_101});
	csb3_102_label.data({"val":csb3_102});
	csb3_103_label.data({"val":csb3_103});
	csb3_104_label.data({"val":csb3_104});
	csb3_105_label.data({"val":csb3_105});
	csb3_106_label.data({"val":csb3_106});
	csb3_107_label.data({"val":csb3_107});

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