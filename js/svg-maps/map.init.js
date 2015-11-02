var container = $("#map");
 var rsr = Raphael('map', 920, 617);
// var rsr = Raphael('map', 900, 400);
var panZoom = rsr.panzoom({ 
    initialZoom: 1, 
    gestures: true,
    initialPosition: { x: 0, y: 50} 
});

$(document).ready(function () {
    console.log("creating map");
    var inDetails = false;

    panZoom.enable();
    rsr.safari();


    $("#mapContainer #home").click(function (e) {
        $("[id^=floor]").addClass("hidden");
        $("#map_name").text("BUCS");

        show_cs();
    });
    $("#mapContainer #up").click(function (e) {
        panZoom.zoomIn(1);
        e.preventDefault();
    });

    $("#mapContainer #down").click(function (e) {
        panZoom.zoomOut(1);
        e.preventDefault();
    });
    $("#exit_map").click(function(){
        show_college("");
        ion.sound.play(CLICK_SOUND);

    });
    //$("[id^=floor]").addClass("hidden");

    show_college("");
    
    //close the search results panel
    $("#search_results").addClass("hidden");
    $("#close_search_results").addClass("hidden");
 
});


 

/*
    var attributes = {
        fill: '#F1F1F1',
        stroke: '#FFFFFF',
        'stroke-width': 2,
        'stroke-linejoin': 'round'
    };


    var arr = [];

    var overlay = r.rect(0, 0, r.width, r.height);
    overlay.attr({ fill: '#909090', 'fill-opacity': 1, "stroke-width": 0, stroke: '#FFFFFF' });
    for (var country in paths) {
        var obj;
        
        if (paths[country].path.constructor == Array) {
            obj = r.set();
            for (var i = 0; i < paths[country].path.length; i++) {
                var pt = r.path(paths[country].path[i]);
                obj.push(pt);
            }
        }
        else {
            obj = r.path(paths[country].path);
        }
        
        obj.attr(attributes);
        if(paths[country].hoverable=="true"){
            obj.data("hoverFill", "#4488FF");
            obj.data('fill', "#E1E1E1");
            obj.click(select_building);

            attributes['fill'] = "#E1E1E1";

            
            obj.hover(animateOver, animateOut);
            
        }
        
        //arr[paths[country].name] = obj;
    }

    $("#mapContainer #up").click(function (e) {
        panZoom.zoomIn(1);
        e.preventDefault();
    });

    $("#mapContainer #down").click(function (e) {
        panZoom.zoomOut(1);
        e.preventDefault();
    });
    
    function animateOver() {
        if (this.data("hoverFill")) {
            this.attr("fill", this.data("hoverFill"));
        }
    }

    function animateOut() {
        if (this.data("fill")) {
            this.attr("fill", this.data("fill"));
        }
    }
    function select_building() {
        console.log("finished");
        alert(this.data("hoverFill"));
        //window.location = "menu.html";
    }
*/

