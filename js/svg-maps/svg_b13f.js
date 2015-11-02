function show_b13f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b13f");
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
		displayMap("csb1",2,"");
    	ion.sound.play(CLICK_SOUND);

	});
	// update text
	$("#floor_no").text("3F");
		//var rsr = Raphael('rsr', '920', '617');

var Layer_2 = rsr.set();
var rect_f = rsr.rect(0, 0, 920, 617).attr({fill: '#DBD3C4',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_f');
Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
var base = rsr.set();
var path_g = rsr.path("M 152.746,151.372 152.746,291.512 255.847,291.512    255.847,364.081 732.251,364.081 732.251,291.512 732.251,180.943 732.251,151.372   z").attr({fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_g');
var rect_h = rsr.rect(475.073, 365.076, 257.178, 59.474).attr({x: '475.073',y: '365.076',fill: '#5A5C7D',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_h');
base.attr({'id': 'base','name': 'base'});
var group_a = rsr.set();
var rect_i = rsr.rect(669.431, 222.718, 60.372, 53.5).attr({x: '669.431',y: '222.718',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_i');
var rect_j = rsr.rect(669.431, 238.597, 60.372, 31.759).attr({x: '669.431',y: '238.597',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_j');
var rect_k = rsr.rect(669.431, 244.573, 60.376, 19.867).attr({x: '669.431',y: '244.573',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_k');
var rect_l = rsr.rect(669.431, 251.324, 60.376, 6.763).attr({x: '669.431',y: '251.324',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_l');
var rect_m = rsr.rect(697.926, 238.597, 3.391, 37.621).attr({x: '697.926',y: '238.597',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_m');
group_a.attr({'parent': 'base','name': 'group_a'});
var rooms = rsr.set();
var cr_132 = rsr.path("M 682.313,186.862 682.313,204.131 666.023,204.131    666.023,221.399 731.119,221.399 731.119,186.862   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_132');
var csb1_300 = rsr.path("M 682.313,169.683 666.023,169.683 666.023,152.415    428.689,152.415 257.223,152.415 154.014,152.415 154.014,290.718 257.223,290.718 257.223,362.843 666.023,362.843    666.023,204.13 682.313,204.13   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_300');
var cr_131 = rsr.path("M 666.023,152.415 666.023,169.683 682.313,169.683    682.313,186.952 731.119,186.952 731.119,152.415   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_131');
var cr_133 = rsr.rect(257.223, 290.718, 36.063, 72.125).attr({x: '257.223',y: '290.718',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_133');
var cr_134 = rsr.rect(293.285, 290.718, 36.063, 72.125).attr({x: '293.285',y: '290.718',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_134');
rooms.attr({'id': 'rooms','name': 'rooms'});
var text = rsr.set();
var csb1_300_label = rsr.text(0, 0, 'FUNCTION \nHALL').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '41.8716',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 430.3672 239.4126").data('id', 'csb1_300_label');
text.attr({'id': 'text','name': 'text'});
var icons = rsr.set();
var text_t = rsr.text(8, -3, '2F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 675.1299 301.2866").data('id', 'text_t');
var path_u = rsr.path("M 689.684,258.483 682.275,251.149 674.943,258.483 679.767,258.483 679.767,285.146    684.767,285.146 684.767,258.483   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_u');
icons.attr({'id': 'icons','name': 'icons'});
var group_b = rsr.set();
var path_v = rsr.path("M715.185,203.617c-0.045-0.042-0.094-0.08-0.144-0.116l0.014-0.012l-4.994-4.994v-0.004h-6.643v0.013    l-4.985,4.985l0.014,0.012c-0.049,0.036-0.097,0.071-0.142,0.116c-0.479,0.479-0.479,1.253,0,1.731    c0.478,0.478,1.254,0.478,1.732,0c0.043-0.042,0.08-0.092,0.116-0.141l0.012,0.013l3.253-3.253v6.711v8.034h0.021    c-0.01,0.068-0.021,0.136-0.021,0.206c0,0.769,0.623,1.392,1.391,1.392c0.77,0,1.392-0.623,1.392-1.392    c0-0.07-0.01-0.138-0.02-0.206h0.02v-8.034h1.076v8.034h0.021c-0.01,0.068-0.021,0.136-0.021,0.206    c0,0.769,0.624,1.392,1.391,1.392c0.77,0,1.394-0.623,1.394-1.392c0-0.07-0.011-0.138-0.021-0.206h0.021v-8.034v-6.72l3.263,3.263    l0.014-0.013c0.033,0.048,0.071,0.097,0.115,0.141c0.478,0.479,1.253,0.479,1.732,0    C715.661,204.871,715.661,204.096,715.185,203.617z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_v');
var circle_w = rsr.circle(706, 194, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'circle_w');
group_b.attr({'parent': 'icons','name': 'group_b'});
var group_c = rsr.set();
var path_x = rsr.path("M319.757,325.2c-0.045-0.042-0.094-0.079-0.144-0.116l0.014-0.012l-4.994-4.994v-0.004h-6.643v0.014    l-4.985,4.984l0.014,0.012c-0.049,0.037-0.097,0.072-0.142,0.116c-0.479,0.479-0.479,1.253,0,1.731    c0.478,0.478,1.254,0.478,1.732,0c0.043-0.042,0.08-0.092,0.116-0.141l0.012,0.013l3.253-3.253v6.711v8.034h0.021    c-0.01,0.067-0.021,0.136-0.021,0.206c0,0.769,0.623,1.392,1.391,1.392c0.77,0,1.392-0.623,1.392-1.392    c0-0.07-0.01-0.139-0.02-0.206h0.02v-8.034h1.076v8.034h0.021c-0.01,0.067-0.021,0.136-0.021,0.206    c0,0.769,0.624,1.392,1.391,1.392c0.77,0,1.394-0.623,1.394-1.392c0-0.07-0.011-0.139-0.021-0.206h0.021v-8.034v-6.721    l3.263,3.264l0.014-0.014c0.033,0.049,0.071,0.098,0.115,0.141c0.478,0.479,1.253,0.479,1.732,0    C320.233,326.454,320.233,325.679,319.757,325.2z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_x');
var circle_y = rsr.circle(311, 316, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'circle_y');
group_c.attr({'parent': 'icons','name': 'group_c'});
var group_d = rsr.set();
var path_z = rsr.path("M713.601,168.376c-0.043-0.042-0.091-0.078-0.139-0.112l0.013-0.012l-4.859-4.859l-0.036,0.036    l-0.008-0.036h-5.26l-0.005,0.026l-0.028-0.028l-4.859,4.86l0.014,0.012c-0.048,0.035-0.095,0.069-0.138,0.112    c-0.465,0.465-0.465,1.218,0,1.684c0.465,0.464,1.219,0.464,1.685,0c0.041-0.042,0.077-0.09,0.11-0.137l0.014,0.012l2.317-2.319    l-2.046,9.709h2.49v3.784h0.019c-0.009,0.066-0.019,0.132-0.019,0.2c0,0.748,0.543,1.354,1.212,1.354    c0.67,0,1.212-0.606,1.212-1.354c0-0.067-0.009-0.134-0.019-0.2h0.019v-3.784h1.244v3.784h0.018    c-0.009,0.066-0.018,0.132-0.018,0.2c0,0.748,0.542,1.354,1.212,1.354c0.669,0,1.212-0.606,1.212-1.354    c0-0.067-0.01-0.134-0.018-0.2h0.018v-3.784h2.492l-2.013-9.745l2.355,2.355l0.012-0.013c0.034,0.047,0.069,0.094,0.112,0.137    c0.464,0.465,1.219,0.465,1.685,0C714.064,169.595,714.064,168.841,713.601,168.376z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_z');
var circle_aa = rsr.circle(705, 159, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'circle_aa');
group_d.attr({'parent': 'icons','name': 'group_d'});
var group_e = rsr.set();
var path_ab = rsr.path("M282.907,325.243c-0.043-0.041-0.091-0.077-0.139-0.111l0.013-0.012l-4.859-4.859l-0.036,0.035    l-0.008-0.035h-5.26l-0.005,0.026l-0.028-0.028l-4.859,4.861l0.014,0.012c-0.048,0.034-0.095,0.068-0.138,0.111    c-0.465,0.466-0.465,1.219,0,1.685c0.465,0.464,1.219,0.464,1.685,0c0.041-0.042,0.077-0.091,0.11-0.138l0.014,0.013l2.317-2.319    l-2.046,9.71h2.49v3.784h0.019c-0.009,0.066-0.019,0.133-0.019,0.199c0,0.748,0.543,1.354,1.212,1.354    c0.67,0,1.212-0.606,1.212-1.354c0-0.066-0.009-0.133-0.019-0.199h0.019v-3.784h1.244v3.784h0.018    c-0.009,0.066-0.018,0.133-0.018,0.199c0,0.748,0.542,1.354,1.212,1.354c0.669,0,1.212-0.606,1.212-1.354    c0-0.066-0.01-0.133-0.018-0.199h0.018v-3.784h2.492l-2.013-9.745l2.355,2.355l0.012-0.014c0.034,0.047,0.069,0.095,0.112,0.138    c0.464,0.466,1.219,0.466,1.685,0C283.371,326.462,283.371,325.708,282.907,325.243z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ab');
var circle_ac = rsr.circle(275, 316, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'circle_ac');
group_e.attr({'parent': 'icons','name': 'group_e'});


var rsrGroups = [Layer_2,base,group_a,rooms,text,icons,group_b,group_c,group_d,group_e];
Layer_2.push(
	rect_f 
);
base.push(
	path_g ,
	rect_h 
);
group_a.push(
	rect_i ,
	rect_j ,
	rect_k ,
	rect_l ,
	rect_m 
);
rooms.push(
	cr_131 ,
	cr_132 ,
	cr_133 ,
	cr_134 ,
	csb1_300 
);
text.push(
	csb1_300_label 
);
icons.push(
	text_t ,
	path_u 
);
group_b.push(
	path_v ,
	circle_w 
);
group_c.push(
	path_x ,
	circle_y 
);
group_d.push(
	path_z ,
	circle_aa 
);
group_e.push(
	path_ab ,
	circle_ac 
);
	
	
	text.attr({
		cursor:"pointer"
	});

	csb1_300_label.data({"val":csb1_300});

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