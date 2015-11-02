function show_b41f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b41f");
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
		displayMap("csb4",2,"");
    	ion.sound.play(CLICK_SOUND);
	});
	// update text
	$("#floor_no").text("1F");

		// var rsr = Raphael('rsr', '920', '617');

var Layer_2 = rsr.set();
var rect_l = rsr.rect(0, 0, 920, 617).attr({fill: '#DBD3C4',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_l');
Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
var group_a = rsr.set();
var rect_m = rsr.rect(559.766, 293.183, 34.116, 34.445).attr({x: '559.766',y: '293.183',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_m');
group_a.attr({'parent': 'Layer_2','name': 'group_a'});
var base = rsr.set();
var path_n = rsr.path("M653.218,209.658v-28.141h-42.294v-57.404H273.255v57.404h-44.393   v28.141h-81.66v200.352h81.66v31.516h44.794v51.494h337.267v-51.494h42.294v-31.516h86.033V209.658H653.218z M594.933,287.101   h-40.731v46.078h40.731v23.361h-40.731h-25.957H287.021v-93.709h241.223h25.957h40.731V287.101z").attr({fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_n');
base.attr({'id': 'base','name': 'base'});
var group_b = rsr.set();
var rect_o = rsr.rect(238.465, 409.876, 30.465, 31.516).attr({x: '238.465',y: '409.876',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_o');
var rect_p = rsr.rect(238.465, 414.544, 30.465, 23.02).attr({x: '238.465',y: '414.544',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_p');
var rect_q = rsr.rect(238.465, 419.228, 30.465, 13.65).attr({x: '238.465',y: '419.228',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_q');
var rect_r = rsr.rect(238.465, 424.046, 30.465, 4.016).attr({x: '238.465',y: '424.046',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_r');
group_b.attr({'parent': 'base','name': 'group_b'});
var group_c = rsr.set();
var rect_s = rsr.rect(617.069, 409.876, 25.616, 31.516).attr({x: '617.069',y: '409.876',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_s');
var rect_t = rsr.rect(617.069, 414.544, 25.616, 23.02).attr({x: '617.069',y: '414.544',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_t');
var rect_u = rsr.rect(617.069, 419.228, 25.616, 13.65).attr({x: '617.069',y: '419.228',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_u');
var rect_v = rsr.rect(617.069, 424.046, 25.616, 4.016).attr({x: '617.069',y: '424.046',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_v');
group_c.attr({'parent': 'base','name': 'group_c'});
var group_d = rsr.set();
var rect_w = rsr.rect(238.465, 181.385, 30.465, 31.515).attr({x: '238.465',y: '181.385',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_w');
var rect_x = rsr.rect(238.465, 186.053, 30.465, 23.02).attr({x: '238.465',y: '186.053',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_x');
var rect_y = rsr.rect(238.465, 190.738, 30.465, 13.649).attr({x: '238.465',y: '190.738',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_y');
var rect_z = rsr.rect(238.465, 195.555, 30.465, 4.015).attr({x: '238.465',y: '195.555',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_z');
group_d.attr({'parent': 'base','name': 'group_d'});
var group_e = rsr.set();
var rect_aa = rsr.rect(188.922, 362.229, 39.3, 30.493).attr({x: '188.922',y: '362.229',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_aa');
var rect_ab = rsr.rect(200.587, 362.229, 23.329, 30.493).attr({x: '200.587',y: '362.229',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ab');
var rect_ac = rsr.rect(204.977, 362.227, 14.592, 30.495).attr({x: '204.977',y: '362.227',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ac');
var rect_ad = rsr.rect(209.936, 362.227, 4.967, 30.495).attr({x: '209.936',y: '362.227',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ad');
var rect_ae = rsr.rect(200.587, 376.618, 27.636, 1.712).attr({x: '200.587',y: '376.618',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ae');
group_e.attr({'parent': 'base','name': 'group_e'});
var group_f = rsr.set();
var rect_af = rsr.rect(555.89, 288.846, 37.992, 42.872).attr({x: '555.89',y: '288.846',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_af');
var rect_ag = rsr.rect(567.166, 288.846, 22.553, 42.872).attr({x: '567.166',y: '288.846',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ag');
var rect_ah = rsr.rect(571.409, 288.843, 14.108, 42.875).attr({x: '571.409',y: '288.843',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ah');
var rect_ai = rsr.rect(576.203, 288.843, 4.803, 42.875).attr({x: '576.203',y: '288.843',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ai');
var rect_aj = rsr.rect(567.166, 309.076, 26.716, 2.407).attr({x: '567.166',y: '309.076',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_aj');
group_f.attr({'parent': 'base','name': 'group_f'});
var group_g = rsr.set();
var rect_ak = rsr.rect(617.069, 181.385, 25.616, 31.515).attr({x: '617.069',y: '181.385',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ak');
var rect_al = rsr.rect(617.069, 186.053, 25.616, 23.02).attr({x: '617.069',y: '186.053',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_al');
var rect_am = rsr.rect(617.069, 190.738, 25.616, 13.649).attr({x: '617.069',y: '190.738',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_am');
var rect_an = rsr.rect(617.069, 195.555, 25.616, 4.015).attr({x: '617.069',y: '195.555',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'base','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_an');
group_g.attr({'parent': 'base','name': 'group_g'});
var unreachable = rsr.set();
var rect_ao = rsr.rect(718.01, 241.875, 21.332, 135.63).attr({x: '718.01',y: '241.875',fill: '#5A5C7D',parent: 'unreachable','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_ao');
var path_ap = rsr.path("M 704.837,409.728 704.837,393.968 695.552,393.968 651.936,393.968 642.891,393.968    642.891,441.392 653.309,441.392 653.309,409.876 739.342,409.876 739.342,409.728   z").attr({fill: '#5A5C7D',parent: 'unreachable','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_ap');
var path_aq = rsr.path("M 238.465,181.385 228.954,181.385 228.954,209.525 176.103,209.525 176.103,221.334    238.465,221.334   z").attr({fill: '#5A5C7D',parent: 'unreachable','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_aq');
unreachable.attr({'id': 'unreachable','name': 'unreachable'});
var group_h = rsr.set();
var path_ar = rsr.path("M 609.164,393.968 609.164,480.074 542.475,480.074 475.785,480.074 409.096,480.074     342.406,480.074 275.715,480.074 275.715,393.968 268.93,393.968 268.93,441.392 274.149,441.392 274.149,492.886     611.017,492.886 611.017,441.392 617.069,441.392 617.069,393.968    z").attr({fill: '#5A5C7D',parent: 'unreachable','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_ar');
var path_as = rsr.path("M 238.465,441.392 238.465,393.968 179.761,393.968 179.761,406.208 150.214,406.208     150.214,374.974 167.662,374.974 167.662,360.906 167.662,359.357 167.662,238.501 147.293,238.501 147.293,409.876     228.954,409.876 228.954,441.392    z").attr({fill: '#5A5C7D',parent: 'unreachable','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_as');
group_h.attr({'parent': 'unreachable','name': 'group_h'});
var group_i = rsr.set();
var path_at = rsr.path("M 617.069,221.334 617.069,181.385 611.017,181.385 611.017,123.981 273.347,123.981     273.347,181.385 268.93,181.385 268.93,221.334 275.715,221.334 275.715,135.229 342.406,135.229 409.096,135.229     475.785,135.229 542.475,135.229 609.164,135.229 609.164,221.334    z").attr({fill: '#5A5C7D',parent: 'unreachable','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_at');
var path_au = rsr.path("M 653.309,209.525 653.309,181.385 642.891,181.385 642.891,221.334 696.677,221.334     709.234,221.334 709.234,210.08 739.342,210.08 739.342,209.525    z").attr({fill: '#5A5C7D',parent: 'unreachable','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_au');
group_i.attr({'parent': 'unreachable','name': 'group_i'});
var rooms = rsr.set();
var csb4_111 = rsr.rect(275.75, 135.056, 66.69, 86.106).attr({x: '275.75',y: '135.056',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_111');
var csb4_112 = rsr.rect(168.082, 221.965, 70.383, 72.595).attr({x: '168.082',y: '221.965',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_112');
var cr_413 = rsr.rect(147.293, 209.652, 31.88, 29.272).attr({x: '147.293',y: '209.652',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_413');
var csb4_113 = rsr.path("M 238.465,361.23 238.465,294.56 168.082,294.56    168.082,393.968 188.208,393.968 188.208,361.23   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_113');
var csb4_110 = rsr.rect(342.441, 135.056, 66.689, 86.106).attr({x: '342.441',y: '135.056',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_110');
var cr_414 = rsr.rect(147.293, 374.974, 31.88, 34.902).attr({x: '147.293',y: '374.974',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_414');
var csb4_109 = rsr.rect(409.13, 135.056, 66.69, 86.106).attr({x: '409.13',y: '135.056',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_109');
var csb4_108 = rsr.rect(475.82, 135.056, 66.689, 86.106).attr({x: '475.82',y: '135.056',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_108');
var csb4_107 = rsr.rect(542.51, 135.056, 66.688, 86.106).attr({x: '542.51',y: '135.056',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_107');
var csb4_106 = rsr.rect(643.161, 271.562, 74.849, 76.26).attr({x: '643.161',y: '271.562',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_106');
var cr_411 = rsr.rect(642.686, 221.162, 54.025, 35.175).attr({x: '642.686',y: '221.162',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_411');
var strg_412 = rsr.rect(704.837, 377.505, 34.505, 32.223).attr({x: '704.837',y: '377.505',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'strg_412');
var cr_412 = rsr.path("M 694.989,377.503 694.989,361.046 642.088,361.046    642.088,393.966 651.374,393.966 694.989,393.966 704.274,393.966 704.274,377.503   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_412');
var csb4_105 = rsr.rect(542.515, 393.796, 66.688, 86.105).attr({x: '542.515',y: '393.796',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_105');
var csb4_104 = rsr.rect(475.825, 393.796, 66.689, 86.105).attr({x: '475.825',y: '393.796',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_104');
var csb4_103 = rsr.rect(409.686, 393.796, 66.691, 86.105).attr({x: '409.686',y: '393.796',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_103');
var csb4_102 = rsr.rect(343.125, 393.796, 66.69, 86.105).attr({x: '343.125',y: '393.796',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_102');
var csb4_101 = rsr.rect(276.263, 393.796, 66.69, 86.105).attr({x: '276.263',y: '393.796',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_101');
var strg_411 = rsr.path("M 709.27,209.907 709.27,221.162 696.711,221.162    696.711,241.702 739.376,241.702 739.376,209.907   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms','stroke-width': '1','stroke-opacity': '1'}).data('id', 'strg_411');
rooms.attr({'id': 'rooms','name': 'rooms'});
var text = rsr.set();
var csb4_111_label = rsr.text(15, -5, '111').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 293.6523 184.3843").data('id', 'csb4_111_label');
var csb4_101_label = rsr.text(15, -5, '101').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 293.6523 443.4253").data('id', 'csb4_101_label');
var csb4_110_label = rsr.text(15, -5, '110').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 360.3032 184.3843").data('id', 'csb4_110_label');
var csb4_102_label = rsr.text(15, -5, '102').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 360.3032 443.4253").data('id', 'csb4_102_label');
var csb4_109_label = rsr.text(15, -5, '109').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 428.5586 184.3843").data('id', 'csb4_109_label');
var csb4_103_label = rsr.text(15, -5, '103').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 428.5586 443.4253").data('id', 'csb4_103_label');
var csb4_108_label = rsr.text(15, -5, '108').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 493.6035 184.3843").data('id', 'csb4_108_label');
var csb4_104_label = rsr.text(15, -5, '104').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 493.6035 443.4253").data('id', 'csb4_104_label');
var csb4_107_label = rsr.text(15, -5, '107').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 559.4512 184.3843").data('id', 'csb4_107_label');
var csb4_105_label = rsr.text(15, -5, '105').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 559.4512 443.4253").data('id', 'csb4_105_label');
var csb4_106_label = rsr.text(15, -5, 'AVR').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m0.9937 0 0 1 661.8242 316.6831").data('id', 'csb4_106_label');
var strg_412_label = rsr.text(20, 0, 'STORAGE').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '10',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m0.6716 0 0 1 707.6426 398.2573").data('id', 'strg_412_label');
var strg_411_label = rsr.text(20, 0, 'STORAGE').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '10',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m0.7893 0 0 1 700.8203 233.7236").data('id', 'strg_411_label');
var csb4_112_label = rsr.text(0, 0, 'MATH\nDEPARTMENT').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 205.02 259.3037").data('id', 'csb4_112_label');
var csb4_113_label = rsr.text(0, 0, 'PHYSICS\nDEPARTMENT').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '12',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 202.8003 326.1245").data('id', 'csb4_113_label');
var cr_414_label = rsr.text(0, 0, 'CR').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '8.8516',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 156.8413 395.6382").data('id', 'cr_414_label');
var cr_413_label = rsr.text(0, 0, 'CR').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '8.8516',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 156.8413 229.0117").data('id', 'cr_413_label');
text.attr({'id': 'text','name': 'text'});
var icons = rsr.set();
var path_cf = rsr.path("M 221.513,379.482 214.925,386.136 221.513,392.722 221.513,388.39 245.462,388.39 245.462,383.899    221.513,383.899   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_cf');
var path_cg = rsr.path("M 585.201,314.887 578.613,321.542 585.201,328.127 585.201,323.795 609.15,323.795 609.15,319.304    585.201,319.304   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_cg');
var path_ch = rsr.path("M 243.78,453.863 251.188,461.197 258.521,453.863 253.697,453.863 253.697,427.201 248.697,427.201    248.697,453.863   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ch');
var text_ci = rsr.text(8, -5, '2F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 248.9404 390.0337").data('id', 'text_ci');
var text_cj = rsr.text(8, -5, 'CS').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 243.4424 474.7349").data('id', 'text_cj');
var text_ck = rsr.text(8, -5, '2F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 610.8857 326.1245").data('id', 'text_ck');
icons.attr({'id': 'icons','name': 'icons'});
var group_j = rsr.set();
var path_cl = rsr.path("M680.307,376.574c-0.04-0.039-0.086-0.074-0.131-0.105l0.012-0.012l-4.576-4.576v-0.002h-6.084v0.012    l-4.567,4.566l0.013,0.012c-0.045,0.031-0.089,0.064-0.129,0.105c-0.438,0.439-0.438,1.146,0,1.586    c0.437,0.438,1.148,0.438,1.587,0c0.038-0.039,0.072-0.086,0.105-0.129l0.011,0.012l2.98-2.98v6.148v7.36h0.019    c-0.01,0.063-0.019,0.125-0.019,0.188c0,0.705,0.57,1.275,1.273,1.275c0.705,0,1.275-0.57,1.275-1.275    c0-0.063-0.009-0.125-0.019-0.188h0.019v-7.36h0.986v7.36h0.019c-0.01,0.063-0.019,0.125-0.019,0.188    c0,0.705,0.571,1.275,1.273,1.275c0.705,0,1.275-0.57,1.275-1.275c0-0.063-0.009-0.125-0.019-0.188h0.019v-7.36v-6.156l2.99,2.988    l0.012-0.012c0.031,0.043,0.066,0.088,0.106,0.129c0.438,0.439,1.148,0.439,1.587,0    C680.744,377.72,680.744,377.013,680.307,376.574z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_cl');
var circle_cm = rsr.circle(672, 368, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_cm');
group_j.attr({'parent': 'icons','name': 'group_j'});
var group_k = rsr.set();
var path_cn = rsr.path("M679.79,236.615c-0.039-0.039-0.086-0.073-0.131-0.106l0.014-0.011l-4.579-4.577l-0.034,0.033    l-0.008-0.033h-4.954l-0.006,0.025l-0.026-0.027l-4.577,4.579l0.013,0.011c-0.046,0.033-0.09,0.065-0.13,0.106    c-0.438,0.438-0.438,1.148,0,1.586c0.438,0.437,1.147,0.437,1.587,0c0.038-0.039,0.072-0.084,0.104-0.129l0.013,0.011l2.184-2.184    l-1.929,9.147h2.347v3.564h0.018c-0.008,0.063-0.018,0.125-0.018,0.188c0,0.705,0.512,1.276,1.142,1.276    c0.631,0,1.142-0.571,1.142-1.276c0-0.064-0.009-0.126-0.017-0.188h0.017v-3.564h1.172v3.564h0.017    c-0.008,0.063-0.017,0.125-0.017,0.188c0,0.705,0.512,1.276,1.142,1.276c0.631,0,1.143-0.571,1.143-1.276    c0-0.064-0.01-0.126-0.017-0.188h0.017v-3.564h2.348l-1.896-9.182l2.22,2.219l0.011-0.012c0.032,0.044,0.065,0.088,0.106,0.129    c0.437,0.438,1.147,0.438,1.586,0C680.228,237.764,680.228,237.054,679.79,236.615z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_cn');
var circle_co = rsr.circle(672, 228, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_co');
group_k.attr({'parent': 'icons','name': 'group_k'});


var rsrGroups = [Layer_2,group_a,base,group_b,group_c,group_d,group_e,group_f,group_g,unreachable,group_h,group_i,rooms,text,icons,group_j,group_k];
Layer_2.push(
	rect_l 
);
group_a.push(
	rect_m 
);
base.push(
	path_n 
);
group_b.push(
	rect_o ,
	rect_p ,
	rect_q ,
	rect_r 
);
group_c.push(
	rect_s ,
	rect_t ,
	rect_u ,
	rect_v 
);
group_d.push(
	rect_w ,
	rect_x ,
	rect_y ,
	rect_z 
);
group_e.push(
	rect_aa ,
	rect_ab ,
	rect_ac ,
	rect_ad ,
	rect_ae 
);
group_f.push(
	rect_af ,
	rect_ag ,
	rect_ah ,
	rect_ai ,
	rect_aj 
);
group_g.push(
	rect_ak ,
	rect_al ,
	rect_am ,
	rect_an 
);
unreachable.push(
	rect_ao ,
	path_ap ,
	path_aq 
);
group_h.push(
	path_ar ,
	path_as 
);
group_i.push(
	path_at ,
	path_au 
);
rooms.push(
	cr_411 ,
	cr_412 ,
	cr_413 ,
	cr_414 ,
	csb4_101 ,
	csb4_102 ,
	csb4_103 ,
	csb4_104 ,
	csb4_105 ,
	csb4_106 ,
	csb4_107 ,
	csb4_108 ,
	csb4_109 ,
	csb4_110 ,
	csb4_111 ,
	csb4_112 ,
	csb4_113 ,
	strg_411 ,
	strg_412 
);
text.push(
	cr_413_label ,
	cr_414_label ,
	csb4_101_label ,
	csb4_102_label ,
	csb4_103_label ,
	csb4_104_label ,
	csb4_105_label ,
	csb4_106_label ,
	csb4_107_label ,
	csb4_108_label ,
	csb4_109_label ,
	csb4_110_label ,
	csb4_111_label ,
	csb4_112_label ,
	csb4_113_label ,
	strg_411_label ,
	strg_412_label 
);
icons.push(
	path_cf ,
	path_cg ,
	path_ch ,
	text_ci ,
	text_cj ,
	text_ck 
);
group_j.push(
	path_cl ,
	circle_cm 
);
group_k.push(
	path_cn ,
	circle_co 
);

	text.attr({
		cursor:"pointer"
	});

	csb4_101_label.data({"val":csb4_101});
	csb4_102_label.data({"val":csb4_102});
	csb4_103_label.data({"val":csb4_103});
	csb4_104_label.data({"val":csb4_104});
	csb4_105_label.data({"val":csb4_105});
	csb4_106_label.data({"val":csb4_106});
	csb4_107_label.data({"val":csb4_107});
	csb4_108_label.data({"val":csb4_108});
	csb4_109_label.data({"val":csb4_109});
	csb4_110_label.data({"val":csb4_110});
	csb4_111_label.data({"val":csb4_111});
	csb4_112_label.data({"val":csb4_112});
	csb4_113_label.data({"val":csb4_113});
	strg_411_label.data({"val":strg_411});
	strg_412_label.data({"val":strg_412});


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
		showBuildingInfo("csb4");
	}
}