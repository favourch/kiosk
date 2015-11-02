function show_b11f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b11f");
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
		displayMap("csb1",2,"");
    	ion.sound.play(CLICK_SOUND);

	});
	// update text
	$("#floor_no").text("1F");
		//var rsr = Raphael('rsr', '920', '617');

var Layer_2 = rsr.set();
var rect_f = rsr.rect(0, 0, 920, 617).attr({fill: '#DBD3C4',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_f');
Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
var base = rsr.set();
var path_g = rsr.path("M732.251,423.549H605.427c0,0-44.725-1.048-74.849-6.37   c-30.125-5.323-55.505-16.419-55.505-16.419v-36.685h257.178V423.549z").attr({fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_g');
var path_h = rsr.path("M 152.746,151.372 152.746,291.512 255.847,291.512    255.847,364.081 732.251,364.081 732.251,291.512 732.251,180.943 732.251,151.372   z").attr({fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_h');
var rect_i = rsr.rect(608.973, 151.372, 123.278, 212.704).attr({x: '608.973',y: '151.372',fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_i');
var rect_j = rsr.rect(596.473, 254.705, 23.25, 29.013).attr({x: '596.473',y: '254.705',fill: '#FDFDFE',parent: 'base','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_j');
var rect_k = rsr.rect(663.063, 351.281, 29.013, 23.25).attr({x: '663.063',y: '351.281',fill: '#FDFDFE',parent: 'base','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_k');
base.attr({'id': 'base','name': 'base'});
var group_a = rsr.set();
var rect_l = rsr.rect(669.431, 222.718, 60.372, 53.5).attr({x: '669.431',y: '222.718',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_l');
var rect_m = rsr.rect(669.431, 238.597, 60.372, 31.759).attr({x: '669.431',y: '238.597',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_m');
var rect_n = rsr.rect(669.431, 244.573, 60.376, 19.867).attr({x: '669.431',y: '244.573',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_n');
var rect_o = rsr.rect(669.431, 251.324, 60.376, 6.763).attr({x: '669.431',y: '251.324',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_o');
var rect_p = rsr.rect(697.926, 238.597, 3.391, 37.621).attr({x: '697.926',y: '238.597',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_p');
group_a.attr({'parent': 'base','name': 'group_a'});
var rooms = rsr.set();
var csb1_104 = rsr.rect(325.373, 152.802, 107.843, 92.19).attr({x: '325.373',y: '152.802',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_104');
var csb1_105 = rsr.path("M 154.066,152.802 154.066,221.655 256.753,221.655    256.753,244.794 325.373,244.794 325.373,221.655 325.373,175.948 325.373,152.802   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_105');
var csb1_102 = rsr.rect(468.724, 152.802, 60.879, 92.19).attr({x: '468.724',y: '152.802',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_102');
var csb1_101 = rsr.rect(529.383, 152.802, 78.664, 92.19).attr({x: '529.383',y: '152.802',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_101');
var cr_112 = rsr.path("M 715.634,186.952 681.352,186.952 665.944,186.952    665.944,209.19 681.352,209.19 681.352,221.309 731.04,221.309 731.04,186.952   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_112');
var cr_111 = rsr.path("M 731.04,152.6 681.352,152.6 681.352,165.047    665.944,165.047 665.944,186.952 731.04,186.952   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_111');
var csb1_111 = rsr.rect(429.659, 315.994, 113.404, 46.912).attr({x: '429.659',y: '315.994',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_111');
var csb1_109 = rsr.rect(317.845, 269.724, 112.095, 93.182).attr({x: '317.845',y: '269.724',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_109');
var cr_113 = rsr.rect(257.137, 311.021, 31.36, 51.885).attr({x: '257.137',y: '311.021',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_113');
var csb1_108 = rsr.rect(154.066, 257.27, 76.861, 33.281).attr({x: '154.066',y: '257.27',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_108');
var csb1_107 = rsr.rect(154.066, 221.655, 76.861, 35.615).attr({x: '154.066',y: '221.655',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_107');
var cr_114 = rsr.rect(289.247, 311.021, 28.598, 51.885).attr({x: '289.247',y: '311.021',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_114');
var strg_111 = rsr.rect(668.364, 239.343, 28.483, 36.875).attr({x: '668.364',y: '239.343',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'strg_111');
var csb1_110 = rsr.rect(450.021, 268.824, 26.251, 46.021).attr({x: '450.021',y: '268.824',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_110');
var csb1_112 = rsr.rect(476.579, 268.824, 66.59, 46.021).attr({x: '476.579',y: '268.824',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_112');
var cr_115 = rsr.rect(433.705, 152.802, 35.019, 35.484).attr({x: '433.705',y: '152.802',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_115');
var csb1_103 = rsr.rect(433.705, 188.286, 35.019, 56.508).attr({x: '433.705',y: '188.286',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb1_103');
rooms.attr({'id': 'rooms','name': 'rooms'});
var text = rsr.set();
var csb1_102_label = rsr.text(0, 0, 'Dean’s\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '16',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 498.4541 188.2856").data('id', 'csb1_102_label');
var csb1_104_label = rsr.text(0, 0, 'Conference\nRoom').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 379.4443 192.0859").data('id', 'csb1_104_label');
var csb1_109_label = rsr.text(0, 0, 'BAC').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 376.5391 311.021").data('id', 'csb1_109_label');
var csb1_111_label = rsr.text(0, 0, 'Registrar’s\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 488.1367 337.9048").data('id', 'csb1_111_label');
var csb1_112_label = rsr.text(0, 0, 'Cashier’s\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 511.877 288.1548").data('id', 'csb1_112_label');
var csb1_110_label = rsr.text(0, 0, 'Student\nRecords').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '7',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 462.9902 289.6772").data('id', 'csb1_110_label');
var csb1_103_label = rsr.text(0, 0, 'Kitchen').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '9.1709',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 450.9189 215.7422").data('id', 'csb1_103_label');
var strg_111_label = rsr.text(0, 0, 'Storage').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '7',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 683.1104 255.5034").data('id', 'strg_111_label');
var csb1_105_label = rsr.text(0, 0, 'Admin\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '9.1709',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 300.4556 188.2856").data('id', 'csb1_105_label');
var csb1_106_label = rsr.text(0, 0, 'Accounting\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '9.1709',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 196.1812 180.1167").data('id', 'csb1_106_label');
var csb1_107_label = rsr.text(0, 0, 'Supply\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 190.2344 237.1167").data('id', 'csb1_107_label');
var csb1_108_label = rsr.text(0, 0, 'Supply Storage\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '10',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 190.4546 272.5259").data('id', 'csb1_108_label');
var csb1_101_label = rsr.text(0, 0, 'Asst. Dean’s\nOffice').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 570.0352 188.2856").data('id', 'csb1_101_label');
text.attr({'id': 'text','name': 'text'});
var icons = rsr.set();
var text_au = rsr.text(8, -3, '2F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 708.6299 301.2866").data('id', 'text_au');
var text_av = rsr.text(8, -3, 'CS').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 669.8613 412.478").data('id', 'text_av');
var path_aw = rsr.path("M 670.198,389.568 677.606,396.9 684.938,389.568 680.115,389.568 680.115,362.906 675.115,362.906    675.115,389.568   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_aw');
var path_ax = rsr.path("M 723.184,258.483 715.775,251.149 708.443,258.483 713.267,258.483 713.267,285.146    718.267,285.146 718.267,258.483   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ax');
icons.attr({'id': 'icons','name': 'icons'});
var group_b = rsr.set();
var path_ay = rsr.path("M715.185,203.617c-0.045-0.042-0.094-0.08-0.144-0.116l0.014-0.012l-4.994-4.994v-0.004h-6.643v0.013    l-4.985,4.985l0.014,0.012c-0.049,0.036-0.097,0.071-0.142,0.116c-0.479,0.479-0.479,1.253,0,1.731    c0.478,0.478,1.254,0.478,1.732,0c0.043-0.042,0.08-0.092,0.116-0.141l0.012,0.013l3.253-3.253v6.711v8.034h0.021    c-0.01,0.068-0.021,0.136-0.021,0.206c0,0.769,0.623,1.392,1.391,1.392c0.77,0,1.392-0.623,1.392-1.392    c0-0.07-0.01-0.138-0.02-0.206h0.02v-8.034h1.076v8.034h0.021c-0.01,0.068-0.021,0.136-0.021,0.206    c0,0.769,0.624,1.392,1.391,1.392c0.77,0,1.394-0.623,1.394-1.392c0-0.07-0.011-0.138-0.021-0.206h0.021v-8.034v-6.72l3.263,3.263    l0.014-0.013c0.033,0.048,0.071,0.097,0.115,0.141c0.478,0.479,1.253,0.479,1.732,0    C715.661,204.871,715.661,204.096,715.185,203.617z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_ay');
var circle_az = rsr.circle(706, 194, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_az');
group_b.attr({'parent': 'icons','name': 'group_b'});
var group_c = rsr.set();
var path_ba = rsr.path("M311.987,338.397c-0.045-0.042-0.094-0.079-0.144-0.116l0.014-0.012l-4.994-4.994v-0.004h-6.643v0.014    l-4.985,4.984l0.014,0.012c-0.049,0.037-0.097,0.072-0.142,0.116c-0.479,0.479-0.479,1.253,0,1.731    c0.478,0.478,1.254,0.478,1.732,0c0.043-0.042,0.08-0.092,0.116-0.141l0.012,0.013l3.253-3.253v6.711v8.034h0.021    c-0.01,0.067-0.021,0.136-0.021,0.206c0,0.769,0.623,1.392,1.391,1.392c0.77,0,1.392-0.623,1.392-1.392    c0-0.07-0.01-0.139-0.02-0.206h0.02v-8.034h1.076v8.034h0.021c-0.01,0.067-0.021,0.136-0.021,0.206    c0,0.769,0.624,1.392,1.391,1.392c0.77,0,1.394-0.623,1.394-1.392c0-0.07-0.011-0.139-0.021-0.206h0.021v-8.034v-6.721    l3.263,3.264l0.014-0.014c0.033,0.049,0.071,0.098,0.115,0.141c0.478,0.479,1.253,0.479,1.732,0    C312.463,339.651,312.463,338.876,311.987,338.397z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_ba');
var circle_bb = rsr.circle(303, 329, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_bb');
group_c.attr({'parent': 'icons','name': 'group_c'});
var group_d = rsr.set();
var path_bc = rsr.path("M713.601,168.376c-0.043-0.042-0.091-0.078-0.139-0.112l0.013-0.012l-4.859-4.859l-0.036,0.036    l-0.008-0.036h-5.26l-0.005,0.026l-0.028-0.028l-4.859,4.86l0.014,0.012c-0.048,0.035-0.095,0.069-0.138,0.112    c-0.465,0.465-0.465,1.218,0,1.684c0.465,0.464,1.219,0.464,1.685,0c0.041-0.042,0.077-0.09,0.11-0.137l0.014,0.012l2.317-2.319    l-2.046,9.709h2.49v3.784h0.019c-0.009,0.066-0.019,0.132-0.019,0.2c0,0.748,0.543,1.354,1.212,1.354    c0.67,0,1.212-0.606,1.212-1.354c0-0.067-0.009-0.134-0.019-0.2h0.019v-3.784h1.244v3.784h0.018    c-0.009,0.066-0.018,0.132-0.018,0.2c0,0.748,0.542,1.354,1.212,1.354c0.669,0,1.212-0.606,1.212-1.354    c0-0.067-0.01-0.134-0.018-0.2h0.018v-3.784h2.492l-2.013-9.745l2.355,2.355l0.012-0.013c0.034,0.047,0.069,0.094,0.112,0.137    c0.464,0.465,1.219,0.465,1.685,0C714.064,169.595,714.064,168.841,713.601,168.376z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_bc');
var circle_bd = rsr.circle(705, 159, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_bd');
group_d.attr({'parent': 'icons','name': 'group_d'});
var group_e = rsr.set();
var path_be = rsr.path("M280.471,337.912c-0.043-0.041-0.091-0.077-0.139-0.111l0.013-0.012l-4.859-4.859l-0.036,0.035    l-0.008-0.035h-5.26l-0.005,0.026l-0.028-0.028l-4.859,4.861l0.014,0.012c-0.048,0.034-0.095,0.068-0.138,0.111    c-0.465,0.466-0.465,1.219,0,1.685c0.465,0.464,1.219,0.464,1.685,0c0.041-0.042,0.077-0.091,0.11-0.138l0.014,0.013l2.317-2.319    l-2.046,9.71h2.49v3.784h0.019c-0.009,0.066-0.019,0.133-0.019,0.199c0,0.748,0.543,1.354,1.212,1.354    c0.67,0,1.212-0.606,1.212-1.354c0-0.066-0.009-0.133-0.019-0.199h0.019v-3.784h1.244v3.784h0.018    c-0.009,0.066-0.018,0.133-0.018,0.199c0,0.748,0.542,1.354,1.212,1.354c0.669,0,1.212-0.606,1.212-1.354    c0-0.066-0.01-0.133-0.018-0.199h0.018v-3.784h2.492l-2.013-9.745l2.355,2.355l0.012-0.014c0.034,0.047,0.069,0.095,0.112,0.138    c0.464,0.466,1.219,0.466,1.685,0C280.935,339.131,280.935,338.377,280.471,337.912z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_be');
var circle_bf = rsr.circle(272, 329, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_bf');
group_e.attr({'parent': 'icons','name': 'group_e'});


var rsrGroups = [Layer_2,base,group_a,rooms,text,icons,group_b,group_c,group_d,group_e];
Layer_2.push(
	rect_f 
);
base.push(
	path_g ,
	path_h ,
	rect_i ,
	rect_j ,
	rect_k 
);
group_a.push(
	rect_l ,
	rect_m ,
	rect_n ,
	rect_o ,
	rect_p 
);
rooms.push(
	cr_111 ,
	cr_112 ,
	cr_113 ,
	cr_114 ,
	cr_115 ,
	csb1_101 ,
	csb1_102 ,
	csb1_103 ,
	csb1_104 ,
	csb1_105 ,
	csb1_107 ,
	csb1_108 ,
	csb1_109 ,
	csb1_110 ,
	csb1_111 ,
	csb1_112 ,
	strg_111 
);
text.push(
	csb1_101_label ,
	csb1_102_label ,
	csb1_103_label ,
	csb1_104_label ,
	csb1_105_label ,
	csb1_106_label ,
	csb1_107_label ,
	csb1_108_label ,
	csb1_109_label ,
	csb1_110_label ,
	csb1_111_label ,
	csb1_112_label ,
	strg_111_label 
);
icons.push(
	text_au ,
	text_av ,
	path_aw ,
	path_ax 
);
group_b.push(
	path_ay ,
	circle_az 
);
group_c.push(
	path_ba ,
	circle_bb 
);
group_d.push(
	path_bc ,
	circle_bd 
);
group_e.push(
	path_be ,
	circle_bf 
);

	text.attr({
		cursor:"pointer"
	});


	csb1_101_label.data({"val":csb1_101});
	csb1_102_label.data({"val":csb1_102});
	csb1_103_label.data({"val":csb1_103});
	csb1_104_label.data({"val":csb1_104});
	csb1_105_label.data({"val":csb1_105});
	csb1_106_label.data({"val":csb1_105});
	csb1_107_label.data({"val":csb1_107});
	csb1_108_label.data({"val":csb1_108});
	csb1_109_label.data({"val":csb1_109});
	csb1_110_label.data({"val":csb1_110});
	csb1_111_label.data({"val":csb1_111});
	csb1_112_label.data({"val":csb1_112});
	strg_111_label.data({"val":strg_111});





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