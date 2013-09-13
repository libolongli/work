/**
smartForm 对象使用
创建：

var form = new smartForm(view, obj);

参数 
	view ： 表单要绑定的视图元素，表单将生产在这个对象里面
	obj  ： 表单的其他配置元素对象

返回 ： 对象自己（this）


方法 
	addListener ： 表单的弹出框事件绑定


obj  对象参数详解
	obj.url			String	 	: 表单需要提交的url地址	
	obj.httpType	String 		: 表单提交的方式
	obj.center 		Boolean		: 表单生成的样式     false：双列     true :单列
	obj.popups		Array		: 弹出框相应地址配置文件
	obj.rows		Array		: 构建表单元素的配置文件
*/	
	

	
var smartFrom = function(id, obj){
	var views = '';				 			//表单对象字符
	var fromMsgNull = "请填入信息！";			//表单元素为空              					  默认提示"请填入信息！"。
	var fromSucMsg = "通过信息验证！";			//表单元素验证通过                                                            默认提示"通过信息验证！"。
	var fromErrorMsg = "请输入正确信息！";		//表单元素验证不通过                                            	  默认提示"请输入正确信息！"
	var tipType = 1;						//提示信息提示位置 					 1为内容里面提示	  	2为右侧提示                  
	var times = [];
	var hideView = '';
	
	
	//加载头部信息

	var view_header = '<form class="registerform" method="'+obj.httpType+'" action="'+obj.url+'"><table width="50%" style="table-layout:fixed; margin: 0 auto;'+(obj.center ? "width:735px;" : 'float: left;')+'">';
	views += view_header;

	var configFrom = function(row){
		switch(row.type){
			case "input":
				// inputType 列表类型            <td class="need" style="width:10px">*</td>
				var input = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><input ' 
                    		+'type="'+row.inputType+'" value="'+(row.value ? row.value : "")+'" nullmsg="'+row.tip+'" name="'+row.name+'" datatype="'+row.datatype+'"' 
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
                    			if((row.value && row.value == i) || (row.value && row.value == row.data[i].value)){
                    				select += '<option value="'+row.data[i].value+'" selected="selected" >'+row.data[i].value+'</option>'; 
                    			}else{
                    				select += '<option value="'+row.data[i].value+'">'+row.data[i].name+'</option>'; 
                    			}
							};
							select += '</select></td><td><div class="Validform_checktip">'+row.errormsg+'</div></td>';
				views += select;
			break;
			case "radio":
				var radio = '<tr><td class="from_title">'+row.title+'：</td>';
							if(! row.data){
								break;
							};
							for (var i=0; i < row.data.length; i++) {
							   if(i == 0){
							   		if(row.value && row.value == i){
							   			radio += '<td><input type="radio" checked="checked" value="'+row.data[i].value+'" name="'+row.name+'" class="pr1" datatype="'+row.datatype+'"' 
                    						+'errormsg="'+row.errormsg+'" /><label for="male">'+row.data[i].name+'</label>';
							   		}else{
							   			radio += '<td><input type="radio" value="'+row.data[i].value+'" name="'+row.name+'" class="pr1" datatype="'+row.datatype+'"' 
                    						+'errormsg="'+row.errormsg+'" /><label for="male">'+row.data[i].name+'</label>';
							   		};							   		
							   }else{
							   		if(row.value && row.value == i){
							   			radio += '<input type="radio" checked="checked" value="'+row.data[i].value+'" name="'+row.name+'" class="pr1" /><label for="female">'+row.data[i].name+'</label>';
							   		}else{
							   			radio += '<input type="radio" value="'+row.data[i].value+'" name="'+row.name+'" class="pr1" /><label for="female">'+row.data[i].name+'</label>';
							   		};
							   }
							};
                    		radio += '</td><td><div class="Validform_checktip">'+row.errormsg+'</div></td></tr>';
                views += radio;
			break;
			case "checkbox":
				var checkbox = '<tr><td class="from_title">'+row.title+'：</td><td>';
                    		for (var i = row.data.length - 1; i >= 0; i--){
							   if(i == (row.data.length - 1)){
							   		if(row.value && row.value == i){
							   			checkbox += '<input name="'+row.name+'" checked="checked" id="shoppingsite'+row.data[i].value+'" class="rt2" type="checkbox"'  
							   					+'value="'+row.data[i].value+'" datatype="'+row.datatype+'" ' 
							   					+'errormsg="'+row.errormsg+'" /><label for="shoppingsite'+row.data[i].value+'">'+row.data[i].name+'</label>';
							   		}else{
							   			checkbox += '<input name="'+row.name+'" id="shoppingsite'+row.data[i].value+'" class="rt2" type="checkbox"'  
							   					+'value="'+row.data[i].value+'" datatype="'+row.datatype+'" ' 
							   					+'errormsg="'+row.errormsg+'" /><label for="shoppingsite'+row.data[i].value+'">'+row.data[i].name+'</label>';
							   		};
							   }else{
							   		if(row.value && row.value == i){
							   				checkbox += '<input  name="'+row.name+'" checked="checked" id="shoppingsite'+row.data[i].value+'" class="rt2" type="checkbox"  value="'+row.data[i].value+'"' 
							   					+'/><label for="shoppingsite'+row.data[i].value+'">'+row.data[i].name+'</label>';
							   		}else{
							   				checkbox += '<input  name="'+row.name+'" id="shoppingsite'+row.data[i].value+'" class="rt2" type="checkbox"  value="'+row.data[i].value+'"' 
							   					+'/><label for="shoppingsite'+row.data[i].value+'">'+row.data[i].name+'</label>';
							   		};
							   };
							};
                    		checkbox += '</td><td><div class="Validform_checktip">'+row.errormsg+'</div></td></tr>';
               views += checkbox;
			break;
			case "textarea":
				var textarea = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><textarea  errormsg='+row.errormsg+'  name="'+row.name+'" value="">'+(row.value ? row.value : "")+'</textarea></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div></td></tr>';
               views += textarea;
			break;
			case "password":
				var input = '<tr><td  class="from_title">'+row.title+'：</td>'
                    		+'<td style="width:205px;"><input type="password"  plugin="passwordStrength"  value=""  name="'+row.name+'" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'" /></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div>'
                    		+'<div class="passwordStrength" style="display:none;"><b>密码强度：</b> <span>弱</span><span>中</span><span class="last">强</span></div>'
                    		+'<div class="info">'+row.tip+'<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div></td></tr>';
                views += input;
			break;
			case "popup":
				var recruitPeople = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><input ' 
                    		+'type="'+row.inputType+'" value="'+(row.value ? row.value : "")+'"  name="'+row.name+'" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'" /><div class="rp_view" name="'+row.data.name+'" title="'+(row.data.title ? row.data.title : "")+'"' 
                    		+'url="'+row.data.url+'" width="'+(row.data.width ? row.data.width : "")+'" type="'+row.data.type+'"  >'
                    		+'<div class="recruit"></div></div></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div>'
                    		+'<div class="info">'+row.tip+'<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div></td></tr>';     		
                views += recruitPeople;
			break;
			case "datepicker":
				times.push(row.id);
				var datepicker = '<tr><td class="from_title">'+row.title+'：</td>'
                    		+'<td><input ' 
                    		+'type="'+row.inputType+'" value="'+(row.value ? row.value : "")+'" id="'+row.id+'" name="'+row.name+'" plugin="datepicker" datatype="'+row.datatype+'"' 
                    		+'errormsg="'+row.errormsg+'" /></td>'
                    		+'<td><div class="Validform_checktip">'+row.errormsg+'</div>'
                    		+'<div class="info">'+row.tip+'<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div></td></tr>';
                views += datepicker;
			break;
			case 'html':
				var cont = '<tr><td class="from_title">'+row.title+': </td><td>'+row.content+'</td></tr>';
				views += cont;
			break;
		}
	};
	
	var showViewIndex = obj.rows.length;
	//检测是否有隐藏元素
	for (var i=0; i < obj.rows.length; i++) {
		if(obj.rows[i].type == 'hideInput'){
			showViewIndex = showViewIndex - 1;
		};
	};
	
	//加载子元素
	var data = obj.rows;
	for (var i=0,k=0; i < data.length; i++) {
		if(data[i].type == 'hideInput'){
			hideView += '<input type="hidden" value="'+data[i].value+'" name="'+data[i].name+'" />';
			continue;
		};
		if(! obj.center){
			if(k == parseInt(showViewIndex / 2)){
				views += '</table><table width="50%" style="table-layout:fixed;">';
			};
			configFrom(data[i]);
		}else{
			configFrom(data[i]);
		};
		k ++;
	};
	views += '</table>'+hideView+'<div class="form_btn"><input class="from_btn" type="submit" value="提 交" /> <input  class="from_btn" type="reset" value="重 置" /></div></form>';
	         
	$("#"+id).append(views);
	
	var getInfoObj=function(){
		return 	$(this).parents("td").next().find(".info");
	};
	//显示隐藏验证提示信息
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
	
	
	//创建自动验证对象
	$(".registerform").Validform({
		tiptype : 2
	});
	//创建日期显示对象
	for (var i=0; i < times.length; i++) {  
	  $('#'+times[i]).Zebra_DatePicker();
	};
	//弹出窗口对象
	var rp_view_c = null;
	$(".rp_view").click(function(){
		if($(this).attr('type') == "load"){
			$().w2popup('load', { url: $(this).attr('url'), width: ($(this).attr('width') == "" ? 250 : parseInt($(this).attr('width')))});
		}else{
			$().w2popup({
				title   : $(this).attr('title'),
				body    : '<iframe src="'+$(this).attr('url')+($(this).prev().val() == "" ? "" : '?id='+$(this).prev().val())+'" style="width: 100%;height:99%;border: medium none;"></iframe>',
				width   : ($(this).attr('width') == "" ? 600 : parseInt($(this).attr('width')))
			});
		};
		rp_view_c(this);
	});

	/**
	 * 回调事件监听  获取当前选择对象
	 * 参数 ： name 监听事件名称
	 * 		callback 回调函数
	 * 返回：无
	 */
	this.addListener = function(view, fun){
		switch(view){
			case 'popupCallBack':
				rp_view_c = fun;
			break;
		};
	};

	return this;
};




