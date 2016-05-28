$(document).foundation()

$(document).ready(function() {

//function to limit the length of the text
//place should be class,id, tag, word should be the number of letter which I want to limit
function cutText(place,words){
	$(place).each(function(){
		var txt = $(this).text();
		if(txt.length > words){
			txt = txt.substr(0, words);
			$(this).text(txt + "･･");
		}
	});
}

cutText(".js-list-text p", 50);

//to hide the image of the table(CMS)
function hideImg(image,target){
	if( $(image).length > 1){
		$(target).addClass('hide');
		$(image).first().removeClass('hide');
			}
}


if( $(".js-list-text img").length > 0){
		$(".js-list-text img").addClass('hide');
		//$(".js-list-text img").first().removeClass('hide');							
	}

//console.log($("#content3  img").length);
//hideImg(".js-list-text img");

//for(var i = 0; i < $(".js-list-text ").length; i++){
//console.log($("#content"+i+" img").length);








});//end of on load
