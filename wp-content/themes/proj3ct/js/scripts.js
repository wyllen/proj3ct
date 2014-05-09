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
	$('body').append('<div class="view-full-box" style="display:none;"><div class="view-full-img-wrapper"><img src="'+ $active.attr("src") +'" alt="" /></div><div class="view-full-toolbar"><a href="javascript:void(0)" class="view-full-add-annotation"><span class="project-pen"></span></a><a href="javascript:void(0)" onclick="closefull();" class="view-full-close">x</a></div></div>');
	}else{
		$('.view-full-img-wrapper').html('<img src="'+ $active.attr("src") +'" alt="" />')
	}
	$('.view-full-box').fadeIn();
}
function closefull(){
	$('.view-full-box').fadeOut();
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
})