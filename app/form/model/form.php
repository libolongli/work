<?php
	class k_model_form_form{
	
	/**
	 * 通过传入的表名和类型的名字返回select 的HTML
	 *
	 * @param  string $table  tablename 
	 * @param  string $cate   category
	 * @return html	
	 */
		function getSelect($table,$cate){		
			$sql = "SELECT type_id as value,title as name FROM type where status =1 
			and tablename = '{$table}' and cate='{$cate}'";	
			$data = R::getAll($sql);
			$data = json_encode($data);		
			$select = " {type : 'select', name : '{$cate}', title : '{$cate}',tip : '请选择当前状态', datatype:'*', errormsg : '请选择正确的当前状态', 
													data : {$data}, doption : '--请选择--'}";	
			echo $select;													
		}

	/**
	 * 通过传入的$map 生成一个input标签
	 *
	 * @param  array $map
	 * @return html	
	 */
		function setInput($map){
			$map = $this->teamMap($map,'input');
			$html = "{";
			$html .= "type : 'input',";
			$html .= "name : '{$map['name']}',"; 
			$html .= "title : '{$map['title']}',";
			$html .= "tip : '{$map['tip']}',";
			$html .= "inputType:'text',";
			$html .= "datatype:'{$map['datatype']}',";
			$html .= "errormsg :'{$map['errormsg']}',";
			$html .= "value:'{$map['value']}'";
			$html .= "}";
			return $html;
		}

		/**
		 * 通过传入的$map 生成一个popup标签
		 *
		 * @param  array $map
		 * @return html	
		 */
		function setPopup($map){
			$map = $this->teamMap($map,'popup');
			$html = "{";
			$html .= "type : 'popup',";
			$html .= "title : '{$map['title']}',";
			$html .= "name : '{$map['name']}',";
			$html .= "tip : '{$map['tip']}',";
			$html .= "inputType : 'text',";
			$html .= "datatype : '{$map['datatype']}',";
			$html .= "errormsg : '{$map['errormsg']}',";
			$html .= "data : {url:'{$map['ourl']}',name:'{$map['oname']}',type:'{$map['otype']}'},";
			$html .= "value : '{$map['value']}'";
			$html .= "}";
			return $html;
		}

		/**
		 * 通过传入的$map 生成一个隐藏标签
		 *
		 * @param  array $map
		 * @return html	
		 */
		function setHideinput($map){
			$map = $this->teamMap($map,'hideInput');
			$html = "{type : 'hideInput', name : '{$map['name']}', errormsg : '',value :'', display:'none'}";
			return $html;
		}
		
		/**
		 * 通过传入的$map 生成一个下拉列表
		 *
		 * @param  array $map
		 * @return html	
		 */

		function setSelect($map){
			$map = $this->teamMap($map,'select');
			$data = array();
			$i=0;
			foreach($map['data'] as $key=>$value){
				$data[$i]['value'] = $value['id'];
				$data[$i]['name'] = $value['name'];
				$i++;
			}
			$data = json_encode($data);
			$html = "{";
			$html .="type : 'select',";
			$html .="name : '{$map['name']}',";
			$html .="datatype : '{$map['datatype']}',";
			$html .="title : '{$map['title']}',";
			$html .="errormsg : '{$map['errormsg']}',";
			$html .="data : {$data},";
			$html .="doption : '--请选择--'";
			$html .="}";
			return $html;	
		}

		/**
		 * 通过传入的$map 生成一个Textarea标签
		 *
		 * @param  array $map
		 * @return html	
		 */
		function setTextarea($map){
			$map = $this->teamMap($map,'textarea');
			$html = "{";
			$html .= "type : 'textarea',";
			$html .= "name : '{$map['name']}',";
			$html .= "title : '{$map['title']}',";
			$html .= "tip : '{$map['tip']}',";
			$html .= "value : '{$map['value']}',";
			$html .= "inputType : 'text',";
			$html .= "datatype : '{$map['datatype']}',";
			$html .= "errormsg : '{$map['errormsg']}',";
			$html .="}";
			return $html;
		}

		/**
		 * 通过传入的$map 生成一个日历插件
		 * 需要另外引进相关的JS 和 CSS
		 * <script src="images/js/zebra_datepicker.js" type="text/javascript" ></script>
		 * <link href="images/css/metallic.css" type="text/css" rel="stylesheet" />
		 *
		 * @param  array $map
		 * @return html	
		 */
		function setCalender($map){
			$map = $this->teamMap($map,'calender');
			$html = "{";
			$html .= "type : 'datepicker',";
			$html .="name:'{$map['name']}',";
			$html .="title:'{$map['title']}',";
			$html .="id:'{$map['id']}',";
			$html .="tip:'{$map['tip']}',";
			$html .="datatype:'{$map['datatype']}',";
			$html .="errormsg:'{$map['errormsg']}',";
			$html .="inputType:'text',";
			$html .="value:'{$map['value']}',";
			$html .="}";
			return $html;

		}

		/**
		 * 通过传入的$map主要是用来设置默认值的,以免插件出问题
		 *
		 * @param  array $map
		 * @param  string $map
		 * @return html	
		 */		
		function teamMap($map,$type){
			$key = array();
			$data['datatype'] = "*";
			$data['tip'] = isset($map['errormsg']) ? isset($map['errormsg']) :'请输入正确的格式!';
			$data['errormsg'] = isset($map['tip']) ? isset($map['tip']) :'请输入正确的格式!';
			$data['title'] = '名称';
			$data['value'] = '';
			$data['ourl'] = 'data.html';
			$data['oname'] = 'recruit';
			$data['otype'] = 'cont';
			$data['id'] = 'calender';
			switch ($type) {
				case 'input':
					$key = array('name','title','tip','datatype','errormsg','value');
					break;
				case 'popup':
					$key = array('name','title','tip','datatype','errormsg','ourl','oname','value','otype');
					break;
				case 'hideInput':
					$key = array('name');
					break;
				case 'select':
					$key = array('name','title','tip','datatype','errormsg','data');
					break;
				case 'textarea':
					$key = array('name','title','tip','datatype','errormsg','value');
					break;
				case 'calender':
				$key = array('name','title','tip','datatype','errormsg','value','id');
				break;

			}
			
			foreach ($key as $k => $v) {
				if(!isset($map[$v])) $map[$v] = $data[$v]; 
			}
			return $map;
		}
	}