function removeMap(){
    removeMap();
}
function displayMap(building_code, floor_no, room_code){
    room_code = room_code || null;
    floor_no = floor_no || null;
    console.log("displaying map with: \n\tbuilding_code: '"+ building_code +"'\n\tfloor_no: '"+floor_no+"'\n\troom_code: '"+room_code+"'");


    rsr.clear();
    if(building_code=="cs"){
        show_college();
    }
     else if(building_code=="csb1"){
        if(floor_no==3){
            show_b13f(room_code);
        }
        else if(floor_no==2){
            show_b12f(room_code);
        }
        else if(floor_no==1){
            show_b11f(room_code);
        }
        else{
            show_college(building_code);
            showBuildingInfo(building_code);


        }
    }
    else if(building_code=="csb2"){
        if(floor_no==2){
            show_b22f(room_code);
        }
        else if(floor_no==1){
            show_b21f(room_code);
        }
        else{
            show_college(building_code);
            showBuildingInfo(building_code);


        }
        $("#map_name").text("CSB2");
        $("#floor1").removeClass("hidden").unbind().click(function(){
            //show_b21f();
            displayMap("csb2", 1);
        });
        $("#floor2").removeClass("hidden").unbind().click(function(){
            displayMap("csb2", 2);
        });
    }
    else if(building_code=="csb3"){
        if(floor_no==2){
            show_b32f(room_code);
        }
        else  if(floor_no==1){
            show_b31f(room_code);
        }
        else{
            show_college(building_code);
            showBuildingInfo(building_code);

        }
        $("#map_name").text("CSB3");

    }
    else if(building_code=="csb4"){
        if(floor_no==2){
            show_b42f(room_code);
        }
        else  if(floor_no==1){
            show_b41f(room_code);
        }
        else{
            show_college(building_code);
            showBuildingInfo(building_code);

        }

        //set floor options actions
        $("#map_name").text("CSB4");
        $("#floor1").removeClass("hidden").unbind().click(function(){
            //show_b41f();
            displayMap("csb4", 1)
        });
        $("#floor2").removeClass("hidden").unbind().click(function(){
            //show_b42f();
            displayMap("csb4", 2);
        });
    }
    else{
        show_college(room_code);
        $("#map_name").text("BUCS"); 
        $("floor_controls").addClass("hidden");
        //alert("error");
    }
    //showInfo(building_code, floor_no, room_code);
    $("#search_results").addClass("hidden");
    $("#close_search_results").addClass("hidden");
}
//send request to highlight room_code
function highlight(room_code){
    console.log("request highlight with element id : "+ room_code );
    var buildingId = null;
    $.ajax({
        url:"ajax/room_building_details.php",
        type:"GET",
        async:false,
        data:{room_code:room_code},
        success:function(data){
            var roomDetails = jQuery.parseJSON(data);
            building_code = roomDetails['building_code'];
            floor_no = roomDetails['floor_no'];
            //console.log("search location element - return data: " + data);
        }
    });
    //replaces building id wih room code if room code does not have a value;
    if(building_code==""){
        building_code = room_code;
        room_code = null;
        floor_no = null
        console.log("attempt to highlight : " + building_code);
    }
    else{
        console.log("highlighting : " +building_code+" "+floor_no+" "+room_code)
    }
    
    displayMap( building_code, floor_no, room_code);
    

    //show_cs(room_code);
}
//actually highlights element by changing color of element
function highlightElement(elements, element_code, old_color){
    old_color = old_color || '#5A80C1';
    console.log("highlight element : "+element_code);
    for (var i = 0, len = elements.length; i < len; i++) {
        var element = elements[i];
        element.attr({fill:old_color});
    }
    if(element_code!=""){
        for (var i = 0, len = elements.length; i < len; i++) {
            var element = elements[i];
            if(element.data('id')==element_code){
                element.attr({fill:'#e09918'});
            }
        }
    }
}

function showRoomTicket(id){
    var schedule_id = null;
    $.ajax({
        url:"ajax/room_schedule_details.php",
        type:"GET",
        data:{room_code:id},
        async:false,
        success:function(data){
            schedule_id = data;
            //alert(data);
        }
    }); 
    
    if(schedule_id!=""){
        console.log("room_code "+id+" has current schedule with sched_id :"+schedule_id);
        show_ticket(schedule_id);
    }
    else{
        console.log("room_code "+id+" has no current schedule");
        show_ticket(schedule_id);
    }

    //$("#ticket_modal").modal("toggle");
}


