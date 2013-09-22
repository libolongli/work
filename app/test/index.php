<?php
	class module_test_index{
		function run(){
		$post=array(
				'r_price'=>array(
						'price'=>'价格',
						'title'=>'标题'
					),
				'r_student'=>array(
						'student'=>'报名学生',
						'address'=>'地址'
					)
			);

			$id = k::load('test')->getdata($post);
			//$sum = k::load('test')->priceMax($post);
			//$min = k::load('test')->priceMin($post);
			//$sum = k::load('test')->priceSum($post);
			//$avg = k::load('test')->priceAvg($post);
			
		}
		
	}
