<?php
/* 主菜单提交响应 */
namespace ymind\xming\YMBrilliantMenu\Func\Home;
use ymind\xming\YMBrilliantMenu\Func\ID;
use ymind\xming\YMBrilliantMenu\BaseResponser;
use ymind\xming\YMBrilliantMenu\Func\Sign\SignData;
class Responser extends BaseResponser
{
  protected function response(int $id,string $index,\pocketmine\Player $player):void
  {
    if($id != ID::HOME) return;
    $name = $player->getName();
    switch($index)
    {
      case HomeUI::INDEX_TP:
        $player->sendMessage("传送功能");
      break;
      case HomeUI::INDEX_SIGN:
        $signdata = SignData::getPlayerData($name);
        $player->sendMessage("签到功能");
        \ymind\xming\YMBrilliantMenu\Func\Sign\SignUI::send(
        [
        $player,
        (SignData::isSigned($name) ? "已经" : "尚未"),
        $signdata["累签天数"] ?? "0"
        ]);
      break;
      case HomeUI::INDEX_SHOP:
        $player->sendMessage("商店功能");
      break;
      default:
        $player->sendMessage("数据错误!，请通知服主联系开发者!");
    }
  }
}
?>