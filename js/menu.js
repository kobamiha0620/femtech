jQuery( function( $ ) {
   
	// $(window).on('load resize', function(){
	// 	var w = $(window).width();
	// 	var x = 750;
	// 	if (w < x) {
	// 		//画面サイズが750px未満のときの処理
			
	// 	} else {

	// 	}
	// });



	$(window).on('scroll', function(){
		var height = $(window).scrollTop();
		// var headSp = $('.spNav').height();
		var headH = $('#js-logo').height();
		var $head = $('#js-newHeader');
		var $contents = $('.adjpadding');
		var w = $(window).width();
		var x = 750;


		if (w < x) {
			//画面サイズが750px未満のときの処理
			// if($head.hasClass('fixed')){
			// 	$head.removeClass('fixed');
			// }else{
			// 	// $contents.css('padding-top', headSp + 'px');
			// 	$('.spNav').css('position', 'fixed');
			// }

		} else {
			if(height > headH){
				$head.addClass('fixed');
				$contents.css('padding-top', headH + 'px');
			}else{
				$head.removeClass('fixed');
				$contents.css('padding-top', 0);
			}
		}

	});

	$(window).on('load resize', function(){
		var height = $(window).scrollTop();
		var headH = $('#js-logo').height();
		var $head = $('#js-newHeader');
		// var headSp = $('.spNav').height();
		var $contents = $('.adjpadding');
		var w = $(window).width();
		var x = 750;
		if (w < x) {
			//画面サイズが750px未満のときの処理
			if($head.hasClass('fixed')){
				$head.removeClass('fixed');
			}else{
				// $contents.css('padding-top', headSp + 'px');
				$('.spNav').css('position', 'fixed');
			}
		} else {
				$('.spNav').css('position', 'relative');
			if(height > headH){
				$head.addClass('fixed');
				$contents.css('padding-top', headH + 'px');
			}else{
				$head.removeClass('fixed');
				$contents.css('padding-top', 0);
			}
		}
	});

	function sideBar(){
		//ランキング記事
		let categoryName = new Array('ALL', 'FEMTECH', 'PMS', 'SEXUAL', 'for MEN', '月と運気の話', 'resarch');
		let slugname = new Array('news','pms', 'femtech', 'news', 'mens', 'well', 'resarch', 'aoki', 'echoice', 'personf', 'kokoro');
		let slugnameSelected = new Array('news','pms', 'femtech', 'news', 'mens', 'well', 'resarch', 'serial');
		let className = new Array('cate-pms', 'cate-femtech', 'cate-news', 'cate-mens', 'cate-well', 'cate-resarch', 'cate-aoki', 'cate-echoice', 'cate-personf', 'cate-kokoro', 'cate-serial');
		let withOut = new Array('cate-pms', 'cate-femtech', 'cate-news', 'cate-mens', 'cate-well', 'cate-resarch', 'cate-echoice', 'cate-serial', 'cate-uncategorized', 'cate-beauty');
		let cateFemech = $('#carousel__slide-femtech .cat-data');
		let catePms = $('#carousel__slide-pms .cat-data');
		let cateWell = $('#carousel__slide-well .cat-data');
		let cateMens = $('#carousel__slide-mens .cat-data');
		let cateResarch = $('#carousel__slide-resarch .cat-data');
		let cateSerial = $('#carousel__slide-serial .cat-data');
	


		//タブ切り替え
		$.each(slugnameSelected, function(index, value){
			if($('body').hasClass('category-' + value)){
				$(".active").removeClass('active');
				$('.carousel__navigation-' + value).each(function(){
					$('.carousel__navigation-' + value).addClass('active');
				});
				$(".carousel__slide").removeClass("show");
				$('.carousel__slide-' + value).each(function(){
					$('.carousel__slide-' + value).addClass('show');
				});
			}else if($('body').hasClass('page-' + value)){
				$(".active").removeClass('active');
				$('.carousel__navigation-' + value).each(function(){
					$('.carousel__navigation-' + value).addClass('active');
				});
				$(".carousel__slide").removeClass("show");
				$('.carousel__slide-' + value).each(function(){
					$('.carousel__slide-' + value).addClass('show');
				});
			
			}else{
				$('.carousel__slide1').addClass('show');
				$('.carousel__navigation-home').addClass('active');
			}
		});


		cateFemech.removeClass(className).addClass('cate-femtech').text('FEMTECH／FEMCARE');
		catePms.removeClass(className).addClass('cate-pms').text('PMS／生理');
		cateWell.removeClass(className).addClass('cate-well').text('SEXUAL WELLNESS');
		cateMens.removeClass(className).addClass('cate-mens').text('for MEN');
		cateResarch.removeClass(className).addClass('cate-resarch').text('MARCKET RESEARCH');

		for(i=0; i<(withOut.length);i++){
			cateSerial.each(function(){
				if($(this).hasClass(withOut[i])){
					$(this).css('display','none');
				}
			});

		}
		
		

		let tabs = $(".carousel__navigation-item"); // carousel__navigation-itemのクラスを全て取得し、変数tabsに配列で定義
		$(".carousel__navigation-item").on("click", function() { // tabをクリックしたらイベント発火
		  $(".active").removeClass("active"); // activeクラスを消す
		  $(this).addClass("active"); // クリックした箇所にactiveクラスを追加
		  const index = tabs.index(this); // クリックした箇所がタブの何番目か判定し、定数indexとして定義
		  $(".carousel__slide").removeClass("show").eq(index).addClass("show"); // showクラスを消して、contentクラスのindex番目にshowクラスを追加
		})
	  
		//スクロール挙動
		let prev = $('.js-prevscroll');
		let next = $('.js-nextscroll');

		
		$(".js-nextscroll").click(function () {

			$(this).prev($(".js-scrollArea")).animate(
			  {
				scrollLeft: $(".js-scrollArea").scrollLeft() + 500,
			  },
			  300
			)
			return false
		  });
		  //ボタンを押すと左に0.3秒かけて300px移動
		  
		  $(".js-prevscroll").click(function () {

			$(this).next($(".js-scrollArea")).animate(
				{
				scrollLeft: $(".js-scrollArea").scrollLeft() - 500,
			  },
			  300
			)
			return false
		  });
		
	}
	sideBar();


	//スマホ画面で検索ボタン挙動s
	function spSearch(){
		let spbtn = $('#js-searchBtn');
		let spBg =$('#js-searchBg');
		let body = $('body');
		spbtn.on('click', function(){
			if(spBg.hasClass('hide')){
				spBg.removeClass('hide');
				body.css('overflow', 'hidden');
			}else{
				spBg.addClass('hide');
				body.css('overflow', 'auto');
			}		
		});
	}

	spSearch();


	//ページ内スクロール
	function anchorScroll(){
		$('a[href^="#"]').click(function () {
			let href = $(this).attr("href");
			let target = $(href == "#" || href == "" ? 'html' : href);
			let position = target.offset().top;
			let positionPlus = position - 130;
		　　 let speed = 300;

			console.log(positionPlus);
			$("html, body").animate({
			  scrollTop: positionPlus
			}, speed, "swing");
			return false;
		  });
	}
	
	anchorScroll();


	//コメント部分	
	jQuery( function( $ ) {
		let comBtn = $('#js-comment');
		let comCon = $('#js-commCont');
		comBtn.on('click', function(){
			comBtn.toggleClass('active');
			comCon.slideToggle();
		});
	});

	jQuery('.slick').slick({
		autoplay: true, // 自動再生
		autoplaySpeed: 2000, // 自動再生で切り替えをする時間
		speed: 800, // 自動再生でスライドさせるスピード
		arrows: false, // 左右の次へ、前へボタンを表示
		dots: true // 画像下のドット（ページ送り）を表示
	  });


	//ページャー新着記事まで移動
	// jQuery().ready(function($){
		
	// 	$('.page-numbers').each(function(){
	// 		let obj = $(this);
	// 		let link = obj.attr("href");
	// 		obj.attr("href",link+"#js-newest")
	// 	});

	// 	//firefoxスクロール不具合
	// 	let urlHash = location.hash;
	// 	if(urlHash){
	// 		$(window).load(function (){
	// 			if(top.location.href.match(urlHash)){ top.location.href = urlHash }
	// 		});
	// 	}
	// });


	//PC検索項目
	jQuery(document).on('click', function(e) {
		let targetblc = $('#js-pcsearchblc');

		if($(e.target).is('#js-search')) {
			console.log('1');
			if(targetblc.hasClass('active')){
				targetblc.removeClass('active');
			}else{
				targetblc.addClass('active');
			}
		}else if(!$(e.target).is('.newHeader__search, .search-form, .search-field, .search-submit, #js-pcsearchblc')){
			console.log('2');
			if(targetblc.hasClass('active')){
				targetblc.removeClass('active');
			}
		}
	});

	$( '.drawer' ).drawer();

});


