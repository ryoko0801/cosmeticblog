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
//
cutText(".js-list-text p", 50);
cutText(".js-short-title", 30);
cutText(".js-short-title-side", 50);
cutText(".js-short-text p", 100);


//to hide the image of the post for the list of the post, new post etc..
function hideImg($target){
	if( $target.length > 0){
		$target.addClass('hide');
			}
}
//to hide the image of the list of the blog post
hideImg($(".js-list-text img"));
hideImg($(".js-short-text img"));



//console.log($("#content3  img").length);
//hideImg(".js-list-text img");

//for(var i = 0; i < $(".js-list-text ").length; i++){
//console.log($("#content"+i+" img").length);








});//end of on load
