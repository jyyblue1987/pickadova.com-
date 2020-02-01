function getFormData($form){
	var unindexed_array = $form.serializeArray();
	var indexed_array = {};

	$.map(unindexed_array, function(n, i){
		indexed_array[n['name']] = n['value'];
	});

	return indexed_array;
}


function startLoader(loader,element){
	var orginal_html=loader.html();
	var laoding_html=loader.data('onload');
	loader.html(laoding_html);
	loader.data('onload',orginal_html);
	element.addClass('disabled');
}

function endLoader(loader,element){
	var orginal_html=loader.html();
	var laoding_html=loader.data('onload');
	loader.html(laoding_html);
	loader.data('onload',orginal_html);
	element.removeClass('disabled');
}


function setCookie(cname, cvalue, exdays=30){
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

!function(e){"use strict";e.fn.serializeToJSON=function(t){var a={settings:e.extend(!0,{},e.fn.serializeToJSON.defaults,t),getValue:function(t){var a=t.val();if(t.is(":radio")&&(a=t.filter(":checked").val()||null),t.is(":checkbox")&&(a=e(t).prop("checked")),this.settings.parseBooleans){var n=(a+"").toLowerCase();"true"!==n&&"false"!==n||(a="true"===n)}var r=this.settings.parseFloat.condition;return void 0!==r&&("string"==typeof r&&t.is(r)||"function"==typeof r&&r(t))&&(a=this.settings.parseFloat.getInputValue(t),a=Number(a),this.settings.parseFloat.nanToZero&&isNaN(a)&&(a=0)),a},createProperty:function(t,a,n,r){for(var i=t,s=0;s<n.length;s++){var l=n[s];if(s===n.length-1){var o=r.is("select")&&r.prop("multiple");o&&null!==a?(i[l]=new Array,Array.isArray(a)?e(a).each(function(){i[l].push(this)}):i[l].push(a)):i[l]=a}else{var u=/\[\w+\]/g.exec(l),c=null!=u&&u.length>0;if(c){l=l.substr(0,l.indexOf("[")),this.settings.associativeArrays?i.hasOwnProperty(l)||(i[l]={}):Array.isArray(i[l])||(i[l]=new Array),i=i[l];var h=u[0].replace(/[\[\]]/g,"");l=h}i.hasOwnProperty(l)||(i[l]={}),i=i[l]}}},includeUncheckValues:function(t,a){e(":radio",t).each(function(){var t=0===e("input[name='"+this.name+"']:radio:checked").length;t&&a.push({name:this.name,value:null})}),e("select[multiple]",t).each(function(){null===e(this).val()&&a.push({name:this.name,value:null})})},serializer:function(t){var a=this,n=e(t).serializeArray();this.includeUncheckValues(t,n);var r={};return e.each(n,function(n,i){var s=e(":input[name='"+i.name+"']",t),l=a.getValue(s),o=i.name.split(".");a.createProperty(r,l,o,s)}),r}};return a.serializer(this)},e.fn.serializeToJSON.defaults={associativeArrays:!0,parseBooleans:!0,parseFloat:{condition:void 0,nanToZero:!0,getInputValue:function(e){return e.val().split(",").join("")}}}}(jQuery);