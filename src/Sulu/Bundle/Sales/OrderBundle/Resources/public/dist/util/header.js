define([],function(){"use strict";var a={conversionFailed:"salescore.conversion-failed"},b=function(a){var b,d,e,f=null,g={save:{},"delete":{options:{callback:function(){this.sandbox.emit("sulu.salesorder.order.delete")}.bind(this),disabled:!0}}},h={icon:"hand-o-right",iconSize:"large",group:"left",title:"workflows.title",id:"workflow",dropdownItems:[]},i={divider:!0};if(a.id){for(a.allowDelete&&(g["delete"].options.disabled=!1),b=-1,d=a.workflows.length;++b<d;)e=a.workflows[b],0===h.dropdownItems.length?f=e.section:f&&f!==e.section&&(h.dropdownItems.push(i),f=e.section),h.dropdownItems.push({title:this.sandbox.translate(e.title),callback:c.bind(this,e),disabled:e.disabled});h.dropdownItems.length>0&&(g.workflows={options:h})}this.sandbox.emit("sulu.header.set-toolbar",{buttons:g})},c=function(a){if(a.hasOwnProperty("event")&&a.event){var b=a.parameters||null;this.sandbox.emit(a.event,b)}else a.hasOwnProperty("route")&&a.route?g.call(this,function(){this.sandbox.emit("sulu.router.navigate",a.route)}.bind(this),f.bind(this,"")):this.sandbox.logger.log("no route or event provided for workflow with title "+a.title)},d=function(){g.call(this,function(){this.sandbox.emit("sulu.salesorder.order.confirm")},f.bind(this,a.conversionFailed))},e=function(){g.call(this,function(){this.sandbox.emit("sulu.salesorder.order.edit")},f.bind(this,a.conversionFailed))},f=function(a){this.sandbox.emit("sulu.labels.error.show",this.sandbox.translate(a))},g=function(a,b){"function"==typeof a&&(this.saved?a.call(this):this.sandbox.emit("sulu.overlay.show-warning","sulu.overlay.be-careful","sulu.overlay.save-unsaved-changes-confirm",null,function(){this.submit().then(a.bind(this),b.bind(this))}.bind(this)))},h=function(){this.sandbox.on("sulu.salesorder.order.edit.clicked",e.bind(this)),this.sandbox.on("sulu.salesorder.order.confirm.clicked",d.bind(this))},i=function(a,b){var c,d,e=null;c=this.sandbox.translate("salesorder.order"),d="object"==typeof b,d&&b.hasOwnProperty("titleAddition")&&(e=b.titleAddition),a&&a.number&&(c+=" #"+a.number),e&&(c+=" "+e),this.sandbox.emit("sulu.header.set-title",c)};return{initialize:function(){h.call(this)},setHeader:function(a,b){a=a.toJSON(),i.call(this,a,b)},setToolbar:function(a){b.call(this,a)},checkForUnsavedData:function(a,b){g.call(this,a,b)},getUrl:function(a,b){var c="sales/orders";return a&&(c+="/edit:"+a),b&&(c+="/"+b),c},enableSave:function(){this.sandbox.emit("sulu.header.toolbar.item.enable","save",!1)},disableSave:function(){this.sandbox.emit("sulu.header.toolbar.item.disable","save",!1)},loadingSave:function(){this.sandbox.emit("sulu.header.toolbar.item.loading","save")}}});