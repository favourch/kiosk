function oldsshow_b21f(highlight){

	highlight = highlight || "";
		
    console.log("drawing b21f map");

 
	var Layer_1 = rsr.set();
	Layer_1.attr({'id': 'Layer_1','display': 'none','name': 'Layer_1'});
	var Layer_4 = rsr.set();
	var rect_c = rsr.rect(0, 0, 849.997, 535.549).attr({fill: '#DFF2F8',stroke: '#000000',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_c');
	Layer_4.attr({'id': 'Layer_4','name': 'Layer_4'});
	var Layer_2 = rsr.set();
	var path_d = rsr.path("M688.325,238.068v-24.894h-48.041V33.736H175.235l-0.688,470.092   h465.048l0.688-171.641h48.041v-26.983c3.715-8.722,5.848-19.59,5.848-32.696C694.172,258.064,692.04,246.766,688.325,238.068z").attr({fill: '#00ADEE',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_2','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_d');
	Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
	var Layer_3 = rsr.set();
	var rect_e = rsr.rect(175.235, 33.965, 133.69, 121.078).attr({x: '175.235',y: '33.965',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_103');
	var rect_f = rsr.rect(174.547, 387.395, 133.69, 116.434).attr({x: '174.547',y: '387.395',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_104');
	var rect_g = rsr.rect(359.833, 387.395, 145.844, 116.434).attr({x: '359.833',y: '387.395',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_105');
	var rect_h = rsr.rect(278.197, 204.575, 97.115, 133.805).attr({x: '278.197',y: '204.575',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_h');
	var rect_i = rsr.rect(174.547, 204.575, 68.336, 66.902).attr({x: '174.547',y: '204.575',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_i');
	var rect_j = rsr.rect(174.547, 271.477, 68.336, 66.903).attr({x: '174.547',y: '271.477',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_j');
	var rect_k = rsr.rect(375.312, 204.575, 198.013, 133.805).attr({x: '375.312',y: '204.575',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_k');
	var rect_l = rsr.rect(573.325, 387.395, 66.5, 116.434).attr({x: '573.325',y: '387.395',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_107');
	var rect_m = rsr.rect(505.677, 387.395, 67.876, 116.434).attr({x: '505.677',y: '387.395',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_106');
	var rect_n = rsr.rect(308.926, 33.965, 133.69, 121.078).attr({x: '308.926',y: '33.965',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_102');
	var rect_o = rsr.rect(441.01, 33.965, 133.69, 121.078).attr({x: '441.01',y: '33.965',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_101');
	/*
	var text_p = rsr.text(0, 0, 'LECTURE\nROOM').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 212.1909 91.8916").data('id', 'text_p');
	var text_q = rsr.text(0, 0, 'COMPUTER\nLAB').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 331.8472 91.8916").data('id', 'text_q');
	var text_r = rsr.text(0, 0, 'COMPUTER\nLAB').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 468.4038 91.8916").data('id', 'text_r');
	var text_s = rsr.text(0, 0, 'LECTURE\nROOM').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 206.7813 440.1099").data('id', 'text_s');
	var text_t = rsr.text(0, 0, 'COMPUTER\nLAB').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 394.9077 445.6138").data('id', 'text_t');
	var text_u = rsr.text(0, 0, 'CANTEEN').attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '16.5106',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 441.3892 271.4775").data('id', 'text_u');
	var text_v = rsr.text(0, 0, 'FEMALE\nC.R.').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 179.8516 235.0166").data('id', 'text_v');
	var text_w = rsr.text(0, 0, 'MALE\nC.R.').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 187.9331 298.8237").data('id', 'text_w');
	var text_x = rsr.text(0, 0, 'OFFICE').attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '16.5106',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 515.063 449.2817").data('id', 'text_x');
	var text_y = rsr.text(0, 0, 'COMPUTER\nTECHNICIAN\nROOM').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 579.1274 428.8071").data('id', 'text_y');
	
	*/
	Layer_3.attr({'id': 'Layer_3','name': 'Layer_3'});
	var group_a = rsr.set();
	var rect_z = rsr.rect(175.235, 338.379, 67.648, 49.018).attr({x: '175.235',y: '338.379',fill: '#00A9E1',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_z');
	group_a.attr({'parent': 'Layer_3','name': 'group_a'});
	var group_b = rsr.set();
	var rect_aa = rsr.rect(574.701, 33.965, 65.124, 89.875).attr({x: '574.701',y: '33.965',fill: '#00A9E1',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_aa');
	group_b.attr({'parent': 'Layer_3','name': 'group_b'});


	var rsrGroups = [Layer_1,Layer_4,Layer_2,Layer_3,group_a,group_b];
	
	var clickable = [

		rect_e ,
		rect_f ,
		rect_g ,
		rect_h ,
		rect_i ,
		rect_j ,
		rect_k ,
		rect_l ,
		rect_m ,
		rect_n ,
		rect_o 

	];
/*
	for (var i = 0, len = clickable.length; i < len; i++) {
        var element = clickable[i];
        if(element){
            element.click(function(){
                console.log("click function working for "+this.data('id'));
                alert(this.data('id'));
            });
        }
        else{
            console.log("there was an error in element "+i);
        }
    }
*/

	
    highlightRoom(clickable, highlight);
    setClickable(clickable);
}

function  oldshow_b22f(highlight){
	highlight = highlight || "";


    console.log("drawing b22f map");

	var Layer_1 = rsr.set();
	Layer_1.attr({'id': 'Layer_1','display': 'none','name': 'Layer_1'});
	var Layer_4 = rsr.set();
	var rect_e = rsr.rect(0, 0, 849.997, 535.549).attr({fill: '#DFF2F8',stroke: '#000000',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_e');
	Layer_4.attr({'id': 'Layer_4','name': 'Layer_4'});
	
	var group_a = rsr.set();
	var rect_ab = rsr.rect(175.235, 338.379, 67.648, 49.018).attr({x: '175.235',y: '338.379',fill: '#00A9E1',stroke: '#FFFFFF',"stroke-miterlimit": '10',display: 'inline',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_ab');
	group_a.attr({'display': 'inline','parent': 'Layer_3','name': 'group_a'});
	var group_b = rsr.set();
	var rect_ac = rsr.rect(574.701, 33.965, 65.124, 89.875).attr({x: '574.701',y: '33.965',fill: '#00A9E1',stroke: '#FFFFFF',"stroke-miterlimit": '10',display: 'inline',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_ac');
	group_b.attr({'display': 'inline','parent': 'Layer_3','name': 'group_b'});
	var Layer_5 = rsr.set();
	var path_ad = rsr.path("M688.934,238.559v-24.954h-48.157V33.736H174.614l-0.69,471.22   h466.164l0.688-172.053h48.157v-27.048c3.724-8.743,5.861-19.637,5.861-32.774C694.795,258.603,692.658,247.276,688.934,238.559z").attr({fill: '#00ADEE',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ad');
	var rect_ae = rsr.rect(174.614, 99.13, 67.81, 56.204).attr({x: '174.614',y: '99.13',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_203');
	var rect_af = rsr.rect(174.614, 33.966, 67.465, 65.164).attr({x: '174.614',y: '33.966',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_pub2');
	var rect_ag = rsr.rect(242.424, 33.966, 35.398, 65.164).attr({x: '242.424',y: '33.966',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_tata');
	var rect_ah = rsr.rect(173.924, 388.244, 201.706, 116.713).attr({x: '173.924',y: '388.244',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_205');
	var rect_ai = rsr.rect(375.63, 388.244, 198.028, 116.713).attr({x: '375.63',y: '388.244',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_206');
	var rect_aj = rsr.rect(277.823, 204.984, 97.348, 134.125).attr({x: '277.823',y: '204.984',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_aj');
	var rect_ak = rsr.rect(173.924, 155.334, 68.5, 116.713).attr({x: '173.924',y: '155.334',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_204');
	var rect_al = rsr.rect(173.924, 272.047, 68.5, 67.063).attr({x: '173.924',y: '272.047',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_2crf1');
	var rect_am = rsr.rect(375.171, 204.984, 198.488, 134.125).attr({x: '375.171',y: '204.984',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_200');
	var rect_an = rsr.rect(573.659, 388.244, 66.66, 116.713).attr({x: '573.659',y: '388.244',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_207');
	var rect_ao = rsr.rect(277.823, 33.966, 164.813, 121.368).attr({x: '277.823',y: '33.966',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_202');
	var rect_ap = rsr.rect(441.026, 33.966, 134.011, 121.368).attr({x: '441.026',y: '33.966',fill: '#0099CC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2_201');
	/*var text_aq = rsr.text(0, 0, 'SCIENTIA\nOFFICE').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 181.4834 124.0562").data('id', 'text_aq');
	var text_ar = rsr.text(0, 0, 'MALE\nC.R.').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 191.0737 63.2471").data('id', 'text_ar');
	var text_as = rsr.text(0, 0, 'TATA FREDâ€™S\nFORT').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 244.9731 63.2461").data('id', 'text_as');
	var text_at = rsr.text(0, 0, 'COMPUTER\nLAB').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 320.6831 92.0288").data('id', 'text_at');
	var text_au = rsr.text(0, 0, 'COMPUTER\nLAB').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 468.4849 92.0288").data('id', 'text_au');
	var text_av = rsr.text(0, 0, 'COMPUTER\nLAB').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 434.8677 440.1626").data('id', 'text_av');
	var text_aw = rsr.text(0, 0, 'COMPUTER\nLAB').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 236.2651 440.1626").data('id', 'text_aw');
	var text_ax = rsr.text(0, 0, 'CS/IT\nDEPARTMENT\nFACULTY ROOM').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 456.606 251.8179").data('id', 'text_ax');
	var text_ay = rsr.text(0, 0, 'CSC\nOFFICE').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 193.3569 204.9834").data('id', 'text_ay');
	var text_az = rsr.text(0, 0, 'FEMALE\nC.R.').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 179.2397 299.4575").data('id', 'text_az');
	var text_ba = rsr.text(0, 0, 'GUIDANCE\nOFFICE').attr({parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 578.3472 440.1626").data('id', 'text_ba');
	*/
	Layer_5.attr({'id': 'Layer_5','name': 'Layer_5'});
	var group_c = rsr.set();
	var rect_bb = rsr.rect(174.614, 339.11, 67.81, 49.136).attr({x: '174.614',y: '339.11',fill: '#00A9E1',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_bb');
	group_c.attr({'parent': 'Layer_5','name': 'group_c'});
	var group_d = rsr.set();
	var rect_bc = rsr.rect(575.037, 33.966, 65.282, 90.09).attr({x: '575.037',y: '33.966',fill: '#00A9E1',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_5','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_bc');
	group_d.attr({'parent': 'Layer_5','name': 'group_d'});



	var clickable = [
		
		rect_ab ,
		rect_ac ,
		rect_ae ,
		rect_af ,
		rect_ag ,
		rect_ah ,
		rect_ai ,
		rect_aj ,
		rect_ak ,
		rect_al ,
		rect_am ,
		rect_an ,
		rect_ao ,
		rect_ap 
	];
	
    highlightRoom(clickable, highlight);

	setClickable(clickable);
}



function oldshow_b31f(){

    console.log("drawing b31f map");


	var Layer_4 = rsr.set();
	var rect_a = rsr.rect(0, 0, 555.166, 312.32).attr({fill: '#E7DFA4',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_a');
	Layer_4.attr({'id': 'Layer_4','name': 'Layer_4'});
	var Layer_2 = rsr.set();
	var path_b = rsr.path("M397.267,89.212V21.497H156.735v67.715h-32.97v135.431h32.97   v65.92h240.532v-65.92l34.037,0.041l0.095-134.799L397.267,89.212z M338.849,191.683H217.367v-67.492h121.482V191.683z").attr({fill: '#00ADEE',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_2','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_b');
	Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
	var Layer_3 = rsr.set();
	var rect_c = rsr.rect(234.295, 21.497, 162.972, 67.721).attr({x: '234.295',y: '21.497',opacity: '0.55',fill: '#1B75BB',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_c');
	var rect_d = rsr.rect(364.617, 90.062, 66.059, 49.183).attr({x: '364.617',y: '90.062',opacity: '0.55',fill: '#1B75BB',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_d');
	var rect_e = rsr.rect(364.857, 139.244, 66.06, 51.112).attr({x: '364.857',y: '139.244',opacity: '0.55',fill: '#1B75BB',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_e');
	var rect_f = rsr.rect(325.077, 224.41, 72.19, 66.153).attr({x: '325.077',y: '224.41',opacity: '0.55',fill: '#1B75BB',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_f');
	var rect_g = rsr.rect(230.087, 223.868, 66.542, 66.695).attr({x: '230.087',y: '223.868',opacity: '0.55',fill: '#1B75BB',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_g');
	var rect_h = rsr.rect(156.313, 223.868, 73.774, 66.695).attr({x: '156.313',y: '223.868',opacity: '0.55',fill: '#1B75BB',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_h');
	var rect_i = rsr.rect(124.488, 122.036, 65.095, 101.832).attr({x: '124.488',y: '122.036',opacity: '0.55',fill: '#1B75BB',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_i');
	var path_j = rsr.path("M 156.313,21.35 156.313,89.248    168.807,89.248 168.807,77.332 188.473,77.332 188.473,89.248 202.008,89.248 202.008,21.35   z").attr({opacity: '0.55',fill: '#1B75BB',stroke: '#F1F1F2',"stroke-miterlimit": '10',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_j');
	var text_k = rsr.text(0, 0, 'AUDITORIUM').attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '8.6793',parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1'}).transform("m1 0 0 1 291.1899 58.9609").data('id', 'text_k');
	var text_l = rsr.text(0, 0, 'BIOLOGY\nDEPARTMENT').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 385.0415 110.5552").data('id', 'text_l');
	var text_m = rsr.text(0, 0, 'CHEMISTRY\nDEPARTMENT').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 380.6235 159.7378").data('id', 'text_m');
	var text_n = rsr.text(0, 0, 'RSTC\nOFFICE').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 352.0249 257.2163").data('id', 'text_n');
	var text_o = rsr.text(0, 0, 'BIOLOGY\nLABORATORY\nROOM').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 253.0586 251.8345").data('id', 'text_o');
	var text_p = rsr.text(0, 0, 'BIOLOGY\nLABORATORY\nROOM').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 179.043 253.7642").data('id', 'text_p');
	var text_q = rsr.text(0, 0, 'LECTURE\nROOM').attr({parent: 'Layer_3','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 147.1704 167.4526").data('id', 'text_q');
	Layer_3.attr({'id': 'Layer_3','name': 'Layer_3'});


	var rsrGroups = [Layer_4,Layer_2,Layer_3];
	Layer_4.push(
		rect_a 
	);
	Layer_2.push(
		path_b 
	);
	Layer_3.push(
		rect_c ,
		rect_d ,
		rect_e ,
		rect_f ,
		rect_g ,
		rect_h ,
		rect_i ,
		path_j ,
		text_k ,
		text_l ,
		text_m ,
		text_n ,
		text_o ,
		text_p ,
		text_q 
	);
	
	
	
}

function oldshow_b41f(highlight){
	highlight = highlight || "";

	console.log("drawing b41f map");


	var path_e = rsr.path("M690.049,125.818V90.774h-32.591V19.29H215.934v71.485h-31.539  v35.043H70.86v249.498h113.535v39.246h31.539v64.126h441.524v-64.126h32.591v-39.246h118.09V125.818H690.049z M628.419,222.259  h-50.723v57.381h50.723v29.092h-50.723h-32.325H244.976V192.035h300.395h32.325h50.723V222.259z");
	path_e.attr({fill: '#00A9E2',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_e');
	var rect_f = rsr.rect(230.784, 33.296, 83.05, 107.229);
	rect_f.attr({x: '230.784',y: '33.296',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_111');
	var rect_g = rsr.rect(313.833, 33.296, 83.048, 107.229);
	rect_g.attr({x: '313.833',y: '33.296',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_110');
	var rect_h = rsr.rect(396.882, 33.296, 83.05, 107.229);
	rect_h.attr({x: '396.882',y: '33.296',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_109');
	var rect_i = rsr.rect(479.932, 33.296, 83.048, 107.229);
	rect_i.attr({x: '479.932',y: '33.296',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_108');
	var rect_j = rsr.rect(562.979, 33.296, 83.048, 107.229);
	rect_j.attr({x: '562.979',y: '33.296',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_107');
	var rect_k = rsr.rect(687.728, 201.505, 93.209, 94.966);
	rect_k.attr({x: '687.728',y: '201.505',opacity: '0.55',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_106');
	var rect_l = rsr.rect(687.728, 140.524, 67.28, 43.803);
	rect_l.attr({x: '687.728',y: '140.524',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_1crf1');
	var rect_m = rsr.rect(765.17, 335.005, 42.969, 40.125);
	rect_m.attr({x: '765.17',y: '335.005',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_1strg2');
	var path_n = rsr.path("M 753.607,335.003 753.607,314.507   687.728,314.507 687.728,355.505 699.292,355.505 753.607,355.505 765.17,355.505 765.17,335.003  z");
	path_n.attr({opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_1crm1');
	var rect_o = rsr.rect(562.979, 355.505, 83.048, 107.228);
	rect_o.attr({x: '562.979',y: '355.505',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_105');
	var rect_p = rsr.rect(479.932, 355.505, 83.048, 107.228);
	rect_p.attr({x: '479.932',y: '355.505',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_104');
	var rect_q = rsr.rect(396.882, 355.505, 83.05, 107.228);
	rect_q.attr({x: '396.882',y: '355.505',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_103');
	var rect_r = rsr.rect(313.833, 355.505, 83.048, 107.228);
	rect_r.attr({x: '313.833',y: '355.505',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_102');
	var rect_s = rsr.rect(230.784, 355.505, 83.05, 107.228);
	rect_s.attr({x: '230.784',y: '355.505',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_101');
	var path_t = rsr.path("M 770.646,126.508 770.646,140.524   755.008,140.524 755.008,166.104 808.139,166.104 808.139,126.508  z");
	path_t.attr({opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_1strg1');
	/* 
	var text_u = rsr.text(0, 0, 'CLASSROOM');
	text_u.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_u.transform("m1 0 0 1 247.3398 89.4326").data('id', 'text_u');
	var text_v = rsr.text(0, 0, 'CLASSROOM');
	text_v.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_v.transform("m1 0 0 1 335.6445 89.4326").data('id', 'text_v');
	var text_w = rsr.text(0, 0, 'CLASSROOM');
	text_w.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_w.transform("m1 0 0 1 414.4883 89.4326").data('id', 'text_w');
	var text_x = rsr.text(0, 0, 'CLASSROOM');
	text_x.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_x.transform("m1 0 0 1 497.5371 89.4326").data('id', 'text_x');
	var text_y = rsr.text(0, 0, 'CLASSROOM');
	text_y.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_y.transform("m1 0 0 1 584.2676 89.4326").data('id', 'text_y');
	var text_z = rsr.text(0, 0, 'AVR');
	text_z.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '19.3294','stroke-width': '0','stroke-opacity': '1'});
	text_z.transform("m1 0 0 1 721.3662 258.6719").data('id', 'text_z');
	var text_aa = rsr.text(0, 0, 'CLASSROOM');
	text_aa.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_aa.transform("m1 0 0 1 579.5361 409.1201").data('id', 'text_aa');
	var text_ab = rsr.text(0, 0, 'MALE C.R.');
	text_ab.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_ab.transform("m1 0 0 1 705.4775 339.4512").data('id', 'text_ab');
	var text_ac = rsr.text(0, 0, 'FEMALE C.R.');
	text_ac.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_ac.transform("m1 0 0 1 704.6182 162.4277").data('id', 'text_ac');
	var text_ad = rsr.text(0, 0, 'STORAGE');
	text_ad.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_ad.transform("m1 0 0 1 771.0391 357.083").data('id', 'text_ad');
	var text_ae = rsr.text(0, 0, 'STORAGE');
	text_ae.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_ae.transform("m1 0 0 1 765.1699 155.9414").data('id', 'text_ae');
	var text_af = rsr.text(0, 0, 'CLASSROOM');
	text_af.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_af.transform("m1 0 0 1 497.5371 409.1201").data('id', 'text_af');
	var text_ag = rsr.text(0, 0, 'CLASSROOM');
	text_ag.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_ag.transform("m1 0 0 1 414.4883 409.1201").data('id', 'text_ag');
	var text_ah = rsr.text(0, 0, 'CLASSROOM');
	text_ah.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_ah.transform("m1 0 0 1 335.6445 409.1201").data('id', 'text_ah');
	var text_ai = rsr.text(0, 0, 'CLASSROOM');
	text_ai.attr({fill: '#FFFFFF',"font-family": 'MyriadPro-Regular',"font-size": '7.7794','stroke-width': '0','stroke-opacity': '1'});
	text_ai.transform("m1 0 0 1 253.1211 409.1201").data('id', 'text_ai');
	*/

	var path_aj = rsr.path("M 96.225,228.375 96.225,312.403   96.225,314.332 96.225,331.853 74.497,331.853 74.497,370.748 111.292,370.748 111.292,352.876 121.454,352.876 121.454,314.332   184.396,314.332 184.396,228.375  z");
	path_aj.attr({opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_113');
	var group_a = rsr.set();
	var path_ak = rsr.path("M 765.17,355.505 753.607,355.505 699.292,355.505    687.728,355.505 646.027,355.505 646.027,462.732 562.979,462.732 479.932,462.732 396.882,462.732 313.833,462.732    230.784,462.732 230.784,355.505 187.682,355.505 184.396,355.505 111.292,355.505 111.292,370.748 74.497,370.748 74.497,331.853    96.225,331.853 96.225,314.332 96.225,312.403 96.225,161.9 70.86,161.9 70.86,375.315 184.396,375.315 184.396,414.562    215.934,414.562 215.934,478.688 657.458,478.688 657.458,414.562 690.049,414.562 690.049,375.315 808.139,375.315    808.139,375.13 765.17,375.13   z").attr({fill: '#D7E8F7',stroke: '#262262',"stroke-miterlimit": '10',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_ak');
	var rect_al = rsr.rect(781.573, 166.104, 26.565, 168.901).attr({x: '781.573',y: '166.104',fill: '#D7E8F7',stroke: '#262262',"stroke-miterlimit": '10',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_al');
	var path_am = rsr.path("M 690.049,125.818 690.049,90.774 657.458,90.774    657.458,19.29 215.934,19.29 215.934,90.774 184.396,90.774 184.396,125.818 106.736,125.818 106.736,140.524 184.396,140.524    230.784,140.524 230.784,33.296 313.833,33.296 396.882,33.296 479.932,33.296 562.979,33.296 646.027,33.296 646.027,140.524    687.728,140.524 755.008,140.524 770.646,140.524 770.646,126.508 808.139,126.508 808.139,125.818   z").attr({fill: '#D7E8F7',stroke: '#262262',"stroke-miterlimit": '10',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_am');
	group_a.attr({'name': 'group_a'});
	var group_b = rsr.set();
	var rect_an = rsr.rect(74.497, 331.853, 21.728, 0.001).attr({x: '74.497',y: '331.853',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'group_b','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_an');
	var path_ao = rsr.path("M 106.736,140.524 106.736,125.807    70.86,125.807 70.86,161.9 96.225,161.9 96.225,228.376 184.396,228.376 184.396,140.524   z").attr({opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'group_b','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_112');
	group_b.attr({'name': 'group_b'});
	var group_c = rsr.set();
	var rect_ap = rsr.rect(579.536, 224.8, 50.021, 51.861).attr({x: '579.536',y: '224.8',fill: '#00A9E2',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'group_c','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_ap');
	group_c.attr({'name': 'group_c'});
	var group_d = rsr.set();
	var rect_aq = rsr.rect(121.454, 314.156, 62.941, 41.349).attr({x: '121.454',y: '314.156',fill: '#00A9E2',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'group_d','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_aq');
	group_d.attr({'name': 'group_d'});


	var rsrGroups = [group_a,group_b,group_c,group_d];
	group_a.push(
		path_ak ,
		rect_al ,
		path_am 
	);
	group_b.push(
		rect_an ,
		path_ao 
	);
	group_c.push(
		rect_ap 
	);
	group_d.push(
		rect_aq 
	);
	
	var nonClickable = [

	  path_e, 
	  rect_f, 
	  rect_g, 
	  rect_h, 
	  rect_i ,
	  rect_j ,
	  rect_k ,
	  rect_l ,
	  rect_m ,
	  path_n ,
	  rect_o ,
	  rect_p ,
	  rect_q ,
	  rect_r ,
	  rect_s ,
	  path_t , 

	  path_aj ,
	  group_a ,
	  path_ak ,
	  rect_al ,
	  path_am ,
	  group_b ,
	  rect_an ,
	  path_ao ,
	  group_c ,
	  rect_ap ,
	  group_d ,
	  rect_aq 
	];
	var clickable = [
	  rect_f, 
	  rect_g, 
	  rect_h, 
	  rect_i ,
	  rect_j ,
	  rect_k ,
	  rect_l ,
	  rect_m ,
	  path_n ,
	  rect_o ,
	  rect_p ,
	  rect_q ,
	  rect_r ,
	  rect_s ,
	  path_t ,
	  path_aj ,
	  path_ao
	];


    highlightRoom(clickable, highlight);
    setClickable(clickable);

    
	
}

function oldshow_b42f(highlight){
	highlight = highlight || "";

	var Layer_2 = rsr.set();
	var rect_d = rsr.rect(0, 0, 850, 535.563).attr({fill: '#FFFFFF',stroke: '#000000',"stroke-miterlimit": '10',parent: 'Layer_2','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_d');
	Layer_2.attr({'id': 'Layer_2','name': 'Layer_2'});
	var Layer_4 = rsr.set();
	var path_e = rsr.path("M678.934,146.659v-35.097h-32.639V39.967H204.089v71.595h-31.586   v35.097H58.794V396.54h113.709v39.306h31.586v64.225h442.206v-64.225h32.639V396.54h118.273V146.659H678.934z M617.213,243.248   H566.41v57.471h50.803v29.137H566.41h-32.375H233.177V212.979h300.858h32.375h50.803V243.248z").attr({fill: '#00A9E2',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_e');
	var rect_f = rsr.rect(217.294, 52.327, 83.176, 107.393).attr({x: '217.294',y: '52.327',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_211');
	var rect_g = rsr.rect(300.47, 52.327, 83.176, 107.393).attr({x: '300.47',y: '52.327',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_210');
	var rect_h = rsr.rect(383.646, 52.327, 83.178, 107.393).attr({x: '383.646',y: '52.327',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_209');
	var rect_i = rsr.rect(466.824, 52.327, 83.176, 107.393).attr({x: '466.824',y: '52.327',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_208');
	var rect_j = rsr.rect(550, 52.327, 83.178, 107.393).attr({x: '550',y: '52.327',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_207');
	var rect_k = rsr.rect(674.941, 220.794, 93.354, 95.112).attr({x: '674.941',y: '220.794',opacity: '0.55',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_206');
	var rect_l = rsr.rect(674.941, 159.72, 67.381, 43.871).attr({x: '674.941',y: '159.72',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_2crf1');
	var rect_m = rsr.rect(752.502, 354.501, 43.035, 40.186).attr({x: '752.502',y: '354.501',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_2strg2');
	var path_n = rsr.path("M 740.92,354.499 740.92,333.968    674.941,333.968 674.941,375.032 686.523,375.032 740.92,375.032 752.502,375.032 752.502,354.499   z").attr({opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_2crm1');
	var rect_o = rsr.rect(550, 375.032, 83.178, 107.392).attr({x: '550',y: '375.032',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_205');
	var rect_p = rsr.rect(466.824, 375.032, 83.176, 107.392).attr({x: '466.824',y: '375.032',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_204');
	var rect_q = rsr.rect(383.646, 375.032, 83.178, 107.392).attr({x: '383.646',y: '375.032',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_203');
	var rect_r = rsr.rect(300.47, 375.032, 83.176, 107.392).attr({x: '300.47',y: '375.032',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_202');
	var rect_s = rsr.rect(217.294, 375.032, 83.176, 107.392).attr({x: '217.294',y: '375.032',opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_201');
	var path_t = rsr.path("M 170.834,159.72 93.056,159.72    93.056,144.979 57.125,144.979 57.125,181.128 82.527,181.128 82.527,331.863 82.527,333.795 82.527,351.342 60.767,351.342    60.767,390.298 97.618,390.298 97.618,372.4 107.796,372.4 107.796,333.795 170.834,333.795   z").attr({opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_212');
	var path_u = rsr.path("M 757.986,145.682 757.986,159.72    742.322,159.72 742.322,185.339 795.537,185.339 795.537,145.682   z").attr({opacity: '0.57',fill: '#1C75BC',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4_2strg1');
	/*
	var text_v = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 233.8755 108.5488").data('id', 'text_v');
	var text_w = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 322.3159 108.5488").data('id', 'text_w');
	var text_x = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 401.2813 108.5488").data('id', 'text_x');
	var text_y = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 484.459 108.5488").data('id', 'text_y');
	var text_z = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 571.3184 108.5488").data('id', 'text_z');
	var text_aa = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 700.8223 272.7969").data('id', 'text_aa');
	var text_ab = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 566.582 428.7285").data('id', 'text_ab');
	var text_ac = rsr.text(0, 0, 'S\nT\nO\nR\nA\nGE').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 758.3789 376.6104").data('id', 'text_ac');
	var text_ad = rsr.text(0, 0, 'S\nT\nO\nR\nA\nGE').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 752.5 175.1611").data('id', 'text_ad');
	var text_ae = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 484.459 428.7285").data('id', 'text_ae');
	var text_af = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 401.2813 428.7285").data('id', 'text_af');
	var text_ag = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 322.3159 428.7275").data('id', 'text_ag');
	var text_ah = rsr.text(0, 0, 'CLASS\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 239.6665 428.7275").data('id', 'text_ah');
	var text_ai = rsr.text(0, 0, 'P\nH\nY\nSICS LAB\nR\nOOM').attr({parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).transform("m1 0 0 1 95.1196 255.0908").data('id', 'text_ai');
	*/

	Layer_4.attr({'id': 'Layer_4','name': 'Layer_4'});
	var group_a = rsr.set();
	var path_aj = rsr.path("M 752.502,375.032 740.92,375.032 686.523,375.032     674.941,375.032 633.178,375.032 633.178,482.424 550,482.424 466.824,482.424 383.646,482.424 300.47,482.424 217.294,482.424     217.294,375.032 174.126,375.032 170.834,375.032 97.618,375.032 97.618,390.298 60.767,390.298 60.767,351.342 82.527,351.342     82.527,333.795 82.527,331.863 82.527,181.128 57.125,181.128 57.125,394.871 170.834,394.871 170.834,434.179 202.42,434.179     202.42,498.401 644.625,498.401 644.625,434.179 677.264,434.179 677.264,394.871 795.537,394.871 795.537,394.687     752.502,394.687    z").attr({fill: '#D7E8F7',stroke: '#262262',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_aj');
	var rect_ak = rsr.rect(768.928, 185.339, 26.609, 169.162).attr({x: '768.928',y: '185.339',fill: '#D7E8F7',stroke: '#262262',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_ak');
	var path_al = rsr.path("M 677.264,144.991 677.264,109.893 644.625,109.893     644.625,38.298 202.42,38.298 202.42,109.893 170.834,109.893 170.834,144.991 93.056,144.991 93.056,159.72 170.834,159.72     217.294,159.72 217.294,52.327 300.47,52.327 383.646,52.327 466.824,52.327 550,52.327 633.178,52.327 633.178,159.72     674.941,159.72 742.322,159.72 757.986,159.72 757.986,145.682 795.537,145.682 795.537,144.991    z").attr({fill: '#D7E8F7',stroke: '#262262',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_al');
	group_a.attr({'parent': 'Layer_4','name': 'group_a'});
	var group_b = rsr.set();
	var rect_am = rsr.rect(566.582, 244.124, 50.1, 51.942).attr({x: '566.582',y: '244.124',fill: '#357CC0',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_am');
	group_b.attr({'parent': 'Layer_4','name': 'group_b'});
	var group_c = rsr.set();
	var rect_an = rsr.rect(108.588, 334.851, 59.201, 38.892).attr({x: '108.588',y: '334.851',fill: '#357CC0',stroke: '#FFFFFF',"stroke-miterlimit": '10',parent: 'Layer_4','stroke-width': '0','stroke-opacity': '1'}).data('id', 'rect_an');
	group_c.attr({'parent': 'Layer_4','name': 'group_c'});


	var rsrGroups = [Layer_2,Layer_4,group_a,group_b,group_c];
	Layer_2.push(
		rect_d 
	);
	Layer_4.push(
		path_e ,
		rect_f ,
		rect_g ,
		rect_h ,
		rect_i ,
		rect_j ,
		rect_k ,
		rect_l ,
		rect_m ,
		path_n ,
		rect_o ,
		rect_p ,
		rect_q ,
		rect_r ,
		rect_s ,
		path_t ,
		path_u 
	);
	group_a.push(
		path_aj ,
		rect_ak ,
		path_al 
	);
	group_b.push(
		rect_am 
	);
	group_c.push(
		rect_an 
	);
	
	var nonClickable = [
	    rect_d,
		path_e ,
		rect_f ,
		rect_g ,
		rect_h ,
		rect_i ,
		rect_j ,
		rect_k ,
		rect_l ,
		rect_m ,
		path_n ,
		rect_o ,
		rect_p ,
		rect_q ,
		rect_r ,
		rect_s ,
		path_t ,
		path_u ,
		path_aj ,
		rect_ak ,
		path_al ,
		rect_am ,
		rect_an 	
	];

	var clickable = [
		rect_f ,
		rect_g ,
		rect_h ,
		rect_i ,
		rect_j ,
		rect_k ,
		rect_l ,
		rect_m ,
		path_n ,
		rect_o ,
		rect_p ,
		rect_q ,
		rect_r ,
		rect_s ,
		path_t ,
		path_u 
	];
	/*
	for (var i = 0, len = nonClickable.length; i < len; i++) {
        var element = nonClickable[i];
        if(element){
            element.click(function(){
                console.log("click function working for "+this.data('id'));
                alert(this.data('id'));
            });
        }
        else{
            console.log("there was an error in element "+i);
        }
    }
    */
    highlightRoom(clickable, highlight);
    setClickable(clickable);

}