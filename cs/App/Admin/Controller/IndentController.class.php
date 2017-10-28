<?php
namespace Admin\Controller;
class IndentController extends CommonController {
    //订单列表
    public function indent_list($pag=1){
       	update_shopping();
       	$this->refund();
		if(I()['kind']){
			$data = I();
			unset($data['kind']);
			foreach ($data as $key => $value) {
				if($value==''){
					unset($data[$key]);
				}
			}
			if(!$data)$this->redirect('indent_list');
			$address_id = M('address')->where('address_static=1')->getField('id',true);
			if($data['address_id']){if(!in_array($data['address_id'], $address_id))$this->error('非法地址参数');}
			if($data['reserve_type']){if(!($data['reserve_type']==0||$data['reserve_type']==1))$this->error('非法预约参数');}
			if($data['indent_static']){if(!($data['indent_static']==1||$data['indent_static']==2||$data['indent_static']==3||$data['indent_static']==4))$this->error('非法订单参数');}

			if($data['user_id']){
				$pattern = "/^1[3-9]{1}[0-9]{9}$/";
				if(!preg_match($pattern,$data['user_id']))$this->error('手机格式不对或未填写');
		 		$kind = $data;
			 	$data['user_id'] = inquire_name('consumer','user_phone='.$data['user_id'],'id');
			}else{
		 		$kind = $data;
			}
		 	foreach ($data as $key => $value) {
		        $url .= $key.'='.$value.'&';
		      }
			$url = 'indent_list?kind=kind&'.$url.'pag=';
		 	$indent = paging('indent',$data,'id desc',$pag);
		 	$num = pags('indent',$data,$url,$pag);
	    	$this->assign('kind',$kind);
	 		$address = inquire_name('address','address_static=1','','select');
		}else{
	      $indent = paging('indent','','id desc',$pag);
	      $str = 'indent_list?pag=';
	      $num = pags('indent','',$str,$pag);
	      $address = inquire_name('address','address_static=1','','select');
	      $this->assign('kind','');
		}
	      $this->assign('address',$address);
	      $this->assign('indent',$indent);
	      $this->assign('indent_num',$num);
	      $this->display();
    }
    //确认码比对
    public function nonce(){
    	if(I()['nonce_str']){
    		$string = inquire_name('indent',I(),'','select');
    		if($string){
    			echo  '确认码正确';
    		}
    	}else{
    	$this->assign('id',I('get.id'));
    	$this->display();
    	}
    }
  	//ajax确认消费
    public function affirm(){
    	$data = array('indent_static'=>2,'consume_time'=>time());
    	if(!I('post.id')){echo 'ID参数丢失';die;}
    	$string = M('indent')->where('id='.I('post.id'))->getField('indent_static');
    	if($string != 1){echo '不是未消费产品，非法参数';die;}
    	$str = inquire_name('indent','id='.I('post.id'),$data,'save');
    	if($str){echo '成功';}else{echo '参数修改失败';}
    }
    
	

	//微信退单列表（退款查询）
	public function refund_list($pag=1){
		if(I('post.OrderQuery')){
			$string = mb_substr(trim(I('post.OrderQuery')),0,10);
	        if(C('MCHID_T')==$string){
	          Vendor(C('NAME_T').'.WxPayApi');
	        }elseif(C('MCHID_K')==$string){
	          Vendor(C('NAME_K').'.WxPayApi');
	        }
	          $input = new \WxPayRefundQuery();
	          $input->SetOut_trade_no(I('post.OrderQuery'));
	          $data = \WxPayApi::refundQuery($input);
	          if($data['result_code']=='SUCCESS'){
	            if($data['refund_channel_0']=='ORIGINAL'){
		            $data['refund_channel_0'] ='原路退款';
		            }elseif($data['refund_channel_0']=='BALANCE'){
		                $data['refund_channel_0'] ='退回到余额';
		            }elseif($data['refund_channel_0']=='OTHER_BALANCE'){
		                $data['refund_channel_0'] = '原账户异常退到其他余额账户';
		            }elseif($data['refund_channel_0']=='OTHER_BANKCARD'){
		                $data['refund_channel_0'] = '原银行卡异常退到其他银行卡';
		            }else{
		                $data['refund_channel_0'] = '未知参数';
		            }
		            if($data['refund_account_0']=='REFUND_SOURCE_UNSETTLED_FUNDS'){
		              $data['refund_account_0'] = '未结算资金退款';
		            }else if($data['refund_account_0']=='REFUND_SOURCE_RECHARGE_FUNDS'){
		              $data['refund_account_0'] = '可用余额退款/基本账户';
		            }
		            if($data['refund_status_0']=='SUCCESS'){
	            		$data['refund_status_0']='退款成功';
	           		}else if($data['refund_status_0']=='REFUNDCLOSE'){
	           	 		$data['refund_status_0']='退款处理中';
	           		}else if($data['refund_status_0']=='REFUNDCLOSE'){
	            		$data['refund_status_0']='退款异常，退款到银行发现用户的卡作废或者冻结了，导致原路退款银行卡失败';
	           		}
		            $arr = array();
		            $arr[0] = $data;
		            $this->assign('data',$arr);
		            $this->assign('out_trade_no',I('post.OrderQuery'));
	          }
		}else{
		$str = 'refund_list?pag=';
     	$data = paging('refundquery','','id desc',$pag);
      	$num = pags('refundquery','',$str,$pag);
		$this->assign('data',$data);
		$this->assign('refundquery_num',$num);
		}
		$this->display();
	}
	//微信、余额退款
	public function refund_data(){
		$id = I('post.id');
		if(!$id){echo 'ID参数丢失';die;}
		if(!I('post.trade_type')){echo '退款方式参数丢失';die;}
		$consumer= M('consumer');
		$indent = M('indent');
		$data = $indent->where('id='.$id.' AND indent_static=1')->find();
		$cons_data = $consumer->where('id='.$data['user_id'])->find();
		if(I('post.trade_type')=='pay_y'){
	   		$consumer->startTrans(); 
			if($data){
				$arr = array('user_money'=>$data['cash_fee']+$cons_data['user_money']);
				$upcons = $consumer->where('id='.$data['user_id'])->setField($arr);
				$in_up = array('indent_static'=>4,'refund_time'=>time());
				$up_indent = $indent->where('id='.$id)->setField($in_up);

				if($upcons&&$up_indent){
		          $consumer->commit();
		          echo '成功';
		      }else{
		          $consumer->rollback();
		          echo '余额退款失败';
		      }
			}else{
				echo '非法参数（产品已消费或已过期）';
			}
		}else if(I('post.trade_type')=='JSAPI'){
			//微信支付-退款
			$arr = array('tianshu'=>C('MCHID_T'),'kangyun'=>C('MCHID_K'));
			$title = array_search($data['mch_id'],$arr);
			if($data['trade_type']=='JSAPI'){
				Vendor($title.'.WxPayApi');
				$input = new \WxPayRefund();
				//商户订单号
				if($data['out_trade_no'] && $data['out_trade_no'] != ""){
					$out_trade_no = $data['out_trade_no'];
					$total_fee = $data['cash_fee']*100;
					$refund_fee = $data['cash_fee']*100;
					$input->SetOut_trade_no($out_trade_no);
				}
				$input->SetTotal_fee($total_fee);
				$input->SetRefund_fee($refund_fee);
			    $input->SetOut_refund_no(\WxPayConfig::MCHID.date("YmdHis"));
			    $input->SetOp_user_id(\WxPayConfig::MCHID);
				$refund_data = \WxPayApi::refund($input);
		      	if($refund_data['result_code']=='SUCCESS'&&$refund_data['return_code']=='SUCCESS'){
		      		$in_up = array('indent_static'=>4,'refund_time'=>time());
					$indent->where('id='.$id)->setField($in_up);
					echo '成功';
				  }else if ($refund_data['result_code']=='FAIL'&&$refund_data['return_code']=='SUCCESS'){
					echo $refund_data['err_code_des'];
				}else {
					echo '非法参数';
				}
			}else{
				echo '不是微信支付，非法参数';
			}
		}else{
				echo '不是微信支付 余额支付，非法请求';
		}
	}

