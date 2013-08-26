/**
 * @author Administrator
 */

/**
 * 创建表单类型
 * input
 * select
 * radio
 * checkbox
 * textarea
 */

/**
 * 创建表单参数对象
 * url : string 请求地址
 * httpType : string 请求方式
 * rows : [] 创建对象数组
 * 		aRow : {} 创建一个对象
 * 		参数 ： datatype ： 验证条件
 * 			  errormsg ： 验证失败提示
 * 			  tip ： 默认提示信息
 * 			  type : 表单类型
 * 			  title: 左边名称
 */
var smartFrom = function(id, obj){
	var views = '';				 			//表单对象字符
	var fromMsgNull = "请填入信息！";			//表单元素为空              					  默认提示"请填入信息！"。
	var fromSucMsg = "通过信息验证！";			//表单元素验证通过                                                            默认提示"通过信息验证！"。
	var fromErrorMsg = "请输入正确信息！";		//表单元素验证不通过                                            	  默认提示"请输入正确信息！"
	var tipType = 1;						//提示信息提示位置 					 1为内容里面提示	  	2为右侧提示                  
	var times = [];
	
	
	//加载头部信息

	var view_header = '<form class="registerform" method="'+obj.httpType+'" action="'+obj.url+'"><table width="50%" style="table-layout:fixed; float: left;">';
	views += view_header;

	var configFrom = function(row){
		var rTip = "";
		var lTip = "";
		//判断提示信息位置
		if(tipType){
			rTip = row.tip;
		}else{
			lTip = row.tip;
		};
		switch(row.type){
			case "input":
				// inputType 列表类型            <td class="need" style="width:10px">*</td>
				var input = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><input ' 
                    		+'type="'+row.inputType+'" value="" nullmsg="'+row.tip+'" name="'+row.name+'" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'" /></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div>'
                    		+'<div class="info">'+row.tip+'<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div></td></tr>';
                views += input;
			break;
			case "select":
				var select = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><select name="'+row.name+'" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'">';
                    		select += '<option value="">'+row.doption+'</option>'; 
                    		for (var i = row.data.length - 1; i >= 0; i--){
							    select += '<option value="'+row.data[i].value+'">'+row.data[i].name+'</option>'; 
							};
							select += '</select></td><td><div class="Validform_checktip">'+row.errormsg+'</div></td>';
				views += select;
			break;
			case "radio":
				var radio = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><input type="radio" value="'+row.data[0].value+'" name="'+row.name+'" class="pr1" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'" /><label for="male">'+row.data[0].name+'</label>'
                    		+'<input type="radio" value="'+row.data[1].value+'" name="'+row.name+'" class="pr1" /><label for="female">'+row.data[1].name+'</label></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div></td></tr>';
                views += radio;
			break;
			case "checkbox":
				var checkbox = '<tr><td class="from_title">'+row.title+'：</td><td>';
                    		for (var i = row.data.length - 1; i >= 0; i--){
							   if(i == (row.data.length - 1)){
							   		checkbox += '<input name="'+row.name+'" id="shoppingsite'+row.data[i].value+'" class="rt2" type="checkbox"'  
							   					+'value="'+row.data[i].value+'" datatype="'+row.datatype+'" ' 
							   					+'errormsg="'+row.errormsg+'" /><label for="shoppingsite'+row.data[i].value+'">'+row.data[i].name+'</label>';
							   }else{
							   		checkbox += '<input  name="'+row.name+'" id="shoppingsite'+row.data[i].value+'" class="rt2" type="checkbox"  value="'+row.data[i].value+'"' 
							   					+'/><label for="shoppingsite'+row.data[i].value+'">'+row.data[i].name+'</label>';
							   };
							};
                    		checkbox += '</td><td><div class="Validform_checktip">'+row.errormsg+'</div></td></tr>';
               views += checkbox;
			break;
			case "textarea":
				var textarea = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><textarea  errormsg='+row.errormsg+'  name="'+row.name+'" value=""></textarea></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div></td></tr>';
               views += textarea;
			break;
			case "password":
				var input = '<tr><td  class="from_title">'+row.title+'：</td>'
                    		+'<td style="width:205px;"><input type="password"  plugin="passwordStrength"  value=""  name="'+row.name+'" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'" /></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div>'
                    		+'<div class="passwordStrength" style="display:none;"><b>密码强度：</b> <span>弱</span><span>中</span><span class="last">强</span></div>'
                    		+'<div class="info"><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div></td></tr>';
                views += input;
			break;
			case "popup":
				var recruitPeople = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><input ' 
                    		+'type="'+row.inputType+'" value=""  name="'+row.name+'" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'" /><div class="rp_view" name="'+row.popupType+'"><div class="'+row.popupType+'"></div></div></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div>'
                    		+'<div class="info"><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div></td></tr>';
                views += recruitPeople;
			break;
			case "datepicker":
				times.push(row.id);
				var datepicker = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><input ' 
                    		+'type="'+row.inputType+'" value="" id="'+row.id+'" name="'+row.name+'" plugin="datepicker" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'" /></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div>'
                    		+'<div class="info"><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div></td></tr>';
                views += datepicker;
			break;
			case "hideInput":
				var input = '<tr style="display:'+row.display+'"><td class="from_title"></td>'
                    		+'<td><input ' 
                    		+'type="text" value="'+row.value+'" name="'+row.name+'"' 
                    		+'/></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div>'
                    		+'<div class="info"><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div></td></tr>';
                views += input;
			break;
		}
	};
		//加载子元素
	var data = obj.rows;
	for (var i=0; i < data.length; i++) {
		//console.log(data[i]);
		if(obj.type == "cross"){
			if(i == (data.length / 2)){
				views += '</table><table width="50%" style="table-layout:fixed;">';
			};
			configFrom(data[i]);
		}else{
			configFrom(data[i]);
		};
	};
	views += '<tr><td class="need"></td><td></td><td colspan="2" style="padding:10px 0 18px 0;'+(obj.type == "cross" ?  " margin-left: -162px;" : "")+'">'
	         +'<input class="from_btn" type="submit" value="提 交" /> <input  class="from_btn" type="reset" value="重 置" /></td></tr></table></form>';
	         
	$("#"+id).append(views);
	
	var getInfoObj=function(){
		return 	$(this).parents("td").next().find(".info");
	}
	
	$("[datatype]").focusin(function(){
		if(this.timeout){clearTimeout(this.timeout);}
		var infoObj=getInfoObj.call(this);
		if(infoObj.siblings(".Validform_right").length!=0){
			return;	
		}
		infoObj.show().siblings().hide();
		
	}).focusout(function(){
		var infoObj=getInfoObj.call(this);
		this.timeout=setTimeout(function(){
			infoObj.hide().siblings(".Validform_wrong,.Validform_loading").show();
		},0);
	});
	
	$(".registerform").Validform({
		tiptype : 2,
		btnReset : obj.resetBtn,
		btnSubmit : obj.saveBtn
	});

	for (var i=0; i < times.length; i++) {  
	  $('#'+times[i]).Zebra_DatePicker();
	};
	
	return this;
};
