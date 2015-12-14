// page init
jQuery(function() {
	initTabs();
	initPopups();
	initStepsList();
	initHoverTabs();
	initSelectTabs();
	initPopups_level2();
	ieHover('.nav li, .mission-requests .holder table tr, .mission-dtls dd');
});

// hover for IE
function ieHover(_list) {
	if (jQuery.browser.msie && jQuery.browser.version < 7) {
		jQuery(_list).hover(function() {
			jQuery(this).addClass('hover');
		}, function() {
			jQuery(this).removeClass('hover');
		});
	}
}

// side tabs
function initTabs() {
	jQuery('ul.tab-set').each(function(){
		var _list = jQuery(this);
		var _links = _list.find('a.tab');
		_links.each(function() {
			var _link = jQuery(this);
			var _href = _link.attr('href');
			var _tab = jQuery(_href);
			if(_link.hasClass('active')) _tab.show();
			else _tab.hide();
			_link.click(function(){
				_links.filter('.active').each(function(){
					jQuery(jQuery(this).removeClass('active').attr('href')).hide();
				});
				_link.addClass('active');
				_tab.show();
				return false;
			});
		});
	});
}

// tabs in select
function initSelectTabs() {
	jQuery('select.tab-switcher').each(function(){
		var _select = jQuery(this);
		var _options = _select.children();
		function showTabs() {
			_options.each(function(){
				if(jQuery(this).val().length)
				jQuery('#'+jQuery(this).val()).hide()
			});
			if(_select.val().length)
			jQuery('#'+_select.val()).show();
		}
		_select.change(function(){
			showTabs();
		});
		showTabs();
	});
}

/* reports tabs */
function initHoverTabs() {
	jQuery('ul.reports-bar').each(function(){
		var _list = jQuery(this);
		var _links = _list.find('a.tab');
		_links.each(function() {
			var _link = jQuery(this);
			var _href = _link.attr('href');
			var _tab = jQuery(_href);
			if(_link.hasClass('active')) _tab.show();
			else _tab.hide();
			_link.hover(function(){
				_links.filter('.active').each(function(){
					jQuery(jQuery(this).removeClass('active').attr('href')).hide();
				});
				_link.addClass('active');
				_tab.show();
				return false;
			});
		});
	});
}

// steps popup
function initStepsList() {
	var _checkedClass = 'checked';
	var _checkedFirstClass = 'first-checked';
	var _checkedLastClass = 'last-checked';
	var _activeClass = 'active';
	var _activeFirstClass = 'first-active';
	var _activeLastClass = 'last-active';
	var _allStepsClass = 'all-completed';

	jQuery('div.steps-area').each(function(){
		var _holder = jQuery(this);
		var _links = _holder.find('div.step-list > ul li');
		var _steps = _holder.find('div.steps-holder').children();
		var _currentIndex = _links.index(_links.filter('.'+_activeClass));
		if(_currentIndex < 0) _currentIndex=0;

		_links.each(function(_ind){
			jQuery(this).click(function(){
				_currentIndex = _ind;
				changeSteps(_currentIndex);
				return false;
			});
		});

		function changeSteps(_index) {
			_links.hide();
			_links.removeClass(_checkedClass).removeClass(_checkedFirstClass).removeClass(_checkedLastClass);
			_links.removeClass(_activeClass).removeClass(_activeFirstClass).removeClass(_activeLastClass);

			_links.filter(':lt('+_index+')').addClass(_checkedClass);
			if(_links.eq(0).hasClass(_checkedClass)) _links.eq(0).removeClass(_checkedClass).addClass(_checkedFirstClass);
			if(_links.eq(_links.length-1).hasClass(_checkedClass)) _links.eq(_links.length-1).removeClass(_checkedClass).addClass(_checkedLastClass);

			_links.eq(_index).addClass(_activeClass);
			if(_index == 0) {_links.eq(_index).removeClass(_activeClass).addClass(_activeFirstClass);}
			if(_index == _links.length-1) {_links.eq(_links.length-1).removeClass(_activeClass).addClass(_activeLastClass);}
			_steps.hide().eq(_currentIndex).show();

			if(_index == _links.length-1) _holder.addClass(_allStepsClass);
			else _holder.removeClass(_allStepsClass);
			_links.show();
		}
		_links.eq(_currentIndex).trigger('click');
	});
}

