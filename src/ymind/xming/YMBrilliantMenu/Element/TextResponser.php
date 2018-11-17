<?php
/*  */
namespace ymind\xming\YMBrilliantMenu\Element;
use ymind\xming\YMBrilliantMenu\BaseResponser;
use ymind\xming\YMBrilliantMenu\Func\ID;
class TextResponser extends BaseResponser
{
  protected function response(int $id,string $data,\pocketmine\Player $player):void
  {
    if($id != ID::TEXT) return;
    if($data == SignUI::INDEX_BACK)
    {
      TextUI::$last::send([$player]);
    }
  }
}