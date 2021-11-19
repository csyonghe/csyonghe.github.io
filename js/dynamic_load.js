$(function()
{
    var newUrl      = "",
        $mainContent = $("#main-content"),
        $pageWrap    = $("#page-wrap"),
		$loadingPanel = $("#loadingPanel"),
        baseHeight   = 0,
        $el;

	var loadPage = function(newUrl, title, newState)
	{
		if (window.history && window.history.pushState)
		{
			if (newState)
				window.history.pushState([newUrl, title], title, newUrl);
			$mainContent
				.find("#guts")
				.fadeOut(200, function() {
					$loadingPanel.removeClass("invisible");
					$mainContent.hide().load(newUrl + " #guts", function()
					{
						$loadingPanel.addClass("invisible");
						$mainContent.fadeIn(200, function() {});
						$("nav a").removeClass("current");
						$("nav a[href='"+newUrl+"']").addClass("current");
					});
				});
		}
		else
			window.location = newUrl;
	}
	if (window.history && window.history.pushState && window.history.replaceState)
	{
		$("nav").delegate("a", "click", function()
		{
			loadPage($(this).attr("href"), $(this).attr("title"), true);
			return false;
		});
		window.onpopstate = function(event)
		{
			if (event.state && event.state[0])
				loadPage(event.state[0], event.state[1], false);
		};
	
		var pathname = document.location.pathname;
		if (pathname == "/")
			pathname = "/index.php";
		window.history.replaceState([pathname, document.title], document.title, pathname);
	}
	var header = $("#headerBody");
	var innerHeader = $("#innerHeader");
	var navBar = $("#navBar");
	var contentOutter = $("#contentPageOutter");
	var oriContentOutterTop = 145;
	var titleText = $("#yonghe_title");
	$(document).scroll(function(e)
	{
		if($(this).scrollTop() > $("#headerPadding").height() + 20)
		{
			header.addClass("headerDivFixed");
			innerHeader.addClass("innerHeaderDivFixed");
			navBar.css("margin-top", "10px");
			contentOutter.css("top", "125px");
			innerHeader.css("height", "60px");
			titleText.css("font-size", "36px");
			
		}
		else if ($(this).scrollTop() > $("#headerPadding").height())
		{
			var delta = $(this).scrollTop() - $("#headerPadding").height();
			header.addClass("headerDivFixed");
			innerHeader.addClass("innerHeaderDivFixed");
			navBar.css("margin-top", (30 - delta) +"px");
			innerHeader.css("height",  (80 - delta) +"px");
			contentOutter.css("top", oriContentOutterTop - delta + "px");
			titleText.css("font-size", (44-0.4*delta)+"px");
		}
		else
		{
			header.removeClass("headerDivFixed");
			innerHeader.removeClass("innerHeaderDivFixed");
			innerHeader.css("height", "80px");
			navBar.css("margin-top", "30px");
			contentOutter.css("top", oriContentOutterTop);
			titleText.css("font-size", "44px");
		}
	});

});