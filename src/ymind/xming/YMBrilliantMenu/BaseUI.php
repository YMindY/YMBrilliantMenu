<?php
namespace ymind\xming\YMBrilliantMenu;
use pocketmine\Player;
abstract class BaseUI
{
  public static $id;
  protected static $data;
  public static function send(Player $player):void
  {
    UISender::send(self::$id,self::$data,$player);
  }
}
?>