// popups function
function initPopups() {
	var _zIndex = 1000;
	var _fadeSpeed = 350;
	var _faderOpacity = 0.35;
	var _faderBackground = '#000';
	var _faderId = 'lightbox-overlay';
	var _closeLink = 'a.close, a.cancel';
	var _fader;
	var _caller;
	var _positionFromCaller = true;
	var _lightbox = null;
	var _openers = jQuery('a.open-popup');
	var _page = jQuery('body > div:eq(0)');
	var _minWidth = _page.outerWidth();

	// init popup fader
	_fader = jQuery('#'+_faderId);
	if(!_fader.length) {
		_fader = jQuery('<div />');
		_fader.attr('id',_faderId);
		jQuery('body').append(_fader);
	}
	_fader.css({
		opacity:_faderOpacity,
		backgroundColor:_faderBackground,
		position:'absolute',
		overflow:'hidden',
		display:'none',
		top:0,
		left:0,
		zIndex:_zIndex
	});

	// IE6 iframe fix
	if(jQuery.browser.msie && jQuery.browser.version < 7) {
		if(!_fader.children().length) {
			var _frame = jQuery('<iframe src="javascript:false" frameborder="0" scrolling="no" />');
			_frame.css({
				opacity:0,
				width:'100%',
				height:'100%'
			})
			_fader.empty().append(_frame);
		}
	}

	// modal window function
	function showModal() {
		toggleState(true);
		positionLightbox();
	}

	// lightbox positioning function
	function positionLightbox() {
		if(jQuery("#addpersonandpassanger-popup").is(":visible"))return;
		if(_lightbox) {
			var _windowHeight = jQuery(window).height();
			var _windowWidth = jQuery(window).width();
			var _lightboxWidth = _lightbox.outerWidth();
			var _lightboxHeight = _lightbox.outerHeight();
			var _pageHeight = _page.outerHeight(true);

			if (_windowWidth < _minWidth) _fader.css('width',_minWidth);
				else _fader.css('width','100%');
			if (_windowHeight < _pageHeight) _fader.css('height',_pageHeight);
				else _fader.css('height',_windowHeight);

			_lightbox.css({
				position:'absolute',
				zIndex:(_zIndex+1),
				top: 0,
				left:0
			});

			// vertical position
			if (_windowHeight > _lightboxHeight) {
				if (jQuery.browser.msie && jQuery.browser.version < 7) {
					_lightbox.css({
						position:'absolute',
						top: document.documentElement.scrollTop + (_windowHeight - _lightboxHeight) / 2
					});
				} else {
					_lightbox.css({
						position:'fixed',
						top: (_windowHeight - _lightboxHeight) / 2
					});
				}
			} else {
				_lightbox.css({
					position:'absolute',
					top: 0
				});
				if(_fader.height() < _lightboxHeight) _fader.css('height',_lightboxHeight);
			}

			// horizontal position
			if (_fader.width() > _lightbox.outerWidth()) _lightbox.css({left:(_fader.width() - _lightbox.outerWidth()) / 2});
			else _lightbox.css({left: 0});

			// locate popup over its opener
			if(_positionFromCaller) {
				_lightbox.css({
					position:'absolute',
					left: _caller.offset().left,
					top: _caller.offset().top
				});
			}
		}
	}

	// show/hide lightbox
	function toggleState(_state) {
		if(!_lightbox) return;
		if(_state) {
			_fader.fadeIn(_fadeSpeed,function(){
				_lightbox.fadeIn(_fadeSpeed);
			});
		} else {
			_lightbox.fadeOut(_fadeSpeed,function(){
				_fader.fadeOut(_fadeSpeed);
			});
		}
	}

	// popup actions
	function initPopupActions(_obj) {
		if(!_obj.get(0).jsInit) {
			_obj.get(0).jsInit = true;
			// close link
			_obj.find(_closeLink).click(function(){
				_lightbox = _obj;
				toggleState(false);
				return false;
			});
		}
	}

	// lightbox openers
	_openers.each(function(){
		var _opener = jQuery(this);
		var _target = _opener.attr('href');

		if(jQuery(_target).length) {
			// init actions for popup
			var _popup = jQuery(_target);
			initPopupActions(_popup);

			// open popup
			_opener.click(function(){
				_caller = jQuery(this);
				if(_lightbox) {
					_lightbox.fadeOut(_fadeSpeed,function(){
						_lightbox = _popup.hide();
						showModal();
					})
				} else {
					_lightbox = _popup.hide();
					showModal();
				}
				return false;
			});
		}
	});

	// event handlers
	jQuery(window).resize(function(){
		positionLightbox();
	})
	jQuery(window).scroll(function(){
		positionLightbox();
	})
	jQuery(document).keydown(function (e) {
		if(jQuery("#addpersonandpassanger-popup").is(":visible"))return;
		if (!e) evt = window.event;
		if (e.keyCode == 27) {
			toggleState(false);
		}
	})
	_fader.click(function(){
		toggleState(false);
		return false;
	})
}
function initPopups_level2() {
	var _zIndex = 2000;
	var _fadeSpeed = 350;
	var _faderOpacity = 0.35;
	var _faderBackground = '#000';
	var _faderId = 'lightbox-overlay_';
	var _closeLink = 'a.close, a.cancel';
	var _fader;
	var _caller;
	var _positionFromCaller = true;
	var _lightbox = null;
	var _openers = jQuery('a.level_2_open_popup');
	var _page = jQuery('body > div:eq(0)');
	var _minWidth = _page.outerWidth();

	// init popup fader
	_fader = jQuery('#'+_faderId);
	if(!_fader.length) {
		_fader = jQuery('<div />');
		_fader.attr('id',_faderId);
		jQuery('body').append(_fader);
	}
	_fader.css({
		opacity:_faderOpacity,
		backgroundColor:_faderBackground,
		position:'absolute',
		overflow:'hidden',
		display:'none',
		top:0,
		left:0,
		zIndex:_zIndex
	});

	// IE6 iframe fix
	if(jQuery.browser.msie && jQuery.browser.version < 7) {
		if(!_fader.children().length) {
			var _frame = jQuery('<iframe src="javascript:false" frameborder="0" scrolling="no" />');
			_frame.css({
				opacity:0,
				width:'100%',
				height:'100%'
			})
			_fader.empty().append(_frame);
		}
	}

	// modal window function
	function showModal() {
		toggleState(true);
		positionLightbox();
	}

	// lightbox positioning function
	function positionLightbox() {
		if(_lightbox) {
			var _windowHeight = jQuery(window).height();
			var _windowWidth = jQuery(window).width();
			var _lightboxWidth = _lightbox.outerWidth();
			var _lightboxHeight = _lightbox.outerHeight();
			var _pageHeight = _page.outerHeight(true);

			if (_windowWidth < _minWidth) _fader.css('width',_minWidth);
				else _fader.css('width','100%');
			if (_windowHeight < _pageHeight) _fader.css('height',_pageHeight);
				else _fader.css('height',_windowHeight);

			_lightbox.css({
				position:'absolute',
				zIndex:(_zIndex+1),
				top: 0,
				left:0
			});

			// vertical position
			if (_windowHeight > _lightboxHeight) {
				if (jQuery.browser.msie && jQuery.browser.version < 7) {
					_lightbox.css({
						position:'absolute',
						top: document.documentElement.scrollTop + (_windowHeight - _lightboxHeight) / 2
					});
				} else {
					_lightbox.css({
						position:'fixed',
						top: (_windowHeight - _lightboxHeight) / 2
					});
				}
			} else {
				_lightbox.css({
					position:'absolute',
					top: 0
				});
				if(_fader.height() < _lightboxHeight) _fader.css('height',_lightboxHeight);
			}

			// horizontal position
			if (_fader.width() > _lightbox.outerWidth()) _lightbox.css({left:(_fader.width() - _lightbox.outerWidth()) / 2});
			else _lightbox.css({left: 0});

			// locate popup over its opener
			if(_positionFromCaller) {
				_lightbox.css({
					position:'absolute',
					left: _caller.offset().left,
					top: _caller.offset().top
				});
			}
		}
	}

	// show/hide lightbox
	function toggleState(_state) {
		if(!_lightbox) return;
		if(_state) {
			_fader.fadeIn(_fadeSpeed,function(){
				_lightbox.fadeIn(_fadeSpeed);
			});
		} else {
			_lightbox.fadeOut(_fadeSpeed,function(){
				_fader.fadeOut(_fadeSpeed);
			});
		}
	}

	// popup actions
	function initPopupActions(_obj) {
		if(!_obj.get(0).jsInit) {
			_obj.get(0).jsInit = true;
			// close link
			_obj.find(_closeLink).click(function(){
				_lightbox = _obj;
				toggleState(false);
				return false;
			});
		}
	}

	// lightbox openers
	_openers.each(function(){
		var _opener = jQuery(this);
		var _target = _opener.attr('href');

		if(jQuery(_target).length) {
			// init actions for popup
			var _popup = jQuery(_target);
			initPopupActions(_popup);

			// open popup
			_opener.click(function(){
				_caller = jQuery(this);
				if(_lightbox) {
					_lightbox.fadeOut(_fadeSpeed,function(){
						_lightbox = _popup.hide();
						showModal();
					})
				} else {
					_lightbox = _popup.hide();
					showModal();
				}
				return false;
			});
		}
	});

	// event handlers
	jQuery(window).resize(function(){
		//positionLightbox();
	})
	jQuery(window).scroll(function(){
		//positionLightbox();
	})
	jQuery(document).keydown(function (e) {
		if (!e) evt = window.event;
		if (e.keyCode == 27) {
			toggleState(false);
		}
	})
	_fader.click(function(){
		toggleState(false);
		return false;
	})
}