function setClickable(clickable){
    for (var i = 0, len = clickable.length; i < len; i++) {

        var el = clickable[i];
        var curr_fill = el.attr('fill');
        el.attr({
            opacity:"1.0",
            cursor:'pointer'
        });
        
        el.mouseover(function() {
            this.attr({
                stroke: '#fff',
                'stroke-width': '1',
                fill:'#e09918'
            });
        });
        el.mouseout(function() {
            this.attr({
                //fill: '#3182bd'
                fill:curr_fill,
                //'stroke-width': '0'
            });
            

        });
        el.click(function() {
            this.animate({
                //fill: '#6baed6'
            }, 200);
            ion.sound.play("water_droplet_3");

            console.log(this.data('id') + " has been toggled");
            //show room ticket upon request on button click
            //showRoomTicket(this.data('id'));
            showRoomInfo(this.data('id'));
        });
    }
}
function setLabelClick(labels){

    for (var i = 0, len = labels.length; i < len; i++) {

   
        var el = labels[i];
        el.mouseover(function() {
            var loc = this.data('val');
            loc.attr({
                fill:"#e09918"
            });
        });
        el.mouseout(function() {
            var loc = this.data('val');
            loc.attr({
                fill:"#8E97A5"
            });
        });
        el.click(function() {
            this.animate({
                //fill: '#6baed6'
            }, 200);
            ion.sound.play("water_droplet_3");

            //show room ticket upon request on button click
            //showRoomTicket(this.data('id'));
            var loc = this.data('val');
            console.log(loc.data('id') + " has been toggled");
            loc.attr({
                fill:"#e09918"
            });
            showRoomInfo(loc.data('id'));
        });
    }
}
function showCollegeInfo(){
    var rooms = 0;
    console.log("showing info of: college");
    $.ajax({
        url:"ajax/college_details.php",
        type:"GET",
        async:false,
        //data:{building_code:building_code},
        success:function(data){
            var collegeDetails = jQuery.parseJSON(data);
            rooms = collegeDetails['rooms'];
           
        }
    });
    $("#info_panel #info_1").text("College of Science");
    $("#info_panel #info_2").text("4 Buildings");
    $("#info_panel #info_3").text(rooms+" Rooms");
    $("#info_panel #info_4").text("");
    //$("#info_panel a").unbind("click");
    $("#info_panel a").addClass('hidden');
    //refreshInfo();
}
function showBuildingInfo(building_code){
    var floors=0;
    var rooms=0;


    console.log("showing info of: building_code="+building_code);
    $.ajax({
        url:"ajax/building_details.php",
        type:"GET",
        async:false,
        data:{building_code:building_code},
        success:function(data){
            var buildingDetails = jQuery.parseJSON(data);
            rooms = buildingDetails['rooms'];
            floors = buildingDetails['floors'];

            console.log("showBuildingInfo - return data: " + buildingDetails['rooms']);
        }
    });
    $("#info_panel #info_1").text(building_code.toUpperCase());
    $("#info_panel #info_2").text("College of Science");
    $("#info_panel #info_3").text(floors+" floors");
    $("#info_panel #info_4").text(rooms+" rooms");
    $("#info_panel a").removeClass('hidden');
    $("#info_panel a").unbind("click");
    $("#info_panel a").text("Open Map").click(function (){
        ion.sound.play(CLICK_SOUND);
        displayMap(building_code, 1,"");
    });
    refreshInfo();
}
function showRoomInfo(room_code){
    var floor=0;
    var room=0;
    var room_name = "";
    var floorNo="";
    var buildingCode="";
    var hasSchedule="1";
    console.log("showing info of: room_code="+room_code);
    $.ajax({
        url:"ajax/room_details.php",
        type:"GET",
        async:false,
        data:{room_code:room_code},
        success:function(data){
            //console.log(data);
            var roomDetails = jQuery.parseJSON(data);
            roomName = roomDetails['room_name'];
            floorNo = roomDetails['floor_no'];
            buildingCode = roomDetails['building_code'];
            hasSchedule = roomDetails['schedule'];

            //console.log("showBuildingInfo - return data: " + buildingDetails['rooms']);
        }
    });
    var floor = "";
    switch(floorNo){
        case "1":
            floor = "1st floor";
            break;
        case "2":
            floor = "2nd floor";
            break;
        case "3":
            floor = "3rd floor";
            break;
        default:
            break;
    }
    $("#info_panel p").removeClass("hidden");
    $("#info_panel #info_1").text(roomName);
    $("#info_panel #info_2").text(floor);
    $("#info_panel #info_3").text(buildingCode);
    $("#info_panel #info_4").text("College of Science"); 
    if(hasSchedule!="1"){
        $("#info_panel a").addClass('hidden');
        $("#info_panel a").unbind("click");
        
    }
    else{
        $("#info_panel a").removeClass('hidden');
        $("#info_panel a").unbind("click");
        $("#info_panel a").text("View schedule").click(function (){
            ion.sound.play(CLICK_SOUND);
            showRoomTicket(room_code);
        });
    }
    refreshInfo();
}




function refreshInfo(){
    $("#info_panel").addClass("animated tada");
    setTimeout(function(){
        $("#info_panel").removeClass("animated tada");
    }, 1000);
}




