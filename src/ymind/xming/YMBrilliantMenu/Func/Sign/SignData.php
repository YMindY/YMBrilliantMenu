<?php
/* 签到数据控制及签到响应 */
namespace ymind\xming\YMBrilliantMenu\Func\Sign;
use ymind\xming\YMBrilliantMenu\BaseResponser;
use ymind\xming\YMBrilliantMenu\Func\ID;
use pocketmine\utils\Config;
class SignData extends BaseResponser
{
  private static $config;
  public function __construct()
  {
    @mkdir(self::getDataFolder());
    self::$config = new Config(self::getDataFolder()."players.yml",Config::YAML,array());
  }
  protected function response(int $id,string $data,\pocketmine\Player $player):void
  {
    if($id != ID::SIGN) return;
    $name = $player->getName();
    if($data == SignUI::INDEX_SIGN)
    {
      $data = self::getPlayerData($name);
      $date = date("y-m-d");
      if($this->isSigned($name)){
        $player->sendMessage("你今天已经签到过了!");
      }
      else
      {
        $data["最近签到"] = date("y-m-d");
        $data["连签天数"] = isset($data["连签天数"]) ? $data["连签天数"]+1 : 1;
      //$data["签到状态"] = "已经";
        self::setPlayerData($name,$data);
      }
    }
    if($data == SignUI::INDEX_BACK)
    {
      SignUI::$last::send([$player]);
    }
  }
  protected static function getDataFolder():string
  {
    return \ymind\xming\YMBrilliantMenu\Main::getInstance()->getDataFolder()."Sign/";
  }
  public static function isSigned(string $name):bool
  {
    $data = self::getPlayerData($name);
    return (isset($data["最近签到"]) && strtotime($data["最近签到"])==strtotime(date("y-m-d")));
  }
  public static function getPlayerData(string $playername):array
  {
    return self::$config->exists($playername) ? self::$config->get($playername) : array();//php7语法糖
  }
  private function setPlayerData(string $playername,array $data):void
  {
    self::$config->set($playername,$data);
    self::$config->save();
  }
}