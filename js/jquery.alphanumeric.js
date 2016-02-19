(function($){
	var pasteEventName = ($.browser.msie ? 'paste' : 'input');
	$.fn.alphanumeric = function(p) {

		p = $.extend({
			ichars: "€_!@#$%^&*()+=[]\\\';,/{}|\":<>?~`.- ",
			nchars: "",
			allow: ""
		  }, p);

		return this.each
			(
				function() 
				{

					if (p.nocaps) p.nchars += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					if (p.allcaps) p.nchars += "abcdefghijklmnopqrstuvwxyz";
					
					s = p.allow.split('');
					
					for ( i=0;i<s.length;i++) if (p.ichars.indexOf(s[i]) != -1) s[i] = "\\" + s[i];
					 
					p.allow = s.join('|');
					
					var reg = new RegExp(p.allow,'gi');
					var ch = p.ichars + p.nchars;
					ch = ch.replace(reg,'');

					$(this).keypress
						(
							function (e)
								{
								
									if (!e.charCode) k = String.fromCharCode(e.which);
										else k = String.fromCharCode(e.charCode);
										
									if (ch.indexOf(k) != -1) e.preventDefault();
									if (e.ctrlKey&&k=='v') e.preventDefault();
									
								}
								
						);
					
					$(this).bind(pasteEventName, function(e) {
						/*
							e.preventDefault();
						*/
							
						
						var input = $(this);
						var string = '';
						try{
							string = window.clipboardData.getData('Text');
						}catch(e){
							string = input.val();
						}
						var i = 0;
						for(i=0;i<string.length;i++){
							var c = string.charAt(i);
							if (ch.indexOf(c) != -1){
								$(this).val('');
								e.preventDefault();
								break;
							}
						}
					});
					
					/*$(this).bind('contextmenu',function () {return false});*/		
				}
			);

	};

	$.fn.numeric = function(p) {
		p = $.extend({
			ichars: "_!@#$%^&*()+=[]\\\';,/{}|\":<>?~`.- ",
			nchars: "",
			allow: ""
		  }, p);
		var number = "1234567890";
		number = number+p.allow;
		$(this).keypress
		(
			function (e)
				{
				
					if (!e.charCode) k = String.fromCharCode(e.which);
						else k = String.fromCharCode(e.charCode);
						
					if (number.indexOf(k) == -1) e.preventDefault();
					if (e.ctrlKey&&k=='v') e.preventDefault();
				}
		);
		
		$(this).bind(pasteEventName, function(e) {
			/*e.preventDefault();*/
			
			var input = $(this);
			var inputValue = input.val();
			var string = '';
			try{
				string = window.clipboardData.getData('Text');
			}catch(e){
				string = input.val();
			}
			var i = 0;
			for(i=0;i<string.length;i++){
				var c = string.charAt(i);
				if (number.indexOf(c) == -1){ 
					$(this).val('');
					e.preventDefault();
					break;
				}
			}
		});
		/*$(this).bind('contextmenu',function () {return false}); */
	};
	
	$.fn.numeric_dot = function(p) { 
		p = $.extend({
			ichars: "_!@#$%^&*()+=[]\\\';,/{}|\":<>?~`- ",
			nchars: "",
			allow: ""
		  }, p);
		var number = "1234567890.";
		number = number+p.allow;
		$(this).keypress
		(
			function (e)
				{
				
					if (!e.charCode) k = String.fromCharCode(e.which);
						else k = String.fromCharCode(e.charCode);
						
					if (number.indexOf(k) == -1) e.preventDefault();
					if (e.ctrlKey&&k=='v') e.preventDefault();
				}
		);
		
		$(this).bind(pasteEventName, function(e) {
			/*e.preventDefault();*/
			
			var input = $(this);
			var inputValue = input.val();
			var string = '';
			try{
				string = window.clipboardData.getData('Text');
			}catch(e){
				string = input.val();
			}
			var i = 0;
			for(i=0;i<string.length;i++){
				var c = string.charAt(i);
				if (number.indexOf(c) == -1){ 
					$(this).val('');
					e.preventDefault();
					break;
				}
			}
		});
		/*$(this).bind('contextmenu',function () {return false}); */
	};
	
	$.fn.alpha = function(p) {

		var nm = "1234567890";

		p = $.extend({
			nchars: nm
		  }, p);	

		return this.each (function()
			{
				$(this).alphanumeric(p);
			}
		);
			
	};	

})(jQuery);
