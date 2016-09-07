<?php 

class Money {
	/**
	 * 红包金额
	 *
	 * @var int
	 */
	private  $money = 1;
	/**
	 * 红包个数
	 *
	 * @var int
	 */
	protected $count = 10;
	/**
	 * 第几个红包
	 *
	 * @var int
	 */
	protected $i = 0;
	/**
	 * 存储红包值
	 *
	 * @var array
	 */
	protected $arr =array();

	public function getMoney()
	{
		$this->i++;
		//每个红包的最大值
		$max = ($this->money-( ($this->count-$this->i)*0.01) )*100;

		//控制前面的红包的范围
		if( $max >= 2 ) {
			$round = mt_rand(1,$max-1);
		}else {
			$round = 0;
		}
		$one = mt_rand(1,$max-$round)/100;
		//push 到数组
		array_push($this->arr,number_format($one,2));
		//剩下的money
		$this->money -= $one;
		//echo number_format($one,2)."<br>";
		//最后一个红包就不用随机了
		if($this->i < $this->count-1){
			$this->getMoney();
		}else{
			array_push($this->arr,number_format($this->money,2));
			shuffle($this->arr);
			foreach($this->arr as $k=>$m) {
				echo $m."<br>";
			}
			//echo number_format($this->money,2);
		}
	}
}

(new Money())->getMoney();




