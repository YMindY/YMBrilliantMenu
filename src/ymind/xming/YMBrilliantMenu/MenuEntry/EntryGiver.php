<?php
namespace ymind\xming\YMBrilliantMenu\MenuEntry;
class EntryGiver implements \pocketmine\event\Listener
{
  public function onPlayerRespawn(\pocketmine\event\player\PlayerRespawnEvent $event):void
  {
    $this->callPlayerAppear($event);
  }
  public function onPlayerJoin(\pocketmine\event\player\PlayerJoinEvent $event):void
  {
    $this->callPlayerAppear($event);
  }
  private function callPlayerAppear(\pocketmine\event\player\PlayerEvent $event):void
  {
    $event->getPlayer()->sendMessage("YMBrilliantMenu测试ing");
  }
}
?>