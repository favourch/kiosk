function show_b42f(highlight){
	
	highlight = highlight || "";

	console.log("drawing b42f");
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
		displayMap("csb4",1,"");
    	ion.sound.play(CLICK_SOUND);
	});
	// update text
	$("#floor_no").text("2F");


		//var rsr = Raphael('rsr', '920', '617');

var Layer_2 = rsr.set();
var rect_g = rsr.rect(0, 0, 920, 617).attr({fill: '#DBD3C4',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_g');
Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
var group_a = rsr.set();
var rect_h = rsr.rect(559.766, 293.183, 34.116, 34.445).attr({x: '559.766',y: '293.183',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_2','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_h');
group_a.attr({'parent': 'Layer_2','name': 'group_a'});
var Layer_12 = rsr.set();
var path_i = rsr.path("M644.875,208.888v-28.205h-26.229v-57.534H263.293v57.534H237.91   v28.205h-91.375V409.69h91.375v31.586h25.383v51.61h355.354v-51.61h26.229V409.69h95.045V208.888H644.875z M595.275,286.506   h-40.822v46.182h40.822v23.414h-40.822h-26.018H286.668v-93.92h241.768h26.018h40.822V286.506z").attr({fill: '#FDFDFE',stroke: '#4F4F4F',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_i');
var text_j = rsr.text(0, 0, '1F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 607.6074 303.1011").data('id', 'text_j');
var text_k = rsr.text(0, 0, '1F').attr({fill: '#BC2833',"font-family": 'Arial',"font-size": '14.3675',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 244.2324 373.0317").data('id', 'text_k');
Layer_12.attr({'id': 'Layer_12','name': 'Layer_12'});
var group_b = rsr.set();
var rect_l = rsr.rect(555.89, 288.197, 37.992, 42.872).attr({x: '555.89',y: '288.197',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_l');
var rect_m = rsr.rect(567.166, 288.197, 22.553, 42.872).attr({x: '567.166',y: '288.197',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_m');
var rect_n = rsr.rect(571.409, 288.194, 14.108, 42.875).attr({x: '571.409',y: '288.194',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_n');
var rect_o = rsr.rect(576.203, 288.194, 4.803, 42.875).attr({x: '576.203',y: '288.194',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_o');
var rect_p = rsr.rect(567.166, 308.426, 26.716, 2.407).attr({x: '567.166',y: '308.426',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_p');
group_b.attr({'parent': 'Layer_12','name': 'group_b'});
var group_c = rsr.set();
var rect_q = rsr.rect(188.285, 361.221, 37.992, 31.122).attr({x: '188.285',y: '361.221',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_q');
var rect_r = rsr.rect(199.562, 361.221, 22.553, 31.122).attr({x: '199.562',y: '361.221',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_r');
var rect_s = rsr.rect(203.805, 361.219, 14.108, 31.124).attr({x: '203.805',y: '361.219',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_s');
var rect_t = rsr.rect(208.599, 361.219, 4.803, 31.124).attr({x: '208.599',y: '361.219',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_t');
var rect_u = rsr.rect(199.562, 375.907, 26.716, 1.746).attr({x: '199.562',y: '375.907',fill: '#FFFFFF',stroke: '#919191',"stroke-miterlimit": '10',parent: 'Layer_12','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_u');
group_c.attr({'parent': 'Layer_12','name': 'group_c'});
var unreachable_1_ = rsr.set();
unreachable_1_.attr({'id': 'unreachable_1_','name': 'unreachable_1_'});
var group_d = rsr.set();
var path_v = rsr.path("M 705.336,393.747 696.029,393.747 652.316,393.747 643.01,393.747 609.447,393.747     609.447,480.046 542.607,480.046 475.768,480.046 408.926,480.046 342.086,480.046 275.246,480.046 275.246,393.747     240.557,393.747 237.91,393.747 179.076,393.747 179.076,406.014 149.461,406.014 149.461,374.709 166.947,374.709     166.947,360.609 166.947,359.057 166.947,237.927 146.535,237.927 146.535,409.69 237.91,409.69 237.91,441.276 263.293,441.276     263.293,492.886 618.646,492.886 618.646,441.276 644.875,441.276 644.875,409.69 739.92,409.69 739.92,409.541 705.336,409.541        z").attr({fill: '#5A5C7D',parent: 'unreachable_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_v');
var rect_w = rsr.rect(718.537, 241.312, 21.383, 135.936).attr({x: '718.537',y: '241.312',fill: '#5A5C7D',parent: 'unreachable_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'rect_w');
var path_x = rsr.path("M 644.875,208.888 644.875,180.683 618.646,180.683 618.646,123.149 263.293,123.149     263.293,180.683 237.91,180.683 237.91,208.888 175.408,208.888 175.408,220.723 237.91,220.723 275.246,220.723 275.246,134.423     342.086,134.423 408.926,134.423 475.768,134.423 542.607,134.423 609.447,134.423 609.447,220.723 643.01,220.723     697.156,220.723 709.744,220.723 709.744,209.443 739.92,209.443 739.92,208.888    z").attr({fill: '#5A5C7D',parent: 'unreachable_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_x');
group_d.attr({'parent': 'unreachable_1_','name': 'group_d'});
var rooms = rsr.set();
var csb4_211 = rsr.rect(275.246, 134.423, 66.84, 86.3).attr({x: '275.246',y: '134.423',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_211');
var csb4_210 = rsr.rect(342.086, 134.423, 66.84, 86.3).attr({x: '342.086',y: '134.423',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_210');
var csb4_209 = rsr.rect(408.926, 134.423, 66.842, 86.3).attr({x: '408.926',y: '134.423',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_209');
var csb4_208 = rsr.rect(475.768, 134.423, 66.84, 86.3).attr({x: '475.768',y: '134.423',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_208');
var csb4_207 = rsr.rect(542.607, 134.423, 66.84, 86.3).attr({x: '542.607',y: '134.423',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_207');
var csb4_206 = rsr.rect(643.01, 269.803, 75.018, 76.431).attr({x: '643.01',y: '269.803',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_206');
var cr_421 = rsr.rect(643.01, 220.723, 54.146, 35.255).attr({x: '643.01',y: '220.723',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_421');
var strg_422 = rsr.rect(705.336, 377.248, 34.584, 32.293).attr({x: '705.336',y: '377.248',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'strg_422');
var cr_422 = rsr.path("M 696.029,377.248 696.029,360.75 643.01,360.75    643.01,393.747 652.316,393.747 696.029,393.747 705.336,393.747 705.336,377.248   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'cr_422');
var csb4_205 = rsr.rect(542.607, 393.747, 66.84, 86.3).attr({x: '542.607',y: '393.747',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_205');
var csb4_204 = rsr.rect(475.768, 393.747, 66.84, 86.3).attr({x: '475.768',y: '393.747',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_204');
var csb4_203 = rsr.rect(408.926, 393.747, 66.842, 86.3).attr({x: '408.926',y: '393.747',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_203');
var csb4_202 = rsr.rect(342.086, 393.747, 66.84, 86.3).attr({x: '342.086',y: '393.747',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_202');
var csb4_201 = rsr.rect(275.246, 393.747, 66.84, 86.3).attr({x: '275.246',y: '393.747',fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_201');
var csb4_212 = rsr.path("M 237.91,220.723 175.408,220.723 175.408,208.878    146.535,208.878 146.535,237.927 166.947,237.927 166.947,359.057 166.947,360.609 166.947,374.709 149.461,374.709    149.461,406.014 179.076,406.014 179.076,391.631 187.254,391.631 187.254,360.609 237.91,360.609   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'csb4_212');
var strg_421 = rsr.path("M 709.744,209.443 709.744,220.723 697.156,220.723    697.156,241.312 739.92,241.312 739.92,209.443   z").attr({fill: '#8E97A5',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'rooms_1_','stroke-width': '1','stroke-opacity': '1'}).data('id', 'strg_421');
rooms.attr({'id': 'rooms_1_','name': 'rooms_1_'});
var text = rsr.set();
var csb4_211_label = rsr.text(15, -5, '211').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 293.6523 184.3843").data('id', 'csb4_211_label');
var csb4_201_label = rsr.text(15, -5, '201').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 293.6523 443.4253").data('id', 'csb4_201_label');
var csb4_210_label = rsr.text(15, -5, '210').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 360.3032 184.3843").data('id', 'csb4_210_label');
var csb4_202_label = rsr.text(15, -5, '202').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 360.3032 443.4253").data('id', 'csb4_202_label');
var csb4_209_label = rsr.text(15, -5, '209').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 428.5586 184.3843").data('id', 'csb4_209_label');
var csb4_203_label = rsr.text(15, -5, '203').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 428.5586 443.4253").data('id', 'csb4_203_label');
var csb4_208_label = rsr.text(15, -5, '208').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 493.6035 184.3843").data('id', 'csb4_208_label');
var csb4_204_label = rsr.text(15, -5, '204').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 493.6035 443.4253").data('id', 'csb4_204_label');
var csb4_207_label = rsr.text(15, -5, '207').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 559.4512 184.3843").data('id', 'csb4_207_label');
var csb4_205_label = rsr.text(15, -5, '205').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '20.9725',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 559.4512 443.4253").data('id', 'csb4_205_label');
var csb4_206_label = rsr.text(15, -5, '206').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '19.3554',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m0.9937 0 0 1 661.8242 316.6831").data('id', 'csb4_206_label');
var strg_422_label = rsr.text(0, 0, 'STORAGE').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '9.3019',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m0.6716 0 0 1 707.6426 398.2573").data('id', 'strg_422_label');
var strg_421_label = rsr.text(0, 0, 'STORAGE').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '8.7043',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m0.7893 0 0 1 703.9414 233.9873").data('id', 'strg_421_label');
var text_bb = rsr.text(0, 0, 'CR').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '8.8516',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 156.8413 393.7476").data('id', 'text_bb');
var text_bc = rsr.text(0, 0, 'CR').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '8.8516',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 154.1748 226.3452").data('id', 'text_bc');
var csb4_212_label = rsr.text(20, -5, 'PHYSICS\nLAB').attr({fill: '#FFFFFF',"font-family": 'Arial',"font-size": '14',parent: 'text','stroke-width': '1','stroke-opacity': '1'}).transform("m1 0 0 1 175.4961 293.1831").data('id', 'csb4_212_label');
text.attr({'id': 'text','name': 'text'});
var icons = rsr.set();
var path_be = rsr.path("M 217.03,361.965 210.442,368.62 217.03,375.206 217.03,370.874 240.979,370.874 240.979,366.382    217.03,366.382   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_be');
var path_bf = rsr.path("M 580.201,291.753 573.613,298.408 580.201,304.994 580.201,300.662 604.15,300.662 604.15,296.17    580.201,296.17   z").attr({fill: '#BC2833',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_bf');
icons.attr({'id': 'icons','name': 'icons'});
var group_e = rsr.set();
var path_bg = rsr.path("M680.307,375.977c-0.04-0.039-0.086-0.074-0.131-0.105l0.012-0.012l-4.576-4.576v-0.002h-6.084v0.012    l-4.567,4.566l0.013,0.012c-0.045,0.031-0.089,0.064-0.129,0.105c-0.438,0.439-0.438,1.146,0,1.586    c0.437,0.438,1.148,0.438,1.587,0c0.038-0.039,0.072-0.086,0.105-0.129l0.011,0.012l2.98-2.98v6.148v7.36h0.019    c-0.01,0.063-0.019,0.125-0.019,0.188c0,0.705,0.57,1.275,1.273,1.275c0.705,0,1.275-0.57,1.275-1.275    c0-0.063-0.009-0.125-0.019-0.188h0.019v-7.36h0.986v7.36h0.019c-0.01,0.063-0.019,0.125-0.019,0.188    c0,0.705,0.571,1.275,1.273,1.275c0.705,0,1.275-0.57,1.275-1.275c0-0.063-0.009-0.125-0.019-0.188h0.019v-7.36v-6.156l2.99,2.988    l0.012-0.012c0.031,0.043,0.066,0.088,0.106,0.129c0.438,0.439,1.148,0.439,1.587,0    C680.744,377.124,680.744,376.417,680.307,375.977z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_bg');
var circle_bh = rsr.circle(672, 367, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_bh');
group_e.attr({'parent': 'icons','name': 'group_e'});
var group_f = rsr.set();
var path_bi = rsr.path("M679.79,236.019c-0.039-0.039-0.086-0.073-0.131-0.106l0.014-0.011l-4.579-4.577l-0.034,0.033    l-0.008-0.033h-4.954l-0.006,0.025l-0.026-0.027l-4.577,4.579l0.013,0.011c-0.046,0.033-0.09,0.065-0.13,0.106    c-0.438,0.438-0.438,1.148,0,1.586c0.438,0.437,1.147,0.437,1.587,0c0.038-0.039,0.072-0.084,0.104-0.129l0.013,0.011l2.184-2.184    l-1.929,9.147h2.347v3.564h0.018c-0.008,0.063-0.018,0.125-0.018,0.188c0,0.705,0.512,1.276,1.142,1.276    c0.631,0,1.142-0.571,1.142-1.276c0-0.064-0.009-0.126-0.017-0.188h0.017v-3.564h1.172v3.564h0.017    c-0.008,0.063-0.017,0.125-0.017,0.188c0,0.705,0.512,1.276,1.142,1.276c0.631,0,1.143-0.571,1.143-1.276    c0-0.064-0.01-0.126-0.017-0.188h0.017v-3.564h2.348l-1.896-9.182l2.22,2.219l0.011-0.012c0.032,0.044,0.065,0.088,0.106,0.129    c0.437,0.438,1.147,0.438,1.586,0C680.228,237.167,680.228,236.457,679.79,236.019z").attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'path_bi');
var circle_bj = rsr.circle(672, 227, 2).attr({fill: '#FFFFFF',parent: 'icons','stroke-width': '1','stroke-opacity': '1'}).data('id', 'circle_bj');
group_f.attr({'parent': 'icons','name': 'group_f'});


var rsrGroups = [Layer_2,group_a,Layer_12,group_b,group_c,unreachable_1_,group_d,rooms,text,icons,group_e,group_f];
Layer_2.push(
	rect_g 
);
group_a.push(
	rect_h 
);
Layer_12.push(
	path_i ,
	text_j ,
	text_k 
);
group_b.push(
	rect_l ,
	rect_m ,
	rect_n ,
	rect_o ,
	rect_p 
);
group_c.push(
	rect_q ,
	rect_r ,
	rect_s ,
	rect_t ,
	rect_u 
);
unreachable_1_.push(
);
group_d.push(
	path_v ,
	rect_w ,
	path_x 
);
rooms.push(
	cr_421 ,
	cr_422 ,
	csb4_201 ,
	csb4_202 ,
	csb4_203 ,
	csb4_204 ,
	csb4_205 ,
	csb4_206 ,
	csb4_207 ,
	csb4_208 ,
	csb4_209 ,
	csb4_210 ,
	csb4_211 ,
	csb4_212 ,
	strg_421 ,
	strg_422 
);
text.push(
	csb4_201_label ,
	csb4_202_label ,
	csb4_203_label ,
	csb4_204_label ,
	csb4_205_label ,
	csb4_206_label ,
	csb4_207_label ,
	csb4_208_label ,
	csb4_209_label ,
	csb4_210_label ,
	csb4_211_label ,
	csb4_212_label ,
	strg_421_label ,
	strg_422_label 
	// text_bb ,
	// text_bc ,
);
icons.push(
	path_be ,
	path_bf 
);
group_e.push(
	path_bg ,
	circle_bh 
);
group_f.push(
	path_bi ,
	circle_bj 
);

	text.attr({
		cursor:"pointer"
	});

	csb4_201_label.data({"val":csb4_201});
	csb4_202_label.data({"val":csb4_202});
	csb4_203_label.data({"val":csb4_203});
	csb4_204_label.data({"val":csb4_204});
	csb4_205_label.data({"val":csb4_205});
	csb4_206_label.data({"val":csb4_206});
	csb4_207_label.data({"val":csb4_207});
	csb4_208_label.data({"val":csb4_208});
	csb4_209_label.data({"val":csb4_209});
	csb4_210_label.data({"val":csb4_210});
	csb4_211_label.data({"val":csb4_211});
	csb4_212_label.data({"val":csb4_212});
	strg_421_label.data({"val":strg_421});
	strg_422_label.data({"val":strg_422});

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