
<?php
	class module_new_list{
		function run(){
			if($_GET['back']){	
				  $limit = $_POST['limit'];
				  $offset = $_POST['offset'];
				  $sql = "SELECT n.id as recid,n.title,n.author,n.content,a.active,FROM_UNIXTIME(ts_created) as ts_created,t.type 
							from news as n INNER JOIN (SELECT  type_id,titles as active from type where cate = 'active') as a on n.active = a.type_id
							INNER JOIN (SELECT type_id,titles as type from type where cate = 'type') as t on n.type = t.type_id where n.status = '0' order by ts_created desc";			
				  $sqlPage = "SELECT n.id as recid,n.title,n.author,n.content,a.active,FROM_UNIXTIME(ts_created) as ts_created,t.type 
							from news as n INNER JOIN (SELECT  type_id,titles as active from type where cate = 'active') as a on n.active = a.type_id
							INNER JOIN (SELECT type_id,titles as type from type where cate = 'type') as t on n.type = t.type_id where n.status = '0' order by ts_created desc limit {$offset},{$limit}";
				$data = R::getAll($sql);
				$dataPage = R::getAll($sqlPage);
				$newdata = R::getAll("select * from news where status='0' order by id desc");	

				for($i=0;$i<count($newdata);$i++){
					$type = $newdata[$i]['type'];
					}
				foreach($dataPage as $key => $value){
					if($dataPage[$key][active]=='审核通过'){
					   $dataPage[$key]['operate'] = $data[$key][active];
					}else{
					//active = 3,审核通过
						$dataPage[$key]['operate'] = "<a href='javascript:void(0);' onclick='updateStatus({$value['recid']},3)'>".$data[$key]['active']."</a>";
					}			
						$dataPage[$key]['operate'] .= "｜<a href='?m=home&a=newsList&type={$type}&id={$value['recid']}'>查看</a> ";
						$dataPage[$key]['operate'] .= "｜<a href='?m=new&a=modify&type={$type}&id={$value['recid']}'>修改</a> ";
			}
						$arr = array(
							'total'=>count($data),
							'Page'=>ceil($_POST['offset']/$_POST['limit']),
							'records'=>$dataPage
							);
						echo json_encode($arr);exit;
			}
			
			$t=new tpl();
			$t->display('list');
		}
	}