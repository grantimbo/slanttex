
// ---------------------------
// Grant Imbo | grantimbo.com
// ---------------------------


$(function() {

	/*-----------------------------------------------------
	    Variables
	-----------------------------------------------------*/

	var main = $("main"),
		siteBody = $('body'),
		loading = $('<div class="loading-content"><div class="loading"><div>Loading</div></div></div>'),
		modal = $('<div class="modal"></div>'),
		menuButton = $('[data-button="menu"]'),
		pageNav = $('nav.page-nav a'),
		contactPage = $('.contact-wrap'),
		docTitle = document.title,
		docUrl = document.baseURI;


	// add modal to body
	modal.appendTo(siteBody);

	siteBody.addClass('js');


	// decode html
	String.prototype.decodeHTML = function() {
		return $("<div>", {html: "" + this}).html();
	};


	// title and modal
	getTitle = function(html) {
		document.title = html
		.match(/<title>(.*?)<\/title>/)[1]
		.trim()
		.decodeHTML();
	},


	// load content
	loadPage = function(href) {
		$('.modal').fadeIn(300)
					.html(loading)
					.load(href + " main>*", getTitle)

		siteBody.css('overflow-y','hidden');


	},


	// $(document).ajaxComplete(function() {
	// console.log('Ajax Complete');
	// });


	// portfolio menu
	menuButton.on('click', function() {
		$(this).toggleClass('active');
		$('header').toggleClass('active');
	});


	nav = function() {

		// nav bars
		welcomeNav = $('[data-nav="home"]'),
		folioNav = $('[data-nav="folio"]'),
		serviceNav = $('[data-nav="contact"]'),
		welcomePage = $('[data-page="home"]'),
		folioPage = $('[data-page="folio"]'),
		servicePage = $('[data-page="contact"]');


		welcomeNav.on('click', function(e) {
			folioPage.hide();
			servicePage.hide();
			welcomePage.fadeIn(300);

			welcomeNav.addClass('current-nav');
			folioNav.removeClass('current-nav');
			serviceNav.removeClass('current-nav');
			siteBody.removeClass('hideslant');

			history.pushState({}, '', siteUrl + '/');

			e.preventDefault();
		});

		folioNav.on('click', function(e) {


			welcomePage.hide();
			servicePage.hide();
			folioPage.fadeIn(300);

			folioNav.addClass('current-nav');
			welcomeNav.removeClass('current-nav');
			serviceNav.removeClass('current-nav');
			siteBody.addClass('hideslant');


			history.pushState({}, '', siteUrl + '/portfolio/');

			e.preventDefault();
		});

		serviceNav.on('click', function(e) {
			welcomePage.hide();
			folioPage.hide();
			servicePage.fadeIn(300);

			serviceNav.addClass('current-nav');
			welcomeNav.removeClass('current-nav');
			folioNav.removeClass('current-nav');
			siteBody.removeClass('hideslant');

			history.pushState({}, '', siteUrl + '/contact/');

			e.preventDefault();
		});

	},

	nav();

	// SVG fallback toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script#update
	// if (!Modernizr.svg) {
	// 	var imgs = document.getElementsByTagName('img');
	// 	for (var i = 0; i < imgs.length; i++) {
	// 		if (/.*\.svg$/.test(imgs[i].src)) {
	// 			imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
	// 		}
	// 	}
	// };


	$(window).on("popstate", function(e) {
		if (e.originalEvent.state !== null) {
			// location.href;
			getTitle(href);
			// loadPagepush(location.href);
		}
	});


	// show portfolio
	$(document).on('click', 'a.post-link', function() {

		var href = $(this).attr("href");

		if (href.indexOf(document.domain) > -1
			|| href.indexOf(':') === -1) {
			history.pushState({}, '', href);
			loadPage(href);
			return false;
		}
	});


	// hide modal
	$(document).on('click', '.modal', function(e){

        var container = $(".portfolio-content");

        // if the target of the click isn't the container... nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0){

            $('.modal').fadeOut(300);

            siteBody.css('overflow-y','visible');

            document.title = docTitle;
            history.pushState({}, '', docUrl );

        };
    });


	// contact page
    contactPage.on('mouseover', function() {

    	contactPage.find('h1').addClass('hover');

    	setTimeout( function() { 
				contactPage.find('h1 span').addClass('hover');
		}, 300);

		setTimeout( function() { 
				contactPage.find('h1 b').addClass('hover');
		}, 500);
    });

	contactPage.on('mouseout', function() {

		contactPage.find('h1').removeClass('hover');

		setTimeout( function() { 
				contactPage.find('h1 span').removeClass('hover');
		}, 300);

		setTimeout( function() { 
				contactPage.find('h1 b').removeClass('hover');
		}, 500);
	});


	// pagination
	$('.pagination a.next').text('Load More...');
	$(document).on('click', '.pagination a.next', function(e) {

		var $this = $(this),
			href = $(this).attr("href");

		$this.parent('.pagination').remove();

		$('<div class="loading-projects">loading stuff, wait bruh...</div>')
					.appendTo('.portfolio-content')
					.load(href + " div.wrap >*", function() {

						var $this = $(this);

			        	$this.find('.portfolio-thumb-container').appendTo('.portfolio-content');
			        	$this.find('.pagination').appendTo('.wrap').find('a.next').text('Load More...');
			        	$this.remove();

					});

		e.preventDefault();
	});

	console.log('-------------------------------');
	console.log('|    Written by Grant Imbo    |');
	console.log('-------------------------------');


});