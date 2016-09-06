<?php
/**
 * LD库文件
 * ============================================================================
 * * 版权所有 2016-2018   科技有限公司，并保留所有权利。
 * 网站地址: php.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * filter.php 2016年8月7日}  Lisonglin
 */
interface  filter {
	public function accept();
}
class filterParamter extends FilterIterator  implements filter
{
	private $FilterValue;
    
    public function __construct(Iterator $iterator , $filter )
    {
        parent::__construct($iterator);
        $this->FilterValue = $filter;
    }
    
    public function accept()
    {
        $filterValues =  $this->getInnerIterator()->current();
      
        if( strcasecmp($filterValues,$this->FilterValue) == 0) {
            return false;
        }        
        return true;
    }
}