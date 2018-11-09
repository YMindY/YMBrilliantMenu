<?php
namespace ymind\xming\YMBrilliantMenu;
use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\Player;
abstract class UISender extends
{
  public static function send(int $formid,array $formdata,Player $player)
  {
    $ui=new ModalFormRequestPacket();
    $ui->formId=$formid;
    $ui->formData=json_encode($formdata);
    $player->sendDataPacket($ui);
  }
}
?>