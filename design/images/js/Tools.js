/**
 * @author Administrator
 */

var Tools = (function(){
	
	/**
	 * 解析url对象
	 * 参数 : url String  获取到的url参数
	 * 返回: Array 	 	解析出来的数组
	 */
	this.urlKey = function(url){
		var data1 = [];
		var data2 = [];
		var data3 = [];
		data1 = url.split("?");
		data2 = data1[1].split("=");
		data3 = data2[1].split("/");
		
		return data3;
	};
	
	
	
	return this;
})();
