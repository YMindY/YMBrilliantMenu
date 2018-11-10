<?php
/* 主菜单提交响应 */
namespace ymind\xming\YMBrilliantMenu\Func\Home;
use ymind\xming\YMBrilliantMenu\Func\ID;
use ymind\xming\YMBrilliantMenu\BaseResponser;
class Responser extends BaseResponser
{
  protected function response(int $id,string $data,\pocketmine\Player $player):void
  {
    if($id != ID::HOME) return;
    switch($data)
    {
      case HomeUI::INDEX_TP:
        $player->sendMessage("传送功能");
      break;
      case HomeUI::INDEX_SIGN:
        $player->sendMessage("签到功能");
        \ymind\xming\YMBrilliantMenu\Func\Sign\SignUI::send([$player,"尚未","233"]);
      break;
      case HomeUI::INDEX_SHOP:
        $player->sendMessage("商店功能");
      break;
      default:
        $player->sendMessage("数据错误!");
    }
  }
}
?>