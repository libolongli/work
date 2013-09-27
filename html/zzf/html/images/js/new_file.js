/**
 * @author Administrator
 */


function FormObj(){
	
	this.add = function(){
		console.log('add');
	};
	
	this.del = function(){
		console.log('del');
	};
	
	this.show = function(){
		console.log('show');
	};
	
	
	
	return this;
};

var Form = (function(){
	return new FormObj();
})();
