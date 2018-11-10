<?php
/* Responser的基础属性 */
namespace ymind\xming\YMBrilliantMenu;
use pocketmine\Player;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;
abstract class BaseResponser implements \pocketmine\event\Listener
{
  abstract protected function response(int $id,string $data,Player $player):void;
  public function onServerReceivePacket(\pocketmine\event\server\DataPacketReceiveEvent $event):void
  {
    $player = $event->getPlayer();
    $ui = $event->getPacket();
    if(!$player instanceof \pocketmine\Player) return;
    if(!$ui instanceof ModalFormResponsePacket) return;
    $data = trim($ui->formData);
    if($data === "null") return;
    $this->response($ui->formId,$data,$player);
  }
}
?>