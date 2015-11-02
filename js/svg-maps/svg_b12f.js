function show_b12f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b12f");
	panZoom.enable(0);


	// show floor controls and remove current handlers
	$("#exit_map").removeClass("hidden");
	$("#floor_control").removeClass("hidden");
	$("#floor_up").unbind("click");
	$("#floor_down").unbind("click");
	//enable or disable buttons
	$("#floor_up").prop("disabled",false);
	$("#floor_down").prop("disabled",false);
	// assing actions to click event
	$("#floor_up").click(function(){
		displayMap("csb1",3,"");
    	ion.sound.play(CLICK_SOUND);

	});
	$("#floor_down").click(function(){
		displayMap("csb1",1,"");
    	ion.sound.play(CLICK_SOUND);

	});
	// update text
	$("#floor_no").text("2F");
		//var rsr = Raphael('rsr', '920', '617');

var Layer_2 = rsr.set();
var rect_f = rsr.rect(0, 0, 920, 617).attr({fill: '#DBD3C4',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_f');
Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
var base = rsr.set();
var path_g = rsr.path("M 152.746,151.372 152.746,291.512 255.847,291.512    255.847,364.081 732.251,364.081 732.251,291.512 732.251,180.943 732.251,151.372   z").attr({fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_g');
var rect_h = rsr.rect(608.973, 151.372, 123.278, 212.704).attr({x: '608.973',y: '151.372',fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_h');
var rect_i = rsr.rect(595.166, 239.97, 23.25, 29.014).attr({x: '595.166',y: '239.97',fill: '#FDFDFE',parent: 'base','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_i');
base.attr({'id': 'base','name': 'base'});
var group_a = rsr.set();
var rect_j = rsr.rect(669.431, 222.718, 60.372, 53.5).attr({x: '669.431',y: '222.718',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_j');
var rect_k = rsr.rect(669.431, 238.597, 60.372, 31.759).attr({x: '669.431',y: '238.597',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_k');
var rect_l = rsr.rect(669.431, 244.573, 60.376, 19.867).attr({x: '669.431',y: '244.573',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_l');
var rect_m = rsr.rect(669.431, 251.324, 60.376, 6.763).attr({x: '669.431',y: '251.324',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_m');
var rect_n = rsr.rect(697.926, 238.597, 3.391, 37.621).attr({x: '697.926',y: '238.597',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_n');
group_a.attr({'parent': 'base','name': 'group_a'});
var rooms = rsr.set();
var cr_123 = rsr.path("M 207.223,204.86 207.223,187.367 153.778,187.367    153.778,224.097 224.612,224.097 224.612,204.86   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_123');
var cr_124 = rsr.path("M 207.223,169.874 224.612,169.874 224.612,152.38    153.778,152.38 153.778,187.367 207.223,187.367   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_124');
var strg_121 = rsr.rect(224.612, 152.38, 35.421, 17.493).attr({x: '224.612',y: '152.38',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'strg_121');
var csb1_203 = rsr.rect(259.791, 152.415, 111.061, 77.97).attr({x: '259.791',y: '152.415',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_203');
var csb1_204 = rsr.rect(257.223, 254.571, 85.423, 108.272).attr({x: '257.223',y: '254.571',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_204');
var csb1_205 = rsr.rect(342.646, 254.571, 138.2, 108.272).attr({x: '342.646',y: '254.571',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_205');
var csb1_206 = rsr.rect(480.846, 275.39, 63.128, 87.453).attr({x: '480.846',y: '275.39',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_206');
var csb1_207 = rsr.rect(543.974, 275.39, 63.832, 87.453).attr({x: '543.974',y: '275.39',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_207');
var csb1_202 = rsr.rect(370.852, 152.415, 111.063, 77.97).attr({x: '370.852',y: '152.415',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_202');
var csb1_201 = rsr.rect(481.915, 152.415, 125.558, 77.97).attr({x: '481.915',y: '152.415',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_201');
var cr_122 = rsr.path("M 682.313,186.862 682.313,204.131 666.023,204.131    666.023,221.399 731.119,221.399 731.119,186.862   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_122');
var cr_121 = rsr.path("M 666.023,152.415 666.023,169.683 682.313,169.683    682.313,186.952 731.119,186.952 731.119,152.415   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_121');
var strg_122 = rsr.rect(153.778, 224.097, 71.014, 66.33).attr({x: '153.778',y: '224.097',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'strg_122');
rooms.attr({'id': 'rooms','name': 'rooms'});
var text = rsr.set();
var csb1_205_label = rsr.text(0, 0, 'IMO').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '41.8716',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 410 315.1265").data('id', 'csb1_205_label');
var csb1_204_label = rsr.text(0, 0, 'Server\nRoom').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '14.8211',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 296.3657 299.4956").data('id', 'csb1_204_label');
var csb1_203_label = rsr.text(0, 0, 'IT Training\nRoom').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '14.8211',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 315.9038 189.6084").data('id', 'csb1_203_label');
var strg_122_label = rsr.text(0, 0, 'Storage').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '14.8211',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 188.2397 255.2383").data('id', 'strg_122_label');
var strg_121_label = rsr.text(0, 0, 'Storage').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '8.6213',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 243.2246 160").data('id', 'strg_121_label');
var csb1_202_label = rsr.text(0, 0, 'IT Training\nRoom').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '14.8211',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 425.9658 189.6084").data('id', 'csb1_202_label');
var csb1_201_label = rsr.text(0, 0, 'IT Training\nRoom').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '14.8211',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 543.5566 189.6084").data('id', 'csb1_201_label');
var csb1_206_label = rsr.text(0, 0, 'IMO\nDirector’s\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 515.126 307.2261").data('id', 'csb1_206_label');
var csb1_207_label = rsr.text(0, 0, 'Conference\nRoom').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '10',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 575.4326 308.021").data('id', 'csb1_207_label');
text.attr({'id': 'text','name': 'text'});
var icons = rsr.set();
var text_ak = rsr.text(8, -3, '3F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 708.6299 301.2866").data('id', 'text_ak');
var path_al = rsr.path("M 723.184,258.483 715.775,251.149 708.443,258.483 713.267,258.483 713.267,285.146    718.267,285.146 718.267,258.483   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_al');
var text_am = rsr.text(8, -3, '1F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 675.1299 301.2866").data('id', 'text_am');
var path_an = rsr.path("M 689.684,258.483 682.275,251.149 674.943,258.483 679.767,258.483 679.767,285.146    684.767,285.146 684.767,258.483   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_an');
icons.attr({'id': 'icons','name': 'icons'});
var group_b = rsr.set();
var path_ao = rsr.path("M715.185,203.617c-0.045-0.042-0.094-0.08-0.144-0.116l0.014-0.012l-4.994-4.994v-0.004h-6.643v0.013    l-4.985,4.985l0.014,0.012c-0.049,0.036-0.097,0.071-0.142,0.116c-0.479,0.479-0.479,1.253,0,1.731    c0.478,0.478,1.254,0.478,1.732,0c0.043-0.042,0.08-0.092,0.116-0.141l0.012,0.013l3.253-3.253v6.711v8.034h0.021    c-0.01,0.068-0.021,0.136-0.021,0.206c0,0.769,0.623,1.392,1.391,1.392c0.77,0,1.392-0.623,1.392-1.392    c0-0.07-0.01-0.138-0.02-0.206h0.02v-8.034h1.076v8.034h0.021c-0.01,0.068-0.021,0.136-0.021,0.206    c0,0.769,0.624,1.392,1.391,1.392c0.77,0,1.394-0.623,1.394-1.392c0-0.07-0.011-0.138-0.021-0.206h0.021v-8.034v-6.72l3.263,3.263    l0.014-0.013c0.033,0.048,0.071,0.097,0.115,0.141c0.478,0.479,1.253,0.479,1.732,0    C715.661,204.871,715.661,204.096,715.185,203.617z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_ao');
var circle_ap = rsr.circle(706, 194, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_ap');
group_b.attr({'parent': 'icons','name': 'group_b'});
var group_c = rsr.set();
var path_aq = rsr.path("M192.097,168.292c-0.045-0.042-0.094-0.079-0.144-0.116l0.014-0.012l-4.994-4.994v-0.004h-6.643v0.014    l-4.985,4.984l0.014,0.012c-0.049,0.037-0.097,0.072-0.142,0.116c-0.479,0.479-0.479,1.253,0,1.731    c0.478,0.478,1.254,0.478,1.732,0c0.043-0.042,0.08-0.092,0.116-0.141l0.012,0.013l3.253-3.253v6.711v8.034h0.021    c-0.01,0.067-0.021,0.136-0.021,0.206c0,0.769,0.623,1.392,1.391,1.392c0.77,0,1.392-0.623,1.392-1.392    c0-0.07-0.01-0.139-0.02-0.206h0.02v-8.034h1.076v8.034h0.021c-0.01,0.067-0.021,0.136-0.021,0.206    c0,0.769,0.624,1.392,1.391,1.392c0.77,0,1.394-0.623,1.394-1.392c0-0.07-0.011-0.139-0.021-0.206h0.021v-8.034v-6.721    l3.263,3.264l0.014-0.014c0.033,0.049,0.071,0.098,0.115,0.141c0.478,0.479,1.253,0.479,1.732,0    C192.573,169.546,192.573,168.772,192.097,168.292z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_aq');
var circle_ar = rsr.circle(183, 159, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_ar');
group_c.attr({'parent': 'icons','name': 'group_c'});
var group_d = rsr.set();
var path_as = rsr.path("M713.601,168.376c-0.043-0.042-0.091-0.078-0.139-0.112l0.013-0.012l-4.859-4.859l-0.036,0.036    l-0.008-0.036h-5.26l-0.005,0.026l-0.028-0.028l-4.859,4.86l0.014,0.012c-0.048,0.035-0.095,0.069-0.138,0.112    c-0.465,0.465-0.465,1.218,0,1.684c0.465,0.464,1.219,0.464,1.685,0c0.041-0.042,0.077-0.09,0.11-0.137l0.014,0.012l2.317-2.319    l-2.046,9.709h2.49v3.784h0.019c-0.009,0.066-0.019,0.132-0.019,0.2c0,0.748,0.543,1.354,1.212,1.354    c0.67,0,1.212-0.606,1.212-1.354c0-0.067-0.009-0.134-0.019-0.2h0.019v-3.784h1.244v3.784h0.018    c-0.009,0.066-0.018,0.132-0.018,0.2c0,0.748,0.542,1.354,1.212,1.354c0.669,0,1.212-0.606,1.212-1.354    c0-0.067-0.01-0.134-0.018-0.2h0.018v-3.784h2.492l-2.013-9.745l2.355,2.355l0.012-0.013c0.034,0.047,0.069,0.094,0.112,0.137    c0.464,0.465,1.219,0.465,1.685,0C714.064,169.595,714.064,168.841,713.601,168.376z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_as');
var circle_at = rsr.circle(705, 159, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_at');
group_d.attr({'parent': 'icons','name': 'group_d'});
var group_e = rsr.set();
var path_au = rsr.path("M191.309,204.194c-0.043-0.041-0.091-0.077-0.139-0.111l0.013-0.012l-4.859-4.859l-0.036,0.035    l-0.008-0.035h-5.26l-0.005,0.026l-0.028-0.028l-4.859,4.861l0.014,0.012c-0.048,0.034-0.095,0.068-0.138,0.111    c-0.465,0.466-0.465,1.219,0,1.685c0.465,0.464,1.219,0.464,1.685,0c0.041-0.042,0.077-0.091,0.11-0.138l0.014,0.013l2.317-2.319    l-2.046,9.71h2.49v3.784h0.019c-0.009,0.066-0.019,0.133-0.019,0.199c0,0.748,0.543,1.354,1.212,1.354    c0.67,0,1.212-0.606,1.212-1.354c0-0.066-0.009-0.133-0.019-0.199h0.019v-3.784h1.244v3.784h0.018    c-0.009,0.066-0.018,0.133-0.018,0.199c0,0.748,0.542,1.354,1.212,1.354c0.669,0,1.212-0.606,1.212-1.354    c0-0.066-0.01-0.133-0.018-0.199h0.018v-3.784h2.492l-2.013-9.745l2.355,2.355l0.012-0.014c0.034,0.047,0.069,0.095,0.112,0.138    c0.464,0.466,1.219,0.466,1.685,0C191.773,205.414,191.773,204.66,191.309,204.194z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_au');
var circle_av = rsr.circle(183, 195, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_av');
group_e.attr({'parent': 'icons','name': 'group_e'});


var rsrGroups = [Layer_2,base,group_a,rooms,text,icons,group_b,group_c,group_d,group_e];
Layer_2.push(
	rect_f 
);
base.push(
	path_g ,
	rect_h ,
	rect_i 
);
group_a.push(
	rect_j ,
	rect_k ,
	rect_l ,
	rect_m ,
	rect_n 
);
rooms.push(
	cr_121 ,
	cr_122 ,
	cr_123 ,
	cr_124 ,
	csb1_201 ,
	csb1_202 ,
	csb1_203 ,
	csb1_204 ,
	csb1_205 ,
	csb1_206 ,
	csb1_207 ,
	strg_121 ,
	strg_122 
);
text.push(
	csb1_201_label ,
	csb1_202_label ,
	csb1_203_label ,
	csb1_204_label ,
	csb1_205_label ,
	csb1_206_label ,
	csb1_207_label ,
	strg_121_label ,
	strg_122_label 
);
icons.push(
	text_ak ,
	path_al ,
	text_am ,
	path_an 
);
group_b.push(
	path_ao ,
	circle_ap 
);
group_c.push(
	path_aq ,
	circle_ar 
);
group_d.push(
	path_as ,
	circle_at 
);
group_e.push(
	path_au ,
	circle_av 
);

	
	text.attr({
		cursor:"pointer"
	});

	csb1_201_label.data({"val":csb1_201});
	csb1_202_label.data({"val":csb1_202});
	csb1_203_label.data({"val":csb1_203});
	csb1_204_label.data({"val":csb1_204});
	csb1_205_label.data({"val":csb1_205});
	csb1_206_label.data({"val":csb1_206});
	csb1_207_label.data({"val":csb1_207});
	strg_121_label.data({"val":strg_121});
	strg_122_label.data({"val":strg_122});

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
		showBuildingInfo("csb1");
	}	
}