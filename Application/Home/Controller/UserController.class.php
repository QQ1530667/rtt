<?php
namespace Home\Controller;
use Think\Controller;
use JPush\Client as JPush;
class UserController extends Controller
{
    public function __construct()
	{
        parent::__construct();
	}

    /**
     * 注册
     * @author LiYang
     * @param  [mobile]   手机号
     * @param  [password] 密码
     * @date 2018-1-7
     * @return void
     */
    public function register()
    {
        $data = [];
        $post = I('post.');

        if (empty($post['mobile']) && empty($post['password'])) {
            returnajax(false, '', '请完善用户信息');
        }

        if (!regexp('mobile', $post['mobile'])) {
            returnajax(false, '', '手机号格式不正确');
        }

        if (!regexp('password', $post['password'])) {
            returnajax(false, '', '密码格式不正确');
        }

        if (M('user')->where(['mobile' => $post['mobile']])->find() ) {
            returnajax(false, '', '该手机号已被注册');
        }

        $salt = createSalt();
        $password = encryption($post['password'], $salt);

        $data = [
            'mobile' => $post['mobile'],
            'salt' => $salt,
            'password' => $password,
            'create_time' => time(),
            'last_login_time' => time(),
            'last_login_ip' => getIp(),
        ];

        $rst = M('user')->add($data);

        if ($rst) {
            returnajax(true, '', '注册成功');
        } else {
            returnajax(false, '', '注册失败，请稍候再试');
        }


    }

    /**
     * 登录
     * @author LiYang
     * @param  [mobile]   手机号
     * @param  [password] 密码
     * @date 2018-1-7
     * @return void
     */
    public function login()
    {
        $post = I('post.');

        if (!regexp('mobile', $post['mobile'])) {
            returnajax(false, '', '手机号格式不正确');
        }

        if (!regexp('password', $post['password'])) {
            returnajax(false, '', '密码格式不正确');
        }

        $rst = M('user')->where(['mobile' => $post['mobile']])->find();

        if (!$rst) {
            returnajax(false, '', '账号不正确');
        }

        if (encryption($post['password'], $rst['salt']) != $rst['password']) {
            returnajax(false, '', '密码不正确');
        }

        $model = M('user');
        $model->find($rst['id']);
        $model->last_login_time = time();
        $model->last_login_ip = getIp();

        session('user_id', $rst['id']);
        session('mobile', $rst['password']);
        returnajax(true, '', '成功');

    }




}