<?php

class StockController extends Controller
{

	public function actions()
	{
		return array(
				'quote'=>array(
						'class'=>'CWebServiceAction',
				),
				
		);
	}

 	/**
 	 * 通过在文档注释中的@soap标签声明getPrice方法为一个Web service API
     * @param string the symbol of the stock
     * @return float the stock price
     * @soap
     */
	public function getPrice($symbol)
	{
		$prices=array('IBM'=>100,'Google'=>150);
		return isset($prices[$symbol])?$prices[$symbol]:0;
	}

}