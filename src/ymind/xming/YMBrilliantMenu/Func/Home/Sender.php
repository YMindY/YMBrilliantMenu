<?php
namespace ymind\xming\YMBrilliantMenu\Func\Home;
class Sender implements \pocketmine\event\Listener
{
  public function onClick(\pocketmine\event\player\PlayerInteractEvent $event):void
  {
    if(\ymind\xming\YMBrilliantMenu\MenuEntry\EntryGiver::isEntry($event->getItem()))
    {
      Home::send($event->getPlayer());
    }
  }
}
?>