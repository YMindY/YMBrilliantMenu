<?php
/* 签到ui */
namespace ymind\xming\YMBrilliantMenu\Func\Sign;
use ymind\xming\YMBrilliantMenu\BaseUI;
use ymind\xming\YMBrilliantMenu\Func\ID;
class SignUI extends BaseUI
{
  const INDEX_SIGN = 0;
  const INDEX_BACK = 1;
  protected static $id = ID::SIGN;
  protected static $data = 
  [
    'type'=>'form',
    'title'=>'签到·功能',
    'content'=>"你今天&status签到\n你已经连续签到&num天了",//&status(尚未|已经)
    'buttons'=>
    [
      ['text'=>'签到'],
      ['text'=>'返回'],
    ]
  ];
  public static $last = \ymind\xming\YMBrilliantMenu\Func\Home\HomeUI::class;
  public static function send(array $args):void
  {
    $data = self::$data;
    $data['content'] = str_replace(["&status","&num"],[$args[1],$args[2]],$data['content']);
    \ymind\xming\YMBrilliantMenu\UISender::send(self::$id,$data,$args[0]);
  }
}
?>