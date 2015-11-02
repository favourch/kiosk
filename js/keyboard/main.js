
     $(function () {
         jsKeyboard.init("virtualKeyboard");

         //first input focus
         var $firstInput = $(':input').first().focus();
         jsKeyboard.currentElement = $firstInput;
         jsKeyboard.currentElementCursorPosition = 0;
     });

     function toggleKeyboard(){
     	$('#virtualKeyboard').toggleClass('hide-keyboard');
     }
     
     $("input[type=text]").click(function(){
     	//toggleKeyboard();
     	$('#virtualKeyboard').removeClass('hide-keyboard');
        jsKeyboard.show();
     });
     $(":not(#virtualKeyboard)").click(function(){
        if($("input[type=text]").is(":focus")){
            console.log("focused on any input field");
        }else{
            $('#virtualKeyboard').addClass('hide-keyboard');
        }
     });
     $("#virtualKeyboard").click(function(event){
        event.stopPropagation();
     });
     /*
     $("input[type=text]").blur(function(){
     	//toggleKeyboard();
     	$('#virtualKeyboard').addClass('hide-keyboard');
        jsKeyboard.hide();
     });
     */