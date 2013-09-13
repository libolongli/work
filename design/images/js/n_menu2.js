/**
 * @author Administrator
 */

				
var Nmeun = function(data){
	
	var liClick = null;
	var thisOneLi = null;
	var thisTwoA = null;
	var thisThree = null;
	
	var showOneMeun = function(){
		for(var i=0; data.length > i; i++){
			$(".n_menu_left").append('<li><a href="#" name="'+data[i].text+'"><img src="'+data[i].icon+'" /><p>'+data[i].text+'</p><span class="n_menu_icon"></span></a></li>');
		};
	};
	//一级菜单聚焦事件
	$(".n_menu_left li").live("hover", function(){
		var thisText = $(this).find("a").attr("name");
		showTwoMeun(thisText, "n_menu_right");
		if(thisOneLi){
			thisOneLi.css("background-color", "#E8EBF0").css("margin-left", "18px").css("border", "none");
		};
		thisOneLi = $(this);
		thisOneLi.css("background-color", "#fff").css("margin-left", "19px").css("margin-left", "19px").css("border-radius", "3px 0 0 3px").css("border", "1px solid #CCCCCC");
	});				
	
	//加载2级菜单
	function showTwoMeun (text, name){
		$("."+name+" li").remove();
		for (var i=0; i < data.length; i++) {
		  if(data[i].text == text){
		  	 var children = data[i].children;
		  	 for (var k = children.length - 1; k >= 0; k--){
		  	 	var right_li = '<li><a href="#" class="n_menu_right_a"><p>'+children[k].text+'</p></a>';
		  	 	var children1 = children[k].children;
		  	 	if(children1.length > 0){
		  	 		right_li += '<ul style="display: none;">';
		  	 		for (var j=0; j < children1.length; j++) {
						 right_li += '<li><a href="'+children[k].url+'">'+children1[j].text+'</a></li>';
					};
					right_li += "</ul>";
		  	 	};
				$("."+name).append(right_li+'</li>');
			 };
		  };
		};
	};
	//2级点击事件
	$(".n_menu_right_a").live("click", function(){
		if($(this).next("ul").html()){
			if($(this).next("ul").css("display") === "none"){
				$(this).next("ul").slideDown();
			}else{
				$(this).next("ul").slideUp();
			};
		}else{
			liClick({text: $(this).find("p").html(), url:$(this).find("a").attr("href")});
		};
	});
	
	//三级点击事情
	$(".n_menu_right li ul li").live("click", function(){
		liClick({text: $(this).find("a").html(), url:$(this).find("a").attr("href")});
		return false;
	});
	
	//二、三级菜单聚焦事件
	$(".n_menu_right li a p").live("hover", function(){
		if(thisTwoA){
			thisTwoA.css("color", "#000");
		};
		thisTwoA = $(this);
		thisTwoA.css("color", "#0466CB");
	});
	
	//三级菜单点击事件
	$(".n_menu_right li ul a").live("hover", function(){
		if(thisThree){
			thisThree.css("color", "#000");
		};
		thisThree = $(this);
		thisThree.css("color", "red");
	});
	
	//事件绑定区
	this.addListener = function(name, callBack){
		if(name === "click"){
			liClick = callBack;
		}else{
			callBack(null);
		};
	};
	//构造
	showOneMeun();
	//显示二级子菜单
	showTwoMeun(data[0].text, "n_menu_right");
	
	return this;
};			