	//微信退单数据自动更新
	public function refund(){
   		$indent_data = M('indent')->where("trade_type='JSAPI' and indent_static=1")->getField('id,out_trade_no',true);
    	if($indent_data){
	    $refundquery = M('refundquery');
			foreach ($indent_data as $key => $out_trade_no) {
	    		$strs = $refundquery->where("out_trade_no='$out_trade_no'")->find();
	    		if($strs){
	    			unset($indent_data[$key]);
	    		}
	    	}  
    	}
    	if($indent_data){
      	foreach ($indent_data as $id => $value) {
	        $string = mb_substr($value,0,10);
	        if(C('MCHID_T')==$string){
	          Vendor(C('NAME_T').'.WxPayApi');
	        }elseif(C('MCHID_K')==$string){
	          Vendor(C('NAME_K').'.WxPayApi');
	        }
	          $input = new \WxPayRefundQuery();
	          $input->SetOut_trade_no($value);
	          $data = \WxPayApi::refundQuery($input);
	          if($data['result_code']=='SUCCESS'){
	          	$in_up = array('indent_static'=>4,'refund_time'=>strtotime($data['refund_success_time_0']));
	          	$str = M('indent')->where('id='.$id)->setField($in_up);
	          	if(!$str){
	          		alogs('refund',6,'ID'.$id.' 微信退单数据自动更新失败','','indent_dologs');
	          		continue;
	          	}
	         	 unset($data['appid']);
	         	 unset($data['nonce_str']);
	         	 unset($data['out_refund_no_0']);
	         	 unset($data['refund_fee']);
	         	 unset($data['refund_fee_0']);
	        	 unset($data['return_code']);
	         	 unset($data['return_msg']);
	         	 unset($data['sign']);
             	if($data['refund_channel_0']=='ORIGINAL'){
                $data['refund_channel_0'] ='原路退款';
	            }elseif($data['refund_channel_0']=='BALANCE'){
	                $data['refund_channel_0'] ='退回到余额';
	            }elseif($data['refund_channel_0']=='OTHER_BALANCE'){
	                $data['refund_channel_0'] = '原账户异常退到其他余额账户';
	            }elseif($data['refund_channel_0']=='OTHER_BANKCARD'){
	                $data['refund_channel_0'] = '原银行卡异常退到其他银行卡';
	            }else{
	                $data['refund_channel_0'] = '未知参数';
	            }
	            if($data['refund_account_0']=='REFUND_SOURCE_UNSETTLED_FUNDS'){
	              $data['refund_account_0'] = '未结算资金退款';
	            }else if($data['refund_account_0']=='REFUND_SOURCE_RECHARGE_FUNDS'){
	              $data['refund_account_0'] = '可用余额退款/基本账户';
	            }
	            if($data['refund_status_0']=='SUCCESS'){
	            	$data['refund_status_0']='退款成功';
	            }else if($data['refund_status_0']=='REFUNDCLOSE'){
	            	$data['refund_status_0']='退款处理中';
	            }else if($data['refund_status_0']=='REFUNDCLOSE'){
	            	$data['refund_status_0']='退款异常，退款到银行发现用户的卡作废或者冻结了，导致原路退款银行卡失败';
	            }
	            $refundquery->add($data);
	          }

          	}
          }
    }
























}
