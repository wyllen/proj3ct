function loadDetail(detailType,detailId,element){
			var data = {
			action: 'get_detail',
			podtype : detailType,
			id: detailId
			};
			$.post(ajaxurl, data, function(response) {
				$('.content').html(response);
			}).done( function() { 

			});
			$('.sidebar-search-result a').removeClass('active');
			element.addClass('active');
}


function getSidebarLeft(podType,element){

		$('.main').removeClass('sidebar-open');
		var data = {
			action: 'get_sidebar_left',
			podtype : podType
		};
		$.post(ajaxurl, data, function(response) {
			$('.sidebar-left').html(response);
		}).done( function() { 
			$('.main').addClass('sidebar-open');
		});
			$('.main-menu > ul > li > a').removeClass('active');
			element.addClass('active');
}

function searchSidebar(val){
	if(val==""){
			$('#search_style').html('');
		}else{
			$('#search_style').html('.sidebar-left .item-list-wrapper:not([data-search*="' + val.toLowerCase() + '"]) { display: none; }')
		}
}

function nextslide(element){
	$active = element.parent().prev().children('.active');
	if($active.next().length>0){
		$active.removeClass('active');
		$active.next().addClass('active');
	}else{		
		$active.removeClass('active');
		element.parent().prev().children().first().addClass('active');
	}
}
function prevslide(element){
	$active = element.parent().prev().children('.active');
	if($active.prev().length>0){
		$active.removeClass('active');
		$active.prev().addClass('active');
	}else{		
		$active.removeClass('active');
		element.parent().prev().children().last().addClass('active');
	}
}
function viewfull(element){	
	$active = element.parent().prev().children('.active').find('img');
	console.log($active);
	if($('.view-full-box').length==0){
	$('body').append('<div class="view-full-box" style="display:none;"><div class="view-full-img-wrapper"><span class="view-full-img-wrapper-content"><img src="'+ $active.attr("src") +'" alt="" /></span></div><div class="view-full-toolbar"><a href="javascript:void(0)" class="view-full-add-annotation"><span class="project-pen"></span></a><a href="javascript:void(0)" class="view-full-close">x</a></div></div>');
	}else{
		$('.view-full-img-wrapper .view-full-img-wrapper-content').html('<img src="'+ $active.attr("src") +'" alt="" />')
	}
	$('.main').fadeOut();
	$('.view-full-box').fadeIn();
}
function closefull(){
	$('.view-full-box').fadeOut();
	$('.main').fadeIn();
}
function selectAnnot(element){
	$('.view-full-img-wrapper img').toggleClass('img-annotation');
	element.toggleClass('selected');
}
function addAnnot(element,event){
		var posX = element.position().left;
        var posY = element.position().top;
        var top = event.pageY - posY ;
        var left = event.pageX - posX - element.offset().left;
        $('.annotation-content').removeClass('open');
		$('.view-full-img-wrapper-content').append('<div class="annotation" style="top:'+top+'px;left:'+left+'px;" > <div class="annotation-content open"><form><textarea></textarea><div><span class="item-submit"></span></div></form></div> </div>');

}
$(document).ready(function(){

	$('.sidebar-left').on('keyup','.sidebar-search-input',function(){
		 searchSidebar($(this).val());
	})
	$('#get-sidebar-clients').on('click',function(){
		getSidebarLeft('client',$(this));
	})
	$('#get-sidebar-projets').on('click',function(){
		getSidebarLeft('projet',$(this));				
	})
	$('.sidebar-left').on('click', 'a', function(){
		loadDetail($(this).attr('data-detail-type'),$(this).attr('data-detail-id'),$(this));
	})
	$('.content').on('click','.item-list-slider-next',function(){
		nextslide($(this));
	})
	$('.content').on('click','.item-list-slider-prev',function(){
		prevslide($(this));
	})
	$('.content').on('click','.item-list-slider-view-full',function(){
		viewfull($(this));
	})
	$(document).on('click','.view-full-close',function(){
		closefull();
	})
	$(document).on('click','.view-full-add-annotation',function(){
		selectAnnot($(this));
	})

	$(document).on('click','.img-annotation',function(e){
		addAnnot($(this),e);
	})
})