<?php
namespace Home\Controller;

class IndexController extends BaseController
{
    public function __construct()
	{
        parent::__construct();
	}

    public function index(){
        echo '首页';
    }
}