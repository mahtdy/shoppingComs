"use strict";window.jscolor||(window.jscolor=function(){var a={register:function(){a.attachDOMReadyEvent(a.init),a.attachEvent(document,"mousedown",a.onDocumentMouseDown),a.attachEvent(document,"touchstart",a.onDocumentTouchStart),a.attachEvent(window,"resize",a.onWindowResize)},init:function(){a.jscolor.lookupClass&&a.jscolor.installByClassName(a.jscolor.lookupClass)},tryInstallOnElements:function(b,c){for(var d=new RegExp("(^|\\s)("+c+")(\\s*(\\{[^}]*\\})|\\s|$)","i"),e=0;e<b.length;e+=1)if(void 0===b[e].type||"color"!=b[e].type.toLowerCase()||!a.isColorAttrSupported){var f;if(!b[e].jscolor&&b[e].className&&(f=b[e].className.match(d))){var g=b[e],h=null,i=a.getDataAttr(g,"jscolor");null!==i?h=i:f[4]&&(h=f[4]);var j={};if(h)try{j=new Function("return ("+h+")")()}catch(k){a.warn("Error parsing jscolor options: "+k+":\n"+h)}g.jscolor=new a.jscolor(g,j)}}},isColorAttrSupported:function(){var a=document.createElement("input");return a.setAttribute&&(a.setAttribute("type","color"),"color"==a.type.toLowerCase())?!0:!1}(),isCanvasSupported:function(){var a=document.createElement("canvas");return!(!a.getContext||!a.getContext("2d"))}(),fetchElement:function(a){return"string"===typeof a?document.getElementById(a):a},isElementType:function(a,b){return a.nodeName.toLowerCase()===b.toLowerCase()},getDataAttr:function(a,b){var c="data-"+b,d=a.getAttribute(c);return null!==d?d:null},attachEvent:function(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)},detachEvent:function(a,b,c){a.removeEventListener?a.removeEventListener(b,c,!1):a.detachEvent&&a.detachEvent("on"+b,c)},_attachedGroupEvents:{},attachGroupEvent:function(b,c,d,e){a._attachedGroupEvents.hasOwnProperty(b)||(a._attachedGroupEvents[b]=[]),a._attachedGroupEvents[b].push([c,d,e]),a.attachEvent(c,d,e)},detachGroupEvents:function(b){if(a._attachedGroupEvents.hasOwnProperty(b)){for(var c=0;c<a._attachedGroupEvents[b].length;c+=1){var d=a._attachedGroupEvents[b][c];a.detachEvent(d[0],d[1],d[2])}delete a._attachedGroupEvents[b]}},attachDOMReadyEvent:function(a){var b=!1,c=function(){b||(b=!0,a())};if("complete"===document.readyState)return void setTimeout(c,1);if(document.addEventListener)document.addEventListener("DOMContentLoaded",c,!1),window.addEventListener("load",c,!1);else if(document.attachEvent&&(document.attachEvent("onreadystatechange",function(){"complete"===document.readyState&&(document.detachEvent("onreadystatechange",arguments.callee),c())}),window.attachEvent("onload",c),document.documentElement.doScroll&&window==window.top)){var d=function(){if(document.body)try{document.documentElement.doScroll("left"),c()}catch(a){setTimeout(d,1)}};d()}},warn:function(a){window.console&&window.console.warn&&window.console.warn(a)},preventDefault:function(a){a.preventDefault&&a.preventDefault(),a.returnValue=!1},captureTarget:function(b){b.setCapture&&(a._capturedTarget=b,a._capturedTarget.setCapture())},releaseTarget:function(){a._capturedTarget&&(a._capturedTarget.releaseCapture(),a._capturedTarget=null)},fireEvent:function(a,b){if(a)if(document.createEvent){var c=document.createEvent("HTMLEvents");c.initEvent(b,!0,!0),a.dispatchEvent(c)}else if(document.createEventObject){var c=document.createEventObject();a.fireEvent("on"+b,c)}else a["on"+b]&&a["on"+b]()},classNameToList:function(a){return a.replace(/^\s+|\s+$/g,"").split(/\s+/)},hasClass:function(a,b){return b?-1!=(" "+a.className.replace(/\s+/g," ")+" ").indexOf(" "+b+" "):!1},setClass:function(b,c){for(var d=a.classNameToList(c),e=0;e<d.length;e+=1)a.hasClass(b,d[e])||(b.className+=(b.className?" ":"")+d[e])},unsetClass:function(b,c){for(var d=a.classNameToList(c),e=0;e<d.length;e+=1){var f=new RegExp("^\\s*"+d[e]+"\\s*|\\s*"+d[e]+"\\s*$|\\s+"+d[e]+"(\\s+)","g");b.className=b.className.replace(f,"$1")}},getStyle:function(a){return window.getComputedStyle?window.getComputedStyle(a):a.currentStyle},setStyle:function(){var a=document.createElement("div"),b=function(b){for(var c=0;c<b.length;c+=1)if(b[c]in a.style)return b[c]},c={borderRadius:b(["borderRadius","MozBorderRadius","webkitBorderRadius"]),boxShadow:b(["boxShadow","MozBoxShadow","webkitBoxShadow"])};return function(a,b,d){switch(b.toLowerCase()){case"opacity":var e=Math.round(100*parseFloat(d));a.style.opacity=d,a.style.filter="alpha(opacity="+e+")";break;default:a.style[c[b]]=d}}}(),setBorderRadius:function(b,c){a.setStyle(b,"borderRadius",c||"0")},setBoxShadow:function(b,c){a.setStyle(b,"boxShadow",c||"none")},getElementPos:function(b,c){var d=0,e=0,f=b.getBoundingClientRect();if(d=f.left,e=f.top,!c){var g=a.getViewPos();d+=g[0],e+=g[1]}return[d,e]},getElementSize:function(a){return[a.offsetWidth,a.offsetHeight]},getAbsPointerPos:function(a){a||(a=window.event);var b=0,c=0;return"undefined"!==typeof a.changedTouches&&a.changedTouches.length?(b=a.changedTouches[0].clientX,c=a.changedTouches[0].clientY):"number"===typeof a.clientX&&(b=a.clientX,c=a.clientY),{x:b,y:c}},getRelPointerPos:function(a){a||(a=window.event);var b=a.target||a.srcElement,c=b.getBoundingClientRect(),d=0,e=0,f=0,g=0;return"undefined"!==typeof a.changedTouches&&a.changedTouches.length?(f=a.changedTouches[0].clientX,g=a.changedTouches[0].clientY):"number"===typeof a.clientX&&(f=a.clientX,g=a.clientY),d=f-c.left,e=g-c.top,{x:d,y:e}},getViewPos:function(){var a=document.documentElement;return[(window.pageXOffset||a.scrollLeft)-(a.clientLeft||0),(window.pageYOffset||a.scrollTop)-(a.clientTop||0)]},getViewSize:function(){var a=document.documentElement;return[window.innerWidth||a.clientWidth,window.innerHeight||a.clientHeight]},redrawPosition:function(){if(a.picker&&a.picker.owner){var c,d,b=a.picker.owner;b.fixed?(c=a.getElementPos(b.targetElement,!0),d=[0,0]):(c=a.getElementPos(b.targetElement),d=a.getViewPos());var h,i,j,e=a.getElementSize(b.targetElement),f=a.getViewSize(),g=a.getPickerOuterDims(b);switch(b.position.toLowerCase()){case"left":h=1,i=0,j=-1;break;case"right":h=1,i=0,j=1;break;case"top":h=0,i=1,j=-1;break;default:h=0,i=1,j=1}var k=(e[i]+g[i])/2;if(b.smartPosition)var l=[-d[h]+c[h]+g[h]>f[h]&&-d[h]+c[h]+e[h]/2>f[h]/2&&c[h]+e[h]-g[h]>=0?c[h]+e[h]-g[h]:c[h],-d[i]+c[i]+e[i]+g[i]-k+k*j>f[i]?-d[i]+c[i]+e[i]/2>f[i]/2&&c[i]+e[i]-k-k*j>=0?c[i]+e[i]-k-k*j:c[i]+e[i]-k+k*j:c[i]+e[i]-k+k*j>=0?c[i]+e[i]-k+k*j:c[i]+e[i]-k-k*j];else var l=[c[h],c[i]+e[i]-k+k*j];var m=l[h],n=l[i],o=b.fixed?"fixed":"absolute",p=(l[0]+g[0]>c[0]||l[0]<c[0]+e[0])&&l[1]+g[1]<c[1]+e[1];a._drawPosition(b,m,n,o,p)}},_drawPosition:function(b,c,d,e,f){var g=f?0:b.shadowBlur;a.picker.wrap.style.position=e,a.picker.wrap.style.left=c+"px",a.picker.wrap.style.top=d+"px",a.setBoxShadow(a.picker.boxS,b.shadow?new a.BoxShadow(0,g,b.shadowBlur,0,b.shadowColor):null)},getPickerDims:function(b){var c=!!a.getSliderComponent(b),d=[2*b.insetWidth+2*b.padding+b.width+(c?2*b.insetWidth+a.getPadToSliderPadding(b)+b.sliderSize:0),2*b.insetWidth+2*b.padding+b.height+(b.closable?2*b.insetWidth+b.padding+b.buttonHeight:0)];return d},getPickerOuterDims:function(b){var c=a.getPickerDims(b);return[c[0]+2*b.borderWidth,c[1]+2*b.borderWidth]},getPadToSliderPadding:function(a){return Math.max(a.padding,1.5*(2*a.pointerBorderWidth+a.pointerThickness))},getPadYComponent:function(a){switch(a.mode.charAt(1).toLowerCase()){case"v":return"v"}return"s"},getSliderComponent:function(a){if(a.mode.length>2)switch(a.mode.charAt(2).toLowerCase()){case"s":return"s";case"v":return"v"}return null},onDocumentMouseDown:function(b){b||(b=window.event);var c=b.target||b.srcElement;c._jscLinkedInstance?c._jscLinkedInstance.showOnClick&&c._jscLinkedInstance.show():c._jscControlName?a.onControlPointerStart(b,c,c._jscControlName,"mouse"):a.picker&&a.picker.owner&&a.picker.owner.hide()},onDocumentTouchStart:function(b){b||(b=window.event);var c=b.target||b.srcElement;c._jscLinkedInstance?c._jscLinkedInstance.showOnClick&&c._jscLinkedInstance.show():c._jscControlName?a.onControlPointerStart(b,c,c._jscControlName,"touch"):a.picker&&a.picker.owner&&a.picker.owner.hide()},onWindowResize:function(){a.redrawPosition()},onParentScroll:function(){a.picker&&a.picker.owner&&a.picker.owner.hide()},_pointerMoveEvent:{mouse:"mousemove",touch:"touchmove"},_pointerEndEvent:{mouse:"mouseup",touch:"touchend"},_pointerOrigin:null,_capturedTarget:null,onControlPointerStart:function(b,c,d,e){var f=c._jscInstance;a.preventDefault(b),a.captureTarget(c);var g=function(f,g){a.attachGroupEvent("drag",f,a._pointerMoveEvent[e],a.onDocumentPointerMove(b,c,d,e,g)),a.attachGroupEvent("drag",f,a._pointerEndEvent[e],a.onDocumentPointerEnd(b,c,d,e))};if(g(document,[0,0]),window.parent&&window.frameElement){var h=window.frameElement.getBoundingClientRect(),i=[-h.left,-h.top];g(window.parent.window.document,i)}var j=a.getAbsPointerPos(b),k=a.getRelPointerPos(b);switch(a._pointerOrigin={x:j.x-k.x,y:j.y-k.y},d){case"pad":switch(a.getSliderComponent(f)){case"s":0===f.hsv[1]&&f.fromHSV(null,100,null);break;case"v":0===f.hsv[2]&&f.fromHSV(null,null,100)}a.setPad(f,b,0,0);break;case"sld":a.setSld(f,b,0)}a.dispatchFineChange(f)},onDocumentPointerMove:function(b,c,d,e,f){return function(b){var e=c._jscInstance;switch(d){case"pad":b||(b=window.event),a.setPad(e,b,f[0],f[1]),a.dispatchFineChange(e);break;case"sld":b||(b=window.event),a.setSld(e,b,f[1]),a.dispatchFineChange(e)}}},onDocumentPointerEnd:function(b,c){return function(){var d=c._jscInstance;a.detachGroupEvents("drag"),a.releaseTarget(),a.dispatchChange(d)}},dispatchChange:function(b){b.valueElement&&a.isElementType(b.valueElement,"input")&&a.fireEvent(b.valueElement,"change")},dispatchFineChange:function(a){if(a.onFineChange){var b;b="string"===typeof a.onFineChange?new Function(a.onFineChange):a.onFineChange,b.call(a)}},setPad:function(b,c,d,e){var f=a.getAbsPointerPos(c),g=d+f.x-a._pointerOrigin.x-b.padding-b.insetWidth,h=e+f.y-a._pointerOrigin.y-b.padding-b.insetWidth,i=g*(360/(b.width-1)),j=100-h*(100/(b.height-1));switch(a.getPadYComponent(b)){case"s":b.fromHSV(i,j,null,a.leaveSld);break;case"v":b.fromHSV(i,null,j,a.leaveSld)}},setSld:function(b,c,d){var e=a.getAbsPointerPos(c),f=d+e.y-a._pointerOrigin.y-b.padding-b.insetWidth,g=100-f*(100/(b.height-1));switch(a.getSliderComponent(b)){case"s":b.fromHSV(null,g,null,a.leavePad);break;case"v":b.fromHSV(null,null,g,a.leavePad)}},_vmlNS:"jsc_vml_",_vmlCSS:"jsc_vml_css_",_vmlReady:!1,initVML:function(){if(!a._vmlReady){var b=document;if(b.namespaces[a._vmlNS]||b.namespaces.add(a._vmlNS,"urn:schemas-microsoft-com:vml"),!b.styleSheets[a._vmlCSS]){var c=["shape","shapetype","group","background","path","formulas","handles","fill","stroke","shadow","textbox","textpath","imagedata","line","polyline","curve","rect","roundrect","oval","arc","image"],d=b.createStyleSheet();d.owningElement.id=a._vmlCSS;for(var e=0;e<c.length;e+=1)d.addRule(a._vmlNS+"\\:"+c[e],"behavior:url(#default#VML);")}a._vmlReady=!0}},createPalette:function(){var b={elm:null,draw:null};if(a.isCanvasSupported){var c=document.createElement("canvas"),d=c.getContext("2d"),e=function(a,b,e){c.width=a,c.height=b,d.clearRect(0,0,c.width,c.height);var f=d.createLinearGradient(0,0,c.width,0);f.addColorStop(0,"#F00"),f.addColorStop(1/6,"#FF0"),f.addColorStop(2/6,"#0F0"),f.addColorStop(.5,"#0FF"),f.addColorStop(4/6,"#00F"),f.addColorStop(5/6,"#F0F"),f.addColorStop(1,"#F00"),d.fillStyle=f,d.fillRect(0,0,c.width,c.height);var g=d.createLinearGradient(0,0,0,c.height);switch(e.toLowerCase()){case"s":g.addColorStop(0,"rgba(255,255,255,0)"),g.addColorStop(1,"rgba(255,255,255,1)");break;case"v":g.addColorStop(0,"rgba(0,0,0,0)"),g.addColorStop(1,"rgba(0,0,0,1)")}d.fillStyle=g,d.fillRect(0,0,c.width,c.height)};b.elm=c,b.draw=e}else{a.initVML();var f=document.createElement("div");f.style.position="relative",f.style.overflow="hidden";var g=document.createElement(a._vmlNS+":fill");g.type="gradient",g.method="linear",g.angle="90",g.colors="16.67% #F0F, 33.33% #00F, 50% #0FF, 66.67% #0F0, 83.33% #FF0";var h=document.createElement(a._vmlNS+":rect");h.style.position="absolute",h.style.left="-1px",h.style.top="-1px",h.stroked=!1,h.appendChild(g),f.appendChild(h);var i=document.createElement(a._vmlNS+":fill");i.type="gradient",i.method="linear",i.angle="180",i.opacity="0";var j=document.createElement(a._vmlNS+":rect");j.style.position="absolute",j.style.left="-1px",j.style.top="-1px",j.stroked=!1,j.appendChild(i),f.appendChild(j);var e=function(a,b,c){switch(f.style.width=a+"px",f.style.height=b+"px",h.style.width=j.style.width=a+1+"px",h.style.height=j.style.height=b+1+"px",g.color="#F00",g.color2="#F00",c.toLowerCase()){case"s":i.color=i.color2="#FFF";break;case"v":i.color=i.color2="#000"}};b.elm=f,b.draw=e}return b},createSliderGradient:function(){var b={elm:null,draw:null};if(a.isCanvasSupported){var c=document.createElement("canvas"),d=c.getContext("2d"),e=function(a,b,e,f){c.width=a,c.height=b,d.clearRect(0,0,c.width,c.height);var g=d.createLinearGradient(0,0,0,c.height);g.addColorStop(0,e),g.addColorStop(1,f),d.fillStyle=g,d.fillRect(0,0,c.width,c.height)};b.elm=c,b.draw=e}else{a.initVML();var f=document.createElement("div");f.style.position="relative",f.style.overflow="hidden";var g=document.createElement(a._vmlNS+":fill");g.type="gradient",g.method="linear",g.angle="180";var h=document.createElement(a._vmlNS+":rect");h.style.position="absolute",h.style.left="-1px",h.style.top="-1px",h.stroked=!1,h.appendChild(g),f.appendChild(h);var e=function(a,b,c,d){f.style.width=a+"px",f.style.height=b+"px",h.style.width=a+1+"px",h.style.height=b+1+"px",g.color=c,g.color2=d};b.elm=f,b.draw=e}return b},leaveValue:1,leaveStyle:2,leavePad:4,leaveSld:8,BoxShadow:function(){var a=function(a,b,c,d,e,f){this.hShadow=a,this.vShadow=b,this.blur=c,this.spread=d,this.color=e,this.inset=!!f};return a.prototype.toString=function(){var a=[Math.round(this.hShadow)+"px",Math.round(this.vShadow)+"px",Math.round(this.blur)+"px",Math.round(this.spread)+"px",this.color];return this.inset&&a.push("inset"),a.join(" ")},a}(),jscolor:function(b,c){function e(a,b,c){a/=255,b/=255,c/=255;var d=Math.min(Math.min(a,b),c),e=Math.max(Math.max(a,b),c),f=e-d;if(0===f)return[null,0,100*e];var g=a===d?3+(c-b)/f:b===d?5+(a-c)/f:1+(b-a)/f;return[60*(6===g?0:g),100*(f/e),100*e]}function f(a,b,c){var d=255*(c/100);if(null===a)return[d,d,d];a/=60,b/=100;var e=Math.floor(a),f=e%2?a-e:1-(a-e),g=d*(1-b),h=d*(1-b*f);switch(e){case 6:case 0:return[d,h,g];case 1:return[h,d,g];case 2:return[g,d,h];case 3:return[g,h,d];case 4:return[h,g,d];case 5:return[d,g,h]}}function g(){a.unsetClass(o.targetElement,o.activeClass),a.picker.wrap.parentNode.removeChild(a.picker.wrap),delete a.picker.owner}function h(){function k(){var a=o.insetColor.split(/\s+/),c=a.length<2?a[0]:a[1]+" "+a[0]+" "+a[0]+" "+a[1];b.btn.style.borderColor=c}o._processParentElementsInDOM(),a.picker||(a.picker={owner:null,wrap:document.createElement("div"),box:document.createElement("div"),boxS:document.createElement("div"),boxB:document.createElement("div"),pad:document.createElement("div"),padB:document.createElement("div"),padM:document.createElement("div"),padPal:a.createPalette(),cross:document.createElement("div"),crossBY:document.createElement("div"),crossBX:document.createElement("div"),crossLY:document.createElement("div"),crossLX:document.createElement("div"),sld:document.createElement("div"),sldB:document.createElement("div"),sldM:document.createElement("div"),sldGrad:a.createSliderGradient(),sldPtrS:document.createElement("div"),sldPtrIB:document.createElement("div"),sldPtrMB:document.createElement("div"),sldPtrOB:document.createElement("div"),btn:document.createElement("div"),btnT:document.createElement("span")},a.picker.pad.appendChild(a.picker.padPal.elm),a.picker.padB.appendChild(a.picker.pad),a.picker.cross.appendChild(a.picker.crossBY),a.picker.cross.appendChild(a.picker.crossBX),a.picker.cross.appendChild(a.picker.crossLY),a.picker.cross.appendChild(a.picker.crossLX),a.picker.padB.appendChild(a.picker.cross),a.picker.box.appendChild(a.picker.padB),a.picker.box.appendChild(a.picker.padM),a.picker.sld.appendChild(a.picker.sldGrad.elm),a.picker.sldB.appendChild(a.picker.sld),a.picker.sldB.appendChild(a.picker.sldPtrOB),a.picker.sldPtrOB.appendChild(a.picker.sldPtrMB),a.picker.sldPtrMB.appendChild(a.picker.sldPtrIB),a.picker.sldPtrIB.appendChild(a.picker.sldPtrS),a.picker.box.appendChild(a.picker.sldB),a.picker.box.appendChild(a.picker.sldM),a.picker.btn.appendChild(a.picker.btnT),a.picker.box.appendChild(a.picker.btn),a.picker.boxB.appendChild(a.picker.box),a.picker.wrap.appendChild(a.picker.boxS),a.picker.wrap.appendChild(a.picker.boxB));var b=a.picker,c=!!a.getSliderComponent(o),d=a.getPickerDims(o),e=2*o.pointerBorderWidth+o.pointerThickness+2*o.crossSize,f=a.getPadToSliderPadding(o),g=Math.min(o.borderRadius,Math.round(o.padding*Math.PI)),h="crosshair";b.wrap.style.clear="both",b.wrap.style.width=d[0]+2*o.borderWidth+"px",b.wrap.style.height=d[1]+2*o.borderWidth+"px",b.wrap.style.zIndex=o.zIndex,b.box.style.width=d[0]+"px",b.box.style.height=d[1]+"px",b.boxS.style.position="absolute",b.boxS.style.left="0",b.boxS.style.top="0",b.boxS.style.width="100%",b.boxS.style.height="100%",a.setBorderRadius(b.boxS,g+"px"),b.boxB.style.position="relative",b.boxB.style.border=o.borderWidth+"px solid",b.boxB.style.borderColor=o.borderColor,b.boxB.style.background=o.backgroundColor,a.setBorderRadius(b.boxB,g+"px"),b.padM.style.background=b.sldM.style.background="#FFF",a.setStyle(b.padM,"opacity","0"),a.setStyle(b.sldM,"opacity","0"),b.pad.style.position="relative",b.pad.style.width=o.width+"px",b.pad.style.height=o.height+"px",b.padPal.draw(o.width,o.height,a.getPadYComponent(o)),b.padB.style.position="absolute",b.padB.style.left=o.padding+"px",b.padB.style.top=o.padding+"px",b.padB.style.border=o.insetWidth+"px solid",b.padB.style.borderColor=o.insetColor,b.padM._jscInstance=o,b.padM._jscControlName="pad",b.padM.style.position="absolute",b.padM.style.left="0",b.padM.style.top="0",b.padM.style.width=o.padding+2*o.insetWidth+o.width+f/2+"px",b.padM.style.height=d[1]+"px",b.padM.style.cursor=h,b.cross.style.position="absolute",b.cross.style.left=b.cross.style.top="0",b.cross.style.width=b.cross.style.height=e+"px",b.crossBY.style.position=b.crossBX.style.position="absolute",b.crossBY.style.background=b.crossBX.style.background=o.pointerBorderColor,b.crossBY.style.width=b.crossBX.style.height=2*o.pointerBorderWidth+o.pointerThickness+"px",b.crossBY.style.height=b.crossBX.style.width=e+"px",b.crossBY.style.left=b.crossBX.style.top=Math.floor(e/2)-Math.floor(o.pointerThickness/2)-o.pointerBorderWidth+"px",b.crossBY.style.top=b.crossBX.style.left="0",b.crossLY.style.position=b.crossLX.style.position="absolute",b.crossLY.style.background=b.crossLX.style.background=o.pointerColor,b.crossLY.style.height=b.crossLX.style.width=e-2*o.pointerBorderWidth+"px",b.crossLY.style.width=b.crossLX.style.height=o.pointerThickness+"px",b.crossLY.style.left=b.crossLX.style.top=Math.floor(e/2)-Math.floor(o.pointerThickness/2)+"px",b.crossLY.style.top=b.crossLX.style.left=o.pointerBorderWidth+"px",b.sld.style.overflow="hidden",b.sld.style.width=o.sliderSize+"px",b.sld.style.height=o.height+"px",b.sldGrad.draw(o.sliderSize,o.height,"#000","#000"),b.sldB.style.display=c?"block":"none",b.sldB.style.position="absolute",b.sldB.style.right=o.padding+"px",b.sldB.style.top=o.padding+"px",b.sldB.style.border=o.insetWidth+"px solid",b.sldB.style.borderColor=o.insetColor,b.sldM._jscInstance=o,b.sldM._jscControlName="sld",b.sldM.style.display=c?"block":"none",b.sldM.style.position="absolute",b.sldM.style.right="0",b.sldM.style.top="0",b.sldM.style.width=o.sliderSize+f/2+o.padding+2*o.insetWidth+"px",b.sldM.style.height=d[1]+"px",b.sldM.style.cursor="default",b.sldPtrIB.style.border=b.sldPtrOB.style.border=o.pointerBorderWidth+"px solid "+o.pointerBorderColor,b.sldPtrOB.style.position="absolute",b.sldPtrOB.style.left=-(2*o.pointerBorderWidth+o.pointerThickness)+"px",b.sldPtrOB.style.top="0",b.sldPtrMB.style.border=o.pointerThickness+"px solid "+o.pointerColor,b.sldPtrS.style.width=o.sliderSize+"px",b.sldPtrS.style.height=q+"px",b.btn.style.display=o.closable?"block":"none",b.btn.style.position="absolute",b.btn.style.left=o.padding+"px",b.btn.style.bottom=o.padding+"px",b.btn.style.padding="0 15px",b.btn.style.height=o.buttonHeight+"px",b.btn.style.border=o.insetWidth+"px solid",k(),b.btn.style.color=o.buttonColor,b.btn.style.font="12px sans-serif",b.btn.style.textAlign="center";try{b.btn.style.cursor="pointer"}catch(l){b.btn.style.cursor="hand"}b.btn.onmousedown=function(){o.hide()},b.btnT.style.lineHeight=o.buttonHeight+"px",b.btnT.innerHTML="",b.btnT.appendChild(document.createTextNode(o.closeText)),i(),j(),a.picker.owner&&a.picker.owner!==o&&a.unsetClass(a.picker.owner.targetElement,o.activeClass),a.picker.owner=o,a.isElementType(p,"body")?a.redrawPosition():a._drawPosition(o,0,0,"relative",!1),b.wrap.parentNode!=p&&p.appendChild(b.wrap),a.setClass(o.targetElement,o.activeClass)}function i(){switch(a.getPadYComponent(o)){case"s":var b=1;break;case"v":var b=2}var c=Math.round(o.hsv[0]/360*(o.width-1)),d=Math.round((1-o.hsv[b]/100)*(o.height-1)),e=2*o.pointerBorderWidth+o.pointerThickness+2*o.crossSize,g=-Math.floor(e/2);switch(a.picker.cross.style.left=c+g+"px",a.picker.cross.style.top=d+g+"px",a.getSliderComponent(o)){case"s":var h=f(o.hsv[0],100,o.hsv[2]),i=f(o.hsv[0],0,o.hsv[2]),j="rgb("+Math.round(h[0])+","+Math.round(h[1])+","+Math.round(h[2])+")",k="rgb("+Math.round(i[0])+","+Math.round(i[1])+","+Math.round(i[2])+")";a.picker.sldGrad.draw(o.sliderSize,o.height,j,k);break;case"v":var l=f(o.hsv[0],o.hsv[1],100),j="rgb("+Math.round(l[0])+","+Math.round(l[1])+","+Math.round(l[2])+")",k="#000";a.picker.sldGrad.draw(o.sliderSize,o.height,j,k)}}function j(){var b=a.getSliderComponent(o);if(b){switch(b){case"s":var c=1;break;case"v":var c=2}var d=Math.round((1-o.hsv[c]/100)*(o.height-1));a.picker.sldPtrOB.style.top=d-(2*o.pointerBorderWidth+o.pointerThickness)-Math.floor(q/2)+"px"}}function k(){return a.picker&&a.picker.owner===o}function l(){o.importColor()}this.value=null,this.valueElement=b,this.styleElement=b,this.required=!0,this.refine=!0,this.hash=!1,this.uppercase=!0,this.onFineChange=null,this.activeClass="jscolor-active",this.overwriteImportant=!1,this.minS=0,this.maxS=100,this.minV=0,this.maxV=100,this.hsv=[0,0,100],this.rgb=[255,255,255],this.width=181,this.height=101,this.showOnClick=!0,this.mode="HSV",this.position="bottom",this.smartPosition=!0,this.sliderSize=16,this.crossSize=8,this.closable=!1,this.closeText="Close",this.buttonColor="#000000",this.buttonHeight=18,this.padding=12,this.backgroundColor="#FFFFFF",this.borderWidth=1,this.borderColor="#BBBBBB",this.borderRadius=8,this.insetWidth=1,this.insetColor="#BBBBBB",this.shadow=!0,this.shadowBlur=15,this.shadowColor="rgba(0,0,0,0.2)",this.pointerColor="#4C4C4C",this.pointerBorderColor="#FFFFFF",this.pointerBorderWidth=1,this.pointerThickness=2,this.zIndex=1e3,this.container=null;for(var d in c)c.hasOwnProperty(d)&&(this[d]=c[d]);if(this.hide=function(){k()&&g()},this.show=function(){h()},this.redraw=function(){k()&&h()},this.importColor=function(){this.valueElement&&a.isElementType(this.valueElement,"input")?this.refine?!this.required&&/^\s*$/.test(this.valueElement.value)?(this.valueElement.value="",this.styleElement&&(this.styleElement.style.backgroundImage=this.styleElement._jscOrigStyle.backgroundImage,this.styleElement.style.backgroundColor=this.styleElement._jscOrigStyle.backgroundColor,this.styleElement.style.color=this.styleElement._jscOrigStyle.color),this.exportColor(a.leaveValue|a.leaveStyle)):this.fromString(this.valueElement.value)||this.exportColor():this.fromString(this.valueElement.value,a.leaveValue)||(this.styleElement&&(this.styleElement.style.backgroundImage=this.styleElement._jscOrigStyle.backgroundImage,this.styleElement.style.backgroundColor=this.styleElement._jscOrigStyle.backgroundColor,this.styleElement.style.color=this.styleElement._jscOrigStyle.color),this.exportColor(a.leaveValue|a.leaveStyle)):this.exportColor()},this.exportColor=function(b){if(!(b&a.leaveValue)&&this.valueElement){var c=this.toString();this.uppercase&&(c=c.toUpperCase()),this.hash&&(c="#"+c),a.isElementType(this.valueElement,"input")?this.valueElement.value=c:this.valueElement.innerHTML=c}if(!(b&a.leaveStyle)&&this.styleElement){var d="#"+this.toString(),e=this.isLight()?"#000":"#FFF";this.styleElement.style.backgroundImage="none",this.styleElement.style.backgroundColor=d,this.styleElement.style.color=e,this.overwriteImportant&&this.styleElement.setAttribute("style","background: "+d+" !important; color: "+e+" !important;")}b&a.leavePad||!k()||i(),b&a.leaveSld||!k()||j()},this.fromHSV=function(a,b,c,d){if(null!==a){if(isNaN(a))return!1;a=Math.max(0,Math.min(360,a))}if(null!==b){if(isNaN(b))return!1;b=Math.max(0,Math.min(100,this.maxS,b),this.minS)}if(null!==c){if(isNaN(c))return!1;c=Math.max(0,Math.min(100,this.maxV,c),this.minV)}this.rgb=f(null===a?this.hsv[0]:this.hsv[0]=a,null===b?this.hsv[1]:this.hsv[1]=b,null===c?this.hsv[2]:this.hsv[2]=c),this.exportColor(d)},this.fromRGB=function(a,b,c,d){if(null!==a){if(isNaN(a))return!1;a=Math.max(0,Math.min(255,a))}if(null!==b){if(isNaN(b))return!1;b=Math.max(0,Math.min(255,b))}if(null!==c){if(isNaN(c))return!1;c=Math.max(0,Math.min(255,c))}var g=e(null===a?this.rgb[0]:a,null===b?this.rgb[1]:b,null===c?this.rgb[2]:c);null!==g[0]&&(this.hsv[0]=Math.max(0,Math.min(360,g[0]))),0!==g[2]&&(this.hsv[1]=null===g[1]?null:Math.max(0,this.minS,Math.min(100,this.maxS,g[1]))),this.hsv[2]=null===g[2]?null:Math.max(0,this.minV,Math.min(100,this.maxV,g[2]));var h=f(this.hsv[0],this.hsv[1],this.hsv[2]);this.rgb[0]=h[0],this.rgb[1]=h[1],this.rgb[2]=h[2],this.exportColor(d)},this.fromString=function(a,b){var c;if(c=a.match(/^\W*([0-9A-F]{3}([0-9A-F]{3})?)\W*$/i))return 6===c[1].length?this.fromRGB(parseInt(c[1].substr(0,2),16),parseInt(c[1].substr(2,2),16),parseInt(c[1].substr(4,2),16),b):this.fromRGB(parseInt(c[1].charAt(0)+c[1].charAt(0),16),parseInt(c[1].charAt(1)+c[1].charAt(1),16),parseInt(c[1].charAt(2)+c[1].charAt(2),16),b),!0;if(c=a.match(/^\W*rgba?\(([^)]*)\)\W*$/i)){var f,g,h,d=c[1].split(","),e=/^\s*(\d*)(\.\d+)?\s*$/;if(d.length>=3&&(f=d[0].match(e))&&(g=d[1].match(e))&&(h=d[2].match(e))){var i=parseFloat((f[1]||"0")+(f[2]||"")),j=parseFloat((g[1]||"0")+(g[2]||"")),k=parseFloat((h[1]||"0")+(h[2]||""));return this.fromRGB(i,j,k,b),!0}}return!1},this.toString=function(){return(256|Math.round(this.rgb[0])).toString(16).substr(1)+(256|Math.round(this.rgb[1])).toString(16).substr(1)+(256|Math.round(this.rgb[2])).toString(16).substr(1)},this.toHEXString=function(){return"#"+this.toString().toUpperCase()},this.toRGBString=function(){return"rgb("+Math.round(this.rgb[0])+","+Math.round(this.rgb[1])+","+Math.round(this.rgb[2])+")"},this.isLight=function(){return.213*this.rgb[0]+.715*this.rgb[1]+.072*this.rgb[2]>127.5},this._processParentElementsInDOM=function(){if(!this._linkedElementsProcessed){this._linkedElementsProcessed=!0;var b=this.targetElement;do{var c=a.getStyle(b);c&&"fixed"===c.position.toLowerCase()&&(this.fixed=!0),b!==this.targetElement&&(b._jscEventsAttached||(a.attachEvent(b,"scroll",a.onParentScroll),b._jscEventsAttached=!0))}while((b=b.parentNode)&&!a.isElementType(b,"body"))}},"string"===typeof b){var m=b,n=document.getElementById(m);n?this.targetElement=n:a.warn("Could not find target element with ID '"+m+"'")}else b?this.targetElement=b:a.warn("Invalid target element: '"+b+"'");if(this.targetElement._jscLinkedInstance)return void a.warn("Cannot link jscolor twice to the same element. Skipping.");this.targetElement._jscLinkedInstance=this,this.valueElement=a.fetchElement(this.valueElement),this.styleElement=a.fetchElement(this.styleElement);var o=this,p=this.container?a.fetchElement(this.container):document.getElementsByTagName("body")[0],q=3;if(a.isElementType(this.targetElement,"button"))if(this.targetElement.onclick){var r=this.targetElement.onclick;this.targetElement.onclick=function(a){return r.call(this,a),!1}}else this.targetElement.onclick=function(){return!1};if(this.valueElement&&a.isElementType(this.valueElement,"input")){var s=function(){o.fromString(o.valueElement.value,a.leaveValue),a.dispatchFineChange(o)};a.attachEvent(this.valueElement,"keyup",s),a.attachEvent(this.valueElement,"input",s),a.attachEvent(this.valueElement,"blur",l),this.valueElement.setAttribute("autocomplete","off")}this.styleElement&&(this.styleElement._jscOrigStyle={backgroundImage:this.styleElement.style.backgroundImage,backgroundColor:this.styleElement.style.backgroundColor,color:this.styleElement.style.color}),this.value?this.fromString(this.value)||this.exportColor():this.importColor()}};return a.jscolor.lookupClass="jscolor",a.jscolor.installByClassName=function(b){var c=document.getElementsByTagName("input"),d=document.getElementsByTagName("button");a.tryInstallOnElements(c,b),a.tryInstallOnElements(d,b)},a.register(),a.jscolor}());