function show_cs(highlight){
   highlight = highlight || "";
   

//var rsr = Raphael('rsr', '792', '612');
    
    var path_c = rsr.path("M 849.972,614.865 -46.943,609.197 -43.019,-11.818   853.891,-6.151  z");
    path_c.attr({fill: '#e8ddbd',stroke: '#000000',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_c');
    //#E8DDBD
    var path_d = rsr.path("M369.587,434.058l-0.047,39.124l219.2,0.261l0.119-101.67l-219.199-0.259l-0.047,40.367  l77.902,0.092l-0.026,22.181L369.587,434.058z M462.969,411.992l68.755,0.081l-0.027,22.177l-68.752-0.08L462.969,411.992z");
    path_d.attr({fill: '#cccccc',stroke: '#050606','stroke-width': '0','stroke-opacity': '1', id:'master'}).data('id', 'path_d');

    var rect_e = rsr.rect(306.184, 406.858, 94.73, 32.469);
    rect_e.attr({x: '306.184',y: '406.858',fill: '#FFFFFF',stroke: '#1D1E1E','stroke-width': '0','stroke-opacity': '1'});
    rect_e.transform("m3.608028e-004 -1 1 3.608028e-004 -69.6712 776.4891").data('id', 'rect_e');


    var rect_f = rsr.rect(293.313, 393.882, 73.351, 59.088);
    rect_f.attr({x: '293.313',y: '393.882',fill: '#FFFFFF',stroke: '#1D1E1E','stroke-width': '0','stroke-opacity': '1'});
    rect_f.transform("m4.061023e-004 -1 1 4.061023e-004 -93.5717 753.2428").data('id', 'rect_f');

    var rect_g = rsr.rect(424.738, 164.675, 70.271, 36.358);
    rect_g.attr({x: '424.738',y: '164.675',fill: '#FFFFFF',stroke: '#1D1E1E','stroke-width': '0','stroke-opacity': '1'});
    rect_g.transform("m3.891746e-004 -1 1 3.891746e-004 276.8408 642.6561").data('id', 'rect_g');

    var path_h = rsr.path("M 570.962,149.313 570.942,194.308 494.939,194.284 494.961,149.287  z");
    path_h.attr({fill: '#FFFFFF',stroke: '#1D1E1E','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_h');

    var path_i = rsr.path("M 284.907,406.067 290.038,409.356 287.945,484.694   205.985,484.433 205.293,478.108 280.9,409.789  z");
    path_i.attr({fill: '#DCDBDB',stroke: '#000000',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_i');

    var path_j = rsr.path("M 285.251,413.577 283.065,479.649 211.805,479.167  z");
    path_j.attr({fill: '#9C4734',stroke: '#000000',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_j');

    var path_k = rsr.path("M 269.196,462.848 255.68,462.47 255.371,473.672   279.854,474.35 279.856,474.251 280.447,474.264 281.4,439.894 269.842,439.573  z");
    path_k.attr({fill: '#FFFFFF',stroke: '#000000',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_k');

    var path_l = rsr.path("M276.411,170.156l-47.191,64.576l-1.267,0.294l0.254,1.094  l-0.082,0.112l0.13,0.095l28.057,121.232l0.001,7.654l1.769,0.002l0.131,0.568l2.462-0.572l360.85-0.149l230.307,1.065l0.09-19.511  l-56.006-0.259l0,0C670.754,307.493,650.619,187.178,650.6,187.069l0.26-56.424l-23.413-0.11l-0.994,215.01l-352.862,0.15  l-24.363-105.274l46.187-63.2l1.1-0.083l-8.097-105.593l-19.453,1.497L276.411,170.156z M650.377,235.369  c16.55,63.92,78.689,103.354,95.145,110.754l-95.655-0.441L650.377,235.369L650.377,235.369z");
    path_l.attr({fill: '#898989',stroke: '#000000',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_l');
    //#C1C1C0



    var path_m = rsr.path("M373.384,314.723l28.556,0.304l1.09-101.431l-28.554-0.307  l0.149-13.902l-57.112-0.617l-0.149,13.904l-27.799-0.298l-1.092,101.432l27.799,0.298l-0.169,14.358l56.841,0.652L373.384,314.723z   M330.436,289.621l0.552-51.227l28.458,0.305l-0.549,51.228L330.436,289.621z");
    path_m.attr({fill: '#29ABE2',stroke: '#F2F2F2',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb3');

    var path_n = rsr.path("M70.957,332.412l-7.63,7.379l6.861,7.099l-15.563,15.048  l92.962,96.134l15.566-15.05l6.641,6.868l7.627-7.383l23.906,24.722l54.321-52.533l-23.903-24.718l8.545-8.263l-6.641-6.868  l13.962-13.501l-92.962-96.132l-13.962,13.501l-6.862-7.096l-8.546,8.262l-24.862-25.712l-54.324,52.53L70.957,332.412z   M104.932,325.525l10.679,11.045l12.496-12.082l-10.68-11.044l6.334-6.127l10.678,11.045l6.806,7.037l63.251,65.409l-25.411,24.57  l-63.248-65.407l-6.807-7.038l-10.678-11.046L104.932,325.525z");
    path_n.attr({fill: '#00A9E2',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb4');

    var path_o = rsr.path("M493.565,341.687l5.691,0.065l0.127-10.98l41.017,0.479  l1.243-106.302l-107.454-1.411l-1.242,106.299l39.232,0.615l-0.128,10.983l6.168,0.074c1.983,0.87,4.462,1.388,7.458,1.424  C488.979,342.969,491.567,342.514,493.565,341.687z");
    path_o.attr({fill: '#29ABE2',stroke: '#FFFFFF',"stroke-miterlimit": '10','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb2');

    var path_p = rsr.path("M 546.854,261.91 546.722,314.251 546.675,332.149 588.361,332.256 588.407,314.357   599.489,314.384 599.622,262.043 612.815,262.077 612.96,204.798 599.77,204.764 588.686,204.736 547.001,204.63  z");
    path_p.attr({fill: '#00A9E2',stroke: '#FFFFFF','stroke-width': '0','stroke-opacity': '1'}).data('id', 'csb1');




    var group_a = rsr.set();

    var path_q = rsr.path("M 381.996,-329.626 381.986,-329.621 382,-329.626   z").attr({fill: '#39B54A',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_q');
    group_a.attr({'name': 'group_a'});

    var group_b = rsr.set();

    var path_r = rsr.path("M 387.655,-449.403 387.643,-449.398 387.657,-449.404   z").attr({fill: '#39B54A',parent: 'group_b','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_r');
    group_b.attr({'name': 'group_b'});


    var rsrGroups = [group_a,group_b];
    group_a.push(
        path_q 
    );
    group_b.push(
        path_r 
    );
        




    var nonClickable = [ path_c,
                    path_d,
                     rect_e,
                    rect_f,
                    rect_g,
                    path_h,
                    path_i,
                    path_j, 
                    path_k, 
                    path_l,
                    path_m ,
                    path_n ,
                    path_o,
                    path_p,
                    path_q,
                    path_r
    ];
    var extraBuildings= [
                    path_d,
                    rect_e,
                    rect_f,
                    rect_g,
                    path_h,
    ]
    var mainBuildings = [ 
                    path_m ,
                    path_n ,
                    path_o,
                    path_p
    ];



    /*//placing events and attributes to all elements in the map
    for (var i = 0, len = nonClickable.length; i < len; i++) {
        var element = nonClickable[i];
        if(element){
            element.click(function(){
                //console.log("click function working for "+this.data('id'));
                alert(this.data('id'));
            });
        }
        else{
            console.log("there was an error in element "+i);
        }
    }
    /**/

    // placing events and attributes to extraBuildings
    for (var i = 0, len = extraBuildings.length; i < len; i++) {
        var element = extraBuildings[i];
        element.attr({
            fill:'#CACACA'
        });
    }

    

    //placing events and attributes to mainBuildings
    for (var i = 0, len = mainBuildings.length; i < len; i++) {

        var el = mainBuildings[i];
        bbox = el.getBBox();
        labels[i] = rsr.popup(bbox.x + bbox.width/2, bbox.y + bbox.height/2, bbox.width);
        labels[i].attr({text: el.data("id")}).update(bbox.x + bbox.width/2, bbox.y + bbox.height/2, bbox.width).toFront().show();
        labels[i].toFront().show();


        el.mouseover(function() {
            //this.toFront();
            this.attr({
                cursor: 'pointer',
                fill: '#08519c',
                stroke: '#fff',
                'stroke-width': '0'
            });

            
        });
        el.mouseout(function() {
            this.attr({
                fill: '#3182bd'
            });
        });
        el.click(function() {
            this.animate({
                fill: '#6baed6'
            }, 200);

            console.log(this.data('id') + " has been toggled");
            //displayMap(this.data('id'));
            showBuildingInfo(this.data('id'));
            //$("#ticket_modal").modal("toggle");
        });
    }

    highlightRoom(mainBuildings, highlight);

    /*
#eff3ff     background
#c6dbef     road
#9ecae1
#6baed6     
#3182bd     building
#08519c     building:hover or roome
    */

    //NAVIGATIONS
    

}
//createMap();
//show_b31f();


//sound effects
$("a, button").click(function(e){
    var url = $(this).attr('href');
    e.preventDefault();
    ion.sound.play("water_droplet_3");
    if(url!="" && url != "#" && url!="undefined" && url!=null ){
    setTimeout(function(){
        window.location = url;
    },200);
    }
});
