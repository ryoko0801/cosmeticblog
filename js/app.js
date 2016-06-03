$(document).foundation();

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
//list
cutText(".js-list-title", 50);
cutText(".js-short-title", 33);
cutText(".js-short-title-side", 50);
cutText(".js-short-text p", 100);
cutText(".js-short-text-index p", 180);
cutText(".js-short-title-index p", 70);
//for recom title
cutText(".js-short-reco-title", 25);



//to hide the image of the post for the list of the post, new post etc..
function hideImg($target){
	if( $target.length > 0){
		$target.addClass('hide');
			}
}
//to hide the image of the list of the blog post
hideImg($(".js-short-text img"));
hideImg($(".js-short-text-index img"));

//to set the article sameheight in each row
$(function() {
    $('.article').matchHeight();
     $('.article-reco').matchHeight();
      $('.js-com').matchHeight();
});


//to controll the comment length. when user click continue btn,
//show all sentence

$('.js-comment').readmore({
	speed: 100,
  	collapsedHeight: 58,
  	moreLink: '<a href="#" class="more">Read More</a>',
  	lessLink: '<a href="#" class="more">Close</a>'
});

//scroll to top
$(function() {
    var showFlag = false;
    var topBtn = $('#page-top');    
    topBtn.css('bottom', '-100px');
    var showFlag = false;
    //when the scroll become 100 showw thye btn
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            if (showFlag == false) {
                showFlag = true;
                topBtn.stop().animate({'bottom' : '20px'}, 200); 
            }
        } else {
            if (showFlag) {
                showFlag = false;
                topBtn.stop().animate({'bottom' : '-100px'}, 200); 
            }
        }
    });
    //go back to top with scroll
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});

//activ sub menu
$("#submenu a").click(function(){
	var $href = $(this).attr('href');
	if(location.href.match($href)) {
        $(this).addClass('active');
        } else {
        $(this).removeClass('active');
        }
});


});//end of on load
