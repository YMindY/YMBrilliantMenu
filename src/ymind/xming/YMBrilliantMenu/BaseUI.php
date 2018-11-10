<?php
/* ui的基础属性 */
namespace ymind\xming\YMBrilliantMenu;
use pocketmine\Player;
abstract class BaseUI
{
  protected static $id;
  protected static $data;
  protected static $last;
  abstract public static function send(array $args):void;
}
?>