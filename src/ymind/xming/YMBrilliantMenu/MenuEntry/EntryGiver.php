<?php
namespace ymind\xming\YMBrilliantMenu\MenuEntry;
class EntryGiver implements \pocketmine\event\Listener
{
  private $entryitem;
  public function __construct()
  {
    $this->entryitem=new \pocketmine\item\Item(381,20,"§a超§b级§c菜§e单§r");
    $this->entryitem->setCustomName($this->entryitem->getVanillaName());
  }
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
    $player=$event->getPlayer();
    $cnt = 0;
    foreach($player->getInventory()->getContents() as $item)
    {
			   	if($item->getID() == $this->entryitem->getId() && $item->getDamage() == $this->entryitem->getDamage())
      {
        $cnt += $item->getCount();
			   	}
 			}
    if($cnt <= 0)
    {
      $player->getInventory()->addItem(clone $this->entryitem);
    }
  }
  /*
  public function onPlayerHeldItem(\pocketmine\event\player\PlayerItemHeldEvent $event)
  {
    if($event->getItem()->getId()=$this->entryitem->getId() && $event->getItem()->getDamage()=$this->entryitem->getDamage()){
      $event->getPlayer()->sendPopup($this->entryitem->getName());
    }
  }
  */
}
?>