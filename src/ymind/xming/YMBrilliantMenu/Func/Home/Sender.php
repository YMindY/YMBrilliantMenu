<?php
/* 点地发送主菜单ui */
namespace ymind\xming\YMBrilliantMenu\Func\Home;
class Sender implements \pocketmine\event\Listener
{
  public function onClick(\pocketmine\event\player\PlayerInteractEvent $event):void
  {
    if(\ymind\xming\YMBrilliantMenu\MenuEntry\EntryGiver::isEntry($event->getItem()))
    {
      HomeUI::send($event->getPlayer());
    }
  }
}
?>