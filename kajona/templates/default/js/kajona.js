if(typeof KAJONA=="undefined"){var KAJONA={util:{},portal:{lang:{}},admin:{lang:{}}}}KAJONA.util.inArray=function(c,b){for(var a=0;a<b.length;a++){if(b[a]==c){return true}}return false};KAJONA.util.fold=function(d,b,a){var c=document.getElementById(d);if(c.style.display=="none"){c.style.display="block";if($.isFunction(b)){b()}}else{c.style.display="none";if($.isFunction(a)){a()}}};KAJONA.util.isTouchDevice=function(){return !!("ontouchstart" in window)?1:0};KAJONA.portal.loadCaptcha=function(a,c){var f="kajonaCaptcha";var b="kajonaCaptchaImg";if(a!=null){f+="_"+a;b+="_"+a}else{b="kajonaCaptcha"}if(!c){var c=180}var e=new Date().getTime();if(document.getElementById(b)==undefined){var d=document.createElement("img");d.setAttribute("id",b);d.setAttribute("src",KAJONA_WEBPATH+"/image.php?image=kajonaCaptcha&maxWidth="+c+"&reload="+e);document.getElementById(f).appendChild(d)}else{var d=document.getElementById(b);d.src=d.src+"&reload="+e}};KAJONA.portal.tooltip=(function(){var c;var a=0;var g=0;function e(j){var h=0,l=0,k;if(j==null){j=window.event}if(j.pageX||j.pageY){h=j.pageX;l=j.pageY}else{if(j.clientX||j.clientY){if(document.documentElement.scrollTop){h=j.clientX+document.documentElement.scrollLeft;l=j.clientY+document.documentElement.scrollTop}else{h=j.clientX+document.body.scrollLeft;l=j.clientY+document.body.scrollTop}}}if(h==0&&l==0){h=a;l=g}else{a=h;g=l}k=c;var i=(h-k.offsetWidth);if(i-k.offsetWidth<0){i+=k.offsetWidth}k.style.top=(l+10)+"px";k.style.left=i+"px"}function f(l,i,n){var k;if(i==null||i.length==0){try{i=l.getAttribute("title")}catch(m){}}if(i==null||i.length==0){return}try{l.removeAttribute("title")}catch(m){}k=document.createElement("span");k.className="kajonaTooltip";k.style.display="block";k.innerHTML=i;if(n!=false){k.style.filter="alpha(opacity:85)";k.style.KHTMLOpacity="0.85";k.style.MozOpacity="0.85";k.style.opacity="0.85"}if(c==null){var j=document.createElement("span");j.id="kajonaTooltipContainer";j.setAttribute("id","kajonaTooltipContainer");j.style.position="absolute";j.style.zIndex="2000";document.getElementsByTagName("body")[0].appendChild(j);c=j}l.tooltip=k;l.onmouseover=b;l.onmouseout=d;l.onmousemove=e;l.onmouseover(l)}function b(h){d();c.appendChild(this.tooltip);e(h)}function d(){try{var i=c;if(i.childNodes.length>0){i.removeChild(i.firstChild)}}catch(h){}}return{add:f,show:b,hide:d}}());KAJONA.portal.loader=new KAJONA.util.Loader();