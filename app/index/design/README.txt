功能简介
	这个模块主要完成了课程表智能排课(自定义节假日,循环排课)

用了什么表,表是干什么的(字典的简介)
	classroom(教室)
	course(课程)
	holiday(节假日)
	schedule(课程表)
	grade(班级)
	
3  是怎么设计的(核心过程)
	操作流程
		1 先是在前台添加班级,教室,课程
		2 然后再到/?m=course&a=schedule 添加条件生成课程表
		3 在可以到/?m=course&a=list 进行查看和修改
	核心
		