<?php
class module_new_api_new
{
	private $data = array();

			


	private $_db;
	function __construct(){
		$this->_db = new db();
	}
  	function getRowLi($type)
  	{

		$data=  R::getAll("select * from news where type='{$type}' order by id desc");
	 	if($data) return $data;
	 	return false;	 
	}
/**
*通过执行调用工作流添加新闻
*@param array $data  category
*@return array
*/		
	function addNew($data){
			if(isset($_SESSION['user']['user'])){
				 $author = $_SESSION['user']['user'];
			}
		foreach($data as $key =>$value){
			if($value == '请输入新闻标题！') $data[$key]='';
		}
		if($data['rids']){
			//发送工作流
			$flow = k::load('api')->load('task','flow');
			$flow->init('news/add');
			$user = $_SESSION['user'];
			$flow->add(array('title'=>$data['title'],'user'=>$user['user'],'transmit'=>0,'rids'=>$data['rids'],'uid'=>$user['id']));
		}
		if($data){
			$now = time();
			$idata = array("title=>{$data['title']}","content=>{$data['content']}","type=>{$data['type']}",
			"ts_created=>{$now}","status=>0");
			$id = $this->_db->add('news',$idata);
			return $id;
		}
	}
/**
*得到新闻的类型
*@param null
*@return string 
*/	
function getOption(){
		if($type = 'all')
		$data = $this->getType();
		$str = '';
		if($data){
			foreach($data as $key =>$value){
				if($str){
					$str.=",{value:{$value['id']}, name:'{$value['name']}'}";
				}else{
					$str.="{value:{$value['id']}, name:'{$value['name']}'}";
				}
			}
		}		
		if($str) return $str;
		return false;	 
	}
	function getType(){
		return R::getAll("SELECT titles as name,type_id as id FROM type where cate = 'type' order by id desc");	
	}
/**
*新闻列表
*@param null
*@return array 
*/	
	function getNewsInfo(){
		$id =$_GET['id'];
		$sql = "select title,author,content,FROM_UNIXTIME(ts_created) as ts_created from news where id = '{$id}'";
		$data = R::getRow($sql);
		$json = "[
		{'title':'标题', 'name':'{$data['title']}'},
		{'title':'发布者', 'name':'{$data['author']}'},
		{'title':'详细类容', 'name':'{$data['content']}'},	
		{'title':'创建时间', 'name':'{$data['ts_created']}'},
			]";
		echo $json;
	}
/**
*新闻修改
*@param null
*@return array 
*/			
	function getModify(){
		if($_GET['id'] && $_GET['type']){
			$id = $_GET['id'];
			$type = $_GET['type'];
			$sql = "select title,author,content,FROM_UNIXTIME(ts_created) as ts_created from news where id = '{$id}'and type = '{$type}'";
			 $result = R::getRow($sql);	 
			}
			return $result;
			
	}
/**
*新闻置顶
*@param null
*@return array 
*/
	function getTop(){
		echo 1;
		if($_POST['id'] && $_POST['top']){
			$sql = "update news set top='{$_POST['top']}' where id='{$_POST['id']}';update news set top='0' where id<>'{$_POST['id']}' order by top desc";
			$data = R::getAll($sql);
			return $data;
		}
		return $data;
	
	}
/**
*新闻审核
*@param null
*@return array 
*/
	function checkNews(){
			echo 1;
			if($_POST){
					$id = $_POST['id'];
					$active = $_POST['active'];
					}
				$data = R::getAll("update news set active ='{$active}' where id = '{$id}'");
				return $data;	
	}


/**
* 通过传入的数据将$map里面的信息转换成能形成json格式的array
*
 * @param  array $map   category
 * @return array 	
 */
	function searchNew($map = array()){
		$where = " WHERE ";
			$arr1 = array();
			if(isset($map['search'])){
				foreach($map['search']['search'] as $key=>$value){
					if($value['field'] == 'title'){
						array_push($arr1,"n.title ".$value['like']);
					}elseif($value['field'] == 'content'){
						array_push($arr1, "n.content ".$value['like']);
					}elseif($value['field'] == 'type'){
						array_push($arr1, "t.type ".$value['like']);
					}elseif($value['field'] == 'author'){
						array_push($arr1, "n.author ".$value['like']);
					}else{
						array_push($arr1, $value['field'].$value['like']);
					}
				}
				$where .= join(" ".$map['search']['logic']." ",$arr1);
			}
			foreach ($map as $key => $value) {
				if(($key!='offset') && ($key!='limit') && ($key!='search')){
					$where .= " AND {$key}={$value} ";
				}
			}

			$sql = "SELECT n.id as recid,n.title,n.author,n.content,a.active,FROM_UNIXTIME(ts_created) as ts_created,t.type from news as n 
					INNER JOIN (SELECT type_id,titles as active from type where cate = 'active') as a on n.active = a.type_id
					INNER JOIN (SELECT type_id,titles as type from type where cate = 'type') as t on n.type = t.type_id";
			if($where == " WHERE "){
				$sql .=$where." n.status != 9 ";
				//echo $sql;exit;
			}else{
				$sql .=$where." AND n.status != 9 ";
			}
				$total =count(R::getAll($sql));
			if(isset($map['limit']) && isset($map['offset'])){
				$start = $map['offset'];
				$limit = "limit {$start},{$map['limit']}";
				$sql .= $limit;
			}
			$data = R::getAll($sql);
			$newSql = "SELECT * FROM news WHERE status='0' order by id desc";
			$newdata = R::getAll($newSql);	
				for($i=0;$i<count($newdata);$i++){
					$type = $newdata[$i]['type'];
					}
				foreach($data as $key => $value){
					if($data[$key]['active']=='审核通过'){
					   $data[$key]['operate'] = $data[$key]['active'];
					}else{
					//active = 3,审核通过
						$data[$key]['operate'] = "<a href='javascript:void(0);' onclick='updateStatus({$value['recid']},3)'>".$data[$key]['active']."</a>";
					}		
						$seeurl = k::url('home/newsList',array('type'=>$type,'id'=>$value['recid']));
					    $updateurl = k::url('new/modify',array('type'=>$type,'id'=>$value['recid']));
						$data[$key]['operate'] .= "｜<a href='{$seeurl}'>查看</a> ";
						$data[$key]['operate'] .= "｜<a href='{$updateurl}'>修改</a> ";
			}
			$arr = array(
				'total'=>$total,
				'data'=>$data
			);
			return $arr;
		}
		function install($file){
			 $dir = dirname(dirname(__FILE__)).'/';
			 $sqlfile = $dir.$file;
		if(file_exists($sqlfile)){
			$dirArr = pathinfo($sqlfile);
			 $dirArr['extension'];
			if($dirArr['extension']=='sql'){
		 $str = file_get_contents($sqlfile);
			$arr = explode(';', $str);
		foreach ($arr as $key => $value) {
			if($value){
				//echo trim($value);exit;
				$data = R::exec(trim($value));
				//exit;
			  }
			}
			}else{
				echo '文件类型不服';
			}
		}else{
				echo '文件不存在';
			}
	}
}

	
	

	
