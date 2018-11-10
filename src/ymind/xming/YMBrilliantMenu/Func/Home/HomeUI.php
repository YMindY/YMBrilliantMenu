<?php
/* 主菜单ui */
namespace ymind\xming\YMBrilliantMenu\Func\Home;
use ymind\xming\YMBrilliantMenu\BaseUI;
use ymind\xming\YMBrilliantMenu\Func\ID;
class HomeUI extends BaseUI
{
  const INDEX_TP = 0;
  const INDEX_SIGN = 1;
  const INDEX_SHOP = 2;
  protected static $id = ID::HOME;
  protected static $data = 
  [
    'type'=>'form',
    'title'=>'§a超§b级§c菜§e单§r',
    'content'=>'主菜单',
    'buttons'=>
    [
      ['text'=>'传送·功能'],
      ['text'=>'签到·功能'],
      ['text'=>'商店·功能']
    ]
  ];
  
  public static function send(\pocketmine\Player $player):void
  {
    \ymind\xming\YMBrilliantMenu\UISender::send(self::$id,self::$data,$player);
  }
}
?>