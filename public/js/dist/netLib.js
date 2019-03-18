/*
 * netLib.js
 * @version v2.0.1
 * @copyright 2018 Netconsult.com.ve.
 */
;(function(wdw){

var document = wdw.document;

var ajaxProt = {	
	complete: function(fn){
		this.xhr.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				fn(this.response);
			}
		}
		this.xhr.open(this.metodo, this.url, true);
		this.xhr.setRequestHeader("Content-Type", this.Header);
		this.xhr.send(this.data);
	}
}

var prot = {
	val: function(a){
		var arr = [];
		if (a == undefined){
			if(this.toArray(this).length == 1){
				arr = this[0].value;
			}else{
				this.toArray(this).forEach(function(c){
					arr.push(c.value);
				});				
			}
			return arr;
		}else{
			if(typeof(a) === "string"){
				this.toArray(this).forEach(function(c){
					c.value = a;
				});
			}
		}
	},
	text: function(a){
		var arr = [];
		if (a == undefined){
			if(this.toArray(this).length == 1){
				arr = this[0].innerText;
			}else{
				this.toArray(this).forEach(function(c){
					arr.push(c.innerText);
				});				
			}
			return arr;
		}else{
			if(typeof(a) === "string"){
				this.toArray(this).forEach(function(c){
					c.innerText = a;
				});
			}
		}
	},
	addEvent: function(eventName, fn){
		addEvento(this, eventName, fn);
	},
	click: function(fn){
		if(fn == undefined){
			var evt = document.createEvent("MouseEvents");
			evt.initMouseEvent("click", true, true, wdw, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
			prot.toArray(this).forEach(function(c){c.dispatchEvent(evt);});
		}else{
			addEvento(this, "click", fn);
		}		
	},
	nodeAdd: function(htmlArch, idName, className, fn, time, fnEl){
		fn = fn == undefined ? function(){} : fn;
		time = time == undefined ? 400 : time;
		var oa = this;
		var url = wdw.configJSON.dir["html"] ? wdw.configJSON.locationHref + wdw.configJSON.dir["html"] + htmlArch + getRandom() : htmlArch + getRandom();
		ajax({}, url, "GET").complete(function(resp){
			var divAux = document.createElement("div");
			divAux.id = idName == undefined ? "" : idName;
			divAux.className = className == undefined ? "" : className;
			divAux.style.opacity = 0;
			divAux.innerHTML = resp;
			prot.toArray(oa).forEach(function(valor, ind, arr){
				valor.appendChild(divAux);
				if((ind + 1) == arr.length){
					fnEl == undefined ? function(){} : fnEl();
				}
			});
			ShowHide(fn, time, undefined, true, {0: divAux}, true, undefined);	
		});
	},
	nodeRemove: function(fn, time){
		ShowHide(fn, time, undefined, false, this, undefined, true);
	},
	css: function(objCss){
		var objKeys, objValues, i = 0;
		objKeys = Object.keys(objCss);
		objValues = Object.values(objCss);
		this.toArray(this).forEach(function(c){
			for( ; i < objKeys.length; i++){
				c.style[objKeys[i]] = typeof(objValues[i]) == "string" ? objValues[i] : '"' + objValues[i] + 'px"';
			}
		});
	},
	hide: function(fn, time){
		ShowHide(fn, time, undefined, false, this);
	},
	show: function(fn, time){
		ShowHide(fn, time, undefined, true, this);
	},
	addClass: function(a){
		if(typeof(a) === "string"){
			this.toArray(this).forEach(function(c){
				c.classList.add(a);
			});
		}	
	},
	removeClass: function(a){
		if(typeof(a) === "string"){
			this.toArray(this).forEach(function(c){
				c.classList.remove(a);
			});
		}	
	},
	toggleClass: function(a){
		if(typeof(a) === "string"){
			this.toArray(this).forEach(function(c){
				c.classList.add(a);
			});
		}	
	},
	toArray: function(a){
		var b = a == undefined ? this : a
		return Object.values(b);
	}
}

var SelectorAll = function(a){
	var obj_net = Object.create(prot);
	if(typeof(a) === "string"){
		document.querySelectorAll(a).forEach(function(c, ind){
			obj_net[ind] = c;
		});
	}
	if(typeof(a) === "object"){
		console.log(typeof "2");
		console.log(a.nodeType);
	}	
	return obj_net;
}

var addEvento = function(obj, eventName, fn){
	prot.toArray(obj).forEach(function(c){
		c.addEventListener(eventName, function(e){
			if(e.target.type !== "checkbox"){
				e.preventDefault();
			}
			fn(e);
		}, false);
	});
}

var ShowHide = function(fn, time, tick, show, obj, addObj, removeObj){
	var t, f, timeStamp, op, m
	var obj_aux = Object.values(obj);
	t = time == undefined ? 400 : time;
	f = fn == undefined ? function(){} : fn;
	if(tick == undefined){
		ShowHide(f, t, Date.now(), show, obj, addObj, removeObj);
	}else{
		timeStamp = Date.now() - tick;
		if(!show){						
			op = 1 - (timeStamp / t);
			if (op > 0 && timeStamp < t){
				obj_aux.forEach(function(c){c.style.opacity = op;});
				setTimeout(ShowHide, 0, f, t, tick, show, obj, addObj, removeObj);
			}else{				
				obj_aux.forEach(function(c, indice, array){
					c.style.opacity = Math.round(op);
					if ((indice + 1) == array.length){
						if(removeObj == true){
							prot.toArray(obj).forEach(function(j, ind, arr){
								j.parentNode.removeChild(j);
								if ((ind + 1) == arr.length){
									f();
								}
							});
						}else{
							f();
						}
					}
				});
			}
		}else{
			op = timeStamp / t;
			if (op < 1 && timeStamp < t){
				obj_aux.forEach(function(c){c.style.opacity = op;});
				setTimeout(ShowHide, 0, f, t, tick, show, obj, addObj, removeObj);
			}else{
				obj_aux.forEach(function(c, ind, arr){
					c.style.opacity = Math.round(op);
					if ((ind + 1) == arr.length){
						f();
					}
				});
			}		
		}
	}
}

var NetLib = function(a){	
	return new SelectorAll(a);
};

NetLib.ajax = ajax = function(data, url, metodo){
	var h = new ajaxXhr(data, url, metodo);
	return h;
}

NetLib.loadScript = loadScript = function(scrip){
	var s = document.createElement("script");
	var swUrl = scrip.match(/^(http|https|ftp)\:\/\/[a-z0-9\.-]+\.[a-z]{2,4}/gi) ? true : false;	
	s.type = "text/javascript";
	s.src = swUrl ? scrip : wdw.jsDir + scrip + getRandom();
	document.body.appendChild(s);
}

NetLib.documentHeight = documentHeight = function(){
	return wdw.innerHeight;
}

NetLib.documentWidth = documentWidth = function(){
	return wdw.innerWidth;
}

var ajaxXhr = function(data, url, metodo){
	var strData = "", objKeys, objValues, i = 0;
	var h = Object.create(ajaxProt);
	h.data = data ? data : {};	
	objKeys = Object.keys(h.data);
	objValues = Object.values(h.data);
	for( ; i < objKeys.length; i++){
		strData += objKeys[i] + "=" + objValues[i] + "&";
	}
	h.data = strData.slice(0, -1);
	h.url = url ? url : wdw.configJSON.locationHref + wdw.configJSON.dir["controller"] + wdw.configJSON.controlerName;
	h.metodo = metodo ? metodo.toUpperCase() : "POST";
	h.xhr = wdw.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XmlHttp");
	h.xhr.responseType = h.metodo == "POST" ? "json" : "text";
	h.Header = h.metodo == "POST" ?	"application/x-www-form-urlencoded; charset=utf-8" : "text/html; charset=utf-8";
	return h;
}

var getRandom = function(){return "?ver=" + Math.random().toFixed(6);}

wdw.N = wdw.NetLib = wdw.net = NetLib;

})(window);