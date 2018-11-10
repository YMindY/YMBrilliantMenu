<?php
/* 签到数据控制及签到响应 */
namespace ymind\xming\YMBrilliantMenu\Func\Sign;
use ymind\xming\YMBrilliantMenu\BaseResponser;
use ymind\xming\YMBrilliantMenu\Func\ID;
class SignData extends BaseResponser
{
  private $dataFolder;
  private $config;
  protected function response(int $id,string $data,\pocketmine\Player $player):void
  {
    if($id != ID::SIGN) return;
    if($data == SignUI::INDEX_SIGN)
    {
      $player->sendMessage("签到成功!");
    }
    if($data == SignUI::INDEX_BACK)
    {
      SignUI::$last::send([$player]);
    }
  }
}