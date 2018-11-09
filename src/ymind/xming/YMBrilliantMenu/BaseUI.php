<?php
/* ui的基础属性 */
namespace ymind\xming\YMBrilliantMenu;
use pocketmine\Player;
abstract class BaseUI
{
  protected static $id;
  protected static $data;
  abstract public static function send(Player $player):void;
}
?>