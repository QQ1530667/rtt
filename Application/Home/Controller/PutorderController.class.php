<?php
namespace Home\Controller;
use Think\Controller;
use JPush\Client as JPush;
class PutorderController extends BaseController

{
    public function __construct()
	{
        parent::__construct();

	}


    //订单列表
    public function orderList()
    {
        $type = I('post.type',1);
        $commodity_type = I('post.commodity_type',1);
        $rst = D('Putorder')->orderList($type, $commodity_type);
		
		foreach ($rst as &$value) {
            $level = $value['level'] / 10;

            $img = M('person_img')->where(['person_id' => $value['person_id'], 'level' => floor($level)])->find();
            
                $value['person_img'] = $img['img'];
        }
		

        $this->assign('rst',$rst);

		$personList=M('Person')->where('status=0')->select();
		/*pr($rst);die;*/
		$this->assign('personarr',$personList);
        if ($type == 1) {
            if ($commodity_type == 1) {
//                echo '买 人物';
                $this->assign('type',1);
				
                $this->display('person');
            } else {
//                echo '买 装备';
                $this->assign('type',1);
                $this->display('equipment');
            }
        } else {

            if ($commodity_type == 1) {
            	
				
//                echo '卖 人物';
				
                $this->assign('type',2);
                $this->display('person');
            } else {
//                echo '卖 装备';
                $this->assign('type',2);
                $this->display('equipment');
            }

        }

    }

/**
     * ajax获取道具类型
     * @author LiYang
     * @date 2018-1-7
     * @return void
     */
	public function getCommodity() 
	{
		$id = I('post.id');
		if ($id == 1) {
			$rst = D('person')->getStorePerson();
		} else {
			$rst = D('equipment')->getStoreEquipment();
		}	
		echo json_encode($rst);
	}
	
    /**
     * 挂单(订单类型：卖)
     * @author LiYang
     * @date 2018-1-7
     * @return void
     */
    public function sellCreationOrder()
    {
        $post = I('post.');
        $this->ban();
        $rst = D('Putorder')->sellCreationOrder(session('user_id'), $post['commodity_id'], $post['commodity_type'], $post['commodity_price']);

        if ($rst['status'] == true) {
            returnajax(true, '' ,'下单成功');
        } else {
            returnajax(false, '' , $rst['msg']);
        }
    }

    /**
     * 购买商品，用户点击(订单类型：卖)
     * @author LiYang
     * @date 2018-1-7
     * @return void
     */
    public function sellReceiving()
    {
        $this->ban();
        $order_id = I('get.order_id');
        $rst = D('putorder')->sellreceiving(session('user_id'), $order_id);

        if ($rst['status']) {
            returnajax(true, '','购买成功');
        } else {
            returnajax(false, '', $rst['msg']);
        }

    }


    /**
     * 购买商品，异步更新(订单类型：卖)
     * @author LiYang
     * @date 2018-1-7
     * @return void
     */
    public function sellAccomplish()
    {
        $this->ban();
        $order_id = I('get.order_id');
        $rst = D('putorder')->sellAccomplish(session('user_id'), $order_id);

        if ($rst['status']) {
            returnajax(true, '','购买成功');
        } else {
            returnajax(false, '', $rst['msg']);
        }

    }

    /**
     * 创建订单(订单类型：买)
     * @author LiYang
     * @date 2018-1-7
     * @return void
     */
    public function buyCreationOrder()
    {
        $this->ban();
        $post = I('post.');

        $rst = D('Putorder')->buyCreationOrder(session('user_id'), $post ,1);

        if ($rst['status'] == true) {
            returnajax(true, '' ,'下单成功');
        } else {
            returnajax(false, '' , $rst['msg']);
        }
    }

    /**
     * 玩家点击购买(订单类型：买)
     * @author LiYang
     * @date 2018-1-13
     * @return void
     */
    public function buyReceiving()
    {
        $this->ban();
        $order_id = I('get.order_id', '', 'int');
        $rst = D('Putorder')->buyReceiving(session('user_id'), $order_id);

        if ($rst['status'] == true) {
            returnajax(true, $rst['data']);
        } else {
            returnajax(false, '' , $rst['msg']);
        }
    }

    /**
     * 完成购买(订单类型：买)
     * @author LiYang
     * @date 2018-1-13
     * @return void
     */
    public function buyAccomplish()
    {
        $this->ban();
        $order_id = I('post.order_id', '', 'int');
        $rst = D('Putorder')->buyAccomplish(session('user_id'), $order_id);

        if ($rst['status'] == true) {
            returnajax(true, $rst['data']);
        } else {
            returnajax(false, '' , $rst['msg']);
        }
    }

    //让用户打款
    public function remit()
    {

        $order_id = I('get.order_id');
        $type = I('get.type');

        if ($type ==1) {
            $model = M('user_buy_order');
        } else {
            $model = M('user_sell_order');
        }

        $rst = $model->where(['id' => $order_id])->find();

        if ($rst['commodity_type'] == 1) {

            $model = M('person_bag');
            $data = $model->where(['id' => $rst['commodity_id']])->find();

            $level = $data['level'] / 10;

            $img = M('person_img')->where(['person_id' => $data['person_id'], 'level' => floor($level)])->find();


            $rst['typeImg'] = $img['img'];
        } else {
        	
            $model = M('equipment_bag');
            $data = $model->where(['id' => $rst['commodity_id']])->find();
			$equipmentimg=M('equipment')->where(['id' => $data['equipment_id']])->find();
			/*pr($equipmentimg);die;*/
            $rst['typeImg'] = $equipmentimg['equipment_img'];
        }

        $rst['server_price'] = $rst['commodity_price'] / 20;
        $user = M('user')->where(['id' => $rst['user_id']])->find();
        $rst['putorder_site'] = $user['site'];
        $rst['order_time'] = $rst['use_time'] + C('ORDER_TIME');

        $overtime = false;

        if (time() > $rst['order_time']){
            $overtime = true;
        }
        $status = false;
        if ($rst['status'] == 2) {
            $status = true;
        }
        if ($type == 2) {
            $tmp = $rst['putorder_site'];
            $rst['putorder_site'] = $rst['site'];
            $rst['site'] = $tmp;
        }

        $this->assign('rst',$rst);
        
        $this->assign('overtime',$overtime);
        $this->assign('status',$status);
        $this->assign('type',$type);
        $this->display('putorder/order');
    }

    //通知用户打款
    public function send() {
        $order_id = I('get.order_id');
        $type = I('get.type');

        if ($type ==1) {
            $model = M('user_buy_order');
        } else {
            $model = M('user_sell_order');
        }

        $rst = $model->where(['id' => $order_id])->find();

        //用户打款
        returnajax(true);
